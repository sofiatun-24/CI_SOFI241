<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('SalesOrder_model');
        $this->load->library('session');
        $this->load->helper('url');

        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
        if ($this->session->userdata('role') === 'sales') {
            redirect('salesorder');
        }
    }

    public function index() {
        $dari   = $this->input->get('dari')   ?? date('Y-m-01');
        $sampai = $this->input->get('sampai') ?? date('Y-m-d');

        $data['laporan'] = $this->SalesOrder_model->get_laporan($dari, $sampai);
        $data['dari']    = $dari;
        $data['sampai']  = $sampai;

        $this->load->view('laporan/index', $data);
    }

    public function export_pdf() {
        $dari   = $this->input->get('dari')   ?? date('Y-m-01');
        $sampai = $this->input->get('sampai') ?? date('Y-m-d');

        $laporan = $this->SalesOrder_model->get_laporan($dari, $sampai);

        $grand_total = 0;
        foreach ($laporan as $l) {
            $grand_total += $l->total_harga;
        }

        $data['laporan']     = $laporan;
        $data['dari']        = $dari;
        $data['sampai']      = $sampai;
        $data['grand_total'] = $grand_total;

        // Load view cetak — otomatis window.print()
        $this->load->view('laporan/pdf', $data);
    }
}