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

        $this->load->view('admin/penghuni_views.php', $data);
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Penghuni';

        $this->form_validation->set_rules('id_kamar', 'Kamar', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
        $this->form_validation->set_rules('kontak', 'Kontak', 'required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/tambah_penghuni');
        } else {
            $this->Penghuni_model->tambahDataPenghuni();
            // $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/penghuni');
        }
    }

    public function hapus($id_kamar)
    {
        $this->Penghuni_model->hapusDataPenghuni($id_kamar);
        // $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/penghuni');
    }

    public function edit($id_kamar)
    {
        $data['judul'] = 'Form Edit Data Penghuni';
        $data['penghuni'] = $this->Penghuni_model->getPenghuniById($id_kamar);

        $this->form_validation->set_rules('id_kamar', 'Kamar', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
        $this->form_validation->set_rules('kontak', 'Kontak', 'required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/edit_penghuni', $data);
        } else {
            $this->Penghuni_model->ubahDataPenghuni();
            // $this->session->set_flashdata('flash', 'Diubah');
            redirect('admin/penghuni');
        }
    }
}
