<?php

if(!defined('_ROOT')) {
    exit('Access Denied');
}

$tpl->setfile(array(
    'body'=>'checker.import.tpl',
));

if ($_POST) {
    $msg = '';
    if ($_FILES['file']['name'] == '') {
        $msg = "Please enter file Excel";
    } else {
        $fileType = pathinfo( $_FILES['file']['name'], PATHINFO_EXTENSION );

        // Check file size
        if ( $_FILES['file']['size'] > 2000000 ) {
            $msg = 'Sorry, your file is too large.';
        }
        // Allow certain file formats
        if ( $fileType != 'xls' && $fileType != 'xlsx' && $fileType != 'csv') {
            $msg = 'Sorry, only xls, xlsx files are allowed.';
        }
    }

    if($msg == '') {
        require_once (_ROOT.'libraries/excel/excel_reader2.php');

        $data = new Spreadsheet_Excel_Reader($_FILES['file']['tmp_name']);
        $arrData = $data->dumptoarray(0);

        if( ! empty($arrData) && is_array($arrData)) {
            $titleColumn = $arrData[1][1];
            $typeColumn = $arrData[1][2];

            if($titleColumn != 'code' || $typeColumn != 'type') {
                $msg = 'Your template is not valid.';
            }

            if($msg == '') {
                unset($arrData[1]);

                if( count($arrData) > 0) {
                    $exist = 0;
                    $imported = 0;

                    foreach($arrData as $val) {
                        $code = $val[1];
                        $encoded = md5($code);
                        $codeType = $val[2];

                        if( $code != '' && $codeType != '') {

                            $checkCode = $oClass->getCode($encoded)->fetch();
                            if($checkCode['code'] != '') {
	                            $exist++;

	                            $tpl->assign(array(
	                            	'code' => $code,
		                            'type' => $checkCode['type']
	                            ),'existCode');

                            } else {

                                $data = array (
                                    'code' => $encoded,
                                    'type' => $codeType,
                                );
                                $oClass->insert($data, 'code');

                                $imported++;
                            }
                        }
                    }

	                $msg =  'imported successfully';
	                $tpl->box('info');
                }
            }
        }
    }

    $tpl->assign(array(
        'msg' => $msg,
        'exist' => $exist,
        'imported' => $imported,
    ));
}