<?php

if(!defined('_ROOT')) { exit('Access Denied'); }

$tpl->setfile(
    array('body'=>'level.create.tpl',)
);

if($_POST) {
    $en_name = clean_data($_POST['en_name']);
    $zh_name = clean_data($_POST['zh_name']);

    $response = array(
        'code' => 0
    );

    if($en_name == '') {
        $response['msg'] = 'Please input level english name ';
        responseJson($response);
    }

    if($zh_name == '') {
        $response['msg'] = 'Please input level chinese name ';
        responseJson($response);
    }

    $arrData = array(
        'en_name' => $en_name,
        'zh_name' => $zh_name,
	    'status' => 1
    );

    $levelId = $oHelper->insert_table('level', $arrData);

    if($levelId > 0) {
        $response['code'] = 1;
	    $response['redirect'] = $system->domain.$system->project.$system->modules['data']['level'][$this->lang]['module'];
        responseJson($response);
    } else {
        $response['msg'] = 'Error code: 1x001';
    }

	responseJson($response);
}