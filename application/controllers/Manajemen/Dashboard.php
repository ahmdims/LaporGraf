<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'manajemen') {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Manajemen Dashboard';
        $data['user'] = $this->session->userdata('nama');

        $this->load->view('templates/header', $data);
        $this->load->view('manajemen/dashboard', $data);
        $this->load->view('templates/footer');
    }
}