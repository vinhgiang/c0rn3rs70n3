<?php

if(!defined('_ROOT')) {
	exit('Access Denied');
}

$id = intval($_GET["id"]);

if ($id > 0) {
	$result_data = $oClass->get_detail($id);
	$result_data = formatOutputData($result_data);
	if($result_data['id'] > 0) {
		$arrPatches = explode(',', $result_data['patches']);
		$tpl->merge($arrPatches, 'patches');
		$tpl->assign($result_data);

		$data = array(
	        'website' => $system->domain.$system->project,
	        'img' => 'data/upload/game/' . $result_data['bag_img'],
	        'name' => $result_data['name'],
	        'header_letter' => $result_data['header_letter'],
	        'body_letter' => $result_data['body_letter'],
	        'footer_letter' => $result_data['body_letter'],
	    );

	    $email = new Email($result_data['email'], 'Dugro Backpack Shipping','redeem-shipping-backpack.tpl');
	    $email->connect($cfg);
	    $email->tpl->assign($data);
	    $email->Send();

		$oClass->send($id);
	}
}

// refresh
$query_string = $_SERVER['QUERY_STRING'];
parse_str($query_string,$result);
unset($result['act'],$result['id'],$result['c']);
$hook->redirect('?'.http_build_query($result,'','&'));