<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tanggapan_model extends CI_Model
{

    public function get_by_id($id_balasan)
    {
        return $this->db->get_where('balasan', ['id_balasan' => $id_balasan])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('balasan', $data);
    }

    public function update($id_balasan, $data)
    {
        $this->db->where('id_balasan', $id_balasan);
        return $this->db->update('balasan', $data);
    }

    public function delete($id_balasan)
    {
        $this->db->where('id_balasan', $id_balasan);
        $this->db->delete('balasan');
    }

    public function get_tanggapan_for_unit($id_balasan, $unit)
    {
        $this->db->select('b.*, k.petugas');
        $this->db->from('balasan b');
        $this->db->join('kategori k', 'b.id_kategori = k.id_kategori');
        $this->db->where('b.id_balasan', $id_balasan);
        $this->db->where('k.petugas', $unit);
        return $this->db->get()->row();
    }

    public function get_tanggapan_by_pengaduan($id_pengaduan)
    {
        $this->db->select('b.*, s.status');
        $this->db->from('balasan as b');
        $this->db->join('status as s', 'b.id_status = s.id_status');
        $this->db->where('b.id_pengaduan', $id_pengaduan);
        return $this->db->get()->result();
    }
}