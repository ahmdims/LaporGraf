<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
        if (!$this->session->userdata('user_id')) {
            redirect('auth');
        }
    }

    private function _get_nav_view()
    {
        $role = $this->session->userdata('role');
        switch ($role) {
            case 'admin':
                return 'templates/nav_admin';
            case 'manajemen':
                return 'templates/nav_manajemen';
            case 'guru':
                return 'templates/nav_guru';
            case 'siswa':
                return 'templates/nav_siswa';
            default:
                return '';
        }
    }

    public function index()
    {
        $data['user'] = $this->User_model->get_user_by_session($this->session->userdata('user_id'));
        $data['title'] = 'Profil Saya';
        $nav_view = $this->_get_nav_view();

        $this->load->view('templates/header', $data);
        if ($nav_view) {
            $this->load->view($nav_view, $data);
        }
        $this->load->view('profile/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->User_model->get_user_by_session($this->session->userdata('user_id'));
            $data['title'] = 'Ubah Profil';
            $nav_view = $this->_get_nav_view();

            $this->load->view('templates/header', $data);
            if ($nav_view)
                $this->load->view($nav_view, $data);
            $this->load->view('profile/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->User_model->update_profile($this->session->userdata('user_id'));

            if (!empty($_FILES['avatar']['name'])) {
                $config['upload_path'] = './assets/media/avatars/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['file_name'] = 'avatar_' . $this->session->userdata('user_id');
                $config['overwrite'] = true;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('avatar')) {
                    $avatar_data = $this->upload->data();
                    $this->User_model->update_user($this->session->userdata('user_id'), ['avatar' => $avatar_data['file_name']], $this->session->userdata('role'));
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
                    redirect('profile/edit');
                }
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success">Profil berhasil diubah!</div>');
            redirect('profile');
        }
    }

    public function change_password()
    {
        $data['user'] = $this->User_model->get_user_by_session($this->session->userdata('user_id'));
        $data['title'] = 'Ubah Password';
        $nav_view = $this->_get_nav_view();

        $this->form_validation->set_rules('current_password', 'Password Saat Ini', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|min_length[8]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Konfirmasi Password Baru', 'required|trim|min_length[8]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            if ($nav_view) {
                $this->load->view($nav_view, $data);
            }
            $this->load->view('profile/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password saat ini salah!</div>');
                redirect('profile/edit');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password saat ini!</div>');
                    redirect('profile/edit');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->User_model->update_password($this->session->userdata('user_id'), $password_hash);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah!</div>');
                    redirect('profile');
                }
            }
        }
    }
}