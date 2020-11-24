<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil_sekolah extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		check_login();
	}

	public function index()
	{

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('profil_sekolah/index');
		$this->load->view('template/footer');
	}
}
