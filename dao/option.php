<?php

if(!defined('_ROOT')) {
 exit('Access Denied');
}

class OptionDAO extends Model{
	var $configure_mod;
	function OptionDAO($configure_mod){
		parent::__construct();
		$this->configure_mod = $configure_mod;
	}
	
	function get($id=0){
		//$info = $this->info($id);		
		$result =  $this->query("SELECT c.*,ln.* FROM ".$this->prefix."options c, ".$this->prefix."options_ln ln WHERE c.id = ln.id AND ln.ln = '".$this->setLang('options',$info['type'],$this->configure_mod)."' AND c.id = ".intval($id));
		$data = $result->fetch();
		//$result->cache();
		return $data;
	}
	function info($id = 0){
		$result =  $this->query("SELECT c.* FROM ".$this->prefix."html c WHERE c.id = ".intval($id));
		$data = $result->fetch();
		//$result->cache();
		return $data;
	}
	function view($type = 0,$orderby = NULL, $cond = 1){
		if(!$orderby) $orderby = $this->configure_mod['options'][$type]['sort_order'];
		$sql_order = $orderby?" ORDER BY $orderby":"";
		$result =  $this->query("SELECT c.*,ln.* FROM ".$this->prefix."options c, ".$this->prefix."options_ln ln WHERE c.active=1 and c.type=".$type." and c.id = ln.id AND ln.ln = '".$this->setLang('options',$type,$this->configure_mod)."' AND ".$cond." $sql_order");
		return $result;
	}
	function counts($type = 0, $cond = 1){
		$result =  $this->db->mysql_results("SELECT count(c.id)  FROM ".$this->prefix."options c, ".$this->prefix."options_ln ln WHERE c.active=1 and c.type=".$type." and c.id = ln.id AND ln.ln = '".$this->setLang('options',$type,$this->configure_mod)."' AND ".$cond);
		return $result;	
	}
	function viewbycontent($type = 0,$orderby = NULL, $cond=1){
		if(!$orderby) $orderby = $this->configure_mod['options'][$type]['sort_order'];
		$sql_order = $orderby?" ORDER BY $orderby":"";
		$result =  $this->query("SELECT c.*,ln.*,co.content_id FROM ".$this->prefix."options c inner join ".$this->prefix."options_ln ln on (c.id = ln.id) left join ".$this->prefix."content_options co on (co.options_id=c.id) WHERE c.active=1 and c.type=".$type." AND ln.ln = '".$this->setLang('options',$type,$this->configure_mod)."' AND ".$cond." $sql_order");
		return $result;
	}
	
	
	function load($content_id = 0, $options_id = 0, $options_type = 0,$page = 'content'){
		$cond = " `page` = '$page'";
		if($content_id) $cond .= " AND content_id = ".intval($content_id);
		if($options_id) $cond .= "  AND options_id = ".intval($options_id);
		if($options_type) $cond .= " AND  options_type = ".intval($options_type);
		$result = $this->query("SELECT * FROM ".$this->prefix."content_options WHERE $cond");
		return $result;
	}	

}

?>