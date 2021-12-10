<?php

    class Model_data_pelanggan extends CI_Model {
    
        function __construct() {
            parent::__construct();
        }
        
        function list_pelanggan() {
            $query = $this->db->get('pelanggan');
            return $query->result();
        }
    }
        
        