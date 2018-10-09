<?php

if(!defined('_ROOT')) { exit('Access Denied'); }

$tpl->setfile(
    array('body'=>'subject.detail.tpl',)
);

$subjectId = clean_data( $system->params[2] );

if( isset( $subjectId ) ) {
    if($_POST) {
        $subject_code = clean_data($_POST['subject_code']);
        $en_name = clean_data($_POST['en_name']);
        $zh_name = clean_data($_POST['zh_name']);
        $status = isset($_POST['status']) ? 1 : 0;

        $response = array(
            'code' => 0
        );

        if ( $en_name == '' ) {
	        $response['msg'] = 'Error code: 0x061';
        }

	    if( $response['msg'] == '' ) {
		    $arrData = array(
			    'subject_code' => $subject_code,
			    'en_name' => $en_name,
			    'zh_name' => $zh_name,
			    'status' => $status,
			    'last_modify' => date('Y-m-d H:i:s')
		    );

		    $updated = $oHelper->update_table('subject', $arrData, "id = $subjectId");
		    if($updated > 0) {
			    $response['code'] = 1;
			    responseJson($response);
		    } else {
			    $response['msg'] = 'Error code: 1x003';
		    }
	    }

	    responseJson($response);
    } else {

    	$subjectDetail = $oHelper->select_table('subject', " id = $subjectId ", 0, 1)->fetch();
	    $subjectDetail['status'] = $subjectDetail['status'] == 1 ? 'checked=""': '0';
        $tpl->merge($subjectDetail, 'subject');
    }
}