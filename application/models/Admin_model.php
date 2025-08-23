<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public function get_all_unit()
    {
        $this->db->select('keterangan');
        $this->db->from('guru');
        $this->db->where_not_in('role', ['Admin']);
        $this->db->distinct();
        return $this->db->get()->result();
    }
}