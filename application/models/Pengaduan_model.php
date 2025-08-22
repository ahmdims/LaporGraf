<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan_model extends CI_Model
{

    // Get all complaints for a specific user
    public function get_by_user($userId)
    {
        $this->db->select('p.*, k.nama_kategori');
        $this->db->from('pengaduan p');
        $this->db->join('kategori k', 'p.id_kategori = k.id_kategori');
        $this->db->where('p.user_id', $userId);
        $this->db->order_by('p.date', 'DESC');
        return $this->db->get()->result();
    }

    // Get a single complaint by its ID
    public function get_by_id($id)
    {
        return $this->db->get_where('pengaduan', ['id_pengaduan' => $id])->row();
    }

    // Insert a new complaint
    public function insert($data)
    {
        return $this->db->insert('pengaduan', $data);
    }

    // Update an existing complaint by its ID
    public function update($id, $data)
    {
        $this->db->where('id_pengaduan', $id);
        return $this->db->update('pengaduan', $data);
    }

    // Delete a complaint by its ID
    public function delete($id)
    {
        $this->db->where('id_pengaduan', $id);
        return $this->db->delete('pengaduan');
    }

    /**
     * FUNGSI BARU: Memeriksa apakah user adalah pemilik pengaduan
     * dan apakah statusnya masih '0' (belum dikonfirmasi).
     * @param int $id ID Pengaduan
     * @param string $userId ID User (Siswa/Guru)
     * @return object|null Mengembalikan data pengaduan jika valid, null jika tidak.
     */
    public function get_valid_pengaduan_for_edit_delete($id, $userId)
    {
        $this->db->where('id_pengaduan', $id);
        $this->db->where('user_id', $userId);
        $this->db->where('konfirmasi', '0'); // Hanya yang belum dikonfirmasi
        return $this->db->get('pengaduan')->row();
    }
}