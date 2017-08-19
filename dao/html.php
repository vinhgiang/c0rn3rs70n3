<?php

if(!defined('_ROOT')) {
 exit('Access Denied');
}

class HtmlDAO extends Model{
	var $configure_mod;
	function HtmlDAO($configure_mod){
		parent::__construct();
		$this->configure_mod = $configure_mod;
	}
	
	
	function get($id=0){
		
		$result =  $this->query("SELECT ln.*, c.* FROM ".$this->prefix."html c, ".$this->prefix."html_ln ln WHERE c.id = ln.id AND ln.ln = '".$this->setLang('html',$id,$this->configure_mod)."' AND c.id = ".intval($id));
		$data  = $result->fetch();
		//$result->cache();
		return $data;
	}
	

}

?>