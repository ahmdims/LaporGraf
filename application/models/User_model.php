<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function get_user_by_session($user_id)
    {
        $role = $this->session->userdata('role');
        $table = '';

        switch ($role) {
            case 'admin':
                $table = 'guru';
                break;
            case 'manajemen':
                $table = 'guru';
                break;
            case 'guru':
                $table = 'guru';
                break;
            case 'siswa':
                $table = 'siswa';
                break;
            default:
                return null;
        }

        return $this->db->get_where($table, ['user_id' => $user_id])->row_array();
    }

    public function get_users_by_role($role)
    {
        $table = ($role === 'siswa') ? 'siswa' : 'guru';
        return $this->db->get_where($table, ['role' => $role])->result();
    }

    public function get_user_by_id($user_id, $role)
    {
        if ($role === 'siswa') {
            return $this->db->get_where('siswa', ['user_id' => $user_id])->row();
        } elseif ($role === 'guru' || $role === 'manajemen' || $role === 'admin') {
            return $this->db->get_where('guru', ['user_id' => $user_id])->row();
        }
        return null;
    }

    public function update_profile($user_id)
    {
        $role = $this->session->userdata('role');
        $table = '';

        switch ($role) {
            case 'admin':
            case 'manajemen':
            case 'guru':
                $table = 'guru';
                break;
            case 'siswa':
                $table = 'siswa';
                break;
            default:
                return false;
        }

        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'jk' => $this->input->post('jk', true),
            'no_telp' => $this->input->post('no_telp', true),
            'alamat' => $this->input->post('alamat', true),
        ];

        if (!empty($_FILES['avatar']['name'])) {
            $config['upload_path'] = './assets/media/avatars/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['file_name'] = $user_id . '_' . time();
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('avatar')) {
                $upload_data = $this->upload->data();
                $data['avatar'] = $upload_data['file_name'];
            }
        }

        $this->db->where('user_id', $user_id);
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }

    public function update_password($user_id, $password_hash)
    {
        $role = $this->session->userdata('role');
        $table = '';

        switch ($role) {
            case 'admin':
            case 'guru':
            case 'manajemen':
                $table = 'guru';
                break;
            case 'siswa':
                $table = 'siswa';
                break;
            default:
                return false;
        }

        $this->db->set('password', $password_hash);
        $this->db->where('user_id', $user_id);
        $this->db->update($table);
        return $this->db->affected_rows();
    }

    public function delete_user($user_id, $role)
    {
        if ($role === 'siswa') {
            $this->db->where('user_id', $user_id);
            $this->db->delete('siswa');
        } else {
            $this->db->where('user_id', $user_id);
            $this->db->delete('guru');
        }
    }

    public function create_user($data, $role)
    {
        if ($role === 'siswa') {
            return $this->db->insert('siswa', $data);
        } else {
            return $this->db->insert('guru', $data);
        }
    }

    public function update_user($user_id, $data, $role)
    {
        if ($role === 'siswa') {
            $this->db->where('user_id', $user_id);
            return $this->db->update('siswa', $data);
        } else {
            $this->db->where('user_id', $user_id);
            return $this->db->update('guru', $data);
        }
    }

    public function insert_batch_users($data, $table)
    {
        return $this->db->insert_batch($table, $data);
    }
}