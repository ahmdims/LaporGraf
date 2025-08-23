<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan_model extends CI_Model
{

    public function get_by_user($userId)
    {
        $this->db->select('p.*, k.nama_kategori');
        $this->db->from('pengaduan p');
        $this->db->join('kategori k', 'p.id_kategori = k.id_kategori');
        $this->db->where('p.user_id', $userId);
        $this->db->order_by('p.date', 'DESC');
        return $this->db->get()->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('pengaduan', ['id_pengaduan' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('pengaduan', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_pengaduan', $id);
        return $this->db->update('pengaduan', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_pengaduan', $id);
        return $this->db->delete('pengaduan');
    }

    public function get_valid_pengaduan_for_edit_delete($id, $userId)
    {
        $this->db->where('id_pengaduan', $id);
        $this->db->where('user_id', $userId);
        $this->db->where('konfirmasi', '0'); // Hanya yang belum dikonfirmasi
        return $this->db->get('pengaduan')->row();
    }

    public function get_pengaduan_detail_for_user($id_pengaduan, $user_id)
    {
        $this->db->where('id_pengaduan', $id_pengaduan);
        $this->db->where('user_id', $user_id);
        $pengaduan = $this->db->get('pengaduan')->row();

        if ($pengaduan) {
            $this->db->where('id_pengaduan', $id_pengaduan);
            $balasan_query = $this->db->get('balasan');
            $pengaduan->balasan = $balasan_query->result();

            if ($pengaduan->balasan) {
                foreach ($pengaduan->balasan as $key => $balas) {
                    $this->db->where('id_balasan', $balas->id_balasan);
                    $kepuasan_query = $this->db->get('kepuasan');
                    $pengaduan->balasan[$key]->kepuasan = $kepuasan_query->row();
                }
            }
        }

        return $pengaduan;
    }
}