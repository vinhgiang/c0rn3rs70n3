<?php

if(!defined('_ROOT')) {
 exit('Access Denied');
}
class Email  {
	var $to;
	var $to_name = '';
	var $tpl;
	var $subject;
	var $is_smtp = true;
	var $is_html = true;
	var $language  = array();
	var $body;
	var $cc;
	var $bcc;
	var $cc_name = '';	
	var $BodyHtml = "";
	///
	var $smtp;
	function Email($to,$subject,$email_template=""){
		$this->tpl = new bTemplate(_ROOT.'email/');
		$this->to = $to;
		$this->subject = $subject;
		if(!empty($email_template)){
			$this->tpl->setfile(array(
				'__main__'=>'master.tpl',
				'body'=>$email_template
			));
		}
	}
	function connect($cfg){
		$this->smtp = $cfg;
	}
	function Send(){
		$mail = new PHPMailer();
		$mail->CharSet = 'UTF-8';
		$mail->Host = $this->smtp['smtp_server'];
		$mail->Port = $this->smtp['smtp_port'];
		if($this->smtp['smtp_enable']=='yes')
		{
			$mail->IsSMTP();
			$mail->SMTPSecure = $this->smtp['smtp_secure'];
			$mail->Username = $this->smtp['smtp_usr'] ;
			$mail->Password = $this->smtp['smtp_psw'];
			$mail->SMTPAuth = $this->smtp['smtp_auth']=='yes'?true:false;
		}
		if($this->smtp['smtp_from_email']){
			$mail->SetFrom($this->smtp['smtp_from_email'],$this->smtp['smtp_from_name']);
		}
		else
		{
			$mail->SetFrom($this->smtp['smtp_server'],$this->smtp['smtp_usr']);
		}
		if (is_array($this->to))
		{
			foreach($this->to as $key => $val){
				$name = is_numeric($key)?"":$key;
				$mail->AddAddress($val , $name);
			}
		}
		else
		{
			$mail->AddAddress($this->to,$this->to_name);
		}
		if($this->smtp['smtp_reply_email']){
			$mail->AddReplyTo($this->smtp['smtp_reply_email'],$this->smtp['smtp_reply_name']);
		}
		if($this->cc){
			if (is_array($this->cc))
			{
				foreach($this->cc as $keyc => $valcc){
					$name = is_numeric($keyc)?"":$keyc;
					$mail->AddCC($valcc , $name);
				}
			}
			else
			{
				$mail->AddCC($this->cc,$this->cc_name);
			}
		}
        if($this->bcc){
            if (is_array($this->bcc))
            {
                foreach($this->bcc as $keyc => $valcc){
                    $name = is_numeric($keyc) ? "" : $keyc;
                    $mail->AddBcc($valcc , $name);
                }
            }
            else
            {
                $mail->AddCC($this->cc,$this->cc_name);
            }
        }
		if($this->attach){
			if (is_array($this->attach))
			{
				foreach($this->attach as $key => $val){
					$mail->AddAttachment($val);
				}
			}
			else
			{
				$mail->AddAttachment($this->attach);
			}
		}
		$mail->WordWrap = 50;
		$mail->IsHTML($this->is_html);
		$mail->Subject = $this->subject;
		$mail->Body = $this->BodyHtml!=""?$this->BodyHtml:$this->tpl->parse();
		$mail->AltBody = "";
		return $mail->Send();
	}
}