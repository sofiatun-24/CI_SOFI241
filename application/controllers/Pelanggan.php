<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Pelanggan_model', 'User_model']);
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
        // Ambil pelanggan beserta username sales-nya
        $this->db->select('pelanggan.*, users.username, users.id as id_user');
        $this->db->from('pelanggan');
        $this->db->join('users', "users.nama = pelanggan.nama AND users.role = 'sales'", 'left');
        $data['pelanggan'] = $this->db->get()->result();

        $this->load->view('pelanggan/index', $data);
    }

    public function tambah() {
        $this->load->view('pelanggan/form', ['pelanggan' => null]);
    }

    public function simpan() {
        $nama       = $this->input->post('nama');
        $alamat     = $this->input->post('alamat');
        $no_telepon = $this->input->post('no_telepon');

        // 1. Simpan ke tabel pelanggan
        $this->Pelanggan_model->insert([
            'nama'       => $nama,
            'alamat'     => $alamat,
            'no_telepon' => $no_telepon,
        ]);

        // 2. Buat username dari nama (lowercase, spasi jadi underscore)
        $username = strtolower(str_replace(' ', '_', $nama));

        // Pastikan username unik — tambah angka kalau sudah ada
        $cek = $this->db->get_where('users', ['username' => $username])->row();
        if ($cek) {
            $username = $username . '_' . rand(10, 99);
        }

        // 3. Auto create akun sales dengan password default: "sales123"
        $this->User_model->insert([
            'nama'     => $nama,
            'username' => $username,
            'password' => 'sales123', // akan di-md5 di model
            'role'     => 'sales',
        ]);

        $this->session->set_flashdata('success',
            'Pelanggan <strong>' . $nama . '</strong> berhasil ditambahkan! ' .
            'Akun sales dibuat otomatis — username: <strong>' . $username . '</strong>, password: <strong>sales123</strong>');
        redirect('pelanggan');
    }

    public function edit($id) {
        $data['pelanggan'] = $this->Pelanggan_model->get_by_id($id);
        $this->load->view('pelanggan/form', $data);
    }

    public function update($id) {
        $nama = $this->input->post('nama');

        $this->Pelanggan_model->update($id, [
            'nama'       => $nama,
            'alamat'     => $this->input->post('alamat'),
            'no_telepon' => $this->input->post('no_telepon'),
        ]);

        $this->session->set_flashdata('success', 'Data pelanggan berhasil diupdate!');
        redirect('pelanggan');
    }

public function hapus($id) {
    $pelanggan = $this->Pelanggan_model->get_by_id($id);

    // Hapus detail_order & sales_order terkait dulu
    $orders = $this->db->get_where('sales_order', ['id_pelanggan' => $id])->result();
    foreach ($orders as $o) {
        $this->db->delete('detail_order', ['id_order' => $o->id]);
    }
    $this->db->delete('sales_order', ['id_pelanggan' => $id]);

    // Hapus akun sales terkait
    if ($pelanggan) {
        $this->db->where('nama', $pelanggan->nama);
        $this->db->where('role', 'sales');
        $this->db->delete('users');
    }

    // Baru hapus pelanggan
    $this->Pelanggan_model->delete($id);
    $this->session->set_flashdata('success', 'Pelanggan dan data terkait berhasil dihapus!');
    redirect('pelanggan');
}
}