<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function index()
    {
        // If already logged in, redirect to their dashboard
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
                $session_data = array(
                    'user_id' => $user->user_id,
                    'nama' => $user->nama,
                    'role' => $user->role,
                    'is_logged_in' => TRUE
                );
                $this->session->set_userdata($session_data);

                // Redirect based on role
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
        $this->form_validation->set_rules('user_id', 'User ID', 'required|trim|is_unique[guru.user_id]|is_unique[siswa.user_id]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register_view');
        } else {
            $data = array(
                'user_id' => $this->input->post('user_id'),
                'nama' => $this->input->post('nama'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => $this->input->post('role')
            );

            if ($this->Auth_model->register($data)) {
                $this->session->set_flashdata('success', 'Registrasi berhasil, silakan login.');
                redirect('auth');
            } else {
                $this->session->set_flashdata('error', 'Registrasi gagal, silakan coba lagi.');
                redirect('auth/register');
            }
        }
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}