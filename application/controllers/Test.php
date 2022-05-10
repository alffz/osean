<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Test extends CI_Controller
{
    // constructor
    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('model_test');
        $this->load->model('data/model_data_pelanggan');
    }
    public function index()
    {
        $data   = [
            'user_loged' => $this->model_data_user->get_user_by_session(),
            'pelanggan'  => $this->model_data_pelanggan->get_all_pelanggan(),
        ];
        $this->load->view('header');
        $this->load->view('sidebar', $data);
        $this->load->view('view_test', $data);
        $this->load->view('footer');
    }

    // add to cart
    public function add_cart()
    {
        $id_pelanggan   = $this->input->post('tambah');
        $barang   = $this->model_data_pelanggan->get_pelanggan_by_id($id_pelanggan);
        $data = array(
            'id_pelanggan'  => $barang->id_pelanggan,
            'qty'           => $this->input->post('jumlah'),
            'price'         => $barang->harga,
            'name'          => $barang->nama_pelanggan,
        );

        $this->cart->insert($data);
        redirect('test');
    }
}
