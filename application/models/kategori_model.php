<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class kategori_model extends CI_Model{

    private$table ='kategori';

    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }
}