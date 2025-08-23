<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'admin')
            redirect('auth');
        $this->load->model('User_model');
    }

    public function index()
    {
        $data['title'] = 'Setup Akun Guru';
        $data['user_list'] = $this->User_model->get_users('guru', 'Guru');
        $this->load->view('templates/header', $data);
        $this->load->view('admin/guru/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['title'] = 'Tambah Akun Guru';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/guru/create', $data);
        $this->load->view('templates/footer');
    }

    public function store()
    {
        $this->form_validation->set_rules('user_id', 'NIP/ID', 'required|is_unique[guru.user_id]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = [
                'user_id' => $this->input->post('user_id'),
                'nama' => $this->input->post('nama'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'jk' => $this->input->post('jk'),
                'role' => 'Guru',
                'keterangan' => 'Guru'
            ];
            $this->User_model->insert('guru', $data);
            $this->session->set_flashdata('success', 'Akun guru berhasil dibuat!');
            redirect('admin/guru');
        }
    }

    public function edit($user_id)
    {
        $data['title'] = 'Edit Akun Guru';
        $data['user'] = $this->User_model->get_user_by_id('guru', $user_id);
        $this->load->view('templates/header', $data);
        $this->load->view('admin/guru/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($user_id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($user_id);
        } else {
            $data = ['nama' => $this->input->post('nama'), 'jk' => $this->input->post('jk')];
            if ($this->input->post('password')) {
                $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }
            $this->User_model->update('guru', $user_id, $data);
            $this->session->set_flashdata('success', 'Akun guru berhasil diperbarui!');
            redirect('admin/guru');
        }
    }

    public function delete($user_id)
    {
        $this->User_model->delete('guru', $user_id);
        $this->session->set_flashdata('success', 'Akun guru berhasil dihapus.');
        redirect('admin/guru');
    }
}