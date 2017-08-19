<?php
if(!defined('_ROOT')) { exit('Access Denied');}

$lang_active = array();
$lang_active[$system->lang] = 'class="active"';
$tpl->merge($lang_active,'lang_active');

$menu_active[$system->module] = 'active';
$tpl->merge($menu_active,'menuActive');

$action_active[$system->module . '-' . $system->action] = 'active';
$tpl->merge($action_active,'actionActive');

$actionName = $system->action != '' && $system->action != 'view' ? '_' . $system->action : '';
$sub_menu_active[$system->module_name . $actionName] = 'active';
$tpl->merge($sub_menu_active, 'sub_menu_active');

global $cfg_arr;
$tpl->assign($cfg_arr);

$response['web_title_share'] = '';
$response['web_desc_share']  = '';
$response['web_url_share']   = $system->domain.$system->project.$system->root_dir;
$response['web_image_share'] = $system->domain.$system->project.'images/share.jpg';