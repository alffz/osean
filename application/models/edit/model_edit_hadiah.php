<?php
class model_edit_hadiah extends CI_Model
{
  // edit hadiah
  public function edit($id)
  {
    $data = [
      'nama_hadiah'        => $this->input->post('hadiah', true),
      'jumlah_kupn_hadiah' => $this->input->post('jumlah_kupon', true)
    ];
    $this->db->where('id_hadiah', $id);
    $this->db->update('hadiah', $data);
  }
}
