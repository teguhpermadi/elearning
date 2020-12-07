<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Category_model');
        check_login();
    }

    function index()
    {
        $data['all_category'] = $this->Category_model->get_all_category();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('category/index', $data);
        $this->load->view('template/footer');
    }

}
