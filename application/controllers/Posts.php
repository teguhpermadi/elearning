<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Posts extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    function index()
    {
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('posts/index');
        $this->load->view('template/footer');
    }

    function add()
    {
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('posts/add');
        $this->load->view('template/footer');

    }

    function edit()
    {

    }

    function update()
    {

    }

    function remove()
    {

    }
}
