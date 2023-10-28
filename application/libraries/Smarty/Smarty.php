<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Smarty {
    
    var $data=array();
    var $path='templates/';

   
 
    function __construct(){
       $this->ci =& get_instance();
 
    }

    function assign($name, $value){
        $this->data[$name] = $value; 
    }

    function view($view){
        $this->ci->load->view($this->path.$view, $this->data);
    }

    function _render_template($view){
        $this->ci->load->view($this->path.'backend/layouts/header', $this->data);
    	$this->ci->load->view($this->path.$view);
    	$this->ci->load->view($this->path.'backend/layouts/footer');
    }

    function _render_crudtemplate($view){
        $this->ci->load->view($this->path.'backend/layouts/header_non', $this->data);
        $this->ci->load->view($this->path.$view);
        $this->ci->load->view($this->path.'backend/layouts/footer_non');
    }
    function _render_front($view){
        $this->ci->load->view($this->path.'frontend/layouts/header', $this->data);
        $this->ci->load->view($this->path.$view);
        $this->ci->load->view($this->path.'frontend/layouts/footer');
    }
}