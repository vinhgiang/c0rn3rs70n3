<?php

if(!defined('_ROOT') ) {
	exit('Access Denied');
}
$tpl->setfile(array(
	'body'=>'checker.tpl')
);

if($_POST) {
	$code = strtoupper(addslashes(strip_tags(trim($_POST['code']))));
	$codePrefix = $code[0].$code[1];

	if($code == '') {
		$msg = 'Please input your code';
	} else if(strlen($code) != 13 || ($codePrefix != 'OG' && $codePrefix != 'ON')) {
		$msg = 'Your code is not valid';
	}

	if($msg != '') {
		$tpl->assign(array(
			'msg' => $msg)
		);
	} else {
		$encoded = md5($code);

		$codeInfo = $oClass->getCode($encoded);
		$codeInfo = $codeInfo->fetch();

		if($codeInfo['code'] == '') {
			$tpl->assign(array(
				'msg' => 'Your code is not exist.')
			);
		} else {
			$codeInfo['code'] = $code;
			$codeInfo['type'] = strtoupper($codeInfo['type']);
			$codeInfo['used'] = $codeInfo['used'] == 0 ? 'Available' :'NA';

			if($codeInfo['used'] == 'NA') {
				$cond = "code = '$code'";
				$userInfo = $oClass->get_game($cond, 0, 1)->fetch();
				$userInfo = formatOutputData($userInfo);
				$tpl->assign($userInfo);

				$tpl->box('usedCodeInfo');
			}

			$tpl->box('codeInfo');
			$tpl->assign($codeInfo);
		}
	}
}
