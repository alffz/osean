<?php

    class Data extends CI_Controller {

        public function __construct() {
            parent::__construct();  
            $this->load->model('data/model_data_gang');
            $this->load->model('data/model_data_pelanggan');
            $this->load->model('data/model_nomor_rumah');
            $this->load->library('pagination');

        }
        // default page
        public function index() {
            redirect('data/gang');
        }

        public function gang() {
            $data['gang'] = $this->model_data_gang->list_gang();
            $this->load->view('header');
            $this->load->view('sidebar');
            $this->load->view('data/view_gang', $data);
            $this->load->view('footer');
        }

        // data pelanggan
        public function pelanggan() {
            $data['pelanggan'] = $this->model_data_pelanggan->list_pelanggan();
            $this->load->view('header');
            $this->load->view('sidebar');
            $this->load->view('data/view_pelanggan', $data);
            $this->load->view('footer');
        }

        public function rumah() {
            $this->load->view('header');
            $this->load->view('sidebar');
            $this->load->view('data/view_nomor_rumah_copy');
            $this->load->view('footer');
        }

        function get_nomor_rumah() 
    {
        $list = $this->model_nomor_rumah->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nomor_rumah;
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model_nomor_rumah->count_all(),
            "recordsFiltered" => $this->model_nomor_rumah->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    }