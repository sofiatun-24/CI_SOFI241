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
            // $this->session->set_flashdata('error', 'Kategori tidak bisa dihapus karna masih digunakan');
            // } else{
                $this->Kategori_model->delete($id);
                $this->session->set_flashdata('success','Data berhasil dihapus');
            // }
            redirect('kategori');
    }
    public function edit($id)
    {
     $data['kategori']= $this->Kategori_model->get_by_id($id);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('kategori/edit', $data);
        $this->load->view('templates/footer');   
    }
    public function update($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        if($this->form_validation->run()==FALSE){

        }else {
            $data=[
                'nama_kategori'=>$this->input->post('nama_kategori')
            ];
            $this->Kategori_model->update($id,$data);
            $this->session->set_flashdata('success','Data Berhasil diupdate');
            redirect('kategori');
        }
    }
}