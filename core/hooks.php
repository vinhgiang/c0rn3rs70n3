<?php

if(!defined('_ROOT')) {
 exit('Access Denied');
}

class bHooker extends CaoBox{
	// do not change
	function hook($function,$arguments = array()){
		return call_user_func_array($function,$arguments);
	}
	
	function is_hook($function){
		if(function_exists($function)) return true;
		return false;
	}
	
	
	
	/* function can hook*/
	function web_header(){
		// define to hook function
		$args = func_get_args();if($this->is_hook(__FUNCTION__)) return $this->hook(__FUNCTION__,$args);
		// end
		ob_start();
		session_start();
	}
	
	function web_footer(){
		// define to hook function
		$args = func_get_args();if($this->is_hook(__FUNCTION__)) return $this->hook(__FUNCTION__,$args);
		// end
	
	}
	
	
	function redirect($url = NULL){
		if(!$url) return false;
		// define to hook function
		$args = func_get_args();if($this->is_hook(__FUNCTION__)) return $this->hook(__FUNCTION__,$args);
		// end
		header('location: '.$url);
		exit();
	}
	
	function format($array = NULL){
		if(!$array) return NULL;
		// hook
		$args = func_get_args();if($this->is_hook(__FUNCTION__)) return $this->hook(__FUNCTION__,$args);

		if(is_array($array)) foreach($array as $key=>$v){
			$array[$key] = stripslashes(htmlspecialchars($v,ENT_COMPAT,'utf-8'));
		}else{
			$array =  stripslashes(htmlspecialchars($array,ENT_COMPAT,'utf-8'));
		}
		return $array;
	}
	
	function getRealIpAddr()
	{
		if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
		{
		  $ip=$_SERVER['HTTP_CLIENT_IP'];
		}
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
		{
		  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else
		{
		  $ip=$_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}
	
	function getCurrentWeek($startDate)
    {
        $week = 0;
		$currentDate = strtotime(date('Y-m-d G:i:s'));
		$startDate =  strtotime($startDate);
		
		$seconds = $currentDate - $startDate;
		
		$days = floor($seconds/60/60/24);
		
		if((($days + 1) % 7) == 0)
		{
			$week = ($days + 1) / 7;
		}
		else
		{
			$week = (($days + 1) / 7) + 1;
		}
		return (int)$week;
    }
}

?>