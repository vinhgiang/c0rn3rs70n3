<?php

if(!defined('_ROOT')) { exit('Access Denied'); }

$tpl->setfile(
    array('body'=>'school.detail.tpl',)
);

$schoolId = intval( $system->params[2] );

if( $schoolId > 0 ) {
    if($_POST) {
        $en_name = clean_data($_POST['en_name']);
        $zh_name = clean_data($_POST['zh_name']);

        $response = array(
            'code' => 0
        );

        if( $en_name == '' || $zh_name == '' ) {
            $response['msg'] = "Please input student's name";
            responseJson($response);
        }

        $arrData = array(
            'en_name' => $en_name,
            'zh_name' => $zh_name
        );

        $updated = $oHelper->update_table('school', $arrData, "id = $schoolId");
        if($updated > 0) {
            $response['code'] = 1;
            responseJson($response);
        } else {
            $response['msg'] = 'Error code: 1x003';
        }

    } else {
        $schoolDetail = $oHelper->select_table('school', " id = $schoolId ", 0, 1)->fetch();

        $tpl->merge($schoolDetail, 'school');
    }
}