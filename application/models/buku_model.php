<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class buku_model extends CI_Model{

    private $table = 'buku';

    public function get_all()
{
    $this->db->select('buku.*, kategori.nama_kategori');
    $this->db->from('buku');
    $this->db->join('kategori', 'kategori.id = buku.kategori');
    return $this->db->get()->result();
}
    public function get_by_id($id)
    {
        $this->db->where('kode_buku',$id);
        return $this->db->get('buku')->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }
    public function delete($id)
    {
        return $this->db->delete($this->table,['kode_buku'=>$id]);
    }
    public function is_used($id)
    {
        return $this->db->where('kode_buku',$id)->count_all_results('buku')>0;
    }
    public function update($id,$data)
    {
        $this->db->where('kode_buku',$id);
        return $this->db->update($this->table,$data);
    }
    
}