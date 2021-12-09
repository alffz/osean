<?php

    class model_tambah_pelanggan extends CI_Model {

        
        public function insert_pelanggan() {
            // add a new item
            $data = array(
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
        }

