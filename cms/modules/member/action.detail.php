<?php

if(!defined('_ROOT')) {
	exit('Access Denied');
}
	$tpl->reset();
	$id = intval($_GET["id"]);

	$tpl->setfile(array('body'=>'member.detail.tpl',));
	if ($id > 0)
	{
		$result = $oClass->get($id);
		$listdetail = $result->fetch();
		$listdetail["status"] = $listdetail["active"] == 1 ? "Đã xác thực" : "Chưa xác thực";

		$gameInfo = $oClass->get_game("user_id = ".$id)->fetch();
		$listdetail["totalCard"] = $gameInfo["total_cards"];
		$listdetail["normal_card"] = $gameInfo["normal"];
		$listdetail["captain_card"] = $gameInfo["captain"];
		$listdetail["club100_card"] = $gameInfo["club100"];
		$listdetail["cards"] = $gameInfo["cards"];
		$listdetail["completed_date"] = $gameInfo["completed_date"];

		$tpl->merge($listdetail, "user");
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