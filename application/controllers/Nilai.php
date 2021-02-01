<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Nilai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Nilai_model');
        $this->load->model('Rombel_model');
        check_login();
    }

    // rekap nilai guru
    function index()
    {
        $data['all_class'] = $this->Nilai_model->get_my_class();
        $data['all_nilai'] = $this->Nilai_model->get_all_nilai();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nilai/rekap_guru', $data);
        $this->load->view('template/footer');
    }

    function tes()
    {
        $user_id = user_info()['id'];
        $this->db->select('posts.id as post_id, post_category.category_id, post_tag.tag_id, users.id as siswa_id, nilai.nilai, nilai.keterangan')
            ->from('posts')
            ->where('author_id', $user_id)
            ->join('post_category', 'post_category.post_id = posts.id')
            ->join('post_tag', 'post_tag.post_id = posts.id')
            // ->join('kelas', 'kelas.id = post_tag.tag_id')
            ->join('rombel', 'rombel.id_kelas = post_tag.tag_id')
            ->join('users', 'users.id = rombel.id_siswa')
            ->join('nilai', 'nilai.siswa_id = users.id', 'right')
            ->order_by('siswa_id', 'asc')
            ->order_by('post_id','asc')
            ->get()->result_array();
        $tes = $this->db->last_query();
        // echo json_encode($tes);
        echo $tes;
    }
}
