<?php

if(!defined('_ROOT')) {
 exit('Access Denied');
}

class ConfigureDAO extends Model{
	var $configure_mod;
	function ConfigureDAO($configure_mod){
		parent::__construct();
		$this->configure_mod = $configure_mod;		
		$this->db->cachetime = 0;
	}
	
	function getMod($cond  = 1){
		return $this->query("SELECT * FROM ".$this->prefix."configure_mod WHERE $cond ORDER BY `module`,typeid");
	}	
	function view(){				
		$result= $this->query("SELECT * FROM ".$this->prefix."configure");			
		return $result;
	}
	
	function view_mod(){
		
	}

}

?>