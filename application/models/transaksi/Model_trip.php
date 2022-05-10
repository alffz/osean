<?php

class model_trip extends CI_Model
{

  function tambah_trip($data)
  {
    $id_pelanggan   = $data;
    $data = array(
      'id_pelanggan'      => $id_pelanggan,
      'qty'     => 1,
      'price'   => 39.95,
      'name'    => 'T-Shirt',
      'options' => array('Size' => 'L', 'Color' => 'Red')
    );

    $this->cart->insert($data);
  }
}
