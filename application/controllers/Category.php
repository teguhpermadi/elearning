<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_login();
    }

    function index()
    {
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('category/index');
        $this->load->view('template/footer');
    }

    function add()
    {
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('category/add');
        $this->load->view('template/footer');
    }
}
