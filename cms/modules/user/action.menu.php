<?php

if(!defined('_ROOT')) {
	exit('Access Denied');
}

$data = $_SESSION['admin_login']['data']?unserialize($_SESSION['admin_login']['data']):array();
$data['menu'][intval($_POST['menuid'])] = intval($_POST['status']);
$_SESSION['admin_login']['data'] = serialize($data);
$oClass->update($login_user['id'],array('data'=>$_SESSION['admin_login']['data']));


exit();


?>