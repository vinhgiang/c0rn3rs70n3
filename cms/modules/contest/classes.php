<?php

if(!defined('_ROOT')) {
	exit('Access Denied');
}
define('POSSITION_TYPE_ID', 1);
class ClassModel extends Model{
	function ClassModel(){
		parent::__construct();
	}
	
	function view($cond = 1, $start = 0, $limit = 0, $orderby = "id"){
		return $this->db->query("SELECT * FROM ".$this->prefix."game WHERE type = 'contest' AND $cond ORDER BY $orderby".($limit?" LIMIT $start,$limit":""));
	}
	
	function get_detail($id){
		$result = $this->db->query("SELECT * FROM ".$this->prefix."game WHERE id = ".intval($id));
		return $result->fetch();
	}
	function delete($id){
		$this->db->delete($this->prefix."contact"," id = ".intval($id));
	}
	
	function active($id){
		$result  = $this->db->query("UPDATE ".$this->prefix."game SET active = ABS(active - 1) WHERE id = ".intval($id));
		return $result->affected_rows();
	}	
}