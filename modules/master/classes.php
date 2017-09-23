<?php

if(!defined('_ROOT')) {
 exit('Access Denied');
}
class MasterModel extends Model{
	function MasterModel(){
		parent::__construct();
	}
	
	
	function configure_mod(){
		$configure_mod = array();
		$result = $this->query("SELECT * FROM ".$this->prefix."configure_mod WHERE 1 ORDER BY `module`,typeid");
		while($rs = $result->fetch()){
			$data = unserialize($rs['data']);
			$order_default = $data['sort_default']?$data['sort_default']:'order_id';
			$order_default .= " ".($data['sort_default_order'] == 'DESC'?'DESC':'ASC');
			$sort_order = $order_default;
			if($data['sort_order']) $sort_order .= ",".$data['sort_order'];
			$catsort_order = $order_default;
			if($data['catsort_order']) $catsort_order .= ",".$data['catsort_order'];
			$configure_mod[$rs['module']][$rs['typeid']] = array(
				'languages'=>intval($data['languages']),
				'sort_order'=>$sort_order,
				'catsort_order'=>$catsort_order,
			);
		}
		$result->cache();
		
		$result = $this->query("SELECT * FROM ".$this->prefix."language WHERE is_default = 1");
		$default_lang = $result->fetch();
		$configure_mod['default_lang'] = $default_lang['ln'];
		$result->cache();
		
		return $configure_mod;
		
	}
	
}