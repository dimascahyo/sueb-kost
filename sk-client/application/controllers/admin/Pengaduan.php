<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengaduan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Daftar Pengaduan';
        $data['pengaduan'] = $this->Pengaduan_model->getAllPengaduan();
		
        $this->load->view('admin/pengaduan_views.php', $data);
    }

    // public function tambah()
    // {
    //     $data['judul'] = 'Form Pengaduan';

    //     $this->form_validation->set_rules('id_kamar', 'Kamar', 'required');
    //     $this->form_validation->set_rules('nama', 'Nama', 'required');
    //     $this->form_validation->set_rules('aduan', 'Aduan', 'required');

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('admin/tambah_pengaduan');
    //     } else {
    //         $this->Pengaduan_model->tambahDataPengaduan();
    //         // $this->session->set_flashdata('flash', 'Ditambahkan');
    //         redirect('admin/beranda_controller');
    //     }
    // }

    public function hapus($id)
    {
        $this->Pengaduan_model->hapusDataPengaduan($id);
        // $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/pengaduan');
    }

    public function edit($id)
    {
        $data['judul'] = 'Form Edit Data Pengaduan';
        $data['pengaduan'] = $this->Pengaduan_model->getPengaduanById($id);

        $this->form_validation->set_rules('id', 'id', 'required|numeric');
        $this->form_validation->set_rules('id_kamar', 'Kamar', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('aduan', 'Aduan', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/edit_pengaduan', $data);
        } else {
            $this->Pengaduan_model->ubahDataPengaduan();
            // $this->session->set_flashdata('flash', 'Diubah');
            redirect('admin/pengaduan');
        }
    }

}
