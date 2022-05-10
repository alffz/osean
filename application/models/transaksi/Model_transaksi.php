<?php
//class transaksi
class model_transaksi extends CI_Model
{
  //constructor
  public function __construct()
  {
    parent::__construct();
  }
  //get data transaksi
  public function get_data_transaksi()
  {
    $query = $this->db->get('transaksi');
    return $query->result();
  }
  //get data transaksi by id
  public function get_data_transaksi_by_id($id)
  {
    $this->db->where('id', $id);
    $query = $this->db->get('transaksi');
    return $query->result();
  }
  //get data transaksi by id
  public function get_data_transaksi_by_id_pelanggan($id)
  {
    $this->db->where('id_pelanggan', $id);
    $query = $this->db->get('transaksi');
    return $query->result();
  }
  //get data transaksi by id
  public function get_data_transaksi_by_id_gang($id)
  {
    $this->db->where('id_gang', $id);
    $query = $this->db->get('transaksi');
    return $query->result();
  }
  //get data transaksi by id
  public function get_data_transaksi_by_id_rumah($id)
  {
    $this->db->where('id_rumah', $id);
    $query = $this->db->get('transaksi');
    return $query->result();
  }
  //get data transaksi by id
  public function get_data_transaksi_by_id_anggota($id)
  {
    $this->db->where('id_anggota', $id);
    $query = $this->db->get('transaksi');
    return $query->result();
  }
  //get data transaksi by id
  public function get_data_transaksi_by_id_gaji($id)
  {
    $this->db->where('id_gaji', $id);
    $query = $this->db->get();
  }
}
