<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller {
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
		$this->grocery_crud->set_table('product')
						   ->set_relation('id_kategori','kategori_product','nama_kategori')
						   ->set_subject('Data Product')
						   ->columns('nama_product','harga','jumlah_stok','id_kategori','warna','image','publish_up')
						   ->display_as('id_kategori','Kategori')
						   ->fields('nama_product','harga','jumlah_stok','id_kategori','warna','diskripsi','jenis','review','sex','ukuran','bobot','image','image1','image2','publish_up','created','modified')
						   ->change_field_type('created','invisible')
						   ->change_field_type('modified','invisible')
						   ->order_by('id','asc')
						   ->unset_texteditor('keterangan','keterangan')
						   ->required_fields('nama','alamat','image')
						   ->set_field_upload('image','assets/image/product')
						   ->set_field_upload('image1','assets/image/product')
						   ->set_field_upload('image2','assets/image/product')
						   ->callback_before_insert(array($this,'callback_add'))
						   ->callback_before_update(array($this,'callback_update'))
						   ->unset_clone()
						   ->unset_read() ;

		$data = array(
			'title1'=> 'Pasar Sapi',
			'halaman'=>'template_crud',
			'subjek'=>'Data Product',
			'crud'=>$this->grocery_crud->render()
		);
		$this->general->assign_var($data);
		$this->smarty->_render_crudtemplate('backend/crud/crud');
	}
	function callback_add($post_array){
	  	$post_array['created'] = date('Y-m-d H:i:s');
		return $post_array;
	}
	function callback_update($post_array){
	  $post_array['modified'] = date('Y-m-d H:i:s');
	  return $post_array;
	}
}