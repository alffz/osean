<?php

class Edit extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('edit/edit_anggota');
        $this->load->model('edit/model_edit_pelanggan');
        $this->load->model('tambah/gang_model');
        $this->load->model('edit/model_edit_gang');
        $this->load->model('anggota/anggota_Model');
        $this->load->model('data/model_data_gang');
        $this->load->model('data/model_nomor_rumah');
        $this->load->model('data/model_data_pelanggan');
    }

    public function anggota()
    {
        // clean form
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nomorhp', 'Nomor Hp', 'required');
        $this->form_validation->set_rules('gang', 'Gang', 'required');
        $this->form_validation->set_rules('langganan', 'Langganan', 'required');
        $this->form_validation->set_rules('gaji', 'Gaji', 'required');

        // form validation
        if ($this->form_validation->run() == FALSE) {
            $id     = $this->uri->segment(3);
            $id_anggota = base64_decode($id);
            $data['anggota'] = $this->edit_anggota->get_anggota_by_id($id_anggota);
            $this->load->view('header');
            $this->load->view('sidebar');
            $this->load->view('edit/view_edit_anggota_keliling', $data);
            $this->load->view('footer');
        } else {
            $this->edit_anggota->update_data_anggota();
            redirect('anggota/');
        }
    }

    // edit gang
    public function gang()
    {
        // clean form
        $this->form_validation->set_rules('nama', 'Nama Gang', 'required');

        // form validation
        if ($this->form_validation->run() == FALSE) {
            $id_gang      = $this->uri->segment(3);
            $data['gang'] = $this->gang_model->get_gang_by_id($id_gang);
            $this->load->view('header');
            $this->load->view('sidebar');
            $this->load->view('edit/view_edit_gang', $data);
            $this->load->view('footer');
        } else {
            $this->model_edit_gang->update_gang();
            redirect('data/');
        }
    }

    // edit pelanggan
    public function pelanggan()
    {
        // clean form
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
            'pelanggan'         => $this->model_data_pelanggan->pelanggan(),
        ];
        // form validation
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('sidebar');
            $this->load->view('edit/view_edit_pelanggan', $data);
            $this->load->view('footer');
        } else {
            $this->model_edit_pelanggan->update_pelanggan();
            redirect('data/pelanggan');
        }
    }
}
