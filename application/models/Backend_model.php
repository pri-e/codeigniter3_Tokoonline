<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_model extends CI_Model{
	function __construct(){
		parent::__construct();
    }
    public function select_where($table='',$param='',$bidang){
		return $this->db->query("SELECT * from $table where $param='$bidang'");
	}
	public function pilih($value){
		return $this->db->query("SELECT * from $value");
	}
  	function menu_utama(){
    
	}
	function get_pengguna($user){
		$this->db = $this->load->database('default', true);
		$query = $this->db->query("SELECT
									  *
									FROM
									  m_pengguna
  									where BINARY m_pengguna.`pengguna` = '$user'");
		return $query;
	}
}