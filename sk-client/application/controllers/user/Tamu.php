<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tamu extends CI_Controller
{
  public function __construct()
  {
      parent::__construct();
      $this->load->model('Tamu_model');
      $this->load->library('form_validation');
  }

  public function index()
  {
      $data['judul'] = 'Daftar Tamu';
      $data['tamu'] = $this->Tamu_model->getAllTamu();
  
      $this->load->view('user/tamu_views.php', $data);
  }

  public function tambah()
  {
      $data['judul'] = 'Form Tamu';

      $this->form_validation->set_rules('id_kamar', 'Kamar', 'required');
      $this->form_validation->set_rules('nama_penghuni', 'Nama Penghuni', 'required');
      $this->form_validation->set_rules('nama_tamu', 'Nama Tamu', 'required');
      $this->form_validation->set_rules('kontak_tamu', 'Kontak Tamu', 'required');
      $this->form_validation->set_rules('alasan', 'Alasan', 'required');

      if ($this->form_validation->run() == false) {
          $this->load->view('user/tambah_tamu');
      } else {
          $this->Tamu_model->tambahDataTamu();
          // $this->session->set_flashdata('flash', 'Ditambahkan');
          redirect('user/tamu');
      }
  }

}
