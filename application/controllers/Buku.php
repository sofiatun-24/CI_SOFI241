<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect('login');
        }

        $this->load->model('buku_model');
        $this->load->model('kategori_model');

        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'form']);
    }

    public function index()
    {
        $data['buku'] = $this->buku_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('buku/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['kategori'] = $this->kategori_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $data['kategori'] = $this->db->get('kategori')->result();
        $this->load->view('buku/tambah', $data);
        $this->load->view('templates/footer');
    }


    public function simpan()
    {
        $data= [
            'kode_buku'=> $this->input->post('kode_buku'),
                'judul'=>$this->input->post('judul'),
                'penulis'=> $this->input->post('penulis'),
                'penerbit'=> $this->input->post('penerbit'),
                'tahun'=> $this->input->post('tahun'),
                'kategori'=> $this->input->post('kategori'),
                'stok'=> $this->input->post('stok'),
                'lokasi_rak'=> $this->input->post('lokasi_rak'),
        ];
        $this->session->set_flashdata('swal', [
            'icon' => 'success',
            'title' => 'Berhasil!',
            'text' => 'Data berhasil ditambahkan'
        ]);
        
        

        $this->buku_model->insert($data);
        redirect('buku');
    }

    public function edit($kode_buku)
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
        $this->load->view('buku/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($kode_buku)
    {
        $this->form_validation->set_rules('judul', 'Judul Buku', 'required|trim');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required|trim');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required|trim');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|integer');
        $this->form_validation->set_rules('kategori_id', 'Kategori', 'required|integer');
        $this->form_validation->set_rules('stok', 'Stok', 'required|integer');
        $this->form_validation->set_rules('lokasi_rak', 'Lokasi Rak', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $data['buku'] = $this->buku_model->get_by_kode($kode_buku);
            $data['kategori'] = $this->kategori_model->get_all();

            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('buku/edit_buku', $data);
            $this->load->view('templates/footer');

        } else {

            $data = [
                'judul'       => $this->input->post('judul'),
                'penulis'     => $this->input->post('penulis'),
                'penerbit'    => $this->input->post('penerbit'),
                'tahun'       => $this->input->post('tahun'),
                'kategori_id' => $this->input->post('kategori_id'),
                'stok'        => $this->input->post('stok'),
                'lokasi_rak'  => $this->input->post('lokasi_rak'),
            ];

            $this->buku_model->update($kode_buku, $data);

            $this->session->set_flashdata(
                'success',
                'Data buku berhasil diperbarui!'
            );

            redirect('buku');
        }
    }

    public function hapus($kode_buku)
    {
        $this->buku_model->delete($kode_buku);

        $this->session->set_flashdata(
            'success',
            'Buku berhasil dihapus!'
        );

        redirect('buku');
    }
}