<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backmenu {

	private $ci;

	function __construct(){
		$this->ci =& get_instance();
		if($this->ci->session->userdata('is_admin')==1){
			$this->ci->smarty->assign("backmenu",$this->Menu_Administrator());
		}else{
			$this->ci->smarty->assign("backmenu",$this->Menu_Pengguna());
		}
		$this->ci->smarty->assign("datalogin",$this->data_login());		
	}


	function Menu_Administrator(){
		$parent = $this->ci->db->order_by('urutan','asc')->get_where('m_menu', array('parent_id'=>null,'aktif'=>'Ya'));
		$menu="<ul  class='sidebar-menu' style='margin-bottom:130px;'>";
		if($parent->num_rows() > 0){
			$menu.="<li class='header'>MENU BACKEND</li>";
			foreach($parent->result() as $parentMenu){
				$subMenu = $this->ci->db->order_by('urutan1','asc')->get_where('m_menu', array('parent_id'=>$parentMenu->id_menu,'aktif'=>'Ya'));
				if($subMenu->num_rows() > 0){
					$menu.="<li class='treeview'><a>"."<i class='".$parentMenu->icon."'></i>"."<span>".$parentMenu->nama_modul."</span>"."<span class='pull-right-container'><i class='fa fa-angle-left pull-right'></i></span></a>";							$menu.="<ul class='treeview-menu'>";
						foreach($subMenu->result() as $mainMenu){
							$ssmenu = $this->ci->db->order_by('urutan','asc')->get_where('m_menu', array('parent_id'=>$mainMenu->id_menu,'aktif'=>'Ya'));
							if($ssmenu->num_rows() > 0){
								$menu.="<li ><a href='#'><i class'".$mainMenu->icon."'></i>".$mainMenu->nama_modul."</a>";
								$menu.="<ul class='treeview-menu' >";
								foreach($ssmenu->result() as $item){
									$menu.="<li><a href='".base_url()."".$item->link_modul."'>"."<i class='".$item->icon."'></i>".$item->nama_modul."</a></li>";
								}
								$menu.="</ul>";
								$menu.="</li>";
							}else{
								
								$menu.="<li><a href='".base_url()."".$mainMenu->link_modul."'>"."<i class='".$mainMenu->icon."'></i>".$mainMenu->nama_modul."</a></li>";
								
							}
							
						}
						$menu.="</ul>";
					$menu.="</li>";
				}else{
					$menu.="<li class='treeview'><a href='".base_url()."index.php/".$parentMenu->link_modul."'>"."<i class='".$parentMenu->icon."'></i>"."<span>".$parentMenu->nama_modul."</span>"."<span class='pull-right-container'><i class='fa fa-angle-left pull-right'></i></span></a>";
				}
			}				
			//$menu.="</li>";			
		}
		$menu.="</ul>";	
		return $menu;
	}

	function Menu_Pengguna(){
		$user = $this->ci->session->userdata('id_user');
		$parent = $this->ci->db->order_by('urutan','asc')->get_where('menu_user', array('parent_id'=>null,'aktif'=>'Ya','id_user'=>$user));
		$menu="<ul  class='sidebar-menu' style='margin-bottom:130px;'>";
		if($parent->num_rows() > 0){
			$menu.="<li class='header'>MENU BACKEND</li>";
			foreach($parent->result() as $parentMenu){
				$subMenu = $this->ci->db->order_by('urutan1','asc')->get_where('menu_user', array('parent_id'=>$parentMenu->id_menu,'aktif'=>'Ya','id_user'=>$user));
				if($subMenu->num_rows() > 0){
					$menu.="<li class='treeview'><a>"."<i class='".$parentMenu->icon."'></i>"."<span>".$parentMenu->nama_modul."</span>"."<span class='pull-right-container'><i class='fa fa-angle-left pull-right'></i></span></a>";							$menu.="<ul class='treeview-menu'>";
						foreach($subMenu->result() as $mainMenu){
							$ssmenu = $this->ci->db->order_by('urutan','asc')->get_where('menu_user', array('parent_id'=>$mainMenu->id_menu,'aktif'=>'Ya','id_user'=>$user));
							if($ssmenu->num_rows() > 0){
								$menu.="<li ><a href='#'><i class'".$mainMenu->icon."'></i>".$mainMenu->nama_modul."</a>";
								$menu.="<ul class='treeview-menu' >";
								foreach($ssmenu->result() as $item){
									$menu.="<li><a href='".base_url()."".$item->link_modul."'>"."<i class='".$item->icon."'></i>".$item->nama_modul."</a></li>";
								}
								$menu.="</ul>";
								$menu.="</li>";
							}else{
								
								$menu.="<li><a href='".base_url()."".$mainMenu->link_modul."'>"."<i class='".$mainMenu->icon."'></i>".$mainMenu->nama_modul."</a></li>";
								
							}
							
						}
						$menu.="</ul>";
					$menu.="</li>";
				}else{
					$menu.="<li class='treeview'><a href='".base_url()."index.php/".$parentMenu->link_modul."'>"."<i class='".$parentMenu->icon."'></i>"."<span>".$parentMenu->nama_modul."</span>"."<span class='pull-right-container'><i class='fa fa-angle-left pull-right'></i></span></a>";
				}
			}					
			//$menu.="</li>";			
		}
		$menu.="</ul>";	
		return $menu;
	}	
	function data_login(){
		$id_pengguna = $this->ci->session->userdata('id_user');
		$data = $this->ci->db
				->join('m_pengguna_level','m_pengguna_level.id_level=m_pengguna.id_level')
                ->join('m_pengguna_data','m_pengguna_data.id=m_pengguna.id_m_pengguna')
                ->get_where('m_pengguna', array('id_user'=>$id_pengguna));		
		return $data;				
	}	
}