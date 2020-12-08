<?php

class Profil_user extends CI_Controller
{
    function __construct()
	{
        parent::__construct();
        check_login();

    }

    public function index()
    {
        $data['script'] = '';

        $user = $this->ion_auth->user()->row();
        $user_groups = $this->ion_auth->get_users_groups($user->id)->result();
        $data['user'] = $user;
        $data['user_groups'] = $user_groups;

        // print_r($data);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('profil_user/index', $data);
        $this->load->view('template/footer', $data);
    }
}