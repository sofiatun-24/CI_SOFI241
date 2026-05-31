<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Model ini sebagai alias/helper,
// query utama laporan ada di SalesOrder_model
class Laporan_model extends CI_Model {

    public function rekap_bulanan($tahun) {
        $sql = "SELECT 
                    MONTH(tanggal) as bulan,
                    COUNT(id)      as total_order,
                    SUM(total_harga) as total_penjualan
                FROM sales_order
                WHERE YEAR(tanggal) = ?
                AND status != 'dibatalkan'
                GROUP BY MONTH(tanggal)
                ORDER BY bulan ASC";
        return $this->db->query($sql, [$tahun])->result();
    }
}