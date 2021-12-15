<?php

class Data extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('data/model_data_gang');
        $this->load->model('data/model_data_pelanggan');
        $this->load->model('data/model_nomor_rumah');
        $this->load->library('pagination');
    }
    // default page
    public function index()
    {
        redirect('data/gang');
    }

    public function gang()
    {
        $data['gang'] = $this->model_data_gang->list_gang();
        $this->load->view('header');
        $this->load->view('sidebar');
        $this->load->view('data/view_gang', $data);
        $this->load->view('footer');
    }

    // data pelanggan
    public function pelanggan()
    {
        $this->load->view('header');
        $this->load->view('sidebar');
        $this->load->view('data/view_pelanggan');
        $this->load->view('footer');
    }

    public function rumah()
    {
        $this->load->view('header');
        $this->load->view('sidebar');
        $this->load->view('data/view_nomor_rumah_copy');
        $this->load->view('footer');
    }

    // anggota keliling
    public function anggota()
    {
        $this->load->view('header');
        $this->load->view('sidebar');
        $this->load->view('data/view_anggota_keliling');
        $this->load->view('footer');
    }
}
