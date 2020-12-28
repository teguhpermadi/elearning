<?php

class Flipbook extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        check_login();
        $this->load->model('Flipbook_model');
        $this->load->library('upload');
    }

    function add_flip()
    {
        $data['js'] = $this->load->view('flipbook/js_flip', '', true);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('flipbook/add_flip');
        $this->load->view('template/footer', $data);
    }

    function read_image()
    {
        $token = $this->input->post('token[]');
        // // $token = '0.8885598641218861';
        $val = array_values($token);
        $img = $this->Post_model->read_image($val);
        echo json_encode($val);
    }
}