<?php

if(!defined('_ROOT')) { exit('Access Denied'); }

$tpl->setfile(
    array('body'=>'list.tpl')
);

$cond = 1;

$result = array();
$products = $oClass->get_product($cond);

$suppliers = $oHelper->get_supplier_columns();

while($product = $products->fetch()) {
    $product['weight'] = floatval($product['weight']);
    $product['battery'] = floatval($product['battery']);
    $product['usd'] = floatval($product['usd']);
    $product['hkd'] = floatval($product['hkd']);

    $supplierPrice = array();
    foreach($suppliers as $supplier) {
        $dbColumn = str_replace('-','_', str2url($supplier));
        $price = $product[$dbColumn];

        if($price > 0) {
            $supplierPrice[$supplier] = $price;
        }
    }

    if(count($supplierPrice) > 0) {
        asort($supplierPrice);

        $bestPrice = reset($supplierPrice);
        $bestSupplier = key($supplierPrice);

        $product['best_price'] = $bestPrice . " ($bestSupplier) ";
    }

    $result[] = $product;
}

die(json_encode($result));