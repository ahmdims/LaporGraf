<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'admin') {
            redirect('auth');
        }
        $this->load->model('Kategori_model');
        $this->load->model('Admin_model');
    }

    public function index()
    {
        $data['title'] = 'Setup Master Kategori';
        $data['kategori_list'] = $this->Kategori_model->get_all();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/kategori/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['title'] = 'Tambah Kategori Baru';
        $data['unit_list'] = $this->Admin_model->get_all_unit();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/kategori/create', $data);
        $this->load->view('templates/footer');
    }

    public function store()
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('petugas', 'Unit Penanggung Jawab', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = [
                'nama_kategori' => $this->input->post('nama_kategori'),
                'petugas' => $this->input->post('petugas')
            ];
            $this->Kategori_model->insert($data);
            $this->session->set_flashdata('success', 'Kategori baru berhasil ditambahkan!');
            redirect('admin/kategori');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Kategori';
        $data['kategori'] = $this->Kategori_model->get_by_id($id);
        $data['unit_list'] = $this->Admin_model->get_all_unit();

        if (!$data['kategori']) {
            redirect('admin/kategori');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('admin/kategori/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('petugas', 'Unit Penanggung Jawab', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {
            $data = [
                'nama_kategori' => $this->input->post('nama_kategori'),
                'petugas' => $this->input->post('petugas')
            ];
            $this->Kategori_model->update($id, $data);
            $this->session->set_flashdata('success', 'Kategori berhasil diperbarui!');
            redirect('admin/kategori');
        }
    }

    public function delete($id)
    {
        $this->Kategori_model->delete($id);
        $this->session->set_flashdata('success', 'Kategori berhasil dihapus.');
        redirect('admin/kategori');
    }
}