<?php

    class model_tambah_no_rumah extends CI_Model {
    
        // add
        public function insert() {
            // data
            $data = array(
                'id_nomor_rumah' => uniqid(),
                'nomor_rumah'    => $this->input->post('nomorRumah',true),
            );
        // insert
        $this->db->insert('nomor_rumah', $data);
        }
    }