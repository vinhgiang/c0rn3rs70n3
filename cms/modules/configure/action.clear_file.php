<?php
if(!defined('_ROOT')) {
	exit('Access Denied');
}
extract($_GET);
remove_dir(_UPLOAD);
remove_dir(_CACHE);
$hook->redirect('?mod='.$system->module);
?>