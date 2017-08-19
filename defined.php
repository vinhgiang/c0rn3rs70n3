<?php

if(!defined('_ROOT')) {
 exit('Access Denied');
}
define('_CACHE',_ROOT.'data/cache/');
define('_UPLOAD','data/upload/',true);
define("CURRENT_PAGE",'<a href="#" onclick="return false;">key_page</a>');
define("PREFIX_PAGE"," ");

// Testing
define("TESTING_MODE", true);