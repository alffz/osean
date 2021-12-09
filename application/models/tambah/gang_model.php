<?php

    class gang_model extends CI_Model {       

        public function tambah_gang() {
            // data
            $data = array(
                'id_gang' => uniqid(),
                'id_anggota_keliling' => $this->input->post('anggota',true),
                'nama_gang' => $this->input->post('nama',true)
            );
            // insert
            $this->db->insert('gang', $data);
        }

        // get all gang and join with anggota_keliling
        public function get_gang() {
            $this->db->select('*');
            $this->db->from('gang');
            $this->db->join('anggota_keliling', 'gang.id_anggota_keliling = anggota_keliling.id_anggota_keliling');
            $query = $this->db->get();
            return $query->result();
        }
    }