<?php

class Tamu_model extends CI_Model
{
    public function getTamu($id = null)
    {
        if($id === null){
            return $this->db->get('tamu')->result_array();
        }else{
            return $this->db->get_where('tamu', ['id' => $id])->result_array();
        }
    }

    public function deleteTamu($id)
    {
        $this->db->delete('tamu', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createTamu($data)
    {
        $this->db->insert('tamu', $data);
        return $this->db->affected_rows();
    }

    public function updateTamu($data, $id)
    {
        $this->db->update('tamu', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}