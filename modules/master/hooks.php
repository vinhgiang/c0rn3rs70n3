<?php

if(!defined('_ROOT')) {
 exit('Access Denied');
}

function format($array = NULL){
	if(is_array($array)){
		foreach($array as $k=>$v){
			$v = stripslashes($v);
			$v = str_replace(array('../plugins','../'._UPLOAD),array('plugins',_UPLOAD),$v);
			
			$array[$k] = $v;
		}
		if(!$array['web_keyword']) unset($array['web_keyword']);
		if(!$array['web_desc']) unset($array['web_desc']);
	}
	return $array;
}