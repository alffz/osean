<?php

    class Datatable extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('data/model_nomor_rumah');
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