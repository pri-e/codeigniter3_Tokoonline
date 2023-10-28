<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Master_data extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('is_login')==FALSE){
			$this->session->set_flashdata('msg','<p class="alert alert-danger"><strong>Akses Ditolak!!</strong> Anda harus login terlebih dahulu</p>');
			redirect('webmin','refresh');
		}
		if($this->session->userdata('is_admin')>2){
			$this->session->set_flashdata('msg','<p class="alert alert-danger"><strong>Anda Tidak memiliki Hak akses ke Halaman yang anda Cari!!</strong> </p>');
			redirect('My404/insufficient_privileges','refresh');
		}
		$this->load->helper('url');
		$this->config->load('grocery_crud');
		//$this->grocery_crud->unset_read();
	}
	function index(){
		$this->config->set_item('grocery_crud_dialog_forms',FALSE);
		$this->grocery_crud->set_table('m_pengguna_instansi')
						   ->set_subject('Data Instalasi')
						   ->columns('instansi','alamat','img')
						   ->display_as('instansi',  "<span style='width: 100%; text-align: center; display: block;'>Nama Instansi</span>")
						   ->display_as('alamat', "<span style='width: 100%; text-align: center; display: block;'>Alamat Instansi </span>")
						   ->display_as('img', "<span style='width: 100%; text-align: center; display: block;'>Logo Instansi </span>")
						   ->fields('instansi','alamat','keterangan','img')
						   ->unset_texteditor('alamat','keterangan')
						   ->set_field_upload('img','assets/img/instansi')
						   ->required_fields('instansi','alamat');

		$data = array(
			'title1'=> '',
			'halaman'=>'template_crud',
			'subjek'=>'Master Instalasi',
			'crud'=>$this->grocery_crud->render()
		);
		$this->general->assign_var($data);
		$this->smarty->_render_crudtemplate('backend/crud/crud');
	}
	function akses_menu(){
		$this->config->set_item('grocery_crud_dialog_forms',false);
		$this->grocery_crud->set_table('m_menu')
						   ->set_subject('Data Menu Aplikasi')
						   ->set_relation('parent_id','m_menu','nama_modul')
						   //->order_by('urutan1','asc')
						   ->order_by('urutan','asc')
						   ->columns('namamodul','link_modul','aktif','urutan','urutan1','icon')
						   ->callback_column('namamodul', array($this,'_kolom_nama_menu'))
						   ->display_as('parent_id','Sub Dari')
						   ->display_as('namamodul','Menu')
						   ->fields('parent_id','nama_modul','link_modul','aktif','urutan','urutan1','icon')
						   ->unset_export()->unset_print()
						   ->required_fields('nama_modul','link_modul','aktif','urutan');

		$data = array(
			'title1'=> 'menu',
			'halaman'=>'template_crud',
			'subjek'=>'Data Menu Aplikasi',
			'crud'=>$this->grocery_crud->render()
		);
		$this->general->assign_var($data);
		$this->smarty->_render_crudtemplate('backend/crud/crud');
	}
	function _kolom_nama_menu($v, $r){
		if($r->parent_id==""){
			return $r->nama_modul;
		}elseif($r->parent_id != ""){
			$parent = $this->db->get_where('m_menu', array('id_menu'=>$r->parent_id))->row();
			return $parent->nama_modul." &rsaquo; ".$r->nama_modul;
		}
	}
	function users_level(){
		$this->config->set_item('grocery_crud_dialog_forms',TRUE);
		$this->grocery_crud->set_table('m_pengguna_level')
						   ->set_subject('Data Level Pengguna Aplikasi')
						   ->columns('level','keterangan')
						   ->display_as('level',  "<span style='width: 100%; text-align: center; display: block;'>Level Pengguna</span>")
						   ->display_as('keterangan', "<span style='width: 100%; text-align: center; display: block;'>Keterangan</span>")
						   ->fields('level','keterangan')
						   ->order_by('id_level','asc')
						   ->unset_texteditor('keterangan','keterangan')
						   ->required_fields('level','keterangan');

		$data = array(
			'title1'=> 'Data Level Pengguna Aplikasi',
			'halaman'=>'template_crud',
			'subjek'=>'Data Level Pengguna Aplikasi',
			'crud'=>$this->grocery_crud->render()
		);
		$this->general->assign_var($data);
		$this->smarty->_render_crudtemplate('backend/crud/crud');
	}
	
	function data_pengguna(){
		$this->config->set_item('grocery_crud_dialog_forms',false);
		$this->grocery_crud->set_table('m_pengguna_data')
						   ->where('m_pengguna_data.id >', 1)
						   //->set_relation('id_diklat_instansi','m_diklat_instansi','instansi')
						   ->set_relation('id_provinsi','wilayah_provinsi','nama')
						   ->set_subject('Data Pengguna Aplikasi')
						   ->columns('nama_pengguna','alamat','id_provinsi','hp','keterangan','image')
						   ->display_as('nama_pengguna', "Nama lengkap")
						   ->display_as('id_provinsi','Pilih Provinsi')
						   //->display_as('id_diklat_instansi', "<span style='width: 100%; text-align: center; display: block;'>Institusi</span>")
						   ->fields('nama_pengguna','alamat','id_provinsi','hp','keterangan','image')
						   ->order_by('id','asc')
						   ->unset_texteditor('keterangan','keterangan')
						   ->required_fields('nama','alamat','image')
						   ->set_field_upload('image','assets/image/pengguna');

		$data = array(
			'title1'=> 'Pasar Sapi',
			'halaman'=>'template_crud',
			'subjek'=>'Data Pengguna Aplikasi',
			'crud'=>$this->grocery_crud->render()
		);
		$this->general->assign_var($data);
		$this->smarty->_render_crudtemplate('backend/crud/crud');
	}
	function pengguna_aplikasi(){
		$this->config->set_item('grocery_crud_dialog_forms',false);
		$this->grocery_crud->set_table('m_pengguna')
						   ->set_subject('Akses Pengguna Aplikasi')
						   ->where('id_user >', 1)
						   ->set_relation_n_n('akses', 'm_menu_pengguna', 'm_menu', 'id_user', 'id_menu', 'nama_modul','priority')
						   ->set_relation('id_m_pengguna','m_pengguna_data','nama_pengguna')
						   ->set_relation('id_level','m_pengguna_level','level')						  
						   ->columns('id_m_pengguna','pengguna','id_level','is_aktif','email')
						   ->field_type('is_aktif','dropdown', array('1' => 'Ya', '0' => 'Tidak'))
						   ->display_as('id_m_pengguna','Nama Lengkap')
						   ->display_as('pengguna','User Name')
						   //->set_rules('namapengguna', 'namapengguna','trim|required|xss_clean|callback_username_check')
						   //->set_rules('namapengguna', 'namapengguna','trim|required|xss_clean|callback_checkUniq')
						   ->callback_edit_field('sandi',array($this,'edit_field_password'))
						   ->callback_before_update(array($this,'encrypt_password_callback'))
						   ->callback_before_insert(array($this,'encrypt_password_callback'))
						   ->fields('id_m_pengguna','pengguna','sandi','id_level','is_aktif','email','akses')
						   ->unique_fields(array('namapengguna','email'))
						   ->unset_export()->unset_print()						   
						   ->required_fields('namapengguna','id_level','nama','email');

		$data = array(
			'title1'=> 'Pasar Sapi',
			'halaman'=>'template_crud',
			'subjek'=>'Hak Akses Pengguna Aplikasi',
			'crud'=>$this->grocery_crud->render()
		);		
		$this->general->assign_var($data);
		$this->smarty->_render_crudtemplate('backend/crud/crud');
	}
	function edit_field_password($value, $primary_key){
		return '<input type="text" maxlength="50" value="" name="sandi" style="width:120px"> <small>(* Biarkan Kosong jika tidak berubah</small> ';
	}
	function encrypt_password_callback($post_array, $primary_key=null){
		$this->load->library('bcrypt');
	    if(!empty($post_array['sandi'])){
	        $post_array['sandi'] = $this->bcrypt->hash_password($post_array['sandi']);
	    }else{
	        unset($post_array['sandi']);
	    }
	 
	  return $post_array;
	}
	public function username_check($str){
	  $id = $this->uri->segment(4);
	  if(!empty($id) && is_numeric($id))
	  {
	   $username_old = $this->db->where("id",$id)->get('m_pengguna')->row()->namapengguna;
	   $this->db->where("namapengguna !=",$username_old);
	  }
	  
	  $num_row = $this->db->where('namapengguna',$str)->get('m_pengguna')->num_rows();
	  if ($num_row >= 1)
	  {
	   $this->form_validation->set_message('username_check', 'User sudah Ada');
	   return FALSE;
	  }
	  else
	  {
	   return TRUE;
	  }
	}
	public function checkUniq($str){
	    //is_unique['.TBL_BATCH.'.batchName]
	    $id = $this->uri->segment(4);
	    $old_name = "";
	    $result = null;
	 
	    if(!empty($id) && is_numeric($id))
	    {
		    $this->db->where("namapengguna", $id);		 
		    $result = $this->db->get(m_pengguna);
		    if($result->num_rows() > 0)
		    {
			    foreach($result->result() as $row)
			    {
				    $old_name = $row->batchName;
			    }
			 
			    $this->db->where("namapengguna !=", $old_name);
			    $this->db->where("namapengguna", $str);
			    $num_rows = $this->db->get(m_pengguna)->num_rows();
			    if($num_rows > 0)
			    {
				    $this->form_validation->set_message('checkUniq',"The %s already Exist. Please try a different  name.");
				    return false;
			    }
		    }
	    }
	    else
	    {
		    $this->db->where("namapengguna", $str);
		    $num_rows = $this->db->get(m_pengguna)->num_rows();
		    if($num_rows > 0)
		    {
			    $this->form_validation->set_message('checkUniq',"The %s already Exist. Please try a different  name.");
			    return false;
		    }
	    } 
    }
	/* Global Variable */
	function assign_var($var){
		if(is_array($var)){
			foreach($var as $name=>$value){
				$this->smarty->assign($name, $value);
			}
		}		
	}
}