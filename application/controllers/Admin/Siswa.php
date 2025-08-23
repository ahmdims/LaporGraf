<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
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
        $data['user_list'] = $this->User_model->get_users_by_role('siswa');

        $this->load->view('templates/header');
        $this->load->view('templates/nav_admin');
        $this->load->view('admin/siswa/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['title'] = 'Tambah Siswa';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/siswa/create', $data);
        $this->load->view('templates/footer');
    }

    public function store()
    {
        $this->form_validation->set_rules('user_id', 'NIS', 'required|is_unique[siswa.user_id]');
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
                'role' => 'Siswa',
                'keterangan' => 'Siswa'
            ];
            $this->User_model->insert('siswa', $data);
            $this->session->set_flashdata('success', 'Akun siswa berhasil dibuat!');
            redirect('admin/siswa');
        }
    }

    public function edit($user_id)
    {
        $data['title'] = 'Ubah Siswa';
        $data['user'] = $this->User_model->get_user_by_id('siswa', $user_id);
        $this->load->view('templates/header', $data);
        $this->load->view('admin/siswa/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($user_id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($user_id);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'jk' => $this->input->post('jk')
            ];

            if ($this->input->post('password')) {
                $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }
            $this->User_model->update('siswa', $user_id, $data);
            $this->session->set_flashdata('success', 'Akun siswa berhasil diperbarui!');
            redirect('admin/siswa');
        }
    }

    public function delete($user_id)
    {
        $this->User_model->delete('siswa', $user_id);
        $this->session->set_flashdata('success', 'Akun siswa berhasil dihapus.');
        redirect('admin/siswa');
    }
}