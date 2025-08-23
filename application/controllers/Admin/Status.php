<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'admin') {
            redirect('auth');
        }
        $this->load->model('Status_model');
        $this->load->model('Admin_model');
    }

    public function index()
    {
        $data['title'] = 'Kelola Status';
        $data['status_list'] = $this->Status_model->get_all();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/status/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['title'] = 'Tambah Status';
        $data['unit_list'] = $this->Admin_model->get_all_unit();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/status/create', $data);
        $this->load->view('templates/footer');
    }

    public function store()
    {
        $this->form_validation->set_rules('status', 'Nama Status', 'required');
        $this->form_validation->set_rules('petugas', 'Unit Terkait', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = [
                'status' => $this->input->post('status'),
                'petugas' => $this->input->post('petugas')
            ];
            $this->Status_model->insert($data);
            $this->session->set_flashdata('success', 'Status baru berhasil ditambahkan!');
            redirect('admin/status');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Ubah Status';
        $data['status'] = $this->db->get_where('status', ['id_status' => $id])->row();
        $data['unit_list'] = $this->Admin_model->get_all_unit();

        if (!$data['status']) {
            redirect('admin/status');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('admin/status/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $this->form_validation->set_rules('status', 'Nama Status', 'required');
        $this->form_validation->set_rules('petugas', 'Unit Terkait', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {
            $data = [
                'status' => $this->input->post('status'),
                'petugas' => $this->input->post('petugas')
            ];
            $this->Status_model->update($id, $data);
            $this->session->set_flashdata('success', 'Status berhasil diperbarui!');
            redirect('admin/status');
        }
    }

    public function delete($id)
    {
        $this->Status_model->delete($id);
        $this->session->set_flashdata('success', 'Status berhasil dihapus.');
        redirect('admin/status');
    }
}