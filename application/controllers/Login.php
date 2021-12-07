<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('model_login');
    }

    public function index() {
        // Validasi
        $this->form_validation->set_rules('email', 'Email', 'required', [
            'required' => 'Email harus diisi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Password harus diisi!'
        ]);
        if($this->form_validation->run() == FALSE) {
            $this->load->view('view_login');
        } else {
            $this->_login();
        }
    }

    public function _login() {
        $email = $this->input->post('email',true);
        $password = $this->input->post('password',true);
        // cari user berdasarkan email
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if($user) {
            if($password == $user['password']) {
                $data = [
                    'email'          => $user['email'],
                    'is_user_active' => $user['is_user_active'],
                    'role_id'        => $user['role_id'],
                ];
                $this->session->set_userdata($data);
            } // kalok salah ??
            else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email atau Password salah!</div>');
                redirect('login');
            }

            if($user['is_user_active'] == 0) {
                redirect('tunggu');
            }
                
        }
        else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email atau password salah!</div>');
            redirect('login');
        }

        // cek role_id 
        if($user['role_id'] == 1) {
            redirect('admin');
        } else {
            redirect('manajer');
        }
            
        } 


}

?>