<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Front_model extends CI_Model{
	function __construct(){
		parent::__construct();
    }
  	function menu_utama(){
    
	}
	function front_slideshow(){
		$this->db = $this->load->database('default', true);
		$query = $this->db->query("SELECT
									  *
									FROM
									slideshow
								");
		return $query->result();
	}
	function product_data(){
		$query = $this->db->query("SELECT
									  *
									FROM
									product
									limit 6
								");
		return $query->result();
	}
	function unggulan(){
		$query = $this->db->query("SELECT
									  *
									FROM
									product
									limit 4
								");
		return $query->result();
	}
	function sidebar(){
		$parent = $this->db->query("SELECT
									*
									FROM
									kategori_product
									WHERE
									kategori_product.`parent_id`  IS NULL
								");

		$sidebar="<ul id='sideManu' class='nav nav-tabs nav-stacked'>";
		foreach ($parent->result() as $menu1) {
	 		$sidebar.= "<li class='subMenu'><a>". $menu1->nama_kategori."</a>";
		 		$sidebar.= "<ul style='display:none'>";
		 			$submenuquery = $this->db->query("SELECT
									*
									FROM
									kategori_product
									WHERE
									kategori_product.parent_id = '$menu1->id'
								");

		 			foreach ($submenuquery->result() as $menu2) {
						$sidebar.= "<li><a href=''><i class='icon-chevron-right'></i>".$menu2->nama_kategori." </a></li>";
					}
				$sidebar.= "</ul>";

			
	 		$sidebar.= "</li>";
		}
		$sidebar.="</ul>";
		
		return $sidebar;
	}
}

?>