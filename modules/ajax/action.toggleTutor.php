<?php

if(!defined('_ROOT')) { exit('Access Denied'); }

$tpl->reset();

if( $_POST ) {
	$id = intval( $_POST['id'] );
	if ( $id > 0 ) {
		$oHelper->toggleColumn($id, 'teacher', 'status');
	}
}

exit;