<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Test extends CI_Controller
{
    // constructor
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->load->view('view_test');
    }
}
