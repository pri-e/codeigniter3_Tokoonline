<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webmenu {

	private $ci;

	function __construct(){
		$this->ci =& get_instance();
		//$this->ci->smarty->assign("menu",$this->Menu_web());	
		$this->ci->smarty->assign("sidebar",$this->frontsidebar());			
	}

	function frontsidebar(){
		$parent = $this->ci->db->order_by('id','asc')->get_where('kategori_product', array('aktif'=>'Ya'));
		$sidebar="<ul id='sideManu' class='nav nav-tabs nav-stacked'";
			$sidebar.= "<li class='subMenu'><a>TERNAK</a>";
			$sidebar.= "</li>";
		 	foreach ($parent->result() as $menu1) {
		 		$sidebar = "<li class='subMenu'><a>". $menu1->nama_kategori."</a>";
		 		$sidebar = "</li>";
		 	}
		$sidebar.="</ul>";
		return $sidebar;	  
	}

	function Menu_web(){
		$parent = $this->ci->db->order_by('urut','asc')->get_where('menu', array('induk'=>0,'kategori_menu'=>'Home'));
		
		$no=1;
		$menu="<ul class='menu'>";
		    foreach ($parent->result() as $menu1) {
		    	$class = ($no==1) ? "active" : "";
		    	if ($menu1->jenis_link=="halaman") {    
					$url=base_url('/halaman/'.$menu1->link.'/'.seo($menu1->judul).'.html');
				}elseif ($menu1->jenis_link=="kategori") {
					$url=base_url('/kategori/'.$menu1->link.'/'.seo($menu1->judul));
				}else{
					$url=$menu1->link;
				}
				$subMenu = $this->ci->db->order_by('urut','asc')->get_where('menu', array('induk'=>$menu1->id_menu));

				if($subMenu->num_rows() > 0){
		           $menu.= '<li ><a href="'.$url.'">'.$menu1->judul.'<span class="menu-description">'.$menu1->keterangan.'</span></a><ul class="submenu submenu-right">';
		            
		            foreach($subMenu->result_array() as $sub){
		            	$menu.= '<li><a href="'.cari_menu($sub).'">'.$sub['judul'].'</a></li>';       
		            }
		            	$menu.='</ul></li>';
		        }else{		    	
		      		$menu.= "<li class=".$class."><a href='".$url."'>".$menu1->judul."<span class='menu-description'>".$menu1->keterangan."</span></a></li>";
				}		    
		    }
		$menu.="</ul>";	    
		return $menu;
	}

	function data_header(){
		$data = array(
			'title' => "Pasar sapi Online Store"
		);

		return $data;
	}	
}