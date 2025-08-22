<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepuasan_model extends CI_Model
{

    /**
     * Menyimpan data kepuasan baru ke database.
     * @param array $data
     * @return bool
     */
    public function insert($data)
    {
        return $this->db->insert('kepuasan', $data);
    }

    /**
     * Memeriksa apakah sebuah pengaduan sudah pernah diberi rating kepuasan.
     * Kita akan memeriksa berdasarkan id_balasan yang unik.
     * @param int $id_balasan
     * @return bool
     */
    public function sudah_ada_kepuasan($id_balasan)
    {
        $this->db->where('id_balasan', $id_balasan);
        $query = $this->db->get('kepuasan');
        return $query->num_rows() > 0;
    }
}