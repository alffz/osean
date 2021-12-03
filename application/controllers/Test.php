<?php
    // define('BASEPATH', 'application/controllers/');

    class Test extends CI_Controller {
        public function index() {
            $this->load->view('header');
            $this->load->view('sidebar');
            $this->load->view('view_test');
            $this->load->view('footer');
        }
    }

?>