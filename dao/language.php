<?php

if(!defined('_ROOT')) {
 exit('Access Denied');
}

class LanguageDAO extends Model{
	var $configure_mod;
	function LanguageDAO($configure_mod){
		parent::__construct();
		$this->configure_mod  = $configure_mod;
	}
	


	function view($cond = 1){
		return $this->query("SELECT * FROM ".$this->prefix."language WHERE $cond ORDER BY order_id");
	}

}

?>