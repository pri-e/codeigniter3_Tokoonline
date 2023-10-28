<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Webmin extends CI_Controller {	
	function __construct(){
		parent::__construct();
		
		if($this->session->userdata('is_login')){
			redirect('home','refresh');
		}
				
	}
	function index(){
		$var = array(
			'title' => 'Login Page Web Grhasia', 
			'form_open'=>form_open('webmin/verivikasi'),
			'form_close'=>form_close(),
			'msg'=>$this->session->flashdata('msg'),
			'title'=>$this->config->item('APP_NAME'),
			'instansi'=>$this->config->item('INSTANSI'),
			'versi'=>$this->config->item('APP_VERSION')
		);

		/*
		$this->load->library('bcrypt');
		$password ="Admin";
		$hash_password = $this->bcrypt->hash_password($password);

		print_r($hash_password);
		*/

		$this->assign_var($var);		
		$this->smarty->view('backend/login');	
	}
	function verivikasi(){
		
		$this->form_validation->set_rules('username','Username','trim|required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('password','Password','trim|required|xss_clean|htmlspecialchars');

		$this->load->library('bcrypt');
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('msg','<div><p class="alert alert-danger">Harap melengkapi Informasi Login Anda!!</p></div>');
			redirect('webmin','refresh');
		}else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->load->model('Backend_model');
			
			$stored_hash = $this->Backend_model->get_pengguna($username); 
			
			if ($stored_hash->num_rows() > 0) {
				$sandi = $stored_hash->row()->sandi;
				
				if ($this->bcrypt->check_password($password, $sandi)){
					$this->load->model('Home_model');
					$pengguna = $stored_hash->row()->pengguna;
					$id_pengguna = $stored_hash->row()->id_user;
					$level = $stored_hash->row()->id_level;
					if ($level == 1) {
						//level Super User
						$dp  =	$this->db
								->join('m_pengguna_level','m_pengguna_level.id_level=m_pengguna.id_level')
								->join('m_pengguna_data','m_pengguna_data.id=m_pengguna.id_m_pengguna')								
								->get_where('m_pengguna', array('id_user'=>$id_pengguna));

						$sessi = array(
								'is_login'		=>TRUE,
								'nama'			=>$dp->row()->nama_pengguna,
								'is_admin'		=>TRUE,
								'username'		=>$dp->row()->pengguna,
								'id_user'		=>$dp->row()->id_user,
								'id_level'		=>$level,
								'level'			=>$dp->row()->level,
								'alamat'		=>$dp->row()->alamat
						);
						//$_SESSION['ses_kcfinder']=array();
						//$_SESSION['ses_kcfinder']['disabled'] = false;
						//$_SESSION['ses_kcfinder']['uploadURL'] = "";
					}elseif ($level == 2) {
						$dp  =	$this->db
								->join('m_pengguna_level','m_pengguna_level.id_level=m_pengguna.id_level')
								->join('m_pengguna_data','m_pengguna_data.id=m_pengguna.id_m_pengguna')
								->get_where('m_pengguna', array('id_user'=>$id_pengguna));
						$sessi = array(
								'is_login'		=>TRUE,
								'nama'			=>$dp->row()->nama_pengguna,
								'is_admin'		=>FALSE,
								'username'		=>$dp->row()->pengguna,
								'id_user'		=>$dp->row()->id_user,
								'id_level'		=>$level,
								'level'			=>$dp->row()->level,
								'alamat'		=>$dp->row()->alamat,
							);
						# code...
					}else{
						$dp  =	$this->db
								->join('m_pengguna_level','m_pengguna_level.id_level=m_pengguna.id_level')
								->join('m_pengguna_data','m_pengguna_data.id=m_pengguna.id_m_pengguna')
								->get_where('m_pengguna', array('id_user'=>$id_pengguna));
						$sessi = array(
								'is_login'		=>TRUE,
								'nama'			=>$dp->row()->nama_pengguna,
								'is_admin'		=>FALSE,
								'username'		=>$dp->row()->pengguna,
								'id_user'		=>$dp->row()->id_user,
								'id_level'		=>$level,
								'level'			=>$dp->row()->level,
								'alamat'		=>$dp->row()->alamat,
							);
					}
					
					$this->session->set_userdata($sessi);
					redirect('home/dashboard','refresh');
					//echo "<pre>";
					//print_r($dp);
					//echo "</pre>";	
				}else{

					$this->session->set_flashdata('msg','<div><p class="alert alert-danger">Username atau Password anda Salah!!</p></div>');
					redirect('webmin','refresh');
				}
			}else{
				$this->session->set_flashdata('msg','<div><p class="alert alert-danger">Username atau Password anda Salah!!</p></div>');
				redirect('webmin','refresh');
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