<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index()
    {
        if ($this->session->userdata('is_logged_in')) {
            $role = $this->session->userdata('role');
            redirect(strtolower($role) . '/dashboard');
        }
        $this->load->view('login_view');
    }

    public function process_login()
    {
        $this->form_validation->set_rules('user_id', 'User ID', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login_view');
        } else {
            $userId = $this->input->post('user_id');
            $password = $this->input->post('password');

            $user = $this->Auth_model->login($userId, $password);

            if ($user) {
                $keterangan = isset($user->keterangan) ? $user->keterangan : null;

                $session_data = array(
                    'user_id' => $user->user_id,
                    'nama' => $user->nama,
                    'role' => $user->role,
                    'keterangan' => $keterangan,
                    'is_logged_in' => TRUE
                );

                $this->session->set_userdata($session_data);

                switch ($user->role) {
                    case 'Admin':
                        redirect('admin/dashboard');
                        break;
                    case 'Manajemen':
                        redirect('manajemen/dashboard');
                        break;
                    case 'Guru':
                        redirect('guru/dashboard');
                        break;
                    case 'Siswa':
                        redirect('siswa/dashboard');
                        break;
                    default:
                        redirect('auth');
                        break;
                }
            } else {
                $this->session->set_flashdata('error', 'Invalid User ID or Password');
                redirect('auth');
            }
        }
    }

    public function register()
    {
        $this->load->view('register_view');
    }

    public function process_register()
    {
        $this->form_validation->set_rules('user_id', 'User ID (NIS)', 'required|trim|is_unique[siswa.user_id]');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register_view');
        } else {
            $data = [
                'user_id' => htmlspecialchars($this->input->post('user_id', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => 'Siswa',
                'keterangan' => 'Siswa'
            ];

            $this->Auth_model->register_siswa($data);

            $this->session->set_flashdata('success', 'Registrasi berhasil! Silakan login.');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}