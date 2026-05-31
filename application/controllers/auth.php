<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index() {
        $this->login();
    }

    public function login() {
        // Kalau sudah login, langsung ke dashboard
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }
        $this->load->view('auth/login');
    }

    public function proses_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->User_model->cek_login($username, $password);

        if ($user) {
            $this->session->set_userdata([
                'logged_in' => TRUE,
                'id'        => $user->id,
                'nama'      => $user->nama,
                'username'  => $user->username,
                'role'      => $user->role,
            ]);
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('error', 'Username atau password salah!');
            redirect('auth/login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}