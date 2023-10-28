<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Front extends CI_Controller {	
	function __construct(){
		parent::__construct();
		$this->load->model('Front_model');
	  	$this->load->library('Webmenu');
		$this->load->helper('tgl_indo');
	}
	function index(){

		$carusel = $this->Front_model->front_slideshow();
		$product = $this->Front_model->product_data();
		$unggulan = $this->Front_model->unggulan();
		$sidebar =  $this->Front_model->sidebar();

		$data = array(
			'judul' 		=> 'Pasar Sapi',
			'keywords'		=> 'Toko Peternakan, Alat Peternakan, Bibit Ternak, obat ternak',
			'description'	=> 'Toko Peternakan, Alat Peternakan, Bibit Ternak',
			'carusel'		=> $carusel,
			'product'		=> $product,
			'unggulan'		=> $unggulan,
			'sidebar'		=> $sidebar
			
		);
		//print_r($this->session->all_userdata());

		

		$this->general->assign_var($data);
		$this->smarty->_render_front('frontend/layouts/home');
	}
}