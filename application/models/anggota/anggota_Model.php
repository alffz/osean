<?php

class anggota_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    // get data anggota
    public function get_data_anggota()
    {
        $query = $this->db->get('anggota_keliling');
        return $query->result();
    }
}
