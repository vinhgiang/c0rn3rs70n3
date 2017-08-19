<?php


if(!defined('_ROOT')) {
	exit('Access Denied');
}
$tpl->reset();
if($_POST){
	$url = str_replace('[]','data[]',$_POST['data']);
	$start = intval($_POST['start']);
	parse_str($url,$result);
	if($result['data']) foreach($result['data'] as $ordid=>$id) $oClass->update($id,array('order_id'=>$ordid+$start));
	clear_sql_cache();
}

?>