<?php
// application/models/Auth_model.php

class Auth_model extends CI_Model
{
    public function checkAdminLogin($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('admin');

        return $query->row();
    }

    public function checkPenghuniLogin($username, $password)
    {
        $this->db->where('id_kamar', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('penghuni');

        return $query->row();
    }
}
