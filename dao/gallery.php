<?php

if(!defined('_ROOT')) {
 exit('Access Denied');
}

class GalleryDAO extends Model{
	var $configure_mod;
	function GalleryDAO($configure_mod){
		parent::__construct();
		$this->configure_mod = $configure_mod;
	}
	

	function view($page,$pageid = -1, $cond = 1,$start=0,$limit = 0,$orderby=" order_id,id"){
		if($pageid >= 0) $cond .= " AND pageid =".intval($pageid);
		return $this->query("SELECT * FROM ".$this->prefix."gallery WHERE image<>'' and page='".addslashes($page)."' and $cond ORDER BY $orderby".($limit?" LIMIT $start,$limit":""));
	}
	
	function counts($page,$pageid = -1, $cond = 1){
		if($pageid >= 0) $cond .= " AND pageid =".intval($pageid);
		return $this->db->mysql_results("SELECT COUNT(id) FROM ".$this->prefix."gallery WHERE image<>'' and page='".addslashes($page)."' and $cond");
	}
}