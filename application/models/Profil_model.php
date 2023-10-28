<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_model extends CI_Model{

    function __construct(){
        parent::__construct();
        
    }
    
    function get_userdata($id_user){
    	$this->db = $this->load->database('default', true);
		$query = $this->db->query("SELECT
									  m_pengguna.id_user,
									  m_pengguna.pengguna,
									  m_pengguna.email,
									  m_pengguna_data.*
									  
									FROM
									  m_pengguna
									  INNER JOIN m_pengguna_data ON m_pengguna_data.id = m_pengguna.id_m_pengguna
									  
									where
									m_pengguna.id_user = $id_user");
		return $query->result();

    }   
}