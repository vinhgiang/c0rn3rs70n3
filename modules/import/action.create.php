<?php

if(!defined('_ROOT')) { exit('Access Denied'); }

$tpl->setfile(
    array('body'=>'school.create.tpl',)
);

if($_POST) {
    $schoolCode = clean_data($_POST['school_code']);
    $en_name = clean_data($_POST['en_name']);
    $zh_name = clean_data($_POST['zh_name']);

    $response = array(
        'code' => 0
    );

    if( $schoolCode == '' ) {
        $response['msg'] = "Please input school's code";
        responseJson($response);
    }
    if($en_name == '' || $zh_name == '') {
        $response['msg'] = "Please input student's name";
        responseJson($response);
    }

    $schoolInfo = $oHelper->get_school("school_code = '$schoolCode'", 0, 1);
    if( count($schoolInfo) > 0 ) {
        $response['msg'] = "School with '$schoolCode' code already exists.";
        responseJson($response);
    }

    $arrData = array(
        'school_code' => $schoolCode,
        'en_name' => $en_name,
        'zh_name' => $zh_name,
        'datetime' => date('Y-m-d H:i:s')
    );

    $schoolId = $oHelper->insert_table('school', $arrData);

    if($schoolId > 0) {
        $response['code'] = 1;
        responseJson($response);
    } else {
        $response['msg'] = 'Error code: 1x001';
    }


}