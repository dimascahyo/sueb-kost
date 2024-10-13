<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Penghuni extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penghuni_model', 'penghuni');
    }

    public function index_get()
    {
        $id_kamar = $this->get('id_kamar');
        if($id_kamar === null){
            $penghuni = $this->penghuni->getPenghuni();
        }else{
            $penghuni = $this->penghuni->getPenghuni($id_kamar);
        }

        if($penghuni){
            $this->response([
                'status' => true,
                'data' => $penghuni
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id_kamar = $this->delete('id_kamar');

        if($id_kamar === null){
            $this->response([
                'status' => false,
                'message' => 'Provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if($this->penghuni->deletePenghuni($id_kamar) > 0){
                // ok
                $this->response([
                    'status' => true,
                    'id_kamar' => $id_kamar,
                    'message' => 'Deleted!'
                ], REST_Controller::HTTP_NO_CONTENT);
            }else{
                // id not found
                $this->response([
                    'status' => false,
                    'message' => 'Id not found!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'id_kamar' => $this->post('id_kamar'),
            'nama' => $this->post('nama'),
            'nik' => $this->post('nik'),
            'kontak' => $this->post('kontak'),
            'alamat' => $this->post('alamat'),
            'password' => $this->post('password'),
        ];

        if($this->penghuni->createPenghuni($data) > 0 ){
            $this->response([
                'status' => true,
                'message' => 'Penghuni berhasil didaftarkan!'
            ], REST_Controller::HTTP_CREATED);
        }else{
            $this->response([
                'status' => false,
                'message' => 'Failed!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
    public function index_put()
    {
        $id_kamar = $this->put('id_kamar');
        $data = [
            'id_kamar' => $this->put('id_kamar'),
            'nama' => $this->put('nama'),
            'nik' => $this->put('nik'),
            'kontak' => $this->put('kontak'),
            'alamat' => $this->put('alamat'),
            'password' => $this->put('password'),
        ];

        $existing_penghuni = $this->penghuni->getPenghuniById($id_kamar);
        if (!$existing_penghuni) {
            // Jika data dengan ID kamar yang diberikan tidak ditemukan,
            // maka mengembalikan respons kesalahan
            $this->response([
                'status' => false,
                'message' => 'Penghuni not found!'
            ], REST_Controller::HTTP_NOT_FOUND);
            return;
        }

        // Memeriksa apakah data yang dikirimkan sama persis dengan data yang sudah ada di database
        if (
            $data['id_kamar'] === $existing_penghuni['id_kamar'] &&
            $data['nama'] === $existing_penghuni['nama'] &&
            $data['nik'] === $existing_penghuni['nik'] &&
            $data['kontak'] === $existing_penghuni['kontak'] &&
            $data['alamat'] === $existing_penghuni['alamat'] &&
            $data['password'] === $existing_penghuni['password']
        ) {
            // Jika data yang dikirimkan sama persis dengan data yang sudah ada di database,
            // maka tidak ada perubahan yang perlu dilakukan
            $this->response([
                'status' => true,
                'message' => 'No changes detected.'
            ], REST_Controller::HTTP_OK);
            return;
        }

        if($this->penghuni->updatePenghuni($data, $id_kamar) > 0 ){
            $this->response([
                'status' => true,
                'message' => 'Penghuni berhasil diedit!'
            ], REST_Controller::HTTP_NO_CONTENT);
        }else{
            // id not found
            $this->response([
                'status' => false,
                'message' => 'Failed to update!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}