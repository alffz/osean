<?php
class model_data_user extends CI_Model
{

  public function get_user()
  {
    // get user data
    $this->db->select('*');
    $this->db->from('user');
    //execute
    $query = $this->db->get();
    // return result
    return $query->result();
  }

  // get user by id
  public function get_user_by_id()
  {
    $id = $this->uri->segment(3);
    // get user data
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('id_user', $id);
    //execute
    $query = $this->db->get();
    // return result
    return $query->row();
  }

  // edit user
  public function edit_user()
  {
    $id = $this->uri->segment(3);
    $data = [
      'is_user_active' => $this->input->post('userActive')
    ];
    $this->db->where('id_user', $id);
    $this->db->update('user', $data);
  }

  // get user by session
  public function get_user_by_session()
  {
    $id = $this->session->userdata('email');
    // get user data
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('email', $id);
    //execute
    $query = $this->db->get();
    // return result
    return $query->row();
  }
}
