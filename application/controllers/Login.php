<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_login');
    }

    public function index() {
        $this->load->view('view_login');
    }

    public function login() {
        $this->form_validation->set_rules('username', 'Username', 'required');
    }
}

?>