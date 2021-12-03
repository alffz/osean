<?php

defined('BASEPATH') OR exit('No direct script access allowed');

    class Tambah extends CI_Controller {

        public function __construct() {
            parent::__construct();
            // $this->load->model('Tambah_model');
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