<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

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