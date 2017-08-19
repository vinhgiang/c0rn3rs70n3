<?php

if(!defined('_ROOT')) {
 exit('Access Denied');
}
$cfg = array();
//databas configure
$cfg['driver'] 	= 'mysql';
$cfg['server'] 	= 'localhost';
$cfg['port'] 		= '3306';
$cfg['usr'] 		= 'root';
$cfg['psw'] 		= '';
$cfg['name'] 		= 'the_new_cornerstone';
$cfg['prefix'] 		= 'cor__';

//
$cfg['lang'] = 'en';
$cfg['error_report'] = E_ALL & ~E_WARNING & ~E_NOTICE;
$cfg['error_display'] = false;
$cfg['server_var'] = 'REQUEST_URI';
$cfg['cache'] = false;
$cfg['gzip'] = true;

//
$core_ext[] = 'session';

$cfg_arr = array();
$cfg_arr['charset'] = 'UTF-8';
$cfg_arr['urlShareFB'] = 'https://www.facebook.com/sharer/sharer.php?u=';
$cfg_arr['urlSharePinterest'] = 'http://www.pinterest.com/pin/create/link/?url=';
$cfg_arr['urlShareTwitter'] = 'https://www.facebook.com/sharer/sharer.php?u=';