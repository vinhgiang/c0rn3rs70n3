<?php

if(!defined('_ROOT')) { exit('Access Denied'); }

$tpl->setfile(
    array('body'=>'tutor.create.tpl',)
);

if($_POST) {
    $name = clean_data($_POST['name']);

    $response = array(
        'code' => 0
    );

    if($name == '') {
        $response['msg'] = 'Please input tutor\'s name ';
        responseJson($response);
    }

    $arrData = array(
        'name' => $name,
	    'status' => 1
    );

    $tutorId = $oHelper->insert_table('teacher', $arrData);

    if($tutorId > 0) {
        $response['code'] = 1;
	    $response['redirect'] = $system->domain.$system->project.$system->modules['data']['tutor'][$this->lang]['module'];
        responseJson($response);
    } else {
        $response['msg'] = 'Error code: 1x001';
    }

	responseJson($response);
}