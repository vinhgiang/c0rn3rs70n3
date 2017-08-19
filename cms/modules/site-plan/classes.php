<?php

if(!defined('_ROOT')) {
	exit('Access Denied');
}
define('POSSITION_TYPE_ID', 1);
class ClassModel extends Model{
	function ClassModel(){
		parent::__construct();
	}

	function updateQuery($table , $set, $where){
		$this->query("UPDATE ".$this->prefix.$table." SET ".$set." where 1=1 ".$where);
	}	
	

}
?>