<?php

class Penghuni_model extends CI_Model
{
    public function getPenghuni($id_kamar = null)
    {
        if($id_kamar === null){
            return $this->db->get('penghuni')->result_array();
        }else{
            return $this->db->get_where('penghuni', ['id_kamar' => $id_kamar])->result_array();
        }
    }

    public function deletePenghuni($id_kamar)
    {
        $this->db->delete('penghuni', ['id_kamar' => $id_kamar]);
        return $this->db->affected_rows();
    }

    public function createPenghuni($data)
    {
        $this->db->insert('penghuni', $data);
        return $this->db->affected_rows();
    }

    public function updatePenghuni($data, $id_kamar)
    {
        $this->db->update('penghuni', $data, ['id_kamar' => $id_kamar]);
        return $this->db->affected_rows();
    }

    public function getPenghuniById($id_kamar)
    {
        // Lakukan query untuk mendapatkan data penghuni berdasarkan ID
        $query = $this->db->get_where('penghuni', ['id_kamar' => $id_kamar]);

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