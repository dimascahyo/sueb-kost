<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Pengaduan extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengaduan_model', 'pengaduan');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if($id === null){
            $pengaduan = $this->pengaduan->getPengaduan();
        }else{
            $pengaduan = $this->pengaduan->getPengaduan($id);
        }

        if($pengaduan){
            $this->response([
                'status' => true,
                'data' => $pengaduan
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
        $id = $this->delete('id');

        if($id === null){
            $this->response([
                'status' => false,
                'message' => 'Provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if($this->pengaduan->deletePengaduan($id) > 0){
                // ok
                $this->response([
                    'status' => true,
                    'id' => $id,
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
            'aduan' => $this->post('aduan'),
            'status' => $this->post('status'),
        ];

        if($this->pengaduan->createPengaduan($data) > 0 ){
            $this->response([
                'status' => true,
                'message' => 'Data Pengaduan berhasil ditambahkan!'
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
        $id = $this->put('id');
        $data = [
            'id_kamar' => $this->put('id_kamar'),
            'nama' => $this->put('nama'),
            'aduan' => $this->put('aduan'),
            'status' => $this->put('status'),
        ];

        $existing_pengaduan = $this->pengaduan->getPengaduanById($id);
        if (!$existing_pengaduan) {
            // Jika data dengan ID yang diberikan tidak ditemukan,
            // maka mengembalikan respons kesalahan
            $this->response([
                'status' => false,
                'message' => 'Pengaduan not found!'
            ], REST_Controller::HTTP_NOT_FOUND);
            return;
        }

        // Memeriksa apakah data yang dikirimkan sama persis dengan data yang sudah ada di database
        if (
            $data['id_kamar'] === $existing_pengaduan['id_kamar'] &&
            $data['nama'] === $existing_pengaduan['nama'] &&
            $data['aduan'] === $existing_pengaduan['aduan'] &&
            $data['status'] === $existing_pengaduan['status']
        ) {
            // Jika data yang dikirimkan sama persis dengan data yang sudah ada di database,
            // maka tidak ada perubahan yang perlu dilakukan
            $this->response([
                'status' => true,
                'message' => 'No changes detected.'
            ], REST_Controller::HTTP_OK);
            return;
        }

        if($this->pengaduan->updatePengaduan($data, $id) > 0 ){
            $this->response([
                'status' => true,
                'message' => 'Data Pengaduan berhasil diedit!'
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