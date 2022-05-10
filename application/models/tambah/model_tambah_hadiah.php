<?php

class model_tambah_hadiah extends CI_Model
{

  // tambah hadiah
  public function insert()
  {
    $data = [
      'id_hadiah'          => uniqid(),
      'nama_hadiah'        => $this->input->post('hadiah', true),
      'jumlah_kupn_hadiah' => $this->input->post('jumlah_kupon', true)
    ];
    $this->db->insert('hadiah', $data);
  }
}
