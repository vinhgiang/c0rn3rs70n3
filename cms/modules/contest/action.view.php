<?php
 
if(!defined('_ROOT')) {	exit('Access Denied');
}

$cond = 1;
$request["header_active"] = "Active";
$_SGET = $_GET;
unset($_SGET["page"]);
$url = '?'.http_build_query($_SGET,'','&');
if ($_POST["btnSearch"] || $_REQUEST["q"]!=""){
	$cond .= " AND (full_name LIKE '%" . $_REQUEST["q"] . "%' OR email LIKE '%" . $_REQUEST["q"] . "%' 
				OR child_name LIKE '%" . $_REQUEST["q"] ."%' OR IC = '" . $_REQUEST["q"] . "'
				OR code = '" . $_REQUEST["q"] . "' OR phone LIKE '%" . $_REQUEST["q"] . "%')";
	$url .= $request["url_current"] = "&q=". str_replace(array(' ', '<', '>', '&', '{', '}', '*'), array('+'), $_REQUEST["q"]);
	$request["search_text"] = str_replace(array(' ', '<', '>', '&', '{', '}', '*'), array(' '), $_REQUEST["q"]);		
}
$request["url_current"] .= intval($_GET['page'])>0?"&page=".intval($_GET['page']):"";

$tpl->setfile(array(
	'body'=>'contest.tpl'
));

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
	$rs = formatOutputData($rs);
	$rs['like_url'] = $system->domain . str_replace('cms/', '', $system->project) . 'peraduan/galeri/' . $rs['id'];
	$tpl->assign($rs,'contact');
}

$id = intval($_GET["id"]);
$sendEdm = intval($_GET["send"]);

if ($id > 0 && $sendEdm == 1) {
    $result_data = $oClass->get_detail($id);
    $result_data = formatOutputData($result_data);
    if($result_data['id'] > 0) {
        $data = array(
            'website' => $system->domain.$system->project,
            'img' => 'data/upload/game/' . $result_data['bag_img'],
            'name' => $result_data['name'],
            'header_letter' => $result_data['header_letter'],
            'body_letter' => $result_data['body_letter'],
            'footer_letter' => $result_data['body_letter'],
        );

        $email = new Email($result_data['email'], 'Dugro Backpack Shipping','contest-shipping-backpack.tpl');
        $email->connect($cfg);
        $email->tpl->assign($data);
        $email->Send();

        $tpl->box('msg');
    }
}

$breadcrumb->reset();
$menu = explode('.',$_SESSION['cms_menu']);
$breadcrumb->assign("",$MenuName[$menu[0]]);
$level = $MenuLink[$menu[0]][$menu[1]];
$breadcrumb->assign($level['link'],$level['name']);	


$request['breadcrumb'] = $breadcrumb->parse();
$tpl->assign($request);