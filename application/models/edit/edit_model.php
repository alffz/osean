<?php

    class Edit_model extends CI_Model {

        public function __construct() {
            parent::__construct();
        }

        // edit data
        public function edit_data($where, $table) {
            return $this->db->get_where($table, $where);
        }
    }