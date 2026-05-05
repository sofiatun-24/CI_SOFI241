<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class peminjaman extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('login')){
            redirect('login');
        }
        $this->load->model('Peminjaman_model');
    }
    
    public function index()
    {
        $data['data']= $this->Peminjaman_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('peminjaman/index', $data);
        $this->load->view('templates/footer'); 
    }

    public function tambah()
    {
        $data['anggota']=$this->db->get('anggota')->result();
        $data['buku']=$this->db->get('buku')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('peminjaman/tambah', $data);
        $this->load->view('templates/footer'); 
    }

    public function simpan()
    {
        $data=[
            'kode_peminjaman'=>uniqid('PMJ-'),
            'anggota_id'=>$this->input->post('anggota_id'),
            'tanggal_pinjam'=>date('Y-m-d'),
            'tanggal_jatuh_tempo'=>$this->input->post('tanggal_jatuh_tempo'),
            'status'=>'dipinjam',
            'user_id'=>$this->session->userdata('id_user')
        ];
        $buku_id = $this->input->post('buku_id');

        $this->Peminjaman_model->insert($data, $buku_id);
    }

    public function kembali($id)
    {
        $this->Peminjaman_model->pengembalian($id);
        redirect('peminjaman');
    }
}