<?php

    class Anggota extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('anggota/anggota_model');
            $this->load->library('form_validation');
            $this->load->library('pagination');
        }

    // show data with pagination
        public function index() {

            // get data from model
            $data['anggota'] = $this->anggota_model->get_data_anggota();
            $this->load->view('header');
            $this->load->view('sidebar');
            $this->load->view('anggota/view_anggota',$data);
            $this->load->view('footer');
        }
    }