<?php

if (!defined('_ROOT')) {
    exit('Access Denied');
}

$oMaster = new MasterModel;
$configure_mod = $oMaster->configure_mod();

$cache_dao = _CACHE . APPLICATION . 'dao.php';
if (!file_exists($cache_dao)) {
    $file_str = '<?php' . "\n";
    $dir = dir(_ROOT . APPLICATION . "/dao/");
    while ($file = $dir->read()) {
        if (substr($file, -4) == '.php') {
            $class = ucfirst(substr($file, 0, -4));
            $class_dao = $class . 'DAO';
            require _ROOT . APPLICATION . 'dao/' . $file;
            $file_str .= 'require _ROOT.APPLICATION.\'' . "dao/" . $file . "';\n";
            if (class_exists($class_dao)) {
                ${'o' . $class} = new $class_dao($configure_mod);
                ${'o' . $class}->setCache(_CACHE);
                $file_str .= '$o' . $class . ' = new ' . $class_dao . "(\$configure_mod);\n";
                $file_str .= '$o' . $class . '->setCache(_CACHE);' . "\n";
            }
        }
    }
    $file_str .= '?>';
    $fp = @fopen($cache_dao, 'w');
    if ($fp) {
        fwrite($fp, $file_str);
        fclose($fp);
    }
} else {
    include $cache_dao;
}

$result = $oConfigure->view();
while ($rs = $result->fetch()) {
    $cfg[$rs['code']] = addslashes($rs['value']);
}
$result->cache();


$request = $_GET;

$cfg['template'] = 'Default';
//if(!$cfg['template'] || !file_exists('template/'.$cfg['template'].'/master.tpl')) $cfg['template'] = 'Default';
if (!$cfg['template'] || !file_exists('template/' . $cfg['template'] . '/master.tpl')) $cfg['template'] = 'Default';
$tpl = new View('template/' . $cfg['template'], $languages);
$tpl->folder = 'img|format|media|css|images|flash|js|upload|assets';
$tpl->gzip = $cfg['gzip'];
$tpl->cache = _CACHE;

//Load main template
$tpl->setfile(array(
    'main' => 'master.tpl',
));

$tpl->assign(array(
    'root_dir' => $system->root_dir,
    '_UPLOAD' => _UPLOAD,
));

// Facebook login
$fb = new Facebook\Facebook([
    'app_id' => $cfg['facebook_appid'],
    'app_secret' => $cfg['facebook_appsecret'],
    'default_graph_version' => 'v2.2',
]);
$base_url = sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],
    $_SERVER['REQUEST_URI']
);
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email'];

$loginUrl = $helper->getLoginUrl($base_url . '/facebook-callback', $permissions);

$facebook = array(
    'login_url' => $loginUrl,
);

$userInfo = $_SESSION['userInfo'];

if ($userInfo['id'] > 0) {
    $tpl->box('loggedIn');
} else {
    $tpl->box('login');
}

$social = array(
    'img_url' => $system->domain . $system->project . 'template/Default/images/facebook-share.jpg',
);

/**
 * Get module action
 * */
foreach ($system->modules['data'] as $module) {
    $currentModule = $module[$system->lang];
    $moduleName = $currentModule['module'];
    $actions = $currentModule['module_actions'];

    $tpl->merge($actions, $moduleName . '_action');
}

$tpl->merge($social, 'social');
$tpl->merge((array)$system, 'system');
$tpl->merge($system->modules['url'][$system->module], 'switch_url');
$tpl->merge($system->modules['data'][$system->module][$system->lang], 'pages');
$tpl->merge($system->modules[$system->lang]['module'], 'module');
$tpl->merge($system->modules[$system->lang]['name'], 'module_name');
$tpl->merge($cfg, 'cfg');
$tpl->merge($languages, 'lang');
$tpl->merge($facebook, 'facebook');
$tpl->merge($userInfo, 'userInfo');