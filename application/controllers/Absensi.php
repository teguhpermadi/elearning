<?php

class Absensi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Absensi_model');
        $this->load->model('Nilai_model');
        $this->load->model('Post_model');
    }

    /*
     * Listing of category
     */
    function index()
    {
        $data['all_class'] = $this->Nilai_model->get_my_class();
        $data['all_post'] = $this->Post_model->get_all_posts_by_user_id();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('absensi/index', $data);
        $this->load->view('template/footer');
    }

    function absen()
    {
        $post_id = $this->input->post('post_id');
        $data = [
            'user_id' => user_info()['id'],
            'ip_address' => $this->input->ip_address(),
            'time_access' => datetime_now(),
            'post_id' => $post_id,
        ];

        $this->db->insert('absensi', $data);
        echo json_encode('Anda sudah absensi');
        // return true;
    }
}
