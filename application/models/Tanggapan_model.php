<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tanggapan_model extends CI_Model
{

    public function insert($data)
    {
        return $this->db->insert('balasan', $data);
    }

    // Fungsi lain seperti update dan delete bisa ditambahkan di sini jika diperlukan
}