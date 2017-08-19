<?php 
if(!defined('_ROOT')) {
	exit('Access Denied');
}

$tpl->setfile(array(
	'body'=>'game_detail.tpl'
));

$id = intval($_GET["id"]);

if ($id > 0) {
	$result_data = $oClass->get_detail($id);
	$result_data = formatOutputData($result_data);
	if($result_data['id'] > 0) {
		$arrPatches = explode(',', $result_data['patches']);
		$tpl->merge($arrPatches, 'patches');
		$tpl->assign($result_data);
	}
}

$breadcrumb->reset();
$menu = explode('.',$_SESSION['cms_menu']);
$breadcrumb->assign("",$MenuName[$menu[0]]);
$level = $MenuLink[$menu[0]][$menu[1]];
$breadcrumb->assign($level['link'],$level['name']);

$request['breadcrumb'] = $breadcrumb->parse();
$tpl->assign($request);