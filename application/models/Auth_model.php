<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function login($userId, $password)
    {
        // First, check the 'guru' table (for Admin, Manajemen, Guru)
        $this->db->where('user_id', $userId);
        $guru = $this->db->get('guru')->row();

        if ($guru) {
            // User found in 'guru' table, verify password
            if (password_verify($password, $guru->password)) {
                // IMPORTANT: The 'role' is directly from the database
                return $guru;
            }
        }

        // If not in 'guru', check the 'siswa' table
        $this->db->where('user_id', $userId);
        $siswa = $this->db->get('siswa')->row();

        if ($siswa) {
            // User found in 'siswa' table, verify password
            if (password_verify($password, $siswa->password)) {
                // IMPORTANT: The 'role' is explicitly set to 'Siswa'
                return $siswa;
            }
        }

        // If user not found in either table or password mismatch
        return false;
    }
}