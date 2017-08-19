<?php

if(!defined('_ROOT')) {
	exit('Access Denied');
}
	$id = intval($_GET["id"]);
	if ($id > 0){
		$oClass->delete($id);
	}
	// refresh
	$query_string = $_SERVER['QUERY_STRING'];
	parse_str($query_string,$result);
	unset($result['act'],$result['id'],$result['c']);
	$hook->redirect('?'.http_build_query($result,'','&'));
?>