<?php

if(!defined('_ROOT')) {
 exit('Access Denied');
}

class ContentDao extends Model{
	var $configure_mod;
	function ContentDao($configure_mod){
		parent::__construct();
		$this->configure_mod = $configure_mod;
	}

	function view($type = -1,$cond = 1,$start = 0,$limit = 0,$orderby = NULL){
		if(!$orderby) $orderby = $this->configure_mod['content'][$type]['sort_order'];
		$sql_order = $orderby?" ORDER BY $orderby":"";
		$cond_type = 1;
		if(is_array($type)) $cond_type = " c.type IN (".implode(',',$type).")";
		elseif($type>=0) $cond_type = " c.type = ".intval($type);
		$result= $this->query("SELECT c.*,ln.* FROM ".$this->prefix."content c,".$this->prefix."content_ln ln WHERE c.active = 1 AND $cond_type AND c.id = ln.id AND ln.ln = '".$this->setLang('content',$type,$this->configure_mod)."' AND $cond $sql_order".($limit?" LIMIT $start,$limit":""));
		return $result;
	}

	function viewWithoutStatus($type = -1,$cond = 1,$start = 0,$limit = 0,$orderby = NULL){
		if(!$orderby) $orderby = $this->configure_mod['content'][$type]['sort_order'];
		$sql_order = $orderby?" ORDER BY $orderby":"";
		$cond_type = 1;
		if(is_array($type)) $cond_type = " c.type IN (".implode(',',$type).")";
		elseif($type>=0) $cond_type = " c.type = ".intval($type);
		$result= $this->query("SELECT c.*,ln.* FROM ".$this->prefix."content c,".$this->prefix."content_ln ln WHERE $cond_type AND c.id = ln.id AND ln.ln = '".$this->setLang('content',$type,$this->configure_mod)."' AND $cond $sql_order".($limit?" LIMIT $start,$limit":""));
		return $result;
	}


	function counts($type = -1,$cond = 1){
		$cond_type = 1;
		if(is_array($type)) $cond_type = " c.type IN (".implode(',',$type).")";
		elseif($type>=0) $cond_type = " c.type = ".intval($type);
		return $this->db->mysql_results("SELECT count(c.id) as total FROM ".$this->prefix."content c,".$this->prefix."content_ln ln WHERE c.active = 1 AND $cond_type AND c.id = ln.id AND ln.ln = '".$this->setLang('content',$type,$this->configure_mod)."' AND $cond ");
	}


	function getcontentid($listcoumn, $type = -1,$cond = 1)
	{
		$cond_type = 1;
		if(is_array($type)) $cond_type = " c.type IN (".implode(',',$type).")";
		elseif($type>=0) $cond_type = " c.type = ".intval($type);
		$sql = "SELECT ".$listcoumn." FROM ".$this->prefix."content c,".$this->prefix."content_ln ln WHERE c.active = 1 AND $cond_type AND c.id = ln.id AND ln.ln = '".$this->setLang('content',$type,$this->configure_mod)."' AND $cond ";
		return $sql;
	}

	function getContentDetail($type = -1,$cond = 1)
	{
		$cond_type = 1;
		if(is_array($type)) $cond_type = " c.type IN (".implode(',',$type).")";
		elseif($type>=0) $cond_type = " c.type = ".intval($type);
		$sql = "SELECT * FROM ".$this->prefix."content c,".$this->prefix."content_ln ln WHERE c.active = 1 AND $cond_type AND c.id = ln.id AND ln.ln = '".$this->setLang('content',$type,$this->configure_mod)."' AND $cond ";
		$result = $this->query($sql);
		return $result->fetch();
	}


	function get($id  = 0){
		$result =  $this->query("SELECT c.*,ln.* FROM ".$this->prefix."content c left join ".$this->prefix."content_ln ln on (c.id = ln.id) WHERE c.active = 1  AND ln.ln = '".$this->lang."' AND c.id = ".intval($id));
		$data =  $result->fetch();
		return $data;
	}

	function getcontentrelated($id  = 0){
		$result =  $this->query("(SELECT c.*,ln.* FROM ".$this->prefix."content c left join ".$this->prefix."content_ln ln on (c.id = ln.id) WHERE c.active = 1  AND ln.ln = '".$this->lang."' AND c.id < ".intval($id)." ORDER BY c.id DESC LIMIT 0,1) UNION (SELECT c.*,ln.* FROM ".$this->prefix."content c left join ".$this->prefix."content_ln ln on (c.id = ln.id) WHERE c.active = 1  AND ln.ln = '".$this->lang."' AND c.id > ".intval($id)." ORDER BY c.id ASC LIMIT 0,1)");
		return $result;
	}

	function options($content_id = 0, $opt_type = 0, $page='content'){
		$cond = "co.content_id = ".intval($content_id);
		$cond .= " AND co.options_type = ".intval($opt_type);
		if($page) $cond .= " AND co.page = '".$page."'";
		$result = $this->query("SELECT o.*,ln.* FROM ".$this->prefix."content_options co,".$this->prefix."options o,".$this->prefix."options_ln ln WHERE o.id = co.options_id AND o.id = ln.id AND ln.`ln` = '".$this->setLang('options',$opt_type,$this->configure_mod)."' AND $cond");
		$options = array();
		while($rs = $result->fetch()){
			$options[$rs['id']] = $rs;
		}
		return $options;
	}

	function viewandcate($type = -1,$cond = 1,$start = 0,$limit = 0,$orderby = NULL){
		if(!$orderby) $orderby = $this->configure_mod['content'][$type]['sort_order'];
		$sql_order = $orderby?" ORDER BY $orderby":"";
		$cond_type = 1;
		if(is_array($type)) $cond_type = " c.type IN (".implode(',',$type).")";
		elseif($type>=0) $cond_type = " c.type = ".intval($type);
		return $this->query("SELECT c.*,ln.* FROM ".$this->prefix."content c inner join ".$this->prefix."content_ln ln on (c.id = ln.id and c.active = 1) WHERE $cond_type AND ln.ln = '".$this->setLang('content',$type,$this->configure_mod)."' AND $cond $sql_order".($limit?" LIMIT $start,$limit":""));
	}


	function checkExistMemberByID($uid){		
		$result = $this->db->query("select * FROM ".$this->prefix."member where id=".$uid);
		return $result->fetch();
	}	

}