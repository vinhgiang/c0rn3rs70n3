<?php
if(!defined('_ROOT') ) { exit('Access Denied');}

header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename=redeem-' . date('Y-m-d-h-i-s') . '.xls');

$cond = 1;

if ($_REQUEST['q'] != '') {
	$cond .= " AND (full_name LIKE '%" . $_REQUEST["q"] . "%' OR email LIKE '%" . $_REQUEST["q"] . "%' 
				OR child_name LIKE '%" . $_REQUEST["q"] ."%' OR IC = '" . $_REQUEST["q"] . "'
				OR code = '" . $_REQUEST["q"] . "' OR phone LIKE '%" . $_REQUEST["q"] . "%')";
}

$arrTerm = array();
$arrContact = $oClass->view($cond);
$index = 1;
while($arr = $arrContact->fetch()){
	$arr['bag_img'] = 'http://dugro.com.my/backpack/data/upload/redeem/' . $arr['bag_img'];

	$arr['ic'] = str_replace('-', '', $arr['ic']);

	$patches = explode(',', $arr['patches']);
	$arr['patch1'] = explode('.', $patches[0])[0];
	$arr['patch2'] = explode('.', $patches[1])[0];
	$arr['patch3'] = explode('.', $patches[2])[0];
	$arr['patch4'] = explode('.', $patches[3])[0];
	$arr['patch5'] = explode('.', $patches[4])[0];

	$arr['subscribe'] = $arr['subscribe'] == 1 ? 'Yes' : 'No';

	$arr['index'] = $index;
	$arrTerm[] = $arr;
	
	$index++;
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
								    /*for($i=0; $i< sizeof($arrHeader); $i++){
								        $result_content .= '<td nowrap bgcolor="#CCCCCC" style="font-weight:bold; height:25px; vertical-align:middle; margin:0px 0px 5px 5px; padding:0px 5px 0px 5px;" class=xl2216681>'.$arrHeader[$i].'</td>';
								    }*/

$result_content .= '<td nowrap bgcolor="#CCCCCC" style="font-weight:bold; height:25px; vertical-align:middle; margin:0px 0px 5px 5px; padding:0px 5px 0px 5px;" class=xl2216681>ID#</td>';
$result_content .= '<td nowrap bgcolor="#CCCCCC" style="font-weight:bold; height:25px; vertical-align:middle; margin:0px 0px 5px 5px; padding:0px 5px 0px 5px;" class=xl2216681>UniqueCode</td>';
$result_content .= '<td nowrap bgcolor="#CCCCCC" style="font-weight:bold; height:25px; vertical-align:middle; margin:0px 0px 5px 5px; padding:0px 5px 0px 5px;" class=xl2216681>UserName</td>';
$result_content .= '<td nowrap bgcolor="#CCCCCC" style="font-weight:bold; height:25px; vertical-align:middle; margin:0px 0px 5px 5px; padding:0px 5px 0px 5px;" class=xl2216681>UserEmail</td>';
$result_content .= '<td nowrap bgcolor="#CCCCCC" style="font-weight:bold; height:25px; vertical-align:middle; margin:0px 0px 5px 5px; padding:0px 5px 0px 5px;" class=xl2216681>ChildName</td>';
$result_content .= '<td nowrap bgcolor="#CCCCCC" style="font-weight:bold; height:25px; vertical-align:middle; margin:0px 0px 5px 5px; padding:0px 5px 0px 5px;" class=xl2216681>MessageTo</td>';
$result_content .= '<td nowrap bgcolor="#CCCCCC" style="font-weight:bold; height:25px; vertical-align:middle; margin:0px 0px 5px 5px; padding:0px 5px 0px 5px;" class=xl2216681>MessageText</td>';
$result_content .= '<td nowrap bgcolor="#CCCCCC" style="font-weight:bold; height:25px; vertical-align:middle; margin:0px 0px 5px 5px; padding:0px 5px 0px 5px;" class=xl2216681>MessageFrom</td>';
$result_content .= '<td nowrap bgcolor="#CCCCCC" style="font-weight:bold; height:25px; vertical-align:middle; margin:0px 0px 5px 5px; padding:0px 5px 0px 5px;" class=xl2216681>BackpackColour</td>';
$result_content .= '<td nowrap bgcolor="#CCCCCC" style="font-weight:bold; height:25px; vertical-align:middle; margin:0px 0px 5px 5px; padding:0px 5px 0px 5px;" class=xl2216681>BackpackDesign</td>';
$result_content .= '<td nowrap bgcolor="#CCCCCC" style="font-weight:bold; height:25px; vertical-align:middle; margin:0px 0px 5px 5px; padding:0px 5px 0px 5px;" class=xl2216681>BadgeLocation1</td>';
$result_content .= '<td nowrap bgcolor="#CCCCCC" style="font-weight:bold; height:25px; vertical-align:middle; margin:0px 0px 5px 5px; padding:0px 5px 0px 5px;" class=xl2216681>BadgeLocation2</td>';
$result_content .= '<td nowrap bgcolor="#CCCCCC" style="font-weight:bold; height:25px; vertical-align:middle; margin:0px 0px 5px 5px; padding:0px 5px 0px 5px;" class=xl2216681>BadgeLocation3</td>';
$result_content .= '<td nowrap bgcolor="#CCCCCC" style="font-weight:bold; height:25px; vertical-align:middle; margin:0px 0px 5px 5px; padding:0px 5px 0px 5px;" class=xl2216681>BadgeLocation4</td>';
$result_content .= '<td nowrap bgcolor="#CCCCCC" style="font-weight:bold; height:25px; vertical-align:middle; margin:0px 0px 5px 5px; padding:0px 5px 0px 5px;" class=xl2216681>BadgeLocation5</td>';
$result_content .= '<td nowrap bgcolor="#CCCCCC" style="font-weight:bold; height:25px; vertical-align:middle; margin:0px 0px 5px 5px; padding:0px 5px 0px 5px;" class=xl2216681>FullName</td>';
$result_content .= '<td nowrap bgcolor="#CCCCCC" style="font-weight:bold; height:25px; vertical-align:middle; margin:0px 0px 5px 5px; padding:0px 5px 0px 5px;" class=xl2216681>ICNo</td>';
$result_content .= '<td nowrap bgcolor="#CCCCCC" style="font-weight:bold; height:25px; vertical-align:middle; margin:0px 0px 5px 5px; padding:0px 5px 0px 5px;" class=xl2216681>ContactNo</td>';
$result_content .= '<td nowrap bgcolor="#CCCCCC" style="font-weight:bold; height:25px; vertical-align:middle; margin:0px 0px 5px 5px; padding:0px 5px 0px 5px;" class=xl2216681>Address</td>';
$result_content .= '<td nowrap bgcolor="#CCCCCC" style="font-weight:bold; height:25px; vertical-align:middle; margin:0px 0px 5px 5px; padding:0px 5px 0px 5px;" class=xl2216681>Postcode</td>';
$result_content .= '<td nowrap bgcolor="#CCCCCC" style="font-weight:bold; height:25px; vertical-align:middle; margin:0px 0px 5px 5px; padding:0px 5px 0px 5px;" class=xl2216681>State</td>';
$result_content .= '<td nowrap bgcolor="#CCCCCC" style="font-weight:bold; height:25px; vertical-align:middle; margin:0px 0px 5px 5px; padding:0px 5px 0px 5px;" class=xl2216681>Terms</td>';
$result_content .= '<td nowrap bgcolor="#CCCCCC" style="font-weight:bold; height:25px; vertical-align:middle; margin:0px 0px 5px 5px; padding:0px 5px 0px 5px;" class=xl2216681>Subscribe</td>';
$result_content .= '<td nowrap bgcolor="#CCCCCC" style="font-weight:bold; height:25px; vertical-align:middle; margin:0px 0px 5px 5px; padding:0px 5px 0px 5px;" class=xl2216681>Passport</td>';

$result_content .= 					'</tr>';
								    foreach($arrTerm as $key=>$values){
$result_content .= 					    '</tr>';
									        /*for($j=0; $j< sizeof($arrHeader); $j++)	{
									            $result_content .='<td nowrap style="height:25px; vertical-align:middle;margin:0px 0px 0px 5px;padding:0px 5px 0px 5px;" class=xl2216681>'.$arrTerm[$key][$arrHeader[$j]].'</td>';
									        }*/

								            $result_content .='<td nowrap style="height:25px; vertical-align:middle;margin:0px 0px 0px 5px;padding:0px 5px 0px 5px;" class=xl2216681>' . $arrTerm[$key]['id'] . '</td>';
								            $result_content .='<td nowrap style="height:25px; vertical-align:middle;margin:0px 0px 0px 5px;padding:0px 5px 0px 5px;" class=xl2216681>' . $arrTerm[$key]['code'] . '</td>';
								            $result_content .='<td nowrap style="height:25px; vertical-align:middle;margin:0px 0px 0px 5px;padding:0px 5px 0px 5px;" class=xl2216681>' . $arrTerm[$key]['name'] . '</td>';
								            $result_content .='<td nowrap style="height:25px; vertical-align:middle;margin:0px 0px 0px 5px;padding:0px 5px 0px 5px;" class=xl2216681>' . $arrTerm[$key]['email'] . '</td>';
								            $result_content .='<td nowrap style="height:25px; vertical-align:middle;margin:0px 0px 0px 5px;padding:0px 5px 0px 5px;" class=xl2216681>' . $arrTerm[$key]['child_name'] . '</td>';
								            $result_content .='<td nowrap style="height:25px; vertical-align:middle;margin:0px 0px 0px 5px;padding:0px 5px 0px 5px;" class=xl2216681>' . $arrTerm[$key]['header_letter'] . '</td>';
								            $result_content .='<td nowrap style="height:25px; vertical-align:middle;margin:0px 0px 0px 5px;padding:0px 5px 0px 5px;" class=xl2216681>' . $arrTerm[$key]['body_letter'] . '</td>';
								            $result_content .='<td nowrap style="height:25px; vertical-align:middle;margin:0px 0px 0px 5px;padding:0px 5px 0px 5px;" class=xl2216681>' . $arrTerm[$key]['footer_letter'] . '</td>';
								            $result_content .='<td nowrap style="height:25px; vertical-align:middle;margin:0px 0px 0px 5px;padding:0px 5px 0px 5px;" class=xl2216681>' . $arrTerm[$key]['bag_color'] . '</td>';
								            $result_content .='<td nowrap style="height:25px; vertical-align:middle;margin:0px 0px 0px 5px;padding:0px 5px 0px 5px;" class=xl2216681>' . $arrTerm[$key]['bag_img'] . '</td>';
								            $result_content .='<td nowrap style="height:25px; vertical-align:middle;margin:0px 0px 0px 5px;padding:0px 5px 0px 5px;" class=xl2216681>' . $arrTerm[$key]['patch1'] . '</td>';
								            $result_content .='<td nowrap style="height:25px; vertical-align:middle;margin:0px 0px 0px 5px;padding:0px 5px 0px 5px;" class=xl2216681>' . $arrTerm[$key]['patch2'] . '</td>';
								            $result_content .='<td nowrap style="height:25px; vertical-align:middle;margin:0px 0px 0px 5px;padding:0px 5px 0px 5px;" class=xl2216681>' . $arrTerm[$key]['patch3'] . '</td>';
								            $result_content .='<td nowrap style="height:25px; vertical-align:middle;margin:0px 0px 0px 5px;padding:0px 5px 0px 5px;" class=xl2216681>' . $arrTerm[$key]['patch4'] . '</td>';
								            $result_content .='<td nowrap style="height:25px; vertical-align:middle;margin:0px 0px 0px 5px;padding:0px 5px 0px 5px;" class=xl2216681>' . $arrTerm[$key]['patch5'] . '</td>';
								            $result_content .='<td nowrap style="height:25px; vertical-align:middle;margin:0px 0px 0px 5px;padding:0px 5px 0px 5px;" class=xl2216681>' . $arrTerm[$key]['full_name'] . '</td>';
								            $result_content .='<td nowrap style="height:25px; vertical-align:middle;margin:0px 0px 0px 5px;padding:0px 5px 0px 5px;" class=xl2216681>' . $arrTerm[$key]['ic'] . '</td>';
								            $result_content .='<td nowrap style="height:25px; vertical-align:middle;margin:0px 0px 0px 5px;padding:0px 5px 0px 5px;" class=xl2216681>' . $arrTerm[$key]['phone'] . '</td>';
								            $result_content .='<td nowrap style="height:25px; vertical-align:middle;margin:0px 0px 0px 5px;padding:0px 5px 0px 5px;" class=xl2216681>' . $arrTerm[$key]['address'] . '</td>';
								            $result_content .='<td nowrap style="height:25px; vertical-align:middle;margin:0px 0px 0px 5px;padding:0px 5px 0px 5px;" class=xl2216681>' . $arrTerm[$key]['postcode'] . '</td>';
								            $result_content .='<td nowrap style="height:25px; vertical-align:middle;margin:0px 0px 0px 5px;padding:0px 5px 0px 5px;" class=xl2216681>' . $arrTerm[$key]['state'] . '</td>';
								            $result_content .='<td nowrap style="height:25px; vertical-align:middle;margin:0px 0px 0px 5px;padding:0px 5px 0px 5px;" class=xl2216681>Accept</td>';
								            $result_content .='<td nowrap style="height:25px; vertical-align:middle;margin:0px 0px 0px 5px;padding:0px 5px 0px 5px;" class=xl2216681>' . $arrTerm[$key]['subscribe'] . '</td>';
                                            $result_content .='<td nowrap style="height:25px; vertical-align:middle;margin:0px 0px 0px 5px;padding:0px 5px 0px 5px;" class=xl2216681>' . $arrTerm[$key]['passport'] . '</td>';

$result_content .=					    '</tr>';
									}
$result_content .=					'</table></div></body></html>';
print_r($result_content);
exit;