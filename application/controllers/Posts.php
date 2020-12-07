<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Posts extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Posts_model');
        check_login();
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
        // dapatkan kategori dan tag berdasarkan table pengajar
        $data['category'] = $this->Posts_model->get_category_by();
        $data['tags'] = $this->Posts_model->get_tag_by();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('posts/add', $data);
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
