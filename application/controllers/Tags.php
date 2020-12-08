<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tags extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tags_model');
        check_login();
    }

    function index()
    {
        $data['script'] = "$('#tableTag').DataTable();";

        $data['data_tags'] = $this->Tags_model->get_all_tags();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('tags/index', $data);
        $this->load->view('template/footer', $data);
    }

}
