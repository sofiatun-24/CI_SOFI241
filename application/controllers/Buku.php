<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('url','form'));

        // cek login
        if (!$this->session->userdata('login')) {
            redirect('login');
        }

        $this->load->model('buku_model');
        $this->load->model('kategori_model');
    }

    // =========================
    // TAMPIL DATA
    // =========================
    public function index()
    {
        $data['buku'] = $this->buku_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('buku/index', $data);
        $this->load->view('templates/footer');
    }

    // =========================
    // FORM TAMBAH
    // =========================
    public function tambah_buku()
    {
        $data['kategori'] = $this->kategori_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('buku/tambah_buku', $data);
        $this->load->view('templates/footer');
    }

    // =========================
    // SIMPAN DATA
    // =========================
    public function simpan()
    {
        $this->form_validation->set_rules(
            'kode_buku',
            'Kode Buku',
            'required'
        );

        $this->form_validation->set_rules(
            'judul',
            'Judul',
            'required'
        );

        $this->form_validation->set_rules(
            'penulis',
            'Penulis',
            'required'
        );

        $this->form_validation->set_rules(
            'penerbit',
            'Penerbit',
            'required'
        );

        $this->form_validation->set_rules(
            'tahun',
            'Tahun',
            'required'
        );

        $this->form_validation->set_rules(
            'kategori',
            'Kategori',
            'required'
        );

        $this->form_validation->set_rules(
            'stok',
            'Stok',
            'required|integer'
        );

        $this->form_validation->set_rules(
            'lokasi_rak',
            'Lokasi Rak',
            'required'
        );

        if ($this->form_validation->run() == FALSE) {

            $data['kategori'] = $this->kategori_model->get_all();

            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('buku/tambah_buku', $data);
            $this->load->view('templates/footer');

        } else {

            $data = array(

                'kode_buku'  => $this->input->post('kode_buku'),
                'judul'      => $this->input->post('judul'),
                'penulis'    => $this->input->post('penulis'),
                'penerbit'   => $this->input->post('penerbit'),
                'tahun'      => $this->input->post('tahun'),
                'kategori'   => $this->input->post('kategori'),
                'stok'       => $this->input->post('stok'),
                'lokasi_rak' => $this->input->post('lokasi_rak')

            );

            $this->buku_model->insert($data);

            $this->session->set_flashdata(
                'success',
                'Buku berhasil ditambahkan!'
            );

            redirect('buku');
        }
    }

    // =========================
    // FORM EDIT
    // =========================
    public function edit_buku($kode_buku)
    {
        $data['buku'] = $this->buku_model->get_by_kode($kode_buku);

        $data['kategori'] = $this->kategori_model->get_all();

        if (!$data['buku']) {

            $this->session->set_flashdata(
                'error',
                'Data tidak ditemukan!'
            );

            redirect('buku');
        }

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('buku/edit_buku', $data);
        $this->load->view('templates/footer');
    }

    // =========================
    // UPDATE
    // =========================
    public function update($kode_buku)
    {
        $data = array(

            'judul'      => $this->input->post('judul'),
            'penulis'    => $this->input->post('penulis'),
            'penerbit'   => $this->input->post('penerbit'),
            'tahun'      => $this->input->post('tahun'),
            'kategori'   => $this->input->post('kategori'),
            'stok'       => $this->input->post('stok'),
            'lokasi_rak' => $this->input->post('lokasi_rak')

        );

        $this->buku_model->update($kode_buku, $data);

        $this->session->set_flashdata(
            'success',
            'Data berhasil diupdate!'
        );

        redirect('buku');
    }

    // =========================
    // HAPUS
    // =========================
    public function hapus($kode_buku)
    {
        $this->buku_model->delete($kode_buku);

        $this->session->set_flashdata(
            'success',
            'Data berhasil dihapus!'
        );

        redirect('buku');
    }
}