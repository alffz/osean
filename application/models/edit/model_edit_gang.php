<?php

class model_edit_gang extends CI_Model
{
    // update gang
    function update_gang()
    {
        $id_gang = $this->uri->segment(3);
        $data = array(
            'nama_gang' => $this->input->post('nama'),
        );
        $this->db->where('id_gang', $id_gang);
        $this->db->update('gang', $data);
    }

    // get gang by id , should to join with anggota_keliling

    public function get_gang_by_id($id)
    {
        $this->db->where('id_gang', $id);
        $query = $this->db->get('gang');
        return $query->row();
    }
}
