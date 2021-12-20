<?php

class model_data_anggota_keliling extends CI_Model
{

  var $table = 'anggota_keliling';
  var $column_order = array(null, 'nama_anggota_keliling', null, null, null, null, null); //field yang ada di table user
  var $column_search = array('nama_anggota_keliling'); //field yang diizin untuk pencarian 
  var $order = array('nama_anggota_keliling' => 'desc'); // default order  

  private function _get_datatables_query()
  {
    // join pelanggan

    $this->db->select('*');
    $this->db->from($this->table);
    $i = 0;
    foreach ($this->column_search as $item) { // looping awal        
      if (@$_POST['search']['value']) { // jika datatable mengrimkan pencarian dengan metode POST 
        if ($i === 0) // looping awal
        {
          $this->db->group_start();
          $this->db->like($item, $_POST['search']['value']);
        } else {
          $this->db->or_like($item, $_POST['search']['value']);
        }

        if (count($this->column_search) - 1 == $i)
          $this->db->group_end();
      }
      $i++;
    }

    if (isset($_POST['order'])) {
      $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    } else if (isset($this->order)) {
      $order = $this->order;
      $this->db->order_by(key($order), $order[key($order)]);
    }
  }

  function get_datatables()
  {
    $this->_get_datatables_query();
    if ($_POST['length'] != -1)
      $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }

  function count_filtered()
  {
    $this->_get_datatables_query();
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function count_all()
  {
    $this->db->from($this->table);
    return $this->db->count_all_results();
  }

  // select anggota keliilng where id
  public function get_data_anggota()
  {
    $id_anggota_keliling  = $this->uri->segment(3);
    $this->db->from($this->table);
    $this->db->where('id_anggota_keliling', $id_anggota_keliling);
    $query = $this->db->get();

    return $query->row();
  }
}
