<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Tamu extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tamu_model', 'tamu');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if($id === null){
            $tamu = $this->tamu->getTamu();
        }else{
            $tamu = $this->tamu->getTamu($id);
        }

        if($tamu){
            $this->response([
                'status' => true,
                'data' => $tamu
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
            if($this->tamu->deleteTamu($id) > 0){
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
            'nama_penghuni' => $this->post('nama_penghuni'),
            'nama_tamu' => $this->post('nama_tamu'),
            'kontak_tamu' => $this->post('kontak_tamu'),
            'alasan' => $this->post('alasan'),
        ];

        if($this->tamu->createTamu($data) > 0 ){
            $this->response([
                'status' => true,
                'message' => 'Data Tamu berhasil ditambahkan!'
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
            'nama_penghuni' => $this->put('nama_penghuni'),
            'nama_tamu' => $this->put('nama_tamu'),
            'kontak_tamu' => $this->put('kontak_tamu'),
            'alasan' => $this->put('alasan'),
        ];

        if($this->tamu->updateTamu($data, $id) > 0 ){
            $this->response([
                'status' => true,
                'message' => 'Data Tamu berhasil diedit!'
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