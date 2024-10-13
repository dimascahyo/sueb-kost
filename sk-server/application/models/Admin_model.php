<?php

class Admin_model extends CI_Model
{
    public function getAdmin($id = null)
    {
        if($id === null){
            return $this->db->get('admin')->result_array();
        }else{
            return $this->db->get_where('admin', ['id' => $id])->result_array();
        }
    }

    public function deleteAdmin($id)
    {
        $this->db->delete('admin', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createAdmin($data)
    {
        $this->db->insert('admin', $data);
        return $this->db->affected_rows();
    }

    public function updateAdmin($data, $id)
    {
        $this->db->update('admin', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}