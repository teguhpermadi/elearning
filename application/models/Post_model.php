<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Post_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get post by id
     */
    function get_post($id)
    {
        return $this->db->get_where('posts', array('id' => $id))->row_array();
    }

    /*
     * Get all posts
     */
    function get_all_posts()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('posts')->result_array();
    }

    function get_all_posts_by_user_id()
    {
        $user_id = user_info()['id'];
        return $this->db->get_where('posts', array('author_id' => $user_id))->result_array();
    }

    function get_all_posts_by_category_id($category_id)
    {
        return $this->db->select('*')
            ->from('post')
            ->join('post_category', 'post.id = post_category.post_id')
            ->where('post_category.category_id', $category_id)
            ->get()->result_array();
    }

    function get_all_posts_by_tag_id()
    {
    }

    /*
     * function to add new post
     */
    function add_post($params)
    {
        $this->db->insert('posts', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update post
     */
    function update_post($id, $params)
    {
        $this->db->where('id', $id);
        return $this->db->update('posts', $params);
    }

    /*
     * function to delete post
     */
    function delete_post($id)
    {
        return $this->db->delete('posts', array('id' => $id));
    }

    // get user info
    function get_user($id)
    {
        return $this->db->get_where('users', array('id' => $id))->row_array();
    }

    function add_comment($params)
    {
        $this->db->insert('post_comment', $params);
        return $this->db->insert_id();

    }

    function load_comment($post_id)
    {
        return $this->db->select('post_comment.*, users.first_name')
        ->from('post_comment')
        ->where('post_comment.post_id', $post_id)
        ->where('post_comment.parrent_id', 0)
        ->join('users', 'post_comment.author_id = users.id')
        ->get()
        ->result_array();
    }

    function load_reply($post_id, $parrent_id)
    {
        return $this->db->select('post_comment.*, users.first_name')
        ->from('post_comment')
        ->where('post_comment.post_id', $post_id)
        ->where('post_comment.parrent_id', $parrent_id)
        ->join('users', 'post_comment.author_id = users.id')
        ->get();
    }

    function attachfile($attachfile){
        $this->db->insert('attachfile', $attachfile);
        return $this->db->insert_id();
    }

    function get_attachfile($id)
    {
        return $this->db->select('attachfile.*, upload.*')
        ->from('attachfile')
        ->where('attachfile.post_id', $id)
        ->join('upload', 'attachfile.token = upload.token')
        ->get()
        ->result_array();
    }

    // dapatkan file yang sudah diupload user
    function get_file()
    {
        $author_id = user_info()['id'];
        return $this->db->get_where('upload', ['author_id' => $author_id])->result_array();
    }

    function read_file($token)
    {
        return $this->db->select('*')
        ->from('upload')
        ->where('token', $token)
        ->get()
        ->row_array();
    }
    

}
