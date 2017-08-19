<?php

if(!defined('_ROOT')) {
 exit('Access Denied');
}

require_once _ROOT.'libraries/common/functions.php';
if ($_GET)
{
	foreach($_GET as $key=>$val){
		$_GET[$key] = getParam($_GET[$key]);		
	}
}
if ($_COOKIE)
{
	foreach($_COOKIE as $key=>$val){
		$_COOKIE[$key] = getParam($_COOKIE[$key]);	
	}
}

require _ROOT.'config.inc.php';
require _CORE.'core/caobox.php';
require _CORE.'core/hooks.php';
require _CORE.'core/controller.php';
require _CORE.'core/scripts/driver/'.$cfg['driver'].'.php';
require _CORE.'core/scripts/db.php';
require _CORE.'core/model.php';
require _CORE.'core/scripts/template.php';
require _CORE.'core/view.php';