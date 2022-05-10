<?php

    class model_daftar extends CI_Model {

        public function daftar()
        {
            // get data
            $data = [
                'id_user'        => uniqid(),
                'nama_user'      => $this->input->post('nama',true),
                'nomor_hp'        => $this->input->post('nomorhp',true),
                'email'          => $this->input->post('email',true),
                'password'       => $this->input->post('password',true),
                'is_user_active' => 0,
                'role_id'        => 0,

            ];
            // insert data
            $this->db->insert('user', $data);
        }
    }


?>