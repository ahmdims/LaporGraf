<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status_model extends CI_Model
{

    /**
     * Mengambil semua data dari tabel 'status'
     * @return array
     */
    public function get_all()
    {
        return $this->db->get('status')->result();
    }

    /**
     * FUNGSI BARU: Mengambil status berdasarkan unit petugas
     * @param string $petugas Keterangan unit (e.g., 'Sarpras')
     * @return array
     */
    public function get_by_petugas($petugas)
    {
        $this->db->where('petugas', $petugas);
        return $this->db->get('status')->result();
    }
}