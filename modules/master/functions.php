<?php

if(!defined('_ROOT')) {
 exit('Access Denied');
}


function ajax_permission(){
	$headers = getallheaders();
	if((!$headers['X-Requested-With']&&!$headers['x-requested-with']) || ($headers['X-Requested-With']&&$headers['X-Requested-With']!='XMLHttpRequest') // Firefox
		|| ($headers['x-requested-with']&&$headers['x-requested-with']!='XMLHttpRequest') // IE
	) return false;
	return true;
}


function cookie($name,$value=NULL,$time=NULL,$path=NULL,$domain=NULL){
	setcookie($name,$value,$time?$time:time()+24*3600,'/~phpbasic/v02/','112.213.88.177');
}

function return_link($url,$ssl = false){
	return 'http'.($ssl?'s':'').'://'.str_replace(array('http://','https://'),array('',''),$url);
}

function str_to_url($string = NULL){
	if(!$string) return NULL;
	$string = str_replace(array(' ','_'),array('-','-'),$string);
	return urlencode($string);
}
function format_div($string = NULL,$p = 0,$url = '%d',$params = NULL){
	if(!$string) return $string;
	$string = stripslashes($string);
	$tmp = explode('<!-- pagebreak -->',$string);
	$format = array('num'=>count($tmp));
	$format['divcontent'] = '';
	for($i=1;$i<=$format['num'];$i++){
		if($i==1) $format['divcontent'] .= ' <a href="'.$url.'">'.$i.'</a> ';
		else $format['divcontent'] .= ' <a href="'.rtrim($url,'/').'/?p='.($i-1).'">'.$i.'</a> ';
	}
	if($p>= 0 && $p < $format['num']) $format['content'] =  $tmp[$p];
	else $format['content'] =  $tmp[0];
	return $format;
}
function getFlickrPhoto(){
	$cache_time = 2;
	$file = _CACHE."flickrphoto.txt";
	if(!file_exists($file) || filemtime($file) < time() - $cache_time * 3600)
	{
		$params = array(
            'api_key'	=> 'a80d3a3fd423931a672c4b4c51c78f36',
            'method'	=> 'flickr.people.getPublicPhotos',
            'user_id'	=> '47509711@N00',
            'page'		=>	1,
            'per_page'	=>  8,
            'format'	=> 'php_serial'
		);
		$encoded_params = array();
		foreach ($params as $k => $v){
			$encoded_params[] = urlencode($k).'='.urlencode($v);
		}
		$url = "http://api.flickr.com/services/rest/?".implode('&', $encoded_params);
		$rsp = file_get_contents($url);		
		if(false !== ($f = @fopen($file, 'w'))) 
		{	fwrite($f, $rsp); 
			fclose($f); 
		}		
	}
	else
	{
		$rsp = file_get_contents($file);	
	}
	$rsp_obj = unserialize($rsp);
	if ($rsp_obj['stat'] == 'ok'){
		return $rsp_obj["photos"]["photo"];
		/*foreach($rsp_obj["photos"]["photo"] as $val)
		{
			$photo_title = $val['title']['_content'];
			echo "Images: http://farm7.static.flickr.com/".$val["server"]."/".$val["id"]."_".$val["secret"]."_s.jpg";
			echo "<br />";
		}*/		
	}
	return "";
}
function getRssTwitter()
{
	$cache_time = 2;
	$file = _CACHE."rsstwitter.txt";
	$rsp  = "";
	if(!file_exists($file) || filemtime($file) < time() - $cache_time * 3600)
	{
		$url = "http://api.twitter.com/1/statuses/user_timeline.rss?screen_name=sofreshdigital&count=2";
		$rsp = file_get_contents($url);
		if(false !== ($f = @fopen($file, 'w'))) 
		{	
			fwrite($f, $rsp); 
			fclose($f); 
		}
	}	
	if ($rsp!=""){
		$rss = simplexml_load_file($file);	
		foreach($rss->channel->item as $val ) {
			$list[] = array(
				"title"=>$val->title,
				"link"=>$val->link,
			);
		}
	}
	
	return $list;
}

function freshcookie($itemid, $cookiename, $remove=false) {
	$isupdate = 1;
	if(empty($_COOKIE)) { 
		$isupdate = 1;
	} else {
		$old = empty($_COOKIE[$cookiename])?0:trim($_COOKIE[$cookiename]);
		$old = trim($old,"_");
		$itemidarr = explode('_', $old);
		if (!$remove){			
			if(in_array($itemid, $itemidarr)) {
				$isupdate = 0;
			} else {
				$itemidarr[] = trim($itemid);
				setcookie($cookiename, implode('_', $itemidarr),time()+3600*60*60);
			}
		}
		else{			
			foreach($itemidarr as $key=>$value){
				if ($itemid==$value){
					unset($itemidarr[$key]);
					setcookie($cookiename, implode('_', $itemidarr),time()+3600*60*60);	
					break;
				}
					
			}			
		}
	}
	return $isupdate;
}