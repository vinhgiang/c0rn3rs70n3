<?php

if(!defined('_ROOT')) { exit('Access Denied'); }

$tpl->setfile(
    array('body'=>'home.tpl',)
);


require_once(_ROOT . 'libraries/excel/excel_reader2.php');

//$target_file = 'data/upload/course-jun.xls';

$data = new Spreadsheet_Excel_Reader($target_file, true,"UTF-8");
$arrData = $data->dumptoarray(0);
$totalItems = count($arrData);

$headerArr = array_flip($arrData[1]);
$headerArr = array_change_key_case($headerArr, CASE_LOWER);

$newProduct = 0;
$updatedProduct = 0;
$duplicated = array();
$index = 0;
$reject = array();
for ($i = 2; $i <= $totalItems; $i++) {

    $data = array(
        'course_code' => $arrData[$i][$headerArr['course_code']],
        'open_date' => $arrData[$i][$headerArr['open_date']],
        'course_month' => $arrData[$i][$headerArr['course_month']],
        'weekday' => $arrData[$i][$headerArr['weekday']],
        'start_time' => $arrData[$i][$headerArr['start_time']],
        'lesson_hours' => $arrData[$i][$headerArr['lesson_hours']],
        'no_of_lesson' => $arrData[$i][$headerArr['no_of_lesson']],
        'subject' => $arrData[$i][$headerArr['subject']],
        'level' => $arrData[$i][$headerArr['level']],
        'no_of_student' => $arrData[$i][$headerArr['no_of_student']],
        'max_students' => $arrData[$i][$headerArr['max_students']],
        'teacher' => $arrData[$i][$headerArr['teacher']],
        'creator' => $arrData[$i][$headerArr['creator']],
        'remarks' => $arrData[$i][$headerArr['remarks']],
    );

    $level = $arrData[$i][$headerArr['level']];
    $levelInfo = $oHelper->get_level('en_name = "' . $level . '"');

    if(count($levelInfo) == 1) {
        $data['fee'] = $levelInfo[0]['default_fee'];
    } else {
        $data['fee'] = '-1';
    }

    $data['datetime'] = date('Y-m-d h:i:s');

    $studentId = $oClass->insert_table('course', $data);
    if($studentId > 0) {
        $index++;
    }
}

print_r('total: ' . $index);
print_r("\n");
print_r($reject);
exit;