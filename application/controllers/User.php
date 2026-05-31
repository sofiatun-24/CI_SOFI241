<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('login')){
            redirect('auth');
        }

        if($this->session->userdata('role') != 'admin'){
            redirect('dashboard');
        }

        $this->load->model('User_model');
    }

    public function index()
    {
        $data['title'] = 'Data User';
        $data['users'] = $this->User_model->get_all();

        $this->load->view('templates/header',$data);
        $this->load->view('user/index',$data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah User';

        if($this->input->post()){

            $insert = [
                'nama'     => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'role'     => $this->input->post('role')
            ];

            $this->User_model->insert($insert);

            redirect('user');
        }

        $this->load->view('templates/header',$data);
        $this->load->view('user/tambah');
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit User';
        $data['user']  = $this->User_model->get_by_id($id);

        if($this->input->post()){

            $update = [
                'nama'     => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'role'     => $this->input->post('role')
            ];

            if($this->input->post('password') != ''){
                $update['password'] = md5($this->input->post('password'));
            }

            $this->User_model->update($id,$update);

            redirect('user');
        }

        $this->load->view('templates/header',$data);
        $this->load->view('user/edit',$data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $this->User_model->delete($id);
        redirect('user');
    }
}