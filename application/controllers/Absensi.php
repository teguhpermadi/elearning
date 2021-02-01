<?php

class Absensi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Absensi_model');
    }

    /*
     * Listing of category
     */
    function index()
    {
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('absensi/index');
        $this->load->view('template/footer');
    }

    function absen()
    {
        $url = $this->input->post('url');
        $data = [
            'user_id' => user_info()['id'],
            'ip_address' => $this->input->ip_address(),
            'time_access' => datetime_now(),
            'url' => $url,
        ];

        $this->db->insert('user_longtime', $data);
    }
}
