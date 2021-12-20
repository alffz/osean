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
        $this->load->view('header');
        $this->load->view('sidebar');
        $this->load->view('admin/view_admin');
        $this->load->view('footer');
    }

    // user data
    public function user()
    {
        $data['user'] = $this->model_data_user->get_user();
        $this->load->view('header');
        $this->load->view('sidebar');
        $this->load->view('data/view_data_user', $data);
        $this->load->view('footer');
    }

    // edit user
    public function edit_user($id)
    {
        $data['user'] = $this->model_data_user->get_user_by_id();
        $this->load->view('header');
        $this->load->view('sidebar');
        $this->load->view('Admin/view_user_activ', $data);
        $this->load->view('footer');
    }
}
