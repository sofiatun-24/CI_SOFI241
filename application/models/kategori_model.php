<?php
defined('BASEPATH') OR exit('No direct script acces allowed');

class Kategori_model extends CI_Model{

    private $table ='Kategori';

    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }
    public function delete($id)
    {
        return $this->db->delete($this->table,['id'=>$id]);
    }
    public function is_used($id)
    {
        return $this->db->where('id',$id)->count_all_results ('buku')>0;
    }
}