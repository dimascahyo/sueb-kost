<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda_controller extends CI_Controller
{

	public function index()
	{
		$this->load->view('admin/beranda_views.php');
	}
}
