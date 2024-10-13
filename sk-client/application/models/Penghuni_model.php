<?php

use GuzzleHttp\Client;

class Penghuni_model extends CI_model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/sueb_kost/sk-server/api/'
        ]);
    }

    public function getAllPenghuni()
    {
        $response = $this->_client->request('GET', 'penghuni');

        $result = json_decode($response->getBody()->getContents(), true);


        return $result['data'];
    }

    public function getPenghuniById($id_kamar)
    {
        $response = $this->_client->request('GET', 'penghuni', [
            'query' => [
                'id_kamar' => $id_kamar
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'][0];
    }

    public function tambahDataPenghuni()
    {
        $data = [
            "id_kamar" => $this->input->post('id_kamar', true),
            "nama" => $this->input->post('nama', true),
            "nik" => $this->input->post('nik', true),
            "kontak" => $this->input->post('kontak', true),
            "alamat" => $this->input->post('alamat', true),
            "password" => $this->input->post('password', true),
        ];

        $response = $this->_client->request('POST', 'penghuni', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'][0];
    }

    public function hapusDataPenghuni($id_kamar)
    {
        $response = $this->_client->request('DELETE', 'penghuni', [
            'form_params' => [
                'id_kamar' => $id_kamar
            ]
        ]);

        return $result;
    }

    public function ubahDataPenghuni()
    {
        $data = [
            "id_kamar" => $this->input->post('id_kamar', true),
            "nama" => $this->input->post('nama', true),
            "nik" => $this->input->post('nik', true),
            "kontak" => $this->input->post('kontak', true),
            "alamat" => $this->input->post('alamat', true),
            "password" => $this->input->post('password', true),
        ];

        $response = $this->_client->request('PUT', 'penghuni', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'][0];
    }
}
