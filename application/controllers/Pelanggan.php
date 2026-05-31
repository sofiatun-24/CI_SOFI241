<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pelanggan_model');
        $this->load->library('session');
        $this->load->helper('url');

        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
        if ($this->session->userdata('role') !== 'admin') {
            redirect('dashboard');
        }
    }

    public function index() {
        $data['pelanggan'] = $this->Pelanggan_model->get_all();
        $this->load->view('pelanggan/index', $data);
    }

    public function tambah() {
        $this->load->view('pelanggan/form', ['pelanggan' => null]);
    }

    public function simpan() {
        $this->Pelanggan_model->insert([
            'nama'        => $this->input->post('nama'),
            'alamat'      => $this->input->post('alamat'),
            'no_telepon'  => $this->input->post('no_telepon'),
        ]);
        $this->session->set_flashdata('success', 'Pelanggan berhasil ditambahkan!');
        redirect('pelanggan');
    }

    public function edit($id) {
        $data['pelanggan'] = $this->Pelanggan_model->get_by_id($id);
        $this->load->view('pelanggan/form', $data);
    }

    public function update($id) {
        $this->Pelanggan_model->update($id, [
            'nama'        => $this->input->post('nama'),
            'alamat'      => $this->input->post('alamat'),
            'no_telepon'  => $this->input->post('no_telepon'),
        ]);
        $this->session->set_flashdata('success', 'Pelanggan berhasil diupdate!');
        redirect('pelanggan');
    }

    public function hapus($id) {
        $this->Pelanggan_model->delete($id);
        $this->session->set_flashdata('success', 'Pelanggan berhasil dihapus!');
        redirect('pelanggan');
    }
}