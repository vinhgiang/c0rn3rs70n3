<?php

if(!defined('_ROOT')) { exit('Access Denied'); }

$tpl->setfile(
    array('body'=>'student.detail.tpl',)
);

$studentId = clean_data( $system->params[2] );

if( isset( $studentId ) ) {
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

        $schoolInfo = $oHelper->get_school("school_code = '$school'", 0, 1);
        if( count($schoolInfo) <= 0 ) {
            $response['msg'] = "School '$school' is not exist.";
            responseJson($response);
        }

        $arrData = array();

        if(array_key_exists('en_name', $_POST)) $arrData['en_name'] = $en_name;

        if(array_key_exists('zh_name', $_POST)) $arrData['zh_name'] = $zh_name;

        if(array_key_exists('school', $_POST)) $arrData['school'] = $school;

        if(array_key_exists('en_address_1', $_POST)) $arrData['en_address_1'] = $en_address_1;

        if(array_key_exists('en_address_2', $_POST)) $arrData['en_address_2'] = $en_address_2;

        if(array_key_exists('en_address_3', $_POST)) $arrData['en_address_3'] = $en_address_3;

        if(array_key_exists('zh_address_1', $_POST)) $arrData['zh_address_1'] = $zh_address_1;

        if(array_key_exists('zh_address_2', $_POST)) $arrData['zh_address_2'] = $zh_address_2;

        if(array_key_exists('zh_address_3', $_POST)) $arrData['zh_address_3'] = $zh_address_3;

        if(array_key_exists('mobile', $_POST)) $arrData['mobile'] = $mobile;

        if(array_key_exists('home_tel', $_POST)) $arrData['home_tel'] = $home_tel;

        if(array_key_exists('parent_tel', $_POST)) $arrData['parent_tel'] = $parent_tel;

        if(array_key_exists('reference', $_POST)) $arrData['referrer'] = $reference;

        if(array_key_exists('remarks', $_POST)) $arrData['remarks'] = $remarks;

        $arrData['last_modify'] = date('Y-m-d H:i:s');
        $arrData['creator'] = 1;

        $updated = $oHelper->update_table('student', $arrData, "id = $studentId");
        if($updated > 0) {
            $response['code'] = 1;
            responseJson($response);
        } else {
            $response['msg'] = 'Error code: 1x003';
        }


    } else {

    	if ( $studentId > 0 ) {
		    $studentDetail = $oHelper->select_table('student', " id = $studentId ", 0, 1)->fetch();
	    } else {
		    $studentDetail = $oHelper->select_table('student', " student_code = '$studentId' ", 0, 1)->fetch();
	    }

	    $studentCode = $studentDetail['student_code'];
        $studentSchoolCode = $studentDetail['school'];
        $creatorName = $studentDetail['creator'] == 0 || $studentDetail['creator'] == '' ? 'system' : '';

        $studentDetail['creator_name'] = $creatorName;

        $tpl->merge($studentDetail, 'student');

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

        // List of student who was referenced by
	    $cond = "s.referrer = '$studentCode'";

	    $referencedStudents = $oHelper->get_student($cond);
	    $index = $page * $record - $record + 1;
	    while ($student = $referencedStudents->fetch()) {
		    $student['index'] = $index;
		    $tpl->assign($student, 'students');
		    $index++;
	    }
    }
}