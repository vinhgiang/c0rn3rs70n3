<?php

if(!defined('_ROOT')) {
 exit('Access Denied');
}

class CategoryDAO extends Model{
	var $configure_mod = array();
	function CategoryDAO($configure_mod){
		parent::__construct();
		$this->configure_mod = $configure_mod;
		
	}		
	function view($type= 0,$parentid = -1,$cond = 1,$start=0,$limit = 0,$orderby = NULL){
		if(!$orderby) $orderby = $this->configure_mod['content'][$type]['catsort_order'];
		$sql_order = $orderby?" ORDER BY $orderby":"";
		if($type>=0) $cond .=" AND c.type = ".intval($type);
		if($parentid>=0) $cond .= " AND c.parentid = ".intval($parentid);
		$result = $this->query("SELECT * FROM ".$this->prefix."category c,".$this->prefix."category_ln ln WHERE c.active = 1 AND c.id = ln.id AND ln.ln = '".$this->setLang('content',$type,$this->configure_mod)."' AND $cond $sql_order".($limit?" LIMIT $start,$limit":""));		
		return $result;
	}
	function counts($type= 0,$parentid = -1,$cond = 1){		
		if($type>=0) $cond .=" AND c.type = ".intval($type);
		if($parentid>=0) $cond .= " AND c.parentid = ".intval($parentid);
		$result=$this->db->mysql_results("SELECT count(c.id) FROM ".$this->prefix."category c,".$this->prefix."category_ln ln WHERE c.active = 1 AND c.id = ln.id AND ln.ln = '".$this->setLang('content',$type,$this->configure_mod)."' AND $cond ");
		return $result;
	}
	function get($id){		
		$result = $this->query("SELECT * FROM ".$this->prefix."category c inner join ".$this->prefix."category_ln ln on (c.id = ln.id) WHERE ln.ln = '".$this->lang."' AND c.id = ".intval($id));
		$data = $result->fetch();	
		return $data;
	}


	function viewWithoutStatus($type= 0,$parentid = -1,$cond = 1,$start=0,$limit = 0,$orderby = NULL){
		if(!$orderby) $orderby = $this->configure_mod['content'][$type]['catsort_order'];
		$sql_order = $orderby?" ORDER BY $orderby":"";
		if($type>=0) $cond .=" AND c.type = ".intval($type);
		if($parentid>=0) $cond .= " AND c.parentid = ".intval($parentid);
		$result = $this->query("SELECT * FROM ".$this->prefix."category c,".$this->prefix."category_ln ln WHERE c.id = ln.id AND ln.ln = '".$this->setLang('content',$type,$this->configure_mod)."' AND $cond $sql_order".($limit?" LIMIT $start,$limit":""));		
		return $result;
	}
}

?>