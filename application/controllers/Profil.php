<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Profil extends CI_Controller {	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('is_login')==FALSE){
			$this->session->set_flashdata('msg','<p class="alert alert-danger"><strong>Akses Ditolak!!</strong> Anda harus login terlebih dahulu</p>');
			redirect('webmin','refresh');
		}
		$this->load->model('Profil_model');
	}
	function index(){
		$id_user = $this->session->userdata('id_user');

		$data = array(
			'title' 		=> "Profil pengguna",
			'title2'		=> "Data Profil Pengguna" ,
			
			'dp'			=> $this->Profil_model->get_userdata($id_user)
			);

		//echo "<pre>";
		//print_r($data['dp']);
		//echo "</pre>";

		$this->general->assign_var($data);
		$this->smarty->_render_template('backend/profil/profil_view');
	}
}