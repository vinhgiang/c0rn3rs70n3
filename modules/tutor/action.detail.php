<?php

if(!defined('_ROOT')) { exit('Access Denied'); }

$tpl->setfile(
    array('body'=>'tutor.detail.tpl',)
);

$tutorId = clean_data( $system->params[2] );

if( isset( $tutorId ) ) {
    if($_POST) {
        $en_name = clean_data($_POST['en_name']);
        $status = isset($_POST['status']) ? 1 : 0;

        $response = array(
            'code' => 0
        );

        if ( $en_name == '' ) {
	        $response['msg'] = 'Error code: 0x061';
        }

	    if( $response['msg'] == '' ) {
		    $arrData = array(
			    'name' => $en_name,
			    'status' => $status,
			    'last_modify' => date('Y-m-d H:i:s')
		    );

		    $updated = $oHelper->update_table('teacher', $arrData, "id = $tutorId");
		    if($updated > 0) {
			    $response['code'] = 1;
			    responseJson($response);
		    } else {
			    $response['msg'] = 'Error code: 1x003';
		    }
	    }

	    responseJson($response);
    } else {

    	$teacherDetail = $oHelper->select_table('teacher', " id = $tutorId ", 0, 1)->fetch();
	    $teacherDetail['status'] = $teacherDetail['status'] == 1 ? 'checked=""': '0';
        $tpl->merge($teacherDetail, 'tutor');
    }
}