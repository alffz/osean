<?php

// create transaction
class transaksi extends CI_Controller
{
  // constru
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('transaksi/model_transaski');
    $this->load->model('transaksi/model_trip');
    $this->load->model('transaksi/model_penjualan');
    $this->load->model('data/model_data_anggota_keliling');
    $this->load->model('data/model_data_pelanggan');
  }
  // buat element transaksi berapa orang
  public function element()
  {
    $data   = [
      'user_loged' => $this->model_data_user->get_user_by_session(),
      'anggota'    => $this->model_data_anggota_keliling->get_all_data_anggota(),
      // 'pelanggan'  => $this->model_data_pelanggan->list_pelanggan(),
    ];
    $this->load->view('header');
    $this->load->view('sidebar', $data);
    $this->load->view('transaksi/view_element_transaksi', $data);
    $this->load->view('footer');
  }
  public function index()
  {
    $this->form_validation->set_rules('id_gang', 'ID Gang', 'required');
    $this->form_validation->set_rules('id_pelanggan', 'ID Pelanggan', 'required');
    $this->form_validation->set_rules('id_nomor_rumah', 'ID Nomor Rumah', 'required');
    $this->form_validation->set_rules('tanggal_transaksi', 'Tanggal Transaksi', 'required');
    $this->form_validation->set_rules('jumlah_transaksi', 'Jumlah Transaksi', 'required');
    $this->form_validation->set_rules('keterangan_transaksi', 'Keterangan Transaksi', 'required');
    $this->form_validation->set_rules('status_transaksi', 'Status Transaksi', 'required');

    if ($this->form_validation->run() == FALSE) {
      $data   = [
        'user_loged' => $this->model_data_user->get_user_by_session(),
        'anggota'    => $this->model_data_anggota_keliling->get_all_data_anggota(),
        'pelanggan'  => $this->model_data_pelanggan->get_all_pelanggan(),
        // 'pelanggan'  => $this->model_data_pelanggan->list_pelanggan(),
      ];
      $this->load->view('header');
      $this->load->view('sidebar', $data);
      $this->load->view('transaksi/view_transaksi', $data);
      $this->load->view('footer');
    } else {
      $data = [
        'id_gang' => $this->input->post('id_gang'),
        'id_pelanggan' => $this->input->post('id_pelanggan'),
        'id_nomor_rumah' => $this->input->post('id_nomor_rumah'),
      ];
    }
  }


  // trip
  public function trip()
  {
    $data   = [
      'user_loged' => $this->model_data_user->get_user_by_session(),
      'anggota'    => $this->model_data_anggota_keliling->get_all_data_anggota(),
      'pelanggan'  => $this->model_data_pelanggan->get_all_pelanggan(),
    ];
    $this->load->view('header');
    $this->load->view('sidebar', $data);
    $this->load->view('transaksi/view_trip', $data);
    $this->load->view('footer');
  }

  // preview trip
  public function keranjang_trip()
  {
    $data   = [
      'user_loged' => $this->model_data_user->get_user_by_session(),
      'anggota'    => $this->model_data_anggota_keliling->get_all_data_anggota(),
      'pelanggan'  => $this->model_data_pelanggan->get_all_pelanggan(),
    ];
    $this->load->view('header');
    $this->load->view('sidebar', $data);
    $this->load->view('transaksi/view_keranjang_trip', $data);
    $this->load->view('footer');
  }

  function create_trip()
  {

    $id_pelanggan   = $this->input->post('data');
    $jumlah         = $this->input->post('jum');
    $pelanggan = $this->model_data_pelanggan->get_pelanggan_by_id($id_pelanggan);

    $data = array(
      'id'      => $pelanggan->id_pelanggan,
      'qty'     => 1,
      'price'   => $pelanggan->harga,
      'name'    => $pelanggan->nama_pelanggan,
      'options' => array('Size' => 'L', 'Color' => 'Red')
    );
    $this->cart->insert($data);
    redirect('transaksi');
  }

  // pembayaran
  public function pembayaran()
  {
    $data   = [
      'user_loged' => $this->model_data_user->get_user_by_session(),
      'anggota'    => $this->model_data_anggota_keliling->get_all_data_anggota(),
      'pelanggan'  => $this->model_data_pelanggan->get_all_pelanggan(),
    ];
    $this->load->view('header');
    $this->load->view('sidebar', $data);
    $this->load->view('transaksi/view_pembayaran', $data);
    $this->load->view('footer');
  }

  // penjualan
  public function penjualan()
  {
    $id_pelanggan  = $this->uri->segment(3);
    $this->form_validation->set_rules('trip', 'Trip', 'required', true);
    $this->form_validation->set_rules('id_anggota', 'Anggota keliling', 'required', true);
    $this->form_validation->set_rules('jumlah_galon', 'Jumlah Galon', 'required', true);
    $this->form_validation->set_rules('bayar', 'Bayar', true);
    $this->form_validation->set_rules('hutang', 'Hutang', true);
    $this->form_validation->set_rules('bayar_kupon', 'Bayar Kupon', true);
    $this->form_validation->set_rules('catatan', 'Catatan', true);
    if ($this->form_validation->run() == false) {
      $data   = [
        'user_loged' => $this->model_data_user->get_user_by_session(),
        'anggota'    => $this->model_data_anggota_keliling->get_all_data_anggota(),
        'pelanggan'  => $this->model_data_pelanggan->get_pelanggan_by_id($id_pelanggan),
      ];
      $this->load->view('header');
      $this->load->view('sidebar', $data);
      $this->load->view('transaksi/view_penjualan', $data);
      $this->load->view('footer');
    } else {
      $this->model_penjualan->insert_penjualan();
      redirect('transaksi');
    }
  }
}
