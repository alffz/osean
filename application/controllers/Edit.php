<?php

    class Edit extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('edit/edit_anggota');
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
    }
