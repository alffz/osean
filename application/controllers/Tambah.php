<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tambah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('tambah/model_tambah_anggota_keliling');
        $this->load->model('tambah/gang_model');
        $this->load->model('tambah/model_tambah_pelanggan');
        $this->load->model('tambah/model_tambah_no_rumah');
        $this->load->model('tambah/model_tambah_hadiah');
        $this->load->model('anggota/anggota_Model');
        $this->load->model('data/model_data_gang');
        $this->load->model('data/model_nomor_rumah');
        // form validation
        $this->load->library('form_validation');
    }
    // default function
    public function index()
    {
        redirect('tambah/gang');
    }

    // add anggota keluarga 
    public function anggota()
    {
        // form validation
        $this->form_validation->set_rules("nama", "Nama", "required", [
            'required'          => "Kolom nama wajib diisi"
        ]);
        $this->form_validation->set_rules("nomorhp", "Nomor Hp", "required", [
            'required'          => "Kolom nama wajib diisi"
        ]);
        $this->form_validation->set_rules("gang", "Gang", "required", [
            'required'          => "Kolom nama wajib diisi"
        ]);
        $this->form_validation->set_rules("langganan", "Langgangn", "required", [
            'required'          => "Kolom nama wajib diisi"
        ]);
        $this->form_validation->set_rules("gaji", "Gaji", "required", [
            'required'          => "Kolom nama wajib diisi"
        ]);
        $data = [
            'user_loged' => $this->model_data_user->get_user_by_session(),
        ];
        if ($this->form_validation->run() == FALSE) {
            // load view
            $this->load->view('header');
            $this->load->view('sidebar', $data);
            $this->load->view('tambah/view_tambah_anggota_keliling');
            $this->load->view('footer');
        } else {
            $this->model_tambah_anggota_keliling->insert_anggota();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>');
            redirect('tambah/anggota');
        }
    }
    // tambah gang
    public function gang()
    {
        // form validation
        $this->form_validation->set_rules("nama", "Nama", "required", [
            'required'          => "Kolom nama wajib diisi"
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'user_loged' => $this->model_data_user->get_user_by_session(),
                'anggota'    => $this->anggota_Model->get_data_anggota(),
                'gang'       => $this->gang_model->get_gang(),
            ];
            $this->load->view('header');
            $this->load->view('sidebar', $data);
            $this->load->view('tambah/view_tambah_gang.php', $data);
            $this->load->view('footer');
        } else {
            $this->gang_model->tambah_gang();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>');
            redirect('tambah/index');
        }
    }
    // tambah nomor rumah
    public function nomor_rumah()
    {
        // form validation
        $this->form_validation->set_rules("nomorRumah", "Nomor Rumah", "required", [
            'required'          => "Kolom nama wajib diisi"
        ]);
        $data = [
            'user_loged' => $this->model_data_user->get_user_by_session(),
        ];
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('sidebar', $data);
            $this->load->view('tambah/view_tambah_nomor_rumah.php');
            $this->load->view('footer');
        } else {
            $this->model_tambah_no_rumah->insert();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>');
            redirect('tambah/nomor_rumah');
        }
    }

    // tambah pelanggan
    public function pelanggan()
    {
        $this->form_validation->set_rules("anggota", "Anggota Keliling", "required", [
            'required'          => "Kolom Anggota keliling wajib diisi"
        ]);
        $this->form_validation->set_rules("nama_pelanggan", "Nama Pelanggan", "required", [
            'required'          => "Kolom Nama Pelanggan wajib diisi"
        ]);
        $this->form_validation->set_rules("nomor_rumah", "Nomor Rumah", "required", [
            'required'          => "Kolom Nomor Rumah wajib diisi"
        ]);
        $this->form_validation->set_rules("nomor_hp", "Nomor Hp", "required", [
            'required'          => "Kolom Nomor Hp wajib diisi"
        ]);
        $this->form_validation->set_rules("gang", "Gang", "required", [
            'required'          => "Kolom Gang wajib diisi"
        ]);
        $this->form_validation->set_rules("harga", "Harga", "required", [
            'required'          => "Kolom Harga wajib diisi"
        ]);
        $this->form_validation->set_rules("galon", "Galon", "required", [
            'required'          => "Kolom Galon wajib diisi"
        ]);
        $this->form_validation->set_rules("anggota_keluarga", "Anggota Keluarga", "required", [
            'required'          => "Kolom Anggota Keluarga wajib diisi"
        ]);
        $this->form_validation->set_rules("status_rumah", "Status rumah", "required", [
            'required'          => "Kolom Status rumah wajib diisi"
        ]);
        $data   = [
            'anggota'           => $this->anggota_Model->get_data_anggota(),
            'gang'              => $this->model_data_gang->list_gang(),
            'nomor_rumah'       => $this->model_nomor_rumah->nomor_rumah(),
            'user_loged'        => $this->model_data_user->get_user_by_session(),
        ];
        // run
        if ($this->form_validation->run() == false) {
            $this->load->view('header');
            $this->load->view('sidebar', $data);
            $this->load->view('tambah/view_tambah_pelanggan.php', $data);
            $this->load->view('footer');
        } else {
            $this->model_tambah_pelanggan->insert_pelanggan();
            echo 'berhasil';
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>');
            redirect('tambah/pelanggan');
        }
    }

    // tambah nomor rumah
    public function hadiah()
    {
        // form validation
        $this->form_validation->set_rules("hadiah", "Nama hadiah", "required", [
            'required'          => "Kolom nama wajib diisi"
        ]);
        $this->form_validation->set_rules("jumlah_kupon", "Jumlah kupon", "required", [
            'required'          => "Kolom jumlah kupon wajib diisi"
        ]);
        $data = [
            'user_loged' => $this->model_data_user->get_user_by_session(),
        ];
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('sidebar', $data);
            $this->load->view('tambah/view_tambah_hadiah.php');
            $this->load->view('footer');
        } else {
            $this->model_tambah_hadiah->insert();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>');
            redirect('data/hadiah');
        }
    }
}
