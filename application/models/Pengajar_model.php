<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Pengajar_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get pengajar by id
     */
    function get_pengajar($id)
    {
        return $this->db->get_where('pengajar',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all pengajar
     */
    function get_all_pengajar()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('pengajar')->result_array();
    }
        
    /*
     * function to add new pengajar
     */
    function add_pengajar($params)
    {
        $this->db->insert('pengajar',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update pengajar
     */
    function update_pengajar($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('pengajar',$params);
    }
    
    /*
     * function to delete pengajar
     */
    function delete_pengajar($id)
    {
        return $this->db->delete('pengajar',array('id'=>$id));
    }
}