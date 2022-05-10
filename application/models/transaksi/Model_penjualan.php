<?php

class model_penjualan extends CI_Model
{
  // simpan data
  function insert_penjualan($pelanggan)
  {
    // insert data untuk yang bayar cash
    if ($this->input->post('bayar', true) >= 1) {
      $data = [
        'id_transaksi'        => uniqid(),
        'id_anggota_keliling' => $this->input->post('id_anggota', true),
        'id_pelanggan'        => $pelanggan->id_pelanggan,
        'jumlah'              => $this->input->post('bayar', true),
        'keterangan'          => $this->input->post('catatan', true),
        'date'                => date('Y-m-d'),
      ];
      $this->db->insert('transaksi', $data);
      $this->insert_trip($data['id_transaksi'], null);
    }

    // insert jika ada yg hutang
    if ($this->input->post('hutang', true) >= 1) {
      $hutang  = $this->insert_hutang($this->input->post('id_anggota', true), $pelanggan->id_pelanggan, $this->input->post('hutang', true));
      $this->insert_trip(null, $hutang);
    }

    // insert data untuk yang bayar kupon
    if ($this->input->post('bayar_kupon', true) != null) {
      $kupon    = $this->tukar_kupon($pelanggan->id_pelanggan, $this->input->post('bayar_kupon', true));
      $this->insert_trip(null, $kupon);
    }

    // insert trip

    redirect('transaksi');
  }

  // insert data untuk yang hutang
  function insert_hutang($id_anggota_keliling, $id_pelanggan, $jumlah)
  {
    $data = [
      'id_hutang'    => uniqid(),
      'id_anggota'   => $id_anggota_keliling,
      'id_pelanggan' => $id_pelanggan,
      'jumlah'       => $jumlah,
      'date'         => date('Y-m-d'),
    ];
    $this->db->insert('hutang', $data);
    // untuk insert trip
    return $data['id_hutang'];
  }

  // insert untuk bayar pake kupon
  function tukar_kupon($id_pelanggan, $jumlah)
  {
    $data = [
      'id_tukar_kupon'     => uniqid(),
      'tanggal_tukar'      => date('Y-m-d'),
      'id_pelanggan'       => $id_pelanggan,
      'id_hadiah'          => '61cc9094e09b9', // id Air 
      'jumlah_hadiah'      => $jumlah,
      'tanggal_diserahkan' => date('Y-m-d'),
    ];
    $this->db->insert('tukar_kupon', $data);
    // untuk insert trip
    return $data['id_tukar_kupon'];
  }

  // tambahkan trip
  function insert_trip($id_transaksi, $id_hutang)
  {
    $data = [
      'id_trip'    => uniqid(),
      'id_transaksi' => $id_transaksi,
      'id_hutang' => $id_hutang,
      'trip_ke'     => $this->input->post('trip', true),
      'date'       => date('Y-m-d'),
    ];
    $this->db->insert('trip', $data);
  }
}

// buat mvc hadiah dan loop di transaksi/penjualan
