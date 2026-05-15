<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('login')){
            redirect('login');
        }
    }

    public function peminjaman()
    {
        $bulan= $this->input->get('bulan');

        $this->db->select('peminjaman.*, anggota.nama');
        $this->db->from('peminjaman');
        $this->db->join('anggota', 'anggota.nomor_anggota = peminjaman.anggota_id');

        if($bulan){
            $this->db->where('DATE_FORMAT(tanggal_pinjam, "%Y-%m")=', $bulan);
        }
        $data['data']= $this->db->get()->result();
        $data['bulan']= $bulan;

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('laporan/peminjaman', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_peminjaman()
    {
        $bulan= $this->input->get('bulan');

        $this->db->select('peminjaman.*, anggota.nama');
        $this->db->from('peminjaman');
        $this->db->join('anggota', 'anggota.nomor_anggota = peminjaman.anggota_id');

        if($bulan){
            $this->db->where('DATE_FORMAT(tanggal_pinjam, "%Y-%m")=', $bulan);
        }
        $data['data']= $this->db->get()->result();
        $data['bulan']= $bulan;

        $this->load->view('laporan/cetak_pinjam', $data);
    }

    // ===================== ANGGOTA =====================

    public function anggota()
    {
        $cari   = $this->input->get('cari');
        $status = $this->input->get('status');

        $this->db->select('*');
        $this->db->from('anggota');

        if($cari){
            $this->db->group_start();
            $this->db->like('nama', $cari);
            $this->db->or_like('nomor_anggota', $cari);
            $this->db->group_end();
        }

        if($status){
            $this->db->where('status', $status);
        }

        $this->db->order_by('nomor_anggota', 'ASC');
        $data['data']   = $this->db->get()->result();
        $data['cari']   = $cari;
        $data['status'] = $status;

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('laporan/anggota', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_anggota()
    {
        $cari   = $this->input->get('cari');
        $status = $this->input->get('status');

        $this->db->select('*');
        $this->db->from('anggota');

        if($cari){
            $this->db->group_start();
            $this->db->like('nama', $cari);
            $this->db->or_like('nomor_anggota', $cari);
            $this->db->group_end();
        }

        if($status){
            $this->db->where('status', $status);
        }

        $this->db->order_by('nomor_anggota', 'ASC');
        $data['data']   = $this->db->get()->result();
        $data['cari']   = $cari;
        $data['status'] = $status;

        $this->load->view('laporan/cetak_anggota', $data);
    }

    // ===================== BUKU =====================

    public function buku()
    {
        $cari     = $this->input->get('cari');
        $kategori = $this->input->get('kategori');

        $this->db->select('buku.*, kategori.nama_kategori');
        $this->db->from('buku');
        $this->db->join('kategori', 'kategori.id = buku.kategori', 'left');

        if($cari){
            $this->db->group_start();
            $this->db->like('judul', $cari);
            $this->db->or_like('penulis', $cari);
            $this->db->group_end();
        }

        if($kategori){
            $this->db->where('buku.kategori', $kategori);
        }

        $this->db->order_by('buku.kode_buku', 'ASC');
        $data['data']          = $this->db->get()->result();
        $data['cari']          = $cari;
        $data['kategori']      = $kategori;
        $data['kategori_list'] = $this->db->get('kategori')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('laporan/buku', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_buku()
    {
        $cari     = $this->input->get('cari');
        $kategori = $this->input->get('kategori');

        $this->db->select('buku.*, kategori.nama_kategori');
        $this->db->from('buku');
        $this->db->join('kategori', 'kategori.id = buku.kategori', 'left');

        if($cari){
            $this->db->group_start();
            $this->db->like('judul', $cari);
            $this->db->or_like('penulis', $cari);
            $this->db->group_end();
        }

        if($kategori){
            $this->db->where('buku.kategori', $kategori);
        }

        $this->db->order_by('buku.kode_buku', 'ASC');
        $data['data']     = $this->db->get()->result();
        $data['cari']     = $cari;
        $data['kategori'] = $kategori;

        // Ambil nama kategori untuk ditampilkan di header cetak
        if($kategori){
            $kat = $this->db->get_where('kategori', ['id' => $kategori])->row();
            $data['nama_kategori'] = $kat ? $kat->nama_kategori : '';
        } else {
            $data['nama_kategori'] = '';
        }

        $this->load->view('laporan/cetak_buku', $data);
    }
}