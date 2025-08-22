<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    /**
     * Mengambil daftar semua unit/petugas yang unik dari tabel guru.
     * Digunakan untuk dropdown saat membuat/mengedit kategori dan status.
     * @return array
     */
    public function get_all_unit()
    {
        $this->db->select('keterangan');
        $this->db->from('guru');
        $this->db->where_not_in('role', ['Admin']);
        $this->db->distinct();
        return $this->db->get()->result();
    }
}