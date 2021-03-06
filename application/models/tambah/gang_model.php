<?php

    class gang_model extends CI_Model {       

        public function tambah_gang() {
            // data
            $data = array(
                'id_gang' => uniqid(),
                'nama_gang' => $this->input->post('nama',true)
            );
            // insert
            $this->db->insert('gang', $data);
        }

        // get gang by id
        public function get_gang_by_id($id) {
            $this->db->where('id_gang', $id);
            $query = $this->db->get('gang');
            return $query->row();
        }
        public function get_gang() {
            $this->db->select('*');
            $this->db->from('gang');
            $query = $this->db->get();
            return $query->result();
        }

        // get all anggota keliling
        public function get_anggota() {
            $this->db->select('*');
            $this->db->from('anggota_keliling');
            $query = $this->db->get();
            return $query->result();
        }
    }