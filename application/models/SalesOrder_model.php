<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SalesOrder_model extends CI_Model {

    protected $table       = 'sales_order';
    protected $table_detail = 'detail_order';

    // ── Header Order ──────────────────────────────────

    public function get_all() {
        $this->db->select('sales_order.*, users.nama as nama_sales, pelanggan.nama as nama_pelanggan');
        $this->db->from($this->table);
        $this->db->join('users',     'users.id = sales_order.id_sales');
        $this->db->join('pelanggan', 'pelanggan.id = sales_order.id_pelanggan');
        $this->db->order_by('sales_order.id', 'DESC');
        return $this->db->get()->result();
    }

    public function get_by_sales($id_sales) {
        $this->db->select('sales_order.*, users.nama as nama_sales, pelanggan.nama as nama_pelanggan');
        $this->db->from($this->table);
        $this->db->join('users',     'users.id = sales_order.id_sales');
        $this->db->join('pelanggan', 'pelanggan.id = sales_order.id_pelanggan');
        $this->db->where('sales_order.id_sales', $id_sales);
        $this->db->order_by('sales_order.id', 'DESC');
        return $this->db->get()->result();
    }

    public function get_by_id($id) {
        $this->db->select('sales_order.*, users.nama as nama_sales, pelanggan.nama as nama_pelanggan, pelanggan.alamat, pelanggan.no_telepon');
        $this->db->from($this->table);
        $this->db->join('users',     'users.id = sales_order.id_sales');
        $this->db->join('pelanggan', 'pelanggan.id = sales_order.id_pelanggan');
        $this->db->where('sales_order.id', $id);
        return $this->db->get()->row();
    }

    public function insert_order($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id(); // return id untuk insert detail
    }

    public function update_total($id, $total) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, ['total_harga' => $total]);
    }

    public function update_status($id, $status) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, ['status' => $status]);
    }

    // ── Detail Order ──────────────────────────────────

    public function get_detail($id_order) {
        $this->db->select('detail_order.*, produk.nama_produk, produk.kode_produk');
        $this->db->from($this->table_detail);
        $this->db->join('produk', 'produk.id = detail_order.id_produk');
        $this->db->where('detail_order.id_order', $id_order);
        return $this->db->get()->result();
    }

    public function insert_detail($data) {
        return $this->db->insert($this->table_detail, $data);
    }

    // ── Laporan ───────────────────────────────────────

    public function get_laporan($dari, $sampai) {
        $this->db->select('sales_order.*, users.nama as nama_sales, pelanggan.nama as nama_pelanggan');
        $this->db->from($this->table);
        $this->db->join('users',     'users.id = sales_order.id_sales');
        $this->db->join('pelanggan', 'pelanggan.id = sales_order.id_pelanggan');
        $this->db->where('sales_order.tanggal >=', $dari);
        $this->db->where('sales_order.tanggal <=', $sampai);
        $this->db->where('sales_order.status !=', 'dibatalkan');
        $this->db->order_by('sales_order.tanggal', 'ASC');
        return $this->db->get()->result();
    }

    public function get_laporan_per_sales($dari, $sampai) {
        $this->db->select('users.nama as nama_sales, COUNT(sales_order.id) as total_order, SUM(sales_order.total_harga) as total_penjualan');
        $this->db->from($this->table);
        $this->db->join('users', 'users.id = sales_order.id_sales');
        $this->db->where('sales_order.tanggal >=', $dari);
        $this->db->where('sales_order.tanggal <=', $sampai);
        $this->db->where('sales_order.status !=', 'dibatalkan');
        $this->db->group_by('sales_order.id_sales');
        return $this->db->get()->result();
    }

    public function get_laporan_per_produk($dari, $sampai) {
        $this->db->select('produk.nama_produk, SUM(detail_order.jumlah) as total_terjual, SUM(detail_order.subtotal) as total_pendapatan');
        $this->db->from($this->table_detail);
        $this->db->join('produk',      'produk.id = detail_order.id_produk');
        $this->db->join('sales_order', 'sales_order.id = detail_order.id_order');
        $this->db->where('sales_order.tanggal >=', $dari);
        $this->db->where('sales_order.tanggal <=', $sampai);
        $this->db->where('sales_order.status !=', 'dibatalkan');
        $this->db->group_by('detail_order.id_produk');
        $this->db->order_by('total_terjual', 'DESC');
        return $this->db->get()->result();
    }
}