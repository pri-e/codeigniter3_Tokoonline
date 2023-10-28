<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Kategori_product extends CI_Controller {
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
		$this->config->set_item('grocery_crud_dialog_forms',false);
		$this->grocery_crud->set_table('kategori_product')
						   ->set_subject('Data Kategori Product')
						   ->set_relation('parent_id','kategori_product','nama_kategori')
						   //->order_by('urutan1','asc')
						   ->order_by('id','asc')
						   ->columns('parent_id','nama_kategori','nama_kategori_seo','aktif',)
						   ->callback_column('namamodul', array($this,'_kolom_nama_menu'))
						   ->display_as('parent_id','Sub Dari')
						   ->display_as('namamodul','Menu')
						   ->fields('parent_id','nama_kategori','nama_kategori_seo','aktif')
						   ->unset_export()->unset_print()
						   ->required_fields('nama_kategori','aktif');

		$data = array(
			'title1'=> 'menu',
			'halaman'=>'template_crud',
			'subjek'=>'Data Kategori Product',
			'crud'=>$this->grocery_crud->render()
		);
		$this->general->assign_var($data);
		$this->smarty->_render_crudtemplate('backend/crud/crud');
	}
	function _kolom_nama_menu($v, $r){
		if($r->parent_id==""){
			return $r->nama_kategori;
		}elseif($r->parent_id != ""){
			$parent = $this->db->get_where('kategori_product', array('id'=>$r->parent_id))->row();
			return $parent->nama_kategori." &rsaquo; ".$r->nama_kategori;
		}
	}
	function slideshow(){
		$this->config->set_item('grocery_crud_dialog_forms',FALSE);
		$this->grocery_crud->set_table('slideshow')
						   ->set_subject('Data Frontend Slide Show')
						   ->columns('url','image','aktif')
						   ->fields('url','image','aktif')
						   ->order_by('id','asc')
						   ->unset_texteditor('url')
						   ->required_fields('url','mage','aktif')
						   ->set_field_upload('image','assets/image/slideshow');
		$data = array(
			'title1'=> 'Data Frontend Slide Show',
			'halaman'=>'template_crud',
			'subjek'=>'Data Level Pengguna Aplikasi',
			'crud'=>$this->grocery_crud->render()
		);
		$this->general->assign_var($data);
		$this->smarty->_render_crudtemplate('backend/crud/crud');
	}
}
