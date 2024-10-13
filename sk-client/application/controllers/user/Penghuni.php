<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penghuni extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penghuni_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Daftar Penghuni';
        $data['penghuni'] = $this->Penghuni_model->getAllPenghuni();

        $this->load->view('user/penghuni_views.php', $data);
    }
}
