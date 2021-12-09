<?php
    
    class Edit_anggota extends CI_Model {
        
        function __construct() {
            parent::__construct();
        }        
       
        // get data by id
        function get_anggota_by_id($id) {
            $id_anggota = $id;
            $this->db->where('id_anggota_keliling', $id_anggota);
            $query = $this->db->get('anggota_keliling');
            return $query->row();
        }
        function update_data_anggota() {
            $id_anggota = $this->uri->segment(3);
            $decode_id_anggota = base64_decode($id_anggota);
            $data = array(
                'nama_anggota_keliling' => $this->input->post('nama'),
                'nomor_hp' => $this->input->post('nomorhp'),
                'jumlah_gang' => $this->input->post('gang'),
                'jumlah_langganan' => $this->input->post('langganan'),
                'gaji'  => $this->input->post('gaji'),
                'is_anggota_keliling_active' => $this->input->post('status'),
            );
            $this->db->where('id_anggota_keliling', $decode_id_anggota);
            $this->db->update('anggota_keliling', $data);
        }
        
    }