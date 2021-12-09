<?php

    class Data extends CI_Controller {

        public function __construct() {
            parent::__construct();  
            $this->load->model('data/model_data_gang');

        }

        public function gang() {
            $data['gang'] = $this->model_data_gang->list_gang();
            $this->load->view('header');
            $this->load->view('sidebar');
            $this->load->view('data/view_gang', $data);
            $this->load->view('footer');
        }
    }