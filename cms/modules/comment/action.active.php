<?php


if(!defined('_ROOT')) {
	exit('Access Denied');
}
$status = isset($_GET["status"])?intval($_GET["status"]):0;
$status = ($status==0 || $status==2)?1:2;
$oClass->active($request['id'], $status);
clear_sql_cache();
$query_string = $_SERVER['QUERY_STRING'];
parse_str($query_string,$result);
unset($result['act'],$result['id']);
$hook->redirect('?'.http_build_query($result,NULL,'&'));

?>