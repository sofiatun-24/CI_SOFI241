<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Produk_model');
        $this->load->library('session');
        $this->load->helper('url');

        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
        // Hanya admin yang boleh akses
        if ($this->session->userdata('role') !== 'admin') {
            redirect('dashboard');
        }
    }

    public function index() {
        $data['produk'] = $this->Produk_model->get_all();
        $this->load->view('produk/index', $data);
    }

    public function tambah() {
        $this->load->view('produk/form', ['produk' => null]);
    }

    public function simpan() {
        $this->Produk_model->insert([
            'kode_produk'  => $this->input->post('kode_produk'),
            'nama_produk'  => $this->input->post('nama_produk'),
            'harga'        => $this->input->post('harga'),
            'stok'         => $this->input->post('stok'),
        ]);
        $this->session->set_flashdata('success', 'Produk berhasil ditambahkan!');
        redirect('produk');
    }

    public function edit($id) {
        $data['produk'] = $this->Produk_model->get_by_id($id);
        $this->load->view('produk/form', $data);
    }

    public function update($id) {
        $this->Produk_model->update($id, [
            'kode_produk'  => $this->input->post('kode_produk'),
            'nama_produk'  => $this->input->post('nama_produk'),
            'harga'        => $this->input->post('harga'),
            'stok'         => $this->input->post('stok'),
        ]);
        $this->session->set_flashdata('success', 'Produk berhasil diupdate!');
        redirect('produk');
    }

    public function hapus($id) {
        $this->Produk_model->delete($id);
        $this->session->set_flashdata('success', 'Produk berhasil dihapus!');
        redirect('produk');
    }
}