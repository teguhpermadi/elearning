<?php
 
class Absensi_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_all_siswa_by_class($id_kelas){
        return $this->db->select('concat(users.first_name, " " ,users.last_name) as nama, users.id as user_id')
        ->from('rombel')
        ->where('rombel.id_kelas', $id_kelas)
        ->join('users', 'users.id = rombel.id_siswa')
        ->get()
        ->result_array();
    }

    function check_absen($user_id, $post_id)
    {
        return $this->db->get_where('absensi', ['user_id' => $user_id, 'post_id' => $post_id])->row_array();    
    }

    function siswa_absen()
    {
        $user_id = user_info()['id'];
        return $this->db->select('')
        ->from('absensi')
        ->where('absensi.user_id', $user_id)
        ->get()
        ->result_array();
    }

    function get_all_post()
    {
        $user_id = user_info()['id'];
        $my_class = $this->db->get_where('rombel', ['id_siswa' => $user_id])->row_array();

        return $this->db->select('posts.*, mapel.nama')
        ->from('post_tag')
        ->where('post_tag.tag_id', $my_class['id_kelas'])
        ->join('posts', 'posts.id = post_tag.post_id', 'left')
        ->join('post_category', 'post_category.post_id = posts.id')
        ->join('mapel', 'mapel.id = post_category.category_id')
        ->get()
        ->result_array();
    }
}