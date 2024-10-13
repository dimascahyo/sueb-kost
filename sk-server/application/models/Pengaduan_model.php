<?php

class Pengaduan_model extends CI_Model
{
    public function getPengaduan($id = null)
    {
        if($id === null){
            return $this->db->get('pengaduan')->result_array();
        }else{
            return $this->db->get_where('pengaduan', ['id' => $id])->result_array();
        }
    }

    public function deletePengaduan($id)
    {
        $this->db->delete('pengaduan', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createPengaduan($data)
    {
        $this->db->insert('pengaduan', $data);
        return $this->db->affected_rows();
    }

    public function updatePengaduan($data, $id)
    {
        $this->db->update('pengaduan', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function getPengaduanById($id)
    {
        // Lakukan query untuk mendapatkan data pengaduan berdasarkan ID
        $query = $this->db->get_where('pengaduan', ['id' => $id]);

        // Periksa apakah ada hasil dari query
        if ($query->num_rows() > 0) {
            // Jika ada data, kembalikan hasil dalam bentuk array
            return $query->row_array();
        } else {
            // Jika tidak ada data dengan ID yang diberikan, kembalikan null
            return null;
        }
    }
}