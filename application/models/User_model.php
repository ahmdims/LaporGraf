<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function get_users($table, $role = null)
    {
        if ($role) {
            $this->db->where('role', $role);
        }
        return $this->db->get($table)->result();
    }

    public function get_user_by_id($table, $user_id)
    {
        return $this->db->get_where($table, ['user_id' => $user_id])->row();
    }

    public function insert($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function update($table, $user_id, $data)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->update($table, $data);
    }

    public function delete($table, $user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->delete($table);
    }
}