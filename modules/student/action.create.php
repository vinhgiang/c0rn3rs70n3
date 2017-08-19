<?php

if(!defined('_ROOT')) { exit('Access Denied'); }

$tpl->setfile(
    array('body'=>'student.create.tpl',)
);

if($_POST) {
    $en_name = clean_data($_POST['en_name']);
    $zh_name = clean_data($_POST['zh_name']);
    $school = clean_data($_POST['school']);
    $en_address_1 = clean_data($_POST['en_address_1']);
    $en_address_2 = clean_data($_POST['en_address_2']);
    $en_address_3 = clean_data($_POST['en_address_3']);
    $zh_address_1 = clean_data($_POST['zh_address_1']);
    $zh_address_2 = clean_data($_POST['zh_address_2']);
    $zh_address_3 = clean_data($_POST['zh_address_3']);
    $mobile = clean_data($_POST['mobile']);
    $home_tel = clean_data($_POST['home_tel']);
    $parent_tel = clean_data($_POST['parent_tel']);
    $reference = clean_data($_POST['reference']);
    $remarks = clean_data($_POST['remarks']);

    $response = array(
        'code' => 0
    );

    if($en_name == '' || $zh_name == '') {
        $response['msg'] = 'Please input student\'s name ';
        responseJson($response);
    }

    $schoolInfo = $oHelper->get_school("school_code = '$school'", 0, 1);
    if( count($schoolInfo) <= 0 ) {
        $response['msg'] = "School '$school' is not exist.";
        responseJson($response);
    }

    $studentCodePrefix = $en_name[0];
    $studentCode = $oHelper->generate_student_code($studentCodePrefix);

    $arrData = array(
        'student_code' => $studentCode,
        'en_name' => $en_name,
        'zh_name' => $zh_name,
        'school' => $school,
        'en_address_1' => $en_address_1,
        'en_address_2' => $en_address_2,
        'en_address_3' => $en_address_3,
        'zh_address_1' => $zh_address_1,
        'zh_address_2' => $zh_address_2,
        'zh_address_3' => $zh_address_3,
        'mobile' => $mobile,
        'home_tel' => $home_tel,
        'parent_tel' => $parent_tel,
        'referrer' => $reference,
        'remarks' => $remarks,
        'creator' => '0',
        'datetime' => date('Y-m-d H:i:s')
    );

    $studentId = $oHelper->insert_table('student', $arrData);

    if($studentId > 0) {
        $response['code'] = 1;
        responseJson($response);
    } else {
        $response['msg'] = 'Error code: 1x001';
    }


} else {

    $schools = $oHelper->get_school(1, 0, 0, 'zh_name');
    foreach ($schools as $school) {
        $school['active'] = $school['school_code'] == $studentSchoolCode ? 'selected' : '';
        $tpl->assign($school, 'zh_school');
    }

    $schools = $oHelper->get_school(1, 0, 0, 'en_name');
    foreach ($schools as $school) {
        $school['active'] = $school['school_code'] == $studentSchoolCode ? 'selected' : '';
        $tpl->assign($school, 'en_school');
    }
}