<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Tag_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get tag by id
     */
    function get_tag($id)
    {
        return $this->db->get_where('tag',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all tag
     */
    function get_all_tag()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('tag')->result_array();
    }
        
    /*
     * function to add new tag
     */
    function add_tag($params)
    {
        $this->db->insert('tag',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update tag
     */
    function update_tag($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('tag',$params);
    }
    
    /*
     * function to delete tag
     */
    function delete_tag($id)
    {
        return $this->db->delete('tag',array('id'=>$id));
    }
}