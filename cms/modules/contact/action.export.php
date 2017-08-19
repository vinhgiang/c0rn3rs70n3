<?php
	if(!defined('_ROOT') ) { exit('Access Denied');}

	header('Content-type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename='.$system->domain.'-'.date('Y-m-d-h-i-s').'.xls');


	$arrTerm = array();
	$arrContact = $oClass->view();	
	while($arr = $arrContact->fetch()){
		$arrTerm[] = $arr;		
	}
	$arrHeader = array_keys($arrTerm[0]);	
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
?>