<?php

    class Model_Data_Gang extends CI_Model{
    
        
        // get all gangs
        public function list_gang(){
            $query = $this->db->get('gang');
            return $query->result();
        }
    }