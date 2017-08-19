<?php 
if(!defined('_ROOT')) {
	exit('Access Denied');
}

$tpl->setfile(array(
	'body'=>'game_detail.tpl'
));

$id = intval($_GET["id"]);
$sendEdm = intval($_GET["send"]);

if ($id > 0) {
	$result_data = $oClass->get_detail($id);
	$result_data = formatOutputData($result_data);
    $result_data['child_name'] = htmlspecialchars_decode($result_data['child_name']);
    $result_data['body_letter'] = htmlspecialchars_decode($result_data['body_letter']);
    $result_data['header_letter'] = htmlspecialchars_decode($result_data['header_letter']);
    $result_data['footer_letter'] = htmlspecialchars_decode($result_data['footer_letter']);
	if($result_data['id'] > 0) {
		$arrPatches = explode(',', $result_data['patches']);
		$tpl->merge($arrPatches, 'patches');
		$tpl->assign($result_data);

		if($sendEdm == 1) {
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

            $tpl->box('msg');
        }

        $request['upload_folder'] = $result_data['type'] == 'redeem' ? 'redeem' : 'game';
	}
}

$breadcrumb->reset();
$menu = explode('.',$_SESSION['cms_menu']);
$breadcrumb->assign("",$MenuName[$menu[0]]);
$level = $MenuLink[$menu[0]][$menu[1]];
$breadcrumb->assign($level['link'],$level['name']);

$request['breadcrumb'] = $breadcrumb->parse();
$tpl->assign($request);