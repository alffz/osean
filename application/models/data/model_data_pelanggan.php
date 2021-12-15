<?php

class model_data_pelanggan extends CI_Model
{

    var $table = 'pelanggan';
    var $column_order = array(null, 'nama_anggota_keliling', 'nama_gang', 'nama_pelanggan'); //field yang ada di table user
    var $column_search = array('nama_anggota_keliling', 'nama_gang', 'nama_pelanggan'); //field yang diizin untuk pencarian 
    var $order = array('urutan_gang' => 'asc'); // default order  

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

    public function pelanggan()
    {
        $id_pelanggan = $this->uri->segment(3);
        // join pelanggan dan gang nomor rumah
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('gang', 'pelanggan.id_gang = gang.id_gang');
        $this->db->join('anggota_keliling', 'pelanggan.id_anggota_keliling = anggota_keliling.id_anggota_keliling');
        $this->db->join('nomor_rumah', 'pelanggan.id_nomor_rumah = nomor_rumah.id_nomor_rumah');
        $this->db->where('id_pelanggan', $id_pelanggan);
        $query = $this->db->get();
        return $query->row();
    }
}
