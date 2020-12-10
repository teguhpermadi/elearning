<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Posts_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_all_posts()
    {
        return $this->db->select('*')
            ->from('posts')->get()->result_array();
    }

    function get_post($id)
    {
        return $this->db->get_where('posts', array('id' => $id))->row_array();
    }

    function get_category_by()
    {
        $id_user = user_info()['id'];
        return $this->db->select('category.*')
            ->from('pengajar')
            ->where('pengajar.id_guru', $id_user)
            ->join('category', 'category.id = pengajar.id_mapel')
            ->group_by('category.title')
            ->get()->result_array();
    }

    function get_tag_by()
    {
        $id_user = user_info()['id'];
        return $this->db->select('tag.*')
            ->from('pengajar')
            ->where('pengajar.id_guru', $id_user)
            ->join('tag', 'tag.id = pengajar.id_kelas')
            ->group_by('tag.title')
            ->get()->result_array();
    }

    function add_posts($params)
    {
        $this->db->insert('posts', $params);
        return $this->db->insert_id();
    }

    function add_posts_category($params)
    {
        $this->db->insert('post_category', $params);
        return $this->db->insert_id();
    }

    function add_posts_tag($params)
    {
        $this->db->insert('post_tag', $params);
        return $this->db->insert_id();
    }

    function get_category_by_post_id($id)
    {
        return $this->db->select('category.*')->from('post_category')->where('post_category.post_id', $id)
            ->join('category', 'category.id = post_category.category_id')
            ->get()->result_array();
    }

    function get_tag_by_post_id($id)
    {
        $id_user = user_info()['id'];
        return $this->db->select('post_tag.*, tag.*')
        ->from('pengajar')
        ->where('pengajar.id_guru='.$id_user)
            ->join('tag', 'tag.id = pengajar.id_kelas')
            ->join('post_tag', 'post_tag.tag_id = tag.id', 'left')
            ->order_by('tag.id', 'asc')
            // ->where('post_tag.post_id',$id)
            ->get()->result_array();

            // return $this->db->last_query();
    }

    function remove_post($id)
    {
        $this->db->delete('posts', array('id' => $id));
        $this->db->delete('post_category', array('post_id' => $id));
        $this->db->delete('post_tag', array('post_id' => $id));
    }

    function get_user_info($id)
    {
        // pengganti $this
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

    function post_update($id, $params, $post_category, $post_tags)
    {
        // update table posts
        $this->db->where('id', $id);
        $this->db->update('posts', $params);
        // update table posts_category
        $this->db->where('post_id', $id);
        $this->db->update('post_category', $post_category);
        // hapus semua data terkait post_tag berdasarkan post_id
        $this->db->delete('post_tag', array('post_id' => $id));
        // inputkan tag baru
        $this->db->insert_batch('post_tag', $post_tags);
    }
}
