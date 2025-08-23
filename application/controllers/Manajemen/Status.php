<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'manajemen') {
            redirect('auth');
        }
        $this->load->model('Status_model');
    }

    public function index()
    {
        $data['title'] = 'Kelola Status Unit';
        $unit = $this->session->userdata('keterangan');
        $data['status_list'] = $this->Status_model->get_by_petugas($unit);

        $this->load->view('templates/header', $data);
        $this->load->view('manajemen/status/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['title'] = 'Tambah Status Baru';
        $this->load->view('templates/header', $data);
        $this->load->view('manajemen/status/create', $data);
        $this->load->view('templates/footer');
    }

    public function store()
    {
        $this->form_validation->set_rules('status', 'Nama Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = [
                'status' => $this->input->post('status'),
                'petugas' => $this->session->userdata('keterangan')
            ];
            $this->Status_model->insert($data);
            $this->session->set_flashdata('success', 'Status baru berhasil ditambahkan!');
            redirect('manajemen/status');
        }
    }

    public function edit($id)
    {
        $unit = $this->session->userdata('keterangan');
        $status = $this->Status_model->get_by_id_and_petugas($id, $unit);

        if (!$status) {
            $this->session->set_flashdata('error', 'Status tidak ditemukan atau bukan milik unit Anda.');
            redirect('manajemen/status');
        }

        $data['title'] = 'Edit Status';
        $data['status'] = $status;
        $this->load->view('templates/header', $data);
        $this->load->view('manajemen/status/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $unit = $this->session->userdata('keterangan');
        if (!$this->Status_model->get_by_id_and_petugas($id, $unit)) {
            $this->session->set_flashdata('error', 'Akses ditolak.');
            redirect('manajemen/status');
        }

        $this->form_validation->set_rules('status', 'Nama Status', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {
            $data = ['status' => $this->input->post('status')];
            $this->Status_model->update($id, $data);
            $this->session->set_flashdata('success', 'Status berhasil diperbarui!');
            redirect('manajemen/status');
        }
    }

    public function delete($id)
    {
        $unit = $this->session->userdata('keterangan');
        if (!$this->Status_model->get_by_id_and_petugas($id, $unit)) {
            $this->session->set_flashdata('error', 'Akses ditolak.');
        } else {
            $this->Status_model->delete($id);
            $this->session->set_flashdata('success', 'Status berhasil dihapus.');
        }
        redirect('manajemen/status');
    }
}