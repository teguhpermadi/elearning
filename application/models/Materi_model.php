<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Materi_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    

    function get_kelas_by_rombel()
    {
        $user_id = user_info()['id'];
        return $this->db->select('*')
        ->from('rombel')
        ->where('rombel.id_siswa', $user_id)
        ->join('kelas', 'kelas.id = rombel.id_kelas')
        ->get()->row_array();
    }

    function get_all_mapel()
    {
        $user_id = user_info()['id'];
        return $this->db->select('mapel.*')
        ->from('rombel')
        ->where('rombel.id_siswa', $user_id)
        ->join('kelas', 'kelas.id = rombel.id_kelas')
        ->join('pengajar', 'pengajar.id_kelas = kelas.id')
        ->join('mapel', 'mapel.id = pengajar.id_mapel')
        ->get()->result_array();
    }

    function get_post_by_auhtor_category_tag($author_id, $id_mapel, $id_kelas)
    {
        return $this->db->select('posts.*')
        ->from('posts')
        ->join('post_category', 'post_category.post_id = posts.id')
        ->join('post_tag', 'post_tag.post_id = posts.id')
        ->where('posts.author_id', $author_id)
        ->where('post_category.category_id', $id_mapel)
        ->where('post_tag.tag_id', $id_kelas)
        ->where('posts.published != 0')
        ->order_by('posts.id', 'desc')
        ->get()->result_array();

        // return $this->db->last_query();
    }

    function get_guru_by_mapel_and_kelas($id_mapel, $id_kelas)
    {

    }
}