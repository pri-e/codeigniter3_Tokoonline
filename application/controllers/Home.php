<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('is_login')==FALSE){
			$this->session->set_flashdata('msg','<p class="alert alert-danger"><strong>Akses Ditolak!!</strong> Anda harus login terlebih dahulu</p>');
			redirect('webmin','refresh');
		}		
		$this->load->model('Home_model');
		$this->load->helper('tgl_indo');
		
		
	}
	function index(){

		redirect('home/dashboard','refresh');
		
	}
	function dashboard(){
		$level 		= $this->session->userdata('id_level');
		$id_user 	= $this->session->userdata('id_user');
		$instansi 	= $this->session->userdata('instansi');
		$id_instansi = $this->db->get_where('m_pengguna_data', array('id' => $id_user))->row()->alamat;
		if ($level == 1) {

			
			$data = array(
				'title' 		=> "Dashboard Pasar Sapi ---> Today Sales Stat",
				'title2'		=> "Grafik Penjualan" ,
				'title3'		=> "Grafik Pemesanan",
			);
			

			$this->general->assign_var($data);
			$this->smarty->_render_template('backend/home/su');
			
			//echo "<pre>";
			//print_r($this->session->all_userdata());
			//echo "</pre>";


		}elseif ($level == 2) {
			/*
			$data = array(
				'title' 		=> "Dashboard CMS",
				'title2'		=> "APPs Stat" ,
				'title3'		=> "jumlah Mahasiswa praktik Perbulan",
				'jumlah_post'	=> $this->Home_model->countpost(),
				'jumlahci'		=> $this->Home_model->countci(),
				//'memUsage'		=> $this->Home_model->memUsage(),
				//'getMemLimit'	=> $this->Home_model->getMemLimit()
			);
			$this->general->assign_var($data);
			$this->smarty->_render_template('backend/home/admin_web');
			*/
			echo "<pre>";
			print_r($this->session->all_userdata());
			echo "</pre>";
		}else{

			$mahasiswa = $this->Home_model->jumlahmhs_perid($id_user);
			$jumlah_mahasiswa = $mahasiswa->num_rows();
			$keg_instansi = $this->Home_model->jmlkeg_perinstansi($id_instansi);
			$jumlah_keg = $keg_instansi->num_rows();
			$data = array(
				'title' 		=> "Dashboard Diklat: ".$instansi,
				'title2'		=> "APPs Stat" ,
				'instansi'		=> $this->session->userdata('instansi'),
				'jumlahci'		=> $this->Home_model->countci(),
				'jumlahmhs'		=> $jumlah_mahasiswa,
				'jumlah_keg'	=> $jumlah_keg
				);

			//echo "<pre>";
			//print_r($this->session->all_userdata());
			//echo "</pre>";

			$this->general->assign_var($data);
			$this->smarty->_render_template('backend/home/admin_eksternal');
		}
	}
	

	/*
	function user(){
		$this->load->library('bcrypt');
		
		$pengguna = 'Prie';
		
		$email = 'priyanto.nugroho@gmail.com';
		$password = 'Admin@webgrhasia';
		$sandi = $this->bcrypt->hash_password($password);
		$now = date('Y-m-d H:i:s');
		
		$data = array(
			'pengguna' 		=> $pengguna, 
			'email' 		=> $email, 
			'sandi' 		=> $sandi, 
			'date_create' 	=> $now,
			'id_level'		=> 1

			);
		echo $sandi;
		//$this->db->insert('m_pengguna', $data);
	}*/
	function logout(){
		$this->session->sess_destroy();
		redirect("webmin","refresh");
	}
}