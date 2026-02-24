<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class kategori extends CI_controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_model');
    }
    public function index()
    {
        $data['kategori'] = $this->kategori_model->get_all();
        $this->load->view('kategori/index', $data);

    }
}