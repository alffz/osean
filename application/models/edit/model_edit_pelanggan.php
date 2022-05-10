<?php

class model_edit_pelanggan extends CI_Model
{
  function update_pelanggan()
  {
    $id_pelanggan = $this->uri->segment(3);
    $data = array(
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
      'is_langganan_active' => $this->input->post('aktivasi', true),
    );
    $this->db->where('id_pelanggan', $id_pelanggan);
    $this->db->update('pelanggan', $data);
  }
}
