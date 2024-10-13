<?php
use GuzzleHttp\Client;

class Tamu_model extends CI_model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/sueb_kost/sk-server/api/'
        ]);
    }

    public function getAllTamu()
    {
        $response = $this->_client->request('GET', 'tamu');

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }

    // public function getTamuById($id)
    // {
    //     $response = $this->_client->request('GET', 'tamu', [
    //         'query' => [
    //             'id' => $id
    //         ]
    //     ]);

    //     $result = json_decode($response->getBody()->getContents(), true);

    //     return $result['data'][0];
    // }

    public function tambahDataTamu()
    {
        $data = [
            "id_kamar" => $this->input->post('id_kamar', true),
            "nama_penghuni" => $this->input->post('nama_penghuni', true),
            "nama_tamu" => $this->input->post('nama_tamu', true),
            "kontak_tamu" => $this->input->post('kontak_tamu', true),
            "alasan" => $this->input->post('alasan', true),
        ];

        $response = $this->_client->request('POST', 'tamu', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'][0];
    }

    // public function ubahDataTamu()
    // {
    //     $data = [
    //         "id_kamar" => $this->input->post('id_kamar', true),
    //         "nama_penghuni" => $this->input->post('nama_penghuni', true),
    //         "nama_tamu" => $this->input->post('nama_tamu', true),
    //         "kontak_tamu" => $this->input->post('kontak_tamu', true),
    //         "alasan" => $this->input->post('alasan', true),
    //     ];

    //     $response = $this->_client->request('PUT', 'tamu', [
    //         'form_params' => $data
    //     ]);

    //     $result = json_decode($response->getBody()->getContents(), true);
    //     return $result['data'][0];
    // }

    // public function hapusDataTamu($id)
    // {
    //     $response = $this->_client->request('DELETE', 'tamu', [
    //         'form_params' => [
    //             'id' => $id
    //         ]
    //     ]);

    //     return $result;
    // }
}