<?php

if(!defined('_ROOT')) { exit('Access Denied');}

//$tpl->reset();
$tpl->setfile(array('body'=>'unit.layout.tpl',));
$uploadFile = '';

if($_POST) {

	$contentId = intval($_POST['contentId']);
	if($contentId > 0) {
		$arrayLang = array('vn' , 'en');
		foreach ($arrayLang as $keyLang => $ln) {
			$uploadFile = upload('ln_image',_UPLOAD,time().'-',array('.jpg' , '.png' , '.jpeg' , '.gif'),$ln);
			if(!is_array($uploadFile) && !empty($uploadFile) ) {
				$oClass->updateQuery('content_ln' , " ln_image='".$uploadFile."' " , " and id='".$contentId."' and ln='".$ln."' ");
			}

			$uploadFileMobile = upload('ln_icon',_UPLOAD,time().'-',array('.jpg' , '.png' , '.jpeg' , '.gif'),$ln);
			if(!is_array($uploadFileMobile) && !empty($uploadFileMobile) ) {
				$oClass->updateQuery('content_ln' , " ln_icon='".$uploadFileMobile."' " , " and id='".$contentId."' and ln='".$ln."' ");
			}

		}
	}
}

$orderBy = ' c.order_id asc , c.id desc';
$objCategory = $oCategory->view(7 , 0 , NULL , $orderBy  , 0 ,0  );
while ($arrCat = $objCategory->fetch()) {
	$arrCat['name'] = strtolower($arrCat['name']);
	$tpl->assign($arrCat , 'listCategory');	

	$objProduct = $oContent->viewSite(7 , " c.catid ='".$arrCat['id']."' ", 0  , 0 ,$orderBy );	
	while ($arrContent = $objProduct->fetch()) {
		$arrContent['name'] = strtolower($arrContent['name']);

		$objContent = $oContent->getDetail($arrContent['id'] , " and ln.ln <>'".$arrContent['ln']."' " );
		$arrContent['imageOther'] = $objContent['ln_image'];
		$arrContent['imageOtherMobile'] = $objContent['ln_icon'];
		$tpl->assign($arrContent , 'listCategory.sub');
	}
}

$response['msg'] = is_array($uploadFile) ? $uploadFile['msg'] : '';
$tpl->assign($response);
?>