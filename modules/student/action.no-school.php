<?php

if(!defined('_ROOT')) { exit('Access Denied'); }

$tpl->setfile(
    array('body'=>'student.tpl',)
);

$keyword = clean_data($_GET['keyword']);
$cond = "creator = -1";
if ($keyword != '') {
    $cond .= " AND (s.student_code = '$keyword' OR s.student_old_code = '$keyword' OR s.en_name = '$keyword' OR s.zh_name = '$keyword'
            OR s.mobile = '$keyword' OR s.home_tel = '$keyword' OR s.parent_tel = '$keyword' OR s.remarks LIKE '%$keyword%')";
}

$record = 20;
$url = $system->uri;

$page = intval($_GET['page']) <= 0 ? 1 : intval($_GET['page']);
$start = ($page - 1) * $record;

$totalRecord = $oHelper->count_table('student', $cond);
$totalPage = @ceil($totalRecord / $record);

$students = $oHelper->select_table('student', $cond, $start, $record);
$index = $page * $record - $record + 1;
while ($student = $students->fetch()) {
    $student['index'] = $index;
    $tpl->assign($student, 'student');
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
