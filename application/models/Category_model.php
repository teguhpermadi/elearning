<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Category_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get category by id
     */
    function get_category($id)
    {
        return $this->db->get_where('category',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all category
     */
    function get_all_category()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('category')->result_array();
    }
        
    /*
     * function to add new category
     */
    function add_category($params)
    {
        $this->db->insert('category',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update category
     */
    function update_category($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('category',$params);
    }
    
    /*
     * function to delete category
     */
    function delete_category($id)
    {
        return $this->db->delete('category',array('id'=>$id));
    }
}