<?php

if(!defined('_ROOT')) {
 exit('Access Denied');
}

$cfg = array();

//$cfg['template'] = 'basic';
include_once _ROOT . 'libraries/smtp/class.phpmailer.php';
require_once _ROOT . 'libraries/common/email.php';
require_once _ROOT . 'libraries/common/Pages.php';
require_once _ROOT . 'libraries/Facebook/autoload.php';
require_once _ROOT . 'libraries/mobile-detect/Mobile_Detect.php';