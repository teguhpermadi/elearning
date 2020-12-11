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
        return $this->db->get_where('posts',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all posts
     */
    function get_all_posts()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('posts')->result_array();
    }
        
    /*
     * function to add new post
     */
    function add_post($params)
    {
        $this->db->insert('posts',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update post
     */
    function update_post($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('posts',$params);
    }
    
    /*
     * function to delete post
     */
    function delete_post($id)
    {
        return $this->db->delete('posts',array('id'=>$id));
    }
}