<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('session');

        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $role = $this->session->userdata('role');

        $data['role'] = $role;
        $data['nama'] = $this->session->userdata('nama');

        // Default value
        $data['total_order']      = 0;
        $data['order_selesai']    = 0;
        $data['total_produk']     = 0;
        $data['total_pelanggan']  = 0;

        $data['draft']            = 0;
        $data['dikirim']          = 0;
        $data['selesai']          = 0;
        $data['dibatalkan']       = 0;

        if ($role == 'admin')
        {
            $this->load->model([
                'SalesOrder_model',
                'Produk_model',
                'Pelanggan_model'
            ]);

            // Statistik Dashboard
            $data['total_order'] =
                $this->db->count_all('sales_order');

            $data['order_selesai'] =
                $this->db
                    ->where('status', 'selesai')
                    ->count_all_results('sales_order');

            $data['total_produk'] =
                $this->db->count_all('produk');

            $data['total_pelanggan'] =
                $this->db->count_all('pelanggan');

            // Data grafik status order
            $data['draft'] =
                $this->db
                    ->where('status', 'draft')
                    ->count_all_results('sales_order');

            $data['dikirim'] =
                $this->db
                    ->where('status', 'dikirim')
                    ->count_all_results('sales_order');

            $data['selesai'] =
                $this->db
                    ->where('status', 'selesai')
                    ->count_all_results('sales_order');

            $data['dibatalkan'] =
                $this->db
                    ->where('status', 'dibatalkan')
                    ->count_all_results('sales_order');
        }

        $this->load->view('dashboard/index', $data);
    }
}