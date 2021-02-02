<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		check_login();
		$this->load->model('Dashboard_model');
		$this->load->model('Profil_sekolah_model');
	}

	public function index()
	{
		$data['count_guru'] = $this->Dashboard_model->count_guru();
		$data['count_siswa'] = $this->Dashboard_model->count_siswa();
		$data['count_mapel'] = $this->Dashboard_model->count_mapel();
		$data['profil_sekolah'] = $this->Profil_sekolah_model->get_all_profil_sekolah();
		$data['all_post'] = $this->Dashboard_model->get_all_post();
		$data['js'] = $this->load->view('dashboard/js_index', $data, true);


		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('dashboard/index', $data);
		$this->load->view('template/footer');
	}
}
