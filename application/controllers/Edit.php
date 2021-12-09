<?php

    class Edit extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('edit/edit_anggota');
            $this->load->model('tambah/gang_model');
            $this->load->model('edit/model_edit_gang');
        }   

        public function anggota() {
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
                $this->load->view('edit/view_edit_anggota_keliling',$data);
                $this->load->view('footer');
            } else {
                $this->edit_anggota->update_data_anggota();
                redirect('anggota/');
            }
            
        }

        // edit gang
        public function gang() {
            // clean form
            $this->form_validation->set_rules('nama', 'Nama Gang', 'required');

            // form validation
            if ($this->form_validation->run() == FALSE) {
                $id_gang      = $this->uri->segment(3);
                $data['gang'] = $this->gang_model->get_gang_by_id($id_gang);
                $this->load->view('header');
                $this->load->view('sidebar');
                $this->load->view('edit/view_edit_gang',$data);
                $this->load->view('footer');
            } else {
                $this->model_edit_gang->update_gang();
                redirect('tambah/');
            }
        }
    }
