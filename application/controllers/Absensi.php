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
        $data['siswa_absen'] = $this->Absensi_model->siswa_absen();
        $data['all_post_for_siswa'] = $this->Absensi_model->get_all_post();

        $role = user_info()['role'];
        switch ($role) {
            case 'guru':
                # code...
                $this->load->view('template/header');
                $this->load->view('template/sidebar');
                $this->load->view('absensi/rekap_guru', $data);
                $this->load->view('template/footer');
                break;
            case 'siswa':
                # code...
                $this->load->view('template/header');
                $this->load->view('template/sidebar');
                $this->load->view('absensi/rekap_siswa', $data);
                $this->load->view('template/footer');
                break;
        }
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

        // capaian
        $capaian = [
            'user_id' => user_info()['id'],
            'skor' => 1
        ];

        $this->db->insert('capaian', $capaian);
    }
}
