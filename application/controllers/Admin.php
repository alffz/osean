<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Admin extends CI_Controller {
        public function __construct() {
            parent::__construct();
        }

        public function index() {
            $this->load->view('header');
            $this->load->view('sidebar');
            $this->load->view('admin/view_admin');
            $this->load->view('footer');
        }
    }

