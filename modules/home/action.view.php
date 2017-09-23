<?php

if(!defined('_ROOT')) { exit('Access Denied'); }

$tpl->setfile(
    array('body'=>'home.tpl',)
);

$keyword = $_GET['keyword'];
if($keyword != '') {
    $hook->redirect($system->domain . $system->project . $system->modules['data']['student'][$this->lang]['module'] . '/?keyword=' . $keyword);
}