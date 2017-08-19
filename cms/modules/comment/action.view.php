<?php

if(!defined('_ROOT')) {
	exit('Access Denied');
}
$status = isset($_GET["status"])?intval($_GET["status"]):1;
if ($status==0){
	$tpl->setfile(array(
		'body'=>'comment_waiting.tpl',
	));
}
else
{
	$tpl->setfile(array(
		'body'=>'comment.tpl',
	));
}
$url = '?mod='.$system->module."&status=".intval($_GET["status"]);
$page = $_GET["page"]>0?intval($_GET["page"]):1;
$start = LIMIT * ($page-1);
$sort = " c.id desc";
$cond = " c.active=".intval($_GET["status"]);
$totalpage  =$oClass->getCommentsCount($cond);
if ($totalpage>0)
{
	$result = $oClass->getComments($cond,$start,$perpage, $sort);
	while($rs = $result->fetch()){
		$rs  = $hook->format($rs);	
		$rs["status"] = intval($rs["active"])>=2?0:$rs["active"];		 
		$tpl->assign($rs,'comment');
	}
	
	$objPage = new Pages();
	$objPage->First = "First";
	$objPage->Last = "Last";
	$objPage->Next = "Next";
	$objPage->Prev = "Prev";
	$request['divpage'] = $objPage->multipages($totalpage, LIMIT, $request['page'], $url."&page=%page%");	
}

$breadcrumb->assign("",$cfg_type['comment_name']?$cfg_type['comment_name']:"Comments");
$request['breadcrumb'] = $breadcrumb->parse();
$request['LINK'] = '?'.http_build_query($_GET);

$tpl->assign($request);
$show_actions = array('delete');
$action = array();
foreach($show_actions as $act) $action['action_'.$act] = 'show';
$tpl->assign($action);

?>