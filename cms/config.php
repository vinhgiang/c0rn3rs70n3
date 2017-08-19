<?php

if(!defined('_ROOT')) {
	exit('Access Denied');
}

//$cfg['lang'] = 'en';//if you want to run this application in 1 language ( no switch languages)
$cfg['template'] = 'Default';
$cfg['root_admin'] = true;
$cfg['client'] = "Hiruscar CMS";
$cfg['sef'] = true;

// config includes files for application
include _ROOT.'libraries/php4/common.php';
include _ROOT.'libraries/common/breadcrumb.php';
include _ROOT.'libraries/common/image.php';
include _ROOT.'libraries/common/page.php';
include _ROOT.'libraries/smtp/class.phpmailer.php';
include _ROOT.'libraries/common/email.php';
require_once _ROOT.'libraries/common/Pages.php';

$i = -1;

$i++;
$MenuName[$i]["name"] = 'Game';
$MenuName[$i]["class"] = "game";
$MenuLink[$i][] = array('name'=>'Total submission', 'link'=>'?mod=game');
$MenuLink[$i][] = array('name'=>'Shared Submission', 'link'=>'?mod=game&act=shared');
$MenuLink[$i][] = array('name'=>'New Submission', 'link'=>'?mod=game&act=new');
$MenuLink[$i][] = array('name'=>'Private Submission', 'link'=>'?mod=game&act=private');

/*$i++;
$MenuName[$i]["name"] = 'Content';
$MenuName[$i]["class"] = "content";*/
//$MenuLink[$i][] = array('name'=>'Home','link'=>'?mod=html&act=update&id=1');
//$MenuLink[$i][] = array('name'=>'How to redeem','link'=>'?mod=html&act=update&id=2');

////
$i++;
$MenuName[$i]["name"] = 'Administrators';
$MenuName[$i]["class"] = "admin";
$MenuLink[$i][] = array('name'=>'Manage Admin Users','link'=>'?mod=user','class'=>'users');
$MenuLink[$i][] = array('name'=>'Manage Admin Group','link'=>'?mod=group','class'=>'users');
$MenuLink[$i][] = array('name'=>'Languages','link'=>'?mod=language','class'=>'languages');
$MenuLink[$i][] = array('name'=>'Configure','link'=>'?mod=configure','class'=>'configure');
$MenuLink[$i][] = array('name'=>'Defined pages','link'=>'?mod=module','class'=>'pages');

$i++;
$MenuName[$i]["name"] = 'Tools';
$MenuName[$i]["class"] = "tools";
$MenuLink[$i][] = array('name'=>'Database backup','link'=>'?mod=tools&act=backup','class'=>'dbbackup');
$MenuLink[$i][] = array('name'=>'Server info','link'=>'?mod=tools&act=serverinfo','class'=>'serverinfo');
//$MenuLink[$i][] = array('name'=>'TinyMCE Editor','link'=>'?mod=tools&act=tinymce');
/*$MenuLink[$i][] = array('name'=>'Google Analytics','link'=>'?mod=analytic','class'=>'analytic');*/
