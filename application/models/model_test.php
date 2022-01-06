<?php
class model_test extends CI_Model
{
    public function getTest()
    {
        $sql = "SELECT * FROM test";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // insert to cart codeigniter
    public function insert_cart($id)
    {
        $id_pelanggan   = $id;
        $data = array(
            'id_pelanggan'      => $id_pelanggan,
            'qty'     => 1,
            'price'   => 39.95,
            'name'    => 'T-Shirt',
        );

        $this->cart->insert($data);
    }
}
