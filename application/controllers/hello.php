<?php

class hello extends CI_Controller{
    public function index()
    {
        $data['nama'] = "PUTRI SOFIATUN MUZOFAR";
        $this->load->view('hello_view',$data);
    }
    public function namasaya()
    {
        $data['nama'] = "Adit";
        $this->load->view('hello_view',$data);
    }
}