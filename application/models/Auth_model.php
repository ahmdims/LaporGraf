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
                return $guru;
            }
        }

        // If not in 'guru', check the 'siswa' table
        $this->db->where('user_id', $userId);
        $siswa = $this->db->get('siswa')->row();

        if ($siswa) {
            // User found in 'siswa' table, verify password
            if (password_verify($password, $siswa->password)) {
                return $siswa;
            }
        }

        return false;
    }

    /**
     * FUNGSI BARU UNTUK MENYIMPAN DATA SISWA BARU
     */
    public function register_siswa($data)
    {
        // Fungsi ini akan memasukkan data array ke dalam tabel 'siswa'
        return $this->db->insert('siswa', $data);
    }
}