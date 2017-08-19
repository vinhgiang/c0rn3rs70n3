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

    function add_column($table, $column, $type, $null = "NULL", $after){
        $after = $after != '' ? "AFTER `$after`" : '';
        return $this->db->query("ALTER TABLE $this->prefix" . "$table ADD COLUMN `$column` $type $null $after");
    }

    function count_game($cond = 1){
        return $this->db->mysql_results("SELECT count(g.id) as total FROM ".$this->prefix."game g WHERE $cond ");
    }

    function get_product($cond = 1,$start=0,$limit = 0,$orderby = ""){
        $orderby = $orderby? "ORDER BY ".$orderby:"";
        return $this->db->query("SELECT p.* FROM ".$this->prefix."product p WHERE $cond ".$orderby.($limit?" LIMIT $start,$limit":""));
    }

    function get_supplier($cond = 1,$start=0,$limit = 0,$orderby = ""){
        $orderby = $orderby? "ORDER BY ".$orderby:"";
        return $this->db->query("SELECT s.* FROM ".$this->prefix."suppliers s WHERE $cond ".$orderby.($limit?" LIMIT $start,$limit":""));
    }

    function get_produc_log($cond = 1,$start=0,$limit = 0,$orderby = ""){
        $orderby = $orderby? "ORDER BY ".$orderby:"";
        return $this->db->query("SELECT p.* FROM ".$this->prefix."product_log p WHERE $cond ".$orderby.($limit?" LIMIT $start,$limit":""));
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

    function update_column($table, $old_column, $new_column, $type){
        return $this->db->query("ALTER TABLE $this->prefix" . "$table CHANGE `$old_column` `$new_column` $type");
    }

    function delete_table($table, $cond) {
        if(intval($cond) == 1) {
            die('Delete table missing condition.');
        }
        $this->db->delete($this->prefix . $table, $cond);
        $affected_rows = $this->db->affected_rows();
        return $affected_rows;
    }

    function delete_column($table, $column){
        return $this->db->query("ALTER TABLE $this->prefix" . "$table DROP COLUMN `$column`");
    }
}