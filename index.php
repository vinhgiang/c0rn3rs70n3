<?php

error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE & ~E_STRICT);

define('_ROOT',rtrim(dirname(__FILE__),'/').'/',true);
define('APPLICATION','',true);
define('_CORE',rtrim(dirname(__FILE__),'/').'/',true);

$root = explode("\\", rtrim(_CORE,"/"));
define('ROOT_FOLDER', $root[count($root) -1],true);

date_default_timezone_set('Asia/Ho_Chi_Minh');

include _ROOT.'bootstrap.php';

session_name($cfg["name"]);
session_start();

$controller = new Controller(true, true, false, true);
//$controller = new Controller(true,false,false,true);
$controller->lang = $cfg['lang'];
$controller->model = new Model;
$controller->model->setCache('data/cache/');
$controller->model->db->query("SET NAMES 'UTF8'");
$controller->load_ext();
$controller->load();