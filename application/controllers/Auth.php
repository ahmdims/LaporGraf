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

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}