<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
    }
    public function index()
    {
        $data['kategori'] = $this->Kategori_model->get_all();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('kategori/index', $data);
        $this->load->view('templates/footer');

    }
    public function tambah()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('kategori/tambah');
        $this->load->view('templates/footer');
    }
    public function simpan()
    {
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori')
        ];

        $this->Kategori_model->insert($data);
        redirect('kategori');
    }
    public function hapus($id)
    {
        // if($this->Kategori_model->is_used($id)){
        //     $this->session->set_flashdata('eror', 'Kategori tidak bisa dihapus karena masih digunakan');
        // } else {
            $this->Kategori_model->delete($id);
            $this->session->set_flashdata('success', 'Data Berhasil dihapus');
        // }
        redirect('kategori');
    }
}