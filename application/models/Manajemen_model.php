<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manajemen_model extends CI_Model
{

    public function get_pengaduan_by_unit($unit)
    {
        $this->db->select('p.*, k.nama_kategori, COALESCE(s.nama, g.nama) as nama_pelapor');
        $this->db->from('pengaduan p');
        $this->db->join('kategori k', 'p.id_kategori = k.id_kategori');
        $this->db->join('siswa s', 'p.user_id = s.user_id', 'left');
        $this->db->join('guru g', 'p.user_id = g.user_id', 'left');
        $this->db->where('k.petugas', $unit);
        $this->db->order_by('p.date', 'DESC');
        return $this->db->get()->result();
    }

    public function get_pengaduan_detail($id_pengaduan, $unit)
    {
        $this->db->select('p.*, k.nama_kategori, COALESCE(s.nama, g.nama) as nama_pelapor');
        $this->db->from('pengaduan p');
        $this->db->join('kategori k', 'p.id_kategori = k.id_kategori');
        $this->db->join('siswa s', 'p.user_id = s.user_id', 'left');
        $this->db->join('guru g', 'p.user_id = g.user_id', 'left');
        $this->db->where('p.id_pengaduan', $id_pengaduan);
        $this->db->where('k.petugas', $unit);
        $pengaduan = $this->db->get()->row();

        if ($pengaduan) {
            $pengaduan->balasan = $this->db->get_where('balasan', ['id_pengaduan' => $id_pengaduan])->result();
        }
        return $pengaduan;
    }

    public function get_kategori_by_unit($unit)
    {
        return $this->db->get_where('kategori', ['petugas' => $unit])->result();
    }
}