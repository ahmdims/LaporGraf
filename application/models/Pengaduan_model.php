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

    // Update an existing complaint
    public function update($id, $data)
    {
        return $this->db->update('pengaduan', $data, ['id_pengaduan' => $id]);
    }

    // Delete a complaint
    public function delete($id)
    {
        return $this->db->delete('pengaduan', ['id_pengaduan' => $id]);
    }
}

// You also need a Kategori_model.php to fetch categories
class Kategori_model extends CI_Model
{
    public function get_all()
    {
        return $this->db->get('kategori')->result();
    }
}