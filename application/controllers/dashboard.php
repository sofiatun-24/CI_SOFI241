<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');

        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $role = $this->session->userdata('role');

        $data['role'] = $role;
        $data['nama'] = $this->session->userdata('nama');

        // Stat cards untuk admin
        if ($role == 'admin') {
            $this->load->model(['SalesOrder_model', 'Produk_model', 'Pelanggan_model']);

            $data['total_order']    = count($this->SalesOrder_model->get_all());
            $data['order_selesai']  = $this->db->where('status', 'selesai')->count_all_results('sales_order');
            $data['total_produk']   = $this->db->count_all('produk');
            $data['total_pelanggan']= $this->db->count_all('pelanggan');
        }

        $this->load->view('dashboard/index', $data);
    }
}