<?php

if(!defined('_ROOT')) {
	exit('Access Denied');
}
extract($_GET);
$oClass->clear_data();
clear_sql_cache();
$hook->redirect('?mod='.$system->module);
?>