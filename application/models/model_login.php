<?php

    // model_login.php
    class model_login extends CI_Model {

        public function __construct() {
            parent::__construct();
            
        }

        public function validate_user($username, $password) {
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            $query = $this->db->get('users');
            if ($query->num_rows() == 1) {
                return true;
            } else {
                return false;
            }
        }

    }


?>