<?php

class model_tambah_pelanggan extends CI_Model
{


    public function insert_pelanggan()
    {
        // add a new item
        $data = array(
            'id_pelanggan'        => uniqid(),
            'id_anggota_keliling' => $this->input->post('anggota', true),
            'id_gang'             => $this->input->post('gang', true),
            'nama_pelanggan'      => $this->input->post('nama_pelanggan', true),
            'id_nomor_rumah'      => $this->input->post('nomor_rumah', true),
            'nomor_hp'            => $this->input->post('nomor_hp'),
            'harga'               => $this->input->post('harga', true),
            'jumlah_galon'        => $this->input->post('galon', true),
            'jumlah_keluarga'     => $this->input->post('anggota_keluarga', true),
            'status_rumah'        => $this->input->post('status_rumah', true),
            'harga'               => $this->input->post('harga', true),
            'is_langganan_active' => 1,
        );
        // insert
        $this->db->insert('pelanggan', $data);
    }
}
