<?php

class Datatable extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('data/model_nomor_rumah');
        $this->load->model('data/model_data_pelanggan');
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

    // pelanggan
    public function get_pelanggan()
    {
        $list = $this->model_data_pelanggan->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama_anggota_keliling;
            $row[] = $field->nama_gang;
            $row[] = $field->nama_pelanggan;
            $row[] = $field->nomor_rumah;
            $row[] = $field->nomor_hp;
            $row[] = $field->harga;
            $row[] = $field->jumlah_galon;
            $row[] = $field->jumlah_keluarga;
            $row[] = $field->status_rumah;
            // anchor
            $row[] = '<a class="btn btn-sm btn-primary" href="../edit/pelanggan/' . $field->id_pelanggan . '"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model_data_pelanggan->count_all(),
            "recordsFiltered" => $this->model_data_pelanggan->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
}
