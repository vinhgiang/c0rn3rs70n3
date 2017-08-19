<?php

if(!defined('_ROOT')) { exit('Access Denied'); }

$tpl->setfile(
    array('body'=>'home.tpl',)
);


require_once(_ROOT . 'libraries/excel/excel_reader2.php');

//$target_file = 'data/upload/student-mapped.xls';

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

    $id = $arrData[$i][$headerArr['id']];
    $schoolCode = $arrData[$i][$headerArr['mapped']];

    $data = array(
        'school' => $schoolCode,
    );

    $schoolInfo = $oHelper->get_school('school_code = "' . $schoolCode . '"');

    $data['creator'] = 'system';

    if(count($schoolInfo) == 1) {
        $data['school'] = $schoolCode;
    } else {
        $data['school'] = $schoolCode;
        $reject[] = $data;
        $data['creator'] = '-1';
//        continue;
    }

    $studentId = $oClass->update_table('student', $data, 'id = ' . $id);
    if($studentId > 0) {
        $index++;
    }
}

print_r('total: ' . $index);
print_r("\n");
print_r($reject);
exit;