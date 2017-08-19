<?php

if(!defined('_ROOT')) { exit('Access Denied');}

//$tpl->reset();
$tpl->setfile(array('body'=>'site.plan.tpl',));
$uploadFile = '';

if($_POST) {

	$catId = $_POST['catId'];	
	$contentId = intval($_POST['contentId']);
	if($contentId > 0) {
		$arrayLang = array('vn' , 'en');
		foreach ($arrayLang as $keyLang => $ln) {
			if($catId == 'addTitle') {
				$oClass->updateQuery('content_ln' , " intro='".$_POST['intro'][$ln]."' " , " and id='".$contentId."' and ln='".$ln."' ");
			} else {
				$updateImage = '';
				$uploadFile = upload('ln_image',_UPLOAD,time().'-',array('.jpg' , '.png' , '.jpeg' , '.gif'),$ln);
				if(!is_array($uploadFile) && !empty($uploadFile) ) {					
					$updateImage = " ln_image='".$uploadFile."' ,";						
				}
				$oClass->updateQuery('content_ln' , $updateImage."  intro='".$_POST['intro'][$ln]."' " , " and id='".$contentId."' and ln='".$ln."' ");
			}	
		}
	}
}

$orderBy = ' c.order_id asc , c.id desc';
$objCategory = $oCategory->view(6 , 0 , NULL , $orderBy  , 0 ,0);
while ($arrCat = $objCategory->fetch()) {
	$arrCat['name'] = strtolower($arrCat['name']);
	$tpl->assign($arrCat , 'listSitePlan');	

	$objProduct = $oContent->viewSite(6 , " c.catid ='".$arrCat['id']."' ", 0  , 0 ,$orderBy );	
	while ($arrContent = $objProduct->fetch()) {
		$objContent = $oContent->getDetail($arrContent['id'] , " and ln.ln <>'".$arrContent['ln']."' " );
		if($arrCat['name'] == 'title-dots') {
			$arrContent['htmlTemplate'] = 	'<p data-id="'.$arrContent['id'].'" class="dot js-site-content '.$arrContent['name'].'" data-title-vn="'.$arrContent['intro'].'" data-title-en="'.$objContent['intro'].'" data-title="'.$arrContent['intro'].'">
												<span>'.$arrContent['content'].'</span>
												<img class="dot-bg" src="'._UPLOAD.$arrContent['icon'].'" alt="" />
											</p>';
		}else {			
			$arrContent['htmlTemplate'] = 	'<p data-id="'.$arrContent['id'].'" class="dot js-site-image '.$arrContent['name'].'" data-image-vn="'._UPLOAD.$arrContent['ln_image'].'" data-image-en="'._UPLOAD.$objContent['ln_image'].'" data-large="'._UPLOAD.$arrContent['ln_image'].'" data-title-vn="'.$arrContent['intro'].'" data-title-en="'.$objContent['intro'].'">
												<span>'.$arrContent['content'].'</span>
												<img class="dot-bg" src="'._UPLOAD.$arrContent['icon'].'" alt="" />
												<img class="rad-top" src="'._UPLOAD.$arrContent['icon'].'" alt="" />
												<img class="rad-bottom" src="'._UPLOAD.$arrContent['icon'].'" alt="" />
											</p>';
		}
		$tpl->assign($arrContent , 'listSitePlan.sub');
	}
}

$response['msg'] = is_array($uploadFile) ? $uploadFile['msg'] : '';
$tpl->assign($response);
?>