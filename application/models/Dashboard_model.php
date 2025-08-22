<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

    // Menghitung total semua pengaduan
    public function count_pengaduan()
    {
        return $this->db->count_all('pengaduan');
    }

    // Menghitung total siswa
    public function count_siswa()
    {
        return $this->db->count_all('siswa');
    }

    // Menghitung total guru & manajemen
    public function count_guru()
    {
        return $this->db->count_all('guru');
    }

    // Menghitung pengaduan per user dengan status tertentu
    public function count_pengaduan_by_user($userId, $status = null)
    {
        $this->db->where('user_id', $userId);
        if ($status !== null) {
            $this->db->where('konfirmasi', $status);
        }
        return $this->db->count_all_results('pengaduan');
    }
}