<?php
// application/controllers/Auth.php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function login()
    {

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $admin = $this->Auth_model->checkAdminLogin($username, $password);
        $penghuni = $this->Auth_model->checkPenghuniLogin($username, $password);

        if ($admin) {
            // Login sebagai admin
            //$this->session->set_userdata('user_type', 'admin');
            // Lakukan sesuatu setelah berhasil login sebagai admin
            $this->load->view('admin/beranda_views');
        } else if ($penghuni) {
            // Login sebagai penghuni
            //$this->session->set_userdata('user_type', 'penghuni');
            // Lakukan sesuatu setelah berhasil login sebagai penghuni
            $this->load->view('user/beranda_views');
        } else {
            // Tidak ditemukan username dan password yang cocok
            // Redirect atau tampilkan pesan error
            $msg['error'] = true;
            $this->load->view('login', $msg);
        }
    }
}