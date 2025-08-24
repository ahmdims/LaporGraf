<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function get_user_by_username($username)
    {
        $role = $this->session->userdata('role');
        $table = '';
        switch ($role) {
            case 'admin':
                $table = 'admin';
                break;
            case 'guru':
                $table = 'guru';
                break;
            case 'manajemen':
                $table = 'manajemen';
                break;
            case 'siswa':
                $table = 'siswa';
                break;
            default:
                return null;
        }
        return $this->db->get_where($table, ['username' => $username])->row_array();
    }

    public function update_profile($username)
    {
        $role = $this->session->userdata('role');
        $table = '';
        $nama_field = '';
        switch ($role) {
            case 'admin':
                $table = 'admin';
                $nama_field = 'nama';
                break;
            case 'guru':
                $table = 'guru';
                $nama_field = 'nama_guru';
                break;
            case 'manajemen':
                $table = 'manajemen';
                $nama_field = 'nama_manajemen';
                break;
            case 'siswa':
                $table = 'siswa';
                $nama_field = 'nama_siswa';
                break;
            default:
                return false;
        }

        $data = [
            $nama_field => htmlspecialchars($this->input->post('nama', true)),
        ];

        $this->db->where('username', $username);
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }

    public function update_password($username, $password_hash)
    {
        $role = $this->session->userdata('role');
        $table = '';
        switch ($role) {
            case 'admin':
                $table = 'admin';
                break;
            case 'guru':
                $table = 'guru';
                break;
            case 'manajemen':
                $table = 'manajemen';
                break;
            case 'siswa':
                $table = 'siswa';
                break;
            default:
                return false;
        }
        $this->db->set('password', $password_hash);
        $this->db->where('username', $username);
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

    public function get_user_by_id($user_id, $role = null)
    {
        if ($role === 'siswa') {
            $this->db->from('siswa');
        } else {
            $this->db->from('guru');
        }

        $this->db->where('user_id', $user_id);

        if ($role && $role !== 'siswa') {
            $this->db->where('role', $role);
        }

        $query = $this->db->get();
        return $query->row();
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