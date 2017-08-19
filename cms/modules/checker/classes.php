<?php

if(!defined('_ROOT')) {
    exit('Access Denied');
}

class ClassModel extends Model{
    function ClassModel(){
        parent::__construct();
    }
    
    function getCode($code = '1') {
        return $this->db->query("SELECT * FROM ".$this->prefix."code c WHERE c.code = '$code'");
    }

    function insert($data, $tablename){
        $result = $this->db->insert($this->prefix.$tablename,$data);
        return $this->db->insert_id();
    }

    function insert_id() {
        return $this->db->insert_id();
    }

    function get_game($cond = 1, $start = 0, $limit = 0, $orderby = "id"){
        return $this->db->query("SELECT * FROM ".$this->prefix."game WHERE $cond ORDER BY $orderby".($limit?" LIMIT $start,$limit":""));
    }
}