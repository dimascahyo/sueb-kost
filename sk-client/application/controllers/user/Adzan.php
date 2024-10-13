<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adzan extends CI_Controller
{

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Adzan_model'); // Memuat model yang telah dibuat
    }

    public function index()
    {
        $adzan_data = $this->Adzan_model->get_adzan_schedule(); // Memanggil method model untuk mendapatkan data jadwal adzan

        $data = array('adzan_data' => $adzan_data);
        $this->load->view('user/adzan_views', $data);
    }
}
