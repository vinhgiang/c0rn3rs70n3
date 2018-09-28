<?php

if(!defined('_ROOT')) { exit('Access Denied'); }

$tpl->setfile(
	array('body'=>'tutor.tpl',)
);

$keyword = clean_data( $_GET['keyword'] );
if ( $_POST ) {
	$keyword = clean_data( $_POST['keyword'] );
	$tpl->reset();
	$tpl->setfile(
		array('body'=>'student.ajax.tpl',)
	);
}

$cond = 1;
if ($keyword != '') {
    $cond = "(t.name LIKE '%$keyword%')";
}

$record = 20;
$url = $system->uri;

$page = intval($_GET['page']) <= 0 ? 1 : intval($_GET['page']);
$start = ($page - 1) * $record;

$totalRecord = $oHelper->count_table('teacher', $cond);
$totalPage = @ceil($totalRecord / $record);

$tutors = $oHelper->select_table('teacher t', $cond, $start, $record);
$index = $page * $record - $record + 1;
while ($tutor = $tutors->fetch()) {
	$tutor['index'] = $index;
	$tutor['status'] = $tutor['status'] == 1 ? 'checked=""': '0';
    $tpl->assign($tutor, 'tutor');
    $index++;
}

$objPage = new Pages();
$objPage->Next = '>';
$objPage->Prev = '<';
$objPage->current = '<li class="active"><a href="" onclick="return false;">%page%</a></li>';
$objPage->SeparatorLast = '<li class="active"><span>...</span></li>';
$objPage->PrevClass = "";
$objPage->NextClass = "";
$objPage->ClassItem = "";
$paging = $objPage->multipages($totalRecord, $record, $page, $url."?page=%page%");

$tpl->merge(array("page"=>$paging, "totalRecord" => $totalRecord, "totalPage" => $totalPage, "curPage" => $page),'paging');