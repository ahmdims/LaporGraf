<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function get_user_by_id($user_id)
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

    public function update_profile($user_id)
    {
        $role = $this->session->userdata('role');
        $table = '';
        $nama_field = '';

        switch ($role) {
            case 'admin':
                $table = 'guru';
                $nama_field = 'nama';
                break;
            case 'guru':
                $table = 'guru';
                $nama_field = 'nama';
                break;
            case 'manajemen':
                $table = 'guru';
                $nama_field = 'nama';
                break;
            case 'siswa':
                $table = 'siswa';
                $nama_field = 'nama';
                break;
            default:
                return false;
        }

        $data = [
            $nama_field => htmlspecialchars($this->input->post('nama', true)),
        ];

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
                $table = 'guru';
                break;
            case 'guru':
                $table = 'guru';
                break;
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

    public function get_users_by_role($role)
    {
        if ($role === 'siswa') {
            return $this->db->get('siswa')->result();
        } else {
            $this->db->where('role', $role);
            return $this->db->get('guru')->result();
        }
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
}