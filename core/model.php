<?php

if(!defined('_ROOT')) {
 exit('Access Denied');
}

class Model extends CaoBox{
	var $prefix;
	var $lang;
	var $db;
	function Model(){
		$this->db = new DB($GLOBALS['cfg']['server'],$GLOBALS['cfg']['port'],$GLOBALS['cfg']['usr'],$GLOBALS['cfg']['psw'],$GLOBALS['cfg']['name']);
		$this->lang = $GLOBALS['controller']->lang;
		$this->prefix = $GLOBALS['cfg']['prefix'];
		//$this->db->cache = _ROOT.'data/cache/';
	}
	
	function setCache($dircache){
		$this->db->cache = $dircache;
	}
	
	function query($sql){
		$db = new DB($GLOBALS['cfg']['server'],$GLOBALS['cfg']['port'],$GLOBALS['cfg']['usr'],$GLOBALS['cfg']['psw'],$GLOBALS['cfg']['name']);
		$db->cache = $this->db->cache;
		return $db->query($sql);
	}
	
	
	
	function setLang($module = 0,$typeid = 0,$configure_mod){
		if($configure_mod[$module][$typeid]['languages']) return $configure_mod['default_lang'];
		return $this->lang;
	}
	
	function setCharset($charset = "UTF8"){
		$this->query("SET NAMES '$charset'");
	}
	
	
}