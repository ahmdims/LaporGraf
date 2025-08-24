<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'manajemen') {
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

    public function create()
    {
        $data['title'] = 'Tambah Kategori Baru';
        $this->load->view('templates/header', $data);
        $this->load->view('manajemen/kategori/create', $data);
        $this->load->view('templates/footer');
    }

    public function store()
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = [
                'nama_kategori' => $this->input->post('nama_kategori'),
                'petugas' => $this->session->userdata('keterangan')
            ];
            $this->Kategori_model->insert($data);
            $this->session->set_flashdata('success', 'Kategori baru berhasil ditambahkan!');
            redirect('manajemen/kategori');
        }
    }

    public function edit($id)
    {
        $unit = $this->session->userdata('keterangan');
        $kategori = $this->Kategori_model->get_by_id($id);

        if (!$kategori || $kategori->petugas != $unit) {
            $this->session->set_flashdata('error', 'Kategori tidak ditemukan atau bukan milik unit Anda.');
            redirect('manajemen/kategori');
        }

        $data['title'] = 'Edit Kategori';
        $data['kategori'] = $kategori;
        $this->load->view('templates/header', $data);
        $this->load->view('manajemen/kategori/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $unit = $this->session->userdata('keterangan');
        $kategori = $this->Kategori_model->get_by_id($id);

        if (!$kategori || $kategori->petugas != $unit) {
            redirect('manajemen/kategori');
        }

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {
            $data = ['nama_kategori' => $this->input->post('nama_kategori')];
            $this->Kategori_model->update($id, $data);
            $this->session->set_flashdata('success', 'Kategori berhasil diperbarui!');
            redirect('manajemen/kategori');
        }
    }

    public function delete($id)
    {
        $unit = $this->session->userdata('keterangan');
        $kategori = $this->Kategori_model->get_by_id($id);

        if (!$kategori || $kategori->petugas != $unit) {
        } else {
            $this->Kategori_model->delete($id);
            $this->session->set_flashdata('success', 'Kategori berhasil dihapus!');
        }
        redirect('manajemen/kategori');
    }
}