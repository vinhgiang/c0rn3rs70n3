<?php

if(!defined('_ROOT')) { exit('Access Denied'); }

$tpl->setfile(
    array('body'=>'home.tpl',)
);


require_once(_ROOT . 'libraries/excel/excel_reader2.php');

$target_file = 'data/upload/course.xls';

$columns = array(
    'course_code',
    'open_date',
    'course_month',
    'weekday',
    'start_time',
    'lesson_hours',
    'no_of_lesson',
    'subject',
    'level',
    'no_of_student',
    'max_students',
    'fee',
    'teacher',
    'creator',
    'remarks',
);

$data = new Spreadsheet_Excel_Reader($target_file, true,"UTF-8");
$arrData = $data->dumptoarray(0);
$totalItems = count($arrData);

$headerArr = array_flip($arrData[1]);
$headerArr = array_change_key_case($headerArr, CASE_LOWER);

$newProduct = 0;
$updatedProduct = 0;
$duplicated = array();
$index = 0;
for ($i = 2; $i <= $totalItems; $i++) {

    $data = array();

    if (count($columns) > 0) {
        foreach ($columns as $column) {
            $column = strtolower($column);
            $data[$column] = $arrData[$i][$headerArr[$column]];
        }

        $data['datetime'] = date('Y-m-d h:i:s');

        $schoolId = $oClass->insert_table('course', $data);
        if($schoolId > 0) {
            $index++;
        }
    }
}

print_r('total: ' . $index); exit;