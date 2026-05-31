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
        // Hanya admin dan manager
        $role = $this->session->userdata('role');
        if ($role === 'sales') {
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

        $data['laporan'] = $this->SalesOrder_model->get_laporan($dari, $sampai);
        $data['dari']    = $dari;
        $data['sampai']  = $sampai;

        // Load view laporan sebagai HTML, lalu convert ke PDF
        $html = $this->load->view('laporan/pdf', $data, TRUE);

        // Gunakan library DOMPDF atau TCPDF di sini
        // Contoh pakai output HTML dulu (bisa dikembangkan)
        $this->load->helper('file');
        write_file(FCPATH . 'laporan_temp.html', $html);

        $this->session->set_flashdata('info', 'Export PDF akan dikembangkan dengan library TCPDF.');
        redirect('laporan');
    }
}