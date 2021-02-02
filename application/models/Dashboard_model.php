<?php

class Dashboard_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function count_guru()
    {
        return $this->db->get_where('users_groups', ['group_id' => 2])->num_rows();
    }

    function count_siswa()
    {
        return $this->db->get_where('users_groups', ['group_id' => 3])->num_rows();
    }
    
    function count_mapel()
    {
        $query = $this->db->query('SELECT * FROM mapel');
        return $query->num_rows();
    }
    
    function get_all_post()
    {
        $role = user_info()['role'];
        $user_id = user_info()['id'];
        switch ($role) {
            case 'admin':
                return $this->db->select('posts.*, category.title as categorytitle')
                ->from('posts')
                ->join('post_category', 'post_category.post_id = posts.id')
                ->join('category', 'category.id = post_category.category_id')
                ->get()
                ->result_array();
                break;
            case 'guru':
                return $this->db->select('posts.*, category.title as categorytitle')
                ->from('posts')
                ->where('author_id', $user_id)
                ->join('post_category', 'post_category.post_id = posts.id')
                ->join('category', 'category.id = post_category.category_id')
                ->get()
                ->result_array();
                break;
            case 'siswa':
                return $this->db->select('posts.*, category.title as categorytitle')
                ->from('posts')
                ->join('post_tag', 'post_tag.post_id = posts.id')
                ->join('rombel', 'rombel.id_kelas = post_tag.tag_id')
                ->where('rombel.id_siswa', $user_id)
                ->join('post_category', 'post_category.post_id = posts.id')
                ->join('category', 'category.id = post_category.category_id')
                ->get()
                ->result_array();
                break;
        }
    }
}
