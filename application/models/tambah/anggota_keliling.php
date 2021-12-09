<?php

    class Anggota_keliling extends CI_Model {
        
        public function insert_anggota() {
            $data = [
                'id_anggota_keliling'        => uniqid(),
                'nama_anggota_keliling'      => $this->input->post('nama',true),
                'nomor_hp'                   => $this->input->post('nomorhp',true),
                'jumlah_gang'                => $this->input->post('gang'),
                'jumlah_langganan'           => $this->input->post('langganan',true),
                'gaji'                       => $this->input->post('gaji',true),
                'is_anggota_keliling_active' =>0
            ];

            $this->db->insert('anggota_keliling', $data);
        }
    }