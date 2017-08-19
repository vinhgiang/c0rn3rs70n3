<?php

if(!defined('_ROOT')) {
 exit('Access Denied');
}

class CommentDAO extends Model{
	var $configure_mod = array();
	function CommentDAO($configure_mod){
		parent::__construct();
		$this->configure_mod = $configure_mod;
	}
	
	function view($page,$pageid){
		return $this->query("SELECT c.*,m.username FROM ".$this->prefix."comment c
		WHERE c.page='$page' AND c.pageid=".intval($pageid)." ORDER BY `timestamp` DESC");
	}


	function language($cond = 1){
		return $this->query("SELECT * FROM ".$this->prefix."language WHERE $cond ORDER BY order_id");
	}

	function get_comment_count($cond=1){
		return $this->db->mysql_results("SELECT COUNT(*) FROM ".$this->prefix."comment c, ".$this->prefix."member m where c.memid = m.id AND ".$cond." ".$orderby);
	}

}

?>