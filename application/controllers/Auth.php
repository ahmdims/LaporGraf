<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        // Baris ini memuat library form_validation dan helper url yang akan kita butuhkan
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

    /**
     * FUNGSI BARU UNTUK MENAMPILKAN HALAMAN REGISTRASI
     */
    public function register()
    {
        // Fungsi ini hanya akan memuat view register.
        $this->load->view('register_view');
    }

    /**
     * FUNGSI BARU UNTUK MEMPROSES DATA DARI FORM REGISTRASI
     */
    public function process_register()
    {
        // Atur aturan validasi untuk form registrasi
        $this->form_validation->set_rules('user_id', 'User ID (NIS)', 'required|trim|is_unique[siswa.user_id]');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan kembali form registrasi dengan pesan error
            $this->load->view('register_view');
        } else {
            // Jika validasi berhasil, siapkan data untuk disimpan
            $data = [
                'user_id' => htmlspecialchars($this->input->post('user_id', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => 'Siswa', // Role default untuk registrasi
                'keterangan' => 'Siswa'  // Keterangan default
            ];

            // Panggil model untuk menyimpan data
            $this->Auth_model->register_siswa($data);

            // Beri pesan sukses dan arahkan ke halaman login
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