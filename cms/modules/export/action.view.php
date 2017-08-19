<?php

	if(!defined('_ROOT') ) {
		exit('Access Denied');
	}

	$filename = _ROOT.'data/upload/export.txt';
	if (!file_exists($filename)) {
		$handle = fopen($filename, 'w') or die('Cannot open file:  '.$filename);
		 fclose($handle);
	}	

	if($_POST)
	{
		$sql = stripslashes(strtolower($_POST["inputsql"]));
		$_post_type = strtoupper($_POST["submit"]);
		if($sql)
		{			
			$refresh = '?'.http_build_query($_GET);
			if(intval($_SESSION["admin_login"]["id"]) == 0){ echo json_encode(array("id"=>0, "content"=>$refresh));exit;	}		

			if(strpos($sql,'drop') !== false || strpos($sql,'truncate') !== false ){
				echo json_encode(array("id"=>1, "content"=>'CAN NOT DROP OR DELETE TABLE'));exit;	
			}			
			$arrMember = mysql_query($sql);			
			if (!$arrMember) {
				echo json_encode(array("id"=>1, "content"=>'Invalid query: ' .$sql .' :----------->' . mysql_error()));exit;	
			}
			$arrTerm = array();
			while($arrcontent = mysql_fetch_assoc($arrMember)){
				$arrTerm[] = $arrcontent;		
			}
			$arrHeader = array_keys($arrTerm[0]);
			foreach($arrTerm as $key=>$values){	
				$tpl->assign($arrTerm[$key], "listBody");
				for($j=0; $j< sizeof($arrHeader); $j++)	{			
					 $tpl->assign(array("data"=>$arrTerm[$key][$arrHeader[$j]]), "listBody.sub");
				}
			}
			for($i=0; $i< sizeof($arrHeader); $i++)	
				$tpl->assign(array($arrHeader[$i],"header"),"listHeader");	

			if($_post_type == 'EXPORT'){	

				header('Content-type: application/vnd.ms-excel');
				header('Content-Disposition: attachment;filename='.$system->domain.'-'.date('Y-m-d-h-i-s').'.xls');

				$flag = true;
				if (file_exists($filename)) {
					$handle = fopen($filename, 'r');
					$data = fread($handle,filesize($filename));
					$arrContent = json_decode($data,true);
					foreach($arrContent as $key=>$values){	
						if($values["sql"] == $sql)
							$flag = false;
					}
					$arrContent[] = array("name"=>'Day_'.date('d_m_Y_h_i_s'),"ip"=>$_SERVER["REMOTE_ADDR"],"date"=>date('d-m-y'),"sql"=>$sql);
					$arrData = json_encode($arrContent);
					if($flag){
						$handle = fopen($filename, 'w') or die('Cannot open file:  '.$filename);
						fwrite($handle, $arrData);			
					}
				}	
				$result_content = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
									<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
									<html>
										<head>
											<meta http-equiv="Content-type" content="text/html;charset=utf-8" />
											<style id="Classeur1_16681_Styles"></style>
										</head>
										<body>
											<div id="Classeur1_16681" align=center x:publishsource="Excel">
												<table x:str border=0 cellpadding=0 cellspacing=0 width=100% style="border-collapse: collapse">
													<tr>';
												    for($i=0; $i< sizeof($arrHeader); $i++){
												        $result_content .= '<td nowrap bgcolor="#CCCCCC" style="font-weight:bold; height:25px; vertical-align:middle; margin:0px 0px 5px 5px; padding:0px 5px 0px 5px;" class=xl2216681>'.$arrHeader[$i].'</td>';
												    }
				$result_content .= 					'</tr>'; 
												    foreach($arrTerm as $key=>$values){	
				$result_content .= 					    '</tr>';
													     	for($j=0; $j< sizeof($arrHeader); $j++)	{	
													        	$result_content .='<td nowrap style="height:25px; vertical-align:middle;margin:0px 0px 0px 5px;padding:0px 5px 0px 5px;" class=xl2216681>'.$arrTerm[$key][$arrHeader[$j]].'</td>';
													        } 
				$result_content .=					    '</tr>';
													}
				$result_content .=					'</table></div></body></html>';
				print_r($result_content);exit;					
			}
			$tpl->merge(array('content'=>$sql) , 'sql');
		}
	}			
	$tpl->setfile(array('body'=>'export.tpl',));	
	$arrTable = $oClass->getSql("SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA='".$GLOBALS['cfg']['name']."'");
	while($arrcontent = $arrTable->fetch()){
		$tpl->assign($arrcontent, "listTable");		
	}
	
	if (file_exists($filename)) {
		$handle = fopen($filename, 'r');
		$data = fread($handle,filesize($filename));
		
		if($data != ""){			
			$arrContent = json_decode($data,true);
			foreach($arrContent as $key=>$values){	
				$tpl->assign($values, "listSql");		
			}
		}
	}
	
	
/*	$arrSql = $oClass->getExport();
	while($arrcontent = $arrSql->fetch()){
		$tpl->assign($arrcontent, "listSql");		
	}*/
	
?>