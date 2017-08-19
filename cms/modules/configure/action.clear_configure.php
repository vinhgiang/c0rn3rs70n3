<?php

if(!defined('_ROOT')) {
	exit('Access Denied');
}
extract($_GET);
$oClass->clear_configure();
clear_sql_cache();
$hook->redirect('?mod='.$system->module);
?>