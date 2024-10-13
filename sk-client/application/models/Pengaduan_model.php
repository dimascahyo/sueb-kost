<?php
use GuzzleHttp\Client;

class Pengaduan_model extends CI_model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/sueb_kost/sk-server/api/'
        ]);
    }

    public function getAllPengaduan()
    {
        $response = $this->_client->request('GET', 'pengaduan');

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }

    public function getPengaduanById($id)
    {
        $response = $this->_client->request('GET', 'pengaduan', [
            'query' => [
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'][0];
    }

    public function tambahDataPengaduan()
    {
        $data = [
            "id_kamar" => $this->input->post('id_kamar', true),
            "nama" => $this->input->post('nama', true),
            "aduan" => $this->input->post('aduan', true),
            "status" => "Belum Selesai",
        ];

        $response = $this->_client->request('POST', 'pengaduan', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'][0];
    }

    public function hapusDataPengaduan($id)
    {
        $response = $this->_client->request('DELETE', 'pengaduan', [
            'form_params' => [
                'id' => $id
            ]
        ]);

        return $result;
    }

    

    public function ubahDataPengaduan()
    {
        $data = [
            "id" => $this->input->post('id', true),
            "id_kamar" => $this->input->post('id_kamar', true),
            "nama" => $this->input->post('nama', true),
            "aduan" => $this->input->post('aduan', true),
            "status" => $this->input->post('status', true),
        ];

        $response = $this->_client->request('PUT', 'pengaduan', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'][0];
    }

    public function sendFonnte()
    {
        $pesan = $_POST['aduan'];
        $from = $_POST['id_kamar'];
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
        'target' => '082234766193',
        'message' => "$pesan, Aduan dari kamar $from",
        'countryCode' => '62'),
        CURLOPT_HTTPHEADER => array(
            'Authorization: _huFDPg-ytTpo602wgps'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
}