<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_model extends CI_Model {

    protected $table = 'anggota';
    protected $pk    = 'nomor_anggota';

    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, [$this->pk => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db->update($this->table, $data, [$this->pk => $id]);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, [$this->pk => $id]);
    }
}