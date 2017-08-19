<?php
 
if(!defined('_ROOT')) {	exit('Access Denied');
}

if($_POST) {

    $submissionId = intval($_POST['id']);
    $private = intval($_POST['private']);
    $vote = intval($_POST['vote']);
    $version = intval($_POST['version']);

    if($version > 0) {
        $_SESSION['scan_version'] = $version;
    }

    if ($submissionId > 0) {

        $scan_version = $_SESSION['scan_version'];

        $data = array(
            'vote' => $vote,
            'scan_version' => $scan_version
        );

        if ($private > 0) {
            $data['private'] = '1';
        }

        $scanned = $oClass->update_table('game', $data, 'id = ' . $submissionId);
    }
}

$cond = 'active = 1 AND (private IS NULL OR private = 0)';
$request["header_active"] = "Active";
$_SGET = $_GET;
unset($_SGET["page"]);
$url = '?'.http_build_query($_SGET,'','&');
if ($_POST["btnSearch"] || $_REQUEST["q"]!=""){
    $cond .= " AND (name LIKE '%" . $_REQUEST["q"] . "%' OR email LIKE '%" . $_REQUEST["q"] . "%' 
            OR facebook_id LIKE '%" . $_REQUEST["q"] . "%')";
    $url .= $request["url_current"] = "&q=". str_replace(array(' ', '<', '>', '&', '{', '}', '*'), array('+'), $_REQUEST["q"]);
    $request["search_text"] = str_replace(array(' ', '<', '>', '&', '{', '}', '*'), array(' '), $_REQUEST["q"]);
}
$request["url_current"] .= intval($_GET['page'])>0?"&page=".intval($_GET['page']):"";

$tpl->setfile(array(
    'body'=>'game.tpl'
));

$orderby = "scan_version desc, vote desc";

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
    $rs['child_name'] = htmlspecialchars_decode($rs['child_name']);
    $tpl->assign($rs,'contact');
}

$breadcrumb->reset();
$menu = explode('.',$_SESSION['cms_menu']);
$breadcrumb->assign("",$MenuName[$menu[0]]);
$level = $MenuLink[$menu[0]][$menu[1]];
$breadcrumb->assign($level['link'],$level['name']);


$request['breadcrumb'] = $breadcrumb->parse();
$tpl->assign($request);

$tpl->assign($_SESSION['scan_version'], 'scan_version');