<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function login($userId, $password)
    {
        $this->db->where('user_id', $userId);
        $guru = $this->db->get('guru')->row();

        if ($guru) {
            if (password_verify($password, $guru->password)) {
                return $guru;
            }
        }

        $this->db->where('user_id', $userId);
        $siswa = $this->db->get('siswa')->row();

        if ($siswa) {
            if (password_verify($password, $siswa->password)) {
                return $siswa;
            }
        }

        return false;
    }
}