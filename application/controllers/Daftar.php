<?php

defined('BASEPATH') OR exit('No direct script access allowed');

    class Daftar extends CI_Controller {

        public function __construct() {
            parent::__construct();
            // $this->load->model('Register_model');
            $this->load->library('form_validation');
        }

        public function index() {
            $this->load->view('view_daftar');
        }
    }