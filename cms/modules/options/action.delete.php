<?php

if(!defined('_ROOT')) {
	exit('Access Denied');
}

if($request['c']){
	$oClass->delete($request['id']);
	clear_sql_cache();
	
	if($request['ajax']) die('1');
	// refresh
	$query_string = $_SERVER['QUERY_STRING'];
	parse_str($query_string,$result);
	$mod = $result['p'];
	unset($result['act'],$result['id'],$result['c']);
	$hook->redirect('?'.http_build_query($result,NULL,'&'));
}else{

	
	$tpl->setfile(array(
		'body'=>'category.delete.tpl',
	));
	
	
	
	$request['breadcrumb'] = $breadcrumb->parse();
	
	
	$tpl->assign($request);
}	
?>