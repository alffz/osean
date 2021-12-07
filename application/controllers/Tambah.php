<?php

defined('BASEPATH') OR exit('No direct script access allowed');

    class Tambah extends CI_Controller {

        public function __construct() {
            parent::__construct();
            // $this->load->model('Tambah_model');
            // form validation
            $this->load->library('form_validation');
        }

        // add anggota keluarga 
        public function anggota() {
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        }
        // tambah gang
        public function index() {
            $this->load->view('header');
            $this->load->view('sidebar');
            $this->load->view('tambah/view_tambah_gang.php');
            $this->load->view('footer');
        }
        
        // tambah pelanggan
        public function pelanggan() {
            $this->load->view('header');
            $this->load->view('sidebar');
            $this->load->view('tambah/view_tambah_pelanggan.php');
            $this->load->view('footer');
        }
    }