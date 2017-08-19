<?php

if(!defined('_ROOT')) {
	exit('Access Denied');
}

class ClassModel extends Model{
	function ClassModel(){
		parent::__construct();
	}
	
	function active($id, $status){
		return $this->db->query("UPDATE ".$this->prefix."comment SET active = '".$status."' WHERE id =".intval($id));
	}
	
	function delete($id){
		$this->db->delete($this->prefix."comment","id = ".intval($id));
	}
	function getComments($cond = "",$start=0,$limit = 0,$orderby = "c.id"){
		$where = $cond!=""?"Where ".$cond:"";
		return $this->db->query("SELECT c.*,m.name as author FROM ".$this->prefix."comment c left join ".$this->prefix."member m on (c.uid=m.id)  ".$where." ORDER BY $orderby".($limit?" LIMIT $start,$limit":""));
	}	
	function getCommentsCount($cond=""){		
		$where = $cond!=""?"Where ".$cond:"";
		$result =  $this->db->query("SELECT count(c.id) as total FROM ".$this->prefix."comment c left join ".$this->prefix."member m on (c.uid=m.id) ".$where);
		$temp = $result->fetch();
		return $temp["total"];
	}
}
?>