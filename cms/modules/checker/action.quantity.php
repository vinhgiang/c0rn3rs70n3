<?php

if(!defined('_ROOT') ) {
	exit('Access Denied');
}
$tpl->setfile(array(
	'body'=>'quantity.tpl')
);

$bagQuantity = $oHtml->get(3);
$greenBagQty = $bagQuantity['content'];
$redBagQty = $bagQuantity['Slogan'];

$bagQuantity['green_bag_used'] = $cfg['green_bag'];
$bagQuantity['red_bag_used'] = $cfg['red_bag'];

$bagQuantity['green_bag_remaining'] = $greenBagQty - $cfg['green_bag'];
$bagQuantity['red_bag_remaining'] = $redBagQty - $cfg['red_bag'];

$tpl->merge($bagQuantity, 'bagQuantity');

$objPatches = $oContent->viewSite(2);
while ($patch = $objPatches->fetch()) {
	$remaining = $patch['quantity'] - $patch['prices'];
	$patch['remaining'] = $remaining;
	$tpl->assign($patch, 'patches');
}