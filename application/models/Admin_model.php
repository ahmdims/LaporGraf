<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function get_all_unit()
    {
        $this->db->select('keterangan');
        $this->db->from('guru');
        $this->db->where_not_in('role', ['admin']);
        $this->db->where('keterangan IS NOT NULL');
        $this->db->where('keterangan !=', '');
        $this->db->distinct();
        return $this->db->get()->result();
    }
}