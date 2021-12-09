<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('tambah/anggota_keliling');
        $this->load->model('tambah/gang_model');
        $this->load->model('anggota/anggota_Model');
        // form validation
        $this->load->library('form_validation');
    }
    

    // add anggota keluarga 
    public function anggota() {
        // form validation
        
        $this->form_validation->set_rules("nama","Nama","required",[
            'required'          => "Kolom nama wajib diisi"
        ]);
        $this->form_validation->set_rules("nomorhp","Nomor Hp","required",[
            'required'          => "Kolom nama wajib diisi"
        ]);
        $this->form_validation->set_rules("gang","Gang","required",[
            'required'          => "Kolom nama wajib diisi"
        ]);
        $this->form_validation->set_rules("langganan","Langgangn","required",[
            'required'          => "Kolom nama wajib diisi"
        ]);
        $this->form_validation->set_rules("gaji","Gaji","required",[
            'required'          => "Kolom nama wajib diisi"
        ]);

        if($this->form_validation->run() == FALSE){
        // load view
        $this->load->view('header');
        $this->load->view('sidebar');
        $this->load->view('tambah/view_tambah_anggota_keliling');
        $this->load->view('footer');
        }else{
            $this->anggota_keliling->insert_anggota();
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>');
            redirect('tambah/anggota');
        }
    }
    // tambah gang
    public function index() {
        // form validation
        $this->form_validation->set_rules("anggota","gang","required",[
            'required'          => "Kolom nama wajib diisi"
        ]);
        $this->form_validation->set_rules("nama","Nama","required",[
            'required'          => "Kolom nama wajib diisi"
        ]);
        if($this->form_validation->run() == FALSE){
            $data['anggota'] = $this->anggota_Model->get_data_anggota();
            $data['gang'] = $this->gang_model->get_gang();
            $this->load->view('header');
            $this->load->view('sidebar');
            $this->load->view('tambah/view_tambah_gang.php',$data);
            $this->load->view('footer');
        }else{
            $this->gang_model->tambah_gang();
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>');
            redirect('tambah/index');
        }
    }
    
    // tambah pelanggan
    public function pelanggan() {
        $this->load->view('header');
        $this->load->view('sidebar');
        $this->load->view('tambah/view_tambah_pelanggan.php');
        $this->load->view('footer');
    }
}