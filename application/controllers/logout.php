<?php

class logout extends CI_Controller
{


  public function index()
  {
    // Validasi
    session_unset();
    $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">
            anda telah logout
          </div>');
    redirect('login');
  }
}
