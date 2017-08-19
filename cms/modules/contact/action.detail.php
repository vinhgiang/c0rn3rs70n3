<?php 
	if(!defined('_ROOT')) {
	exit('Access Denied');
}
	$tpl->reset();	
	$id = intval($_GET["id"]);
	$tpl->setfile(array('body'=>'contact_detail.tpl',));	
	if ($id > 0)
	{
		$result_data = $oClass->get_detail($id);
		$result_data['phone'] = $result_data['phone'] != '' ? $result_data['phone'] : '0';
		$result_data['email'] = $result_data['email'] != '' ? $result_data['email'] : '0';		
		$tpl->merge($result_data, "parse_data");
	}		
	$breadcrumb->reset();
	$menu = explode('.',$_SESSION['cms_menu']);
	$breadcrumb->assign("",$MenuName[$menu[0]]);
	$level = $MenuLink[$menu[0]][$menu[1]];
	$breadcrumb->assign($level['link'],$level['name']);	
	
	$request['breadcrumb'] = $breadcrumb->parse();
	$tpl->assign($request);
	$action = array();

?>