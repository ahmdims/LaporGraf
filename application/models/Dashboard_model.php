<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

    public function count_pengaduan()
    {
        return $this->db->count_all('pengaduan');
    }

    public function count_siswa()
    {
        return $this->db->count_all('siswa');
    }

    public function count_guru()
    {
        return $this->db->count_all('guru');
    }

    public function count_pengaduan_by_user($userId)
    {
        $this->db->where('user_id', $userId);
        return $this->db->count_all_results('pengaduan');
    }
}