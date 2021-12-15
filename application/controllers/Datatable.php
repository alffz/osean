<?php

class Datatable extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('data/model_nomor_rumah');
        $this->load->model('data/model_data_pelanggan');
        $this->load->model('data/model_data_anggota_keliling');
    }

    // data nomor rumah
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

    // data pelanggan
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

    // data anggota keliling
    public function get_anggota_keliling()
    {
        $list = $this->model_data_anggota_keliling->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama_anggota_keliling;
            $row[] = $field->nomor_hp;
            $row[] = $field->jumlah_gang;
            $row[] = $field->jumlah_langganan;
            $row[] = $field->gaji;
            $row[] = $field->is_anggota_keliling_active;
            // anchor
            $row[] = '<a class="btn btn-sm btn-primary" href="../edit/anggota_keliling/' . $field->id_anggota_keliling . '"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model_data_anggota_keliling->count_all(),
            "recordsFiltered" => $this->model_data_anggota_keliling->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
}
