<?php

    class Edit_gang_model extends CI_Model {



        // update gang
        function update_gang($id) {
            $id_anggota = $id;
            $data = array(
                'id_anggota_keliling' => $this->input->post('nama'),
                'nama_gang' => $this->input->post('nomorhp'),
            );
            $this->db->where('id_gang', $id_anggota);
            $this->db->update('anggota_keliling', $data);
        }

        // get gang by id
        public function get_gang_by_id($id) {
            $this->db->where('id_gang', $id);
            $query = $this->db->get('gang');
            return $query->row();
        }
    }