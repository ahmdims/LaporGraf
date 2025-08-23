<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $table = 'users';

    public function get_users_by_role($role)
    {
        $this->db->where('role', $role);
        return $this->db->get($this->table)->result();
    }

    public function get_user_by_id($user_id, $role = null)
    {
        // Pastikan nama tabel sudah benar, yaitu 'users'
        $this->db->from($this->table);
        $this->db->where('user_id', $user_id);

        if ($role) {
            $this->db->where('role', $role);
        }

        $query = $this->db->get();
        return $query->row(); // Menggunakan row() untuk mendapatkan satu baris data
    }

    public function delete_user($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->delete($this->table);
    }

    // Tambahkan fungsi lain jika diperlukan, seperti untuk create dan update
    public function create_user($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update_user($user_id, $data)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->update($this->table, $data);
    }
}