<?php

class api extends CI_Controller
{
  //constructor
  public function __construct()
  {
    parent::__construct();
    $this->load->model('data/model_data_gang');
    $this->load->model('data/model_data_pelanggan');
    $this->load->model('data/model_nomor_rumah');
    $this->load->library('pagination');
  }
  function get_gang()
  {
    return $this->model_data_gang->list_gang();
  }

  // get pelanggan
  function get_pelanggan()
  {
    $id_gang = $this->input->post('id_gang');
    $data = $this->model_data_pelanggan->get_pelanggan_by_gang($id_gang);
    echo json_encode($data);
  }
}
