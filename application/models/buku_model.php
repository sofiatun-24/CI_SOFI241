<?php
// application/models/Buku_model.php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model {

    protected $table    = 'buku';
    protected $pk       = 'kode_buku';
    protected $kategori = 'kategori';

    public function get_all()
    {
        // JOIN ke tabel kategori agar nama_kategori tersedia di view
        return $this->db
                    ->select('buku.*, kategori.nama_kategori')
                    ->from($this->table)
                    ->join('kategori', 'kategori.id = buku.kategori', 'left')
                    ->get()
                    ->result();
    }

    public function get_by_id($kode_buku)
    {
        return $this->db
                    ->where($this->pk, $kode_buku)
                    ->get($this->table)
                    ->row();
    }

    public function get_kategori()
    {
        return $this->db->get($this->kategori)->result();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($kode_buku, $data)
    {
        return $this->db
                    ->where($this->pk, $kode_buku)
                    ->update($this->table, $data);
    }

    public function delete($kode_buku)
    {
        return $this->db
                    ->where($this->pk, $kode_buku)
                    ->delete($this->table);
    }
}