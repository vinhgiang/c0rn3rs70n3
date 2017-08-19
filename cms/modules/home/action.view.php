<?php

if(!defined('_ROOT')) {
	exit('Access Denied');
}

$tpl->setfile(array('body'=>'home.tpl'));

$breadcrumb->reset();
$breadcrumb->assign("",$cfg['client']);
$breadcrumb->assign('?mod=home','Dashboard');
$request['breadcrumb'] = $breadcrumb->parse();
$tpl->assign($request);