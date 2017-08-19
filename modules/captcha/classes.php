<?php

if(!defined('_ROOT')) {
 exit('Access Denied');
}

class ClassModel extends Model{
	function ClassModel(){
		parent::__construct();
	}
	
	var $font = 'monofont.ttf';
	function generateCode($characters) {
		/* list all possible characters, similar looking characters and vowels have been removed */
		$possible = '23456789bcdfghjkmnpqrstvwxyz';
		$code = '';
		$i = 0;
		while ($i < $characters) { 
			$code .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
			$i++;
		}
		return $code;
	}
	function Captcha($width='120',$height='40',$characters='4', $bgcolor=array(255 , 255 , 255), $arrcolor=array(0,0,0)) {
		$code =  strtoupper($this->generateCode($characters));	
		$image = imagecreatetruecolor($width, $height);
		// random number 1 or 2
		$num = rand(1,2);
		if($num==1){
			$font = "Capture it 2.ttf"; // font style
		}
		else{
			$font = "Molot.otf";// font style
		}
		$font = "Capture it 2.ttf"; // font style
		$color = imagecolorallocate($image, $arrcolor[0], $arrcolor[1], $arrcolor[2]);// color		
	
		$white = imagecolorallocate($image, $bgcolor[0], $bgcolor[1], $bgcolor[2]); // background color white
		imagefilledrectangle($image,0,0,399,199,$white);
		
	
		$font_size = 15;
		imagettftext($image, $font_size, 0, 10, ($height + 10) / 2, $color, $this->font, $code);
		
		header("Content-type: image/png");
		imagepng($image);
		imagedestroy($image);	
		$_SESSION['sesscode'] = $code;
	}
	
}
?>