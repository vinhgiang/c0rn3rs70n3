<?php

if(!defined('_ROOT')) { exit('Access Denied'); }

$tpl->setfile(
	array('body'=>'level.tpl',)
);

$cond = 1;

$record = 20;
$url = $system->uri;

$page = intval($_GET['page']) <= 0 ? 1 : intval($_GET['page']);
$start = ($page - 1) * $record;

$totalRecord = $oHelper->count_table('level', $cond);
$totalPage = @ceil($totalRecord / $record);

$levels = $oHelper->select_table('level l', $cond, $start, $record);
$index = $page * $record - $record + 1;
while ($level = $levels->fetch()) {
	$level['index'] = $index;
	$level['status'] = $level['status'] == 1 ? 'checked=""': '0';
    $tpl->assign($level, 'level');
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