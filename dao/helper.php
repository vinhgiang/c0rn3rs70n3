<?php

if(!defined('_ROOT')) {
 exit('Access Denied');
}

class HelperDAO extends Model{
	var $configure_mod;
	function ContentDao($configure_mod){
		parent::__construct();
		$this->configure_mod = $configure_mod;
	}

    function select_table($table, $cond = 1, $start = 0, $limit = 0, $orderby = ''){
        $orderby = $orderby ? "ORDER BY " . $orderby : '';

        return $this->db->query("SELECT * FROM " . $this->prefix . "$table WHERE $cond " . $orderby . ($limit ? " LIMIT $start, $limit" : '' ));
    }

    function insert_table($table, $data){
        $result = $this->db->insert($this->prefix.$table,$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function update_table($table, $data, $cond = 0){
        return $this->db->update($this->prefix.$table, $data, $cond);
    }

    function count_table($table, $cond = 1){
        return $this->db->mysql_results("SELECT COUNT(*) FROM ".$this->prefix.$table." where ".$cond);
    }

    function get_school($cond = 1, $start = 0, $limit = 0, $orderBy = ''){
        $orderBy = $orderBy ? "ORDER BY $orderBy" : '';
        $limit = $limit ? " LIMIT $start, $limit" : '';

        $rows = $this->db->query("SELECT s.* FROM " . $this->prefix . "school s WHERE $cond $orderBy $limit");
        $result = array();
        while($row = $rows->fetch()) {
            $row = clean_data($row);
            $result[] = $row;
        }

        return $result;
    }

    function generate_student_code($prefix) {
        $prefix = strtoupper(trim($prefix));

        if ( $prefix == '' ) {
            die('Prefix for student code is missing.');
        }

        $student = $this->db->query("SELECT s.* FROM " . $this->prefix . "student s WHERE s.student_code LIKE '$prefix%' ORDER BY id DESC LIMIT 0, 1")->fetch();

        if( $student['id'] > 0 ) {
            $latestStudentCode = $student['student_code'];
            $latestIndex = intval(str_replace($prefix, '', $latestStudentCode));

            if( $latestIndex <= 0 ) {
                die('Error with student: ' . $student['id'] . ' - ' . $student['student_code']);
            }

            $latestIndex++;

            $studentCode = $prefix . $latestIndex;
        } else {
            $studentCode = $prefix . '1000';
        }

        return $studentCode;
    }

    function get_level($cond = 1, $start = 0, $limit = 0, $orderBy = ''){
        $orderBy = $orderBy ? "ORDER BY $orderBy" : '';
        $limit = $limit ? " LIMIT $start, $limit" : '';

        $rows = $this->db->query("SELECT l.* FROM " . $this->prefix . "level l WHERE $cond $orderBy $limit");
        $result = array();
        while($row = $rows->fetch()) {
            $row = formatOutputData($row);
            $result[] = $row;
        }

        return $result;
    }

    function get_student($cond = 1, $start = 0, $limit = 0, $orderBy = ''){
        $orderBy = $orderBy ? "ORDER BY $orderBy" : '';
        $limit = $limit ? " LIMIT $start, $limit" : '';

        $rs = $this->db->query("SELECT s.*, sch.en_name as `school_en_name`, sch.zh_name as `school_zh_name` FROM " . $this->prefix . "student s, " . $this->prefix . "school sch WHERE $cond AND s.school = sch.school_code $orderBy $limit");
        return $rs;
    }

}