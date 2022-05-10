<?php

defined('BASEPATH') OR exit('No direct script access allowed');

    class Daftar extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('model_daftar');
            $this->load->helper('security');
            $this->load->library('form_validation');
        }

        public function index()
        {   

            $this->form_validation->set_rules("nama","Nama","required",[
                'required'          => "Kolom nama wajib diisi"
            ]);
            $this->form_validation->set_rules('nomorhp','Nomor Hp','required',[
                'required'      => 'Kolom Nomor Hp wajib diisi',
            ]);
            $this->form_validation->set_rules('email','Email','required|is_unique[user.email]',[
                'required'      => 'Kolom email wajib diisi',
                'is_unique'     => 'Email ini sudah pernah didaftarkan '
            ]);
            $this->form_validation->set_rules("password","Password","required|min_length[8]",[
                'required'      => "Kolom Password wajib diisi",
                'min_length'   => "Password minimal 8 karakter"
            ]);
            $this->form_validation->set_rules("password1","Konfirmasi Password","required|matches[password]",[
                'required' => "Kolom Konfirmasi Password wajib diisi",
                'matches'   => "isi Konfirmasi Password tidak sesuai"
            ]);
            
            
            // jika dadftar gagal kembalikan ke halaman ini
            if($this->form_validation->run() == false)
            {
                $this->load->view("view_daftar");
            }
            else{
                $this->model_daftar->daftar();
                echo"<script> alert('berhasil daftar') </script>";
                redirect('daftar');
            }
            
        }
    }