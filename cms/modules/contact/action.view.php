<?php
 
if(!defined('_ROOT')) {	exit('Access Denied');
}

$cond = 1;
$request["header_active"] = "Active";
$_SGET = $_GET;
unset($_SGET["page"]);
$url = '?'.http_build_query($_SGET,'','&');
if ($_POST["btnSearch"] || $_REQUEST["q"]!=""){
	$cond .= " and (fullname like '%".$_REQUEST["q"]."%' or email like '%".$_REQUEST["q"]."%')";
	$url .= $request["url_current"] = "&q=". str_replace(array(' ', '<', '>', '&', '{', '}', '*'), array('+'), $_REQUEST["q"]);
	$request["search_text"] = str_replace(array(' ', '<', '>', '&', '{', '}', '*'), array(' '), $_REQUEST["q"]);		
}
$request["url_current"] .= intval($_GET['page'])>0?"&page=".intval($_GET['page']):"";
$tpl->setfile(array('body'=>'contact.tpl'));	
$orderby = "id desc";

//pagging
$cat = $oClass->view($cond);
$total = $cat->num_rows();
$request["page"] = intval($request["page"])<=0?1:intval($request["page"]);	
$start = LIMIT * (intval($request['page'])-1);	
if ($total>LIMIT){
	$objPage = new Pages();
	$objPage->First = "First";
	$objPage->Last = "Last";
	$objPage->Next = "Next";
	$objPage->Prev = "Prev";
	$request['divpage'] = $objPage->multipages($total, LIMIT, $request['page'], $url."&page=%page%");	
}
$request['url_link'] = $url;

$cat = $oClass->view($cond,$start,LIMIT,$orderby);	
while($rs = $cat->fetch()){		
	$tpl->assign($rs,'contact');
}

$breadcrumb->reset();
$menu = explode('.',$_SESSION['cms_menu']);
$breadcrumb->assign("",$MenuName[$menu[0]]);
$level = $MenuLink[$menu[0]][$menu[1]];
$breadcrumb->assign($level['link'],$level['name']);	


$request['breadcrumb'] = $breadcrumb->parse();
$tpl->assign($request);
?>