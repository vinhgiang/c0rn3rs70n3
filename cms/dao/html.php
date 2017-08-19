<?php

if(!defined('_ROOT')) {
	exit('Access Denied');
}

class HtmlDAO extends Model{
	function HtmlDAO(){
		parent::__construct();
	}
	
	function get($id){
		$result =  $this->query("SELECT ln.*, c.* FROM ".$this->prefix."html c, ".$this->prefix."html_ln ln WHERE c.id = ln.id AND ln.ln = '".$this->lang."' AND c.id = ".intval($id));
		$data  = $result->fetch();
		return $data;
	}

}