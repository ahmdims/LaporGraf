<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'admin') {
            redirect('auth');
        }
        $this->load->model('Dashboard_model');
    }

    public function index()
    {
        $data['title'] = 'Admin Dashboard';
        $data['user'] = $this->session->userdata('nama');

        $data['total_pengaduan'] = $this->Dashboard_model->count_pengaduan();
        $data['total_siswa'] = $this->Dashboard_model->count_siswa();
        $data['total_guru'] = $this->Dashboard_model->count_guru();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer');
    }
}