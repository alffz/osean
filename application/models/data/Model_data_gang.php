<?php

class model_data_gang extends CI_Model
{
    // get all gangs
    public function list_gang()
    {
        $query = $this->db->get('gang');
        return $query->result();
    }
}
