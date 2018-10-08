<?php

if(!defined('_ROOT')) { exit('Access Denied'); }

$tpl->setfile(
    array('body'=>'level.detail.tpl',)
);

$levelId = clean_data( $system->params[2] );

if( isset( $levelId ) ) {
    if($_POST) {
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
			    'en_name' => $en_name,
			    'zh_name' => $zh_name,
			    'status' => $status,
			    'last_modify' => date('Y-m-d H:i:s')
		    );

		    $updated = $oHelper->update_table('level', $arrData, "id = $levelId");
		    if($updated > 0) {
			    $response['code'] = 1;
			    responseJson($response);
		    } else {
			    $response['msg'] = 'Error code: 1x003';
		    }
	    }

	    responseJson($response);
    } else {

    	$levelDetail = $oHelper->select_table('level', " id = $levelId ", 0, 1)->fetch();
	    $levelDetail['status'] = $levelDetail['status'] == 1 ? 'checked=""': '0';
        $tpl->merge($levelDetail, 'level');
    }
}