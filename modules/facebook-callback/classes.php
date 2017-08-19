<?php

if(!defined('_ROOT')) {
 exit('Access Denied');
}

class ClassModel extends Model{
	function ClassModel(){
		parent::__construct();
	}

	function insert_table($table, $data){
		$result = $this->db->insert($this->prefix.$table,$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

    function count_game($cond = 1){
        return $this->db->mysql_results("SELECT count(g.id) as total FROM ".$this->prefix."game g WHERE $cond ");
    }

	function get_member($cond = 1,$start=0,$limit = 0,$orderby = ""){
		$orderby = $orderby? "ORDER BY ".$orderby:"";
		return $this->db->query("SELECT m.* FROM ".$this->prefix."member m WHERE $cond ".$orderby.($limit?" LIMIT $start,$limit":""));
	}

    function get_game($cond = 1,$start=0,$limit = 0,$orderby = ""){
        $orderby = $orderby? "ORDER BY ".$orderby:"";
        return $this->db->query("SELECT g.* FROM ".$this->prefix."game g WHERE $cond ".$orderby.($limit?" LIMIT $start,$limit":""));
    }

    function get_winner_or_top($cond = 1,$start=0,$limit = 0,$orderby = ""){
        $orderby = $orderby? "ORDER BY ".$orderby:"";
        return $this->db->query("SELECT g.*, m.fbid FROM ".$this->prefix."game g, ".$this->prefix."member m WHERE g.user_id = m.id AND $cond ".$orderby.($limit?" LIMIT $start,$limit":""));
    }

    function get_log($cond = 1,$start=0,$limit = 0,$orderby = ""){
        $orderby = $orderby? "ORDER BY ".$orderby:"";
        return $this->db->query("SELECT l.* FROM ".$this->prefix."log l WHERE $cond ".$orderby.($limit?" LIMIT $start,$limit":""));
    }

    function get_like_with_user($cond = 1,$start=0,$limit = 0,$orderby = ""){
        $orderby = $orderby? "ORDER BY ".$orderby:"";
        return $this->db->query("SELECT l.*, m.fbid, m.fullname, m.fbname FROM ".$this->prefix."like l, ".$this->prefix."member m WHERE l.user_id = m.id AND $cond ".$orderby.($limit?" LIMIT $start,$limit":""));
    }

    function get_alert_ip($cond = 1,$start=0,$limit = 0,$orderby = ""){
        $orderby = $orderby? "ORDER BY ".$orderby:"";
        return $this->db->query("SELECT a.* FROM ".$this->prefix."alert_ip a WHERE $cond ".$orderby.($limit?" LIMIT $start,$limit":""));
    }

    function get_count_like_by_ip($cond = 1,$start=0,$limit = 0){
        return $this->db->query("SELECT l.ip, l.photo_id, count(id) as total FROM ".$this->prefix."like l WHERE $cond "." GROUP BY l.ip ".($limit?" LIMIT $start,$limit":""));
    }

	function update_table($table, $data, $cond = 0){
		return $this->db->update($this->prefix.$table, $data, $cond);
	}

    function update_tracking($id, $column, $table, $value = 0){
        $result = $this->db->query("UPDATE ".$this->prefix."$table SET $column = IFNULL($column,0) + $value where id=".$id);
        $affected_rows = $this->db->affected_rows();
        return $affected_rows;
    }

	function get_code($cond = 1, $start = 0, $limit = 0, $orderby = ''){
		$orderby = $orderby ? 'ORDER BY ' . $orderby : '';
		return $this->db->query("SELECT c.* FROM ".$this->prefix."code c WHERE $cond ".$orderby.($limit?" LIMIT $start,$limit":""));
	}

	function get_subscribe($cond = 1, $start = 0, $limit = 0, $orderby = ''){
		$orderby = $orderby ? 'ORDER BY ' . $orderby : '';
		return $this->db->query("SELECT s.* FROM ".$this->prefix."subscribe s WHERE $cond ".$orderby.($limit?" LIMIT $start,$limit":""));
	}

    function update_quantity($table, $column, $quantity, $cond) {
        $result = $this->db->query("UPDATE ".$this->prefix."$table SET $column = $column $quantity WHERE $cond");
        $affected_rows = $this->db->affected_rows();
        return $affected_rows;
    }
}