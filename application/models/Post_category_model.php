<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Post_category_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get post_category by id
     */
    function get_post_category($id)
    {
        return $this->db->get_where('post_category',array('id'=>$id))->row_array();
    }

    function get_post_category_by_post_id($post_id)
    {
        return $this->db->get_where('post_category',array('post_id'=>$post_id))->row_array();
    }

    function get_post_category_join_category($post_id)
    {
        return $this->db->select('*')
        ->from('post_category')
        ->join('category', 'category.id = post_category.category_id', 'left')
        ->where('post_category.post_id', $post_id)
        ->get()->row_array();
    }

    /*
     * Get all post_category
     */
    function get_all_post_category()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('post_category')->result_array();
    }
        
    /*
     * function to add new post_category
     */
    function add_post_category($params)
    {
        $this->db->insert('post_category',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update post_category
     */
    function update_post_category($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('post_category',$params);
    }

    function update_post_category_by_post_id($post_id,$params)
    {
        $this->db->where('post_id',$post_id);
        return $this->db->update('post_category',$params);
    }
    
    /*
     * function to delete post_category
     */
    function delete_post_category($id)
    {
        return $this->db->delete('post_category',array('id'=>$id));
    }
}