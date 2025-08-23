<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status_model extends CI_Model
{

    public function get_all()
    {
        return $this->db->get('status')->result();
    }

    public function get_by_petugas($petugas)
    {
        return $this->db->get_where('status', ['petugas' => $petugas])->result();
    }

    public function get_by_id_and_petugas($id, $petugas)
    {
        return $this->db->get_where('status', ['id_status' => $id, 'petugas' => $petugas])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('status', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_status', $id);
        return $this->db->update('status', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_status', $id);
        return $this->db->delete('status');
    }
}