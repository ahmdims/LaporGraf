<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepuasan_model extends CI_Model
{

    public function insert($data)
    {
        return $this->db->insert('kepuasan', $data);
    }

    public function sudah_ada_kepuasan($id_balasan)
    {
        $this->db->where('id_balasan', $id_balasan);
        $query = $this->db->get('kepuasan');
        return $query->num_rows() > 0;
    }
}