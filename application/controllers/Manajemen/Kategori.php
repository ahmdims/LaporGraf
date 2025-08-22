<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'Manajemen') {
            redirect('auth');
        }
        $this->load->model('Manajemen_model');
        $this->load->model('Kategori_model');
    }

    public function index()
    {
        $data['title'] = 'Kelola Kategori Unit';
        $unit = $this->session->userdata('keterangan');
        $data['kategori_list'] = $this->Manajemen_model->get_kategori_by_unit($unit);

        $this->load->view('templates/header', $data);
        $this->load->view('manajemen/kategori/index', $data);
        $this->load->view('templates/footer');
    }

    // Anda bisa menambahkan fungsi create, store, edit, update, delete di sini
    // untuk melengkapi fitur CRUD kategori per unit.
}