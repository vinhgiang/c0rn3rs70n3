<?php
if(!defined('_ROOT')) {
 exit('Access Denied');
}
$tpl->reset();

$width = '80';
$height = '50';
$characters = '4';


$oClass->font = rtrim(dirname(__FILE__),'/')."/font/Walkway Black RevOblique.ttf";
$captcha = $oClass->Captcha($width,$height,$characters, array(255,255,255));


?>