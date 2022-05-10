<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('data/model_data_user');
        $this->load->library('form_validation');
    }

    // loop user and activation for admin
    public function index()
    {
        $data   = [
            'user_loged' => $this->model_data_user->get_user_by_session(),
        ];
        $this->load->view('header');
        $this->load->view('sidebar', $data);
        $this->load->view('Admin/view_admin', $data);
        $this->load->view('footer');
    }

    // user data
    public function user()
    {
        $data   = [
            'user_loged' => $this->model_data_user->get_user_by_session(),
            'user'       => $this->model_data_user->get_user(),
        ];
        $this->load->view('header');
        $this->load->view('sidebar', $data);
        $this->load->view('data/view_data_user', $data);
        $this->load->view('footer');
    }

    // edit user
    public function edit_user($id)
    {

        $this->form_validation->set_rules('userActive', 'Aktifasi', 'required', [
            'required'      => 'Kolom Aktifasi user wajib diisi',
        ]);
        $data   = [
            'user_loged' => $this->model_data_user->get_user_by_session(),
            'user'       => $this->model_data_user->get_user_by_id(),
        ];
        if ($this->form_validation->run() == false) {
            $this->load->view('header');
            $this->load->view('sidebar', $data);
            $this->load->view('Admin/view_user_activ', $data);
            $this->load->view('footer');
        } else {
            $this->model_data_user->edit_user();
            redirect('admin/user');
        }
    }
}
