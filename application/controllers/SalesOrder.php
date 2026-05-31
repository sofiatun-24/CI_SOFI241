<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SalesOrder extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['SalesOrder_model', 'Produk_model', 'Pelanggan_model']);
        $this->load->library('session');
        $this->load->helper('url');

        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
        // Manager tidak bisa akses sales order
        if ($this->session->userdata('role') === 'manager') {
            redirect('laporan');
        }
    }

    public function index() {
        $role = $this->session->userdata('role');
        $id_sales = $this->session->userdata('id');

        if ($role === 'admin') {
            $data['orders'] = $this->SalesOrder_model->get_all();
        } else {
            // Sales hanya lihat order miliknya
            $data['orders'] = $this->SalesOrder_model->get_by_sales($id_sales);
        }

        $this->load->view('sales_order/index', $data);
    }

    public function tambah() {
        $data['pelanggan'] = $this->Pelanggan_model->get_all();
        $data['produk']    = $this->Produk_model->get_all();
        $this->load->view('sales_order/form', $data);
    }

    public function simpan() {
        // Generate nomor order otomatis
        $no_order = 'SO-' . date('Ymd') . '-' . rand(100, 999);
        $id_sales = $this->session->userdata('id');

        // Simpan header order
        $id_order = $this->SalesOrder_model->insert_order([
            'no_order'      => $no_order,
            'id_sales'      => $id_sales,
            'id_pelanggan'  => $this->input->post('id_pelanggan'),
            'tanggal'       => date('Y-m-d'),
            'total_harga'   => 0, // akan diupdate setelah detail
            'status'        => 'draft',
        ]);

        // Simpan detail order (bisa multi produk)
        $produk_ids = $this->input->post('produk_id');
        $jumlah_arr = $this->input->post('jumlah');
        $total      = 0;

        foreach ($produk_ids as $i => $id_produk) {
            $produk   = $this->Produk_model->get_by_id($id_produk);
            $jumlah   = $jumlah_arr[$i];
            $subtotal = $produk->harga * $jumlah;
            $total   += $subtotal;

            $this->SalesOrder_model->insert_detail([
                'id_order'     => $id_order,
                'id_produk'    => $id_produk,
                'jumlah'       => $jumlah,
                'harga_satuan' => $produk->harga,
                'subtotal'     => $subtotal,
            ]);

            // Kurangi stok produk
            $this->Produk_model->kurangi_stok($id_produk, $jumlah);
        }

        // Update total harga di header order
        $this->SalesOrder_model->update_total($id_order, $total);

        $this->session->set_flashdata('success', 'Order ' . $no_order . ' berhasil dibuat!');
        redirect('salesorder');
    }

    public function detail($id) {
        $data['order']  = $this->SalesOrder_model->get_by_id($id);
        $data['detail'] = $this->SalesOrder_model->get_detail($id);
        $this->load->view('sales_order/detail', $data);
    }

    public function update_status($id) {
        $status = $this->input->post('status');
        $this->SalesOrder_model->update_status($id, $status);
        $this->session->set_flashdata('success', 'Status order berhasil diubah!');
        redirect('salesorder/detail/' . $id);
    }
}