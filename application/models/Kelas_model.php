<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Kelas_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get kela by id
     */
    function get_kelas($id)
    {
        return $this->db->get_where('kelas',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all kelas
     */
    function get_all_kelas()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('kelas')->result_array();
    }
        
    /*
     * function to add new kela
     */
    function add_kelas($params)
    {
        $this->db->insert('kelas',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update kela
     */
    function update_kelas($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('kelas',$params);
    }
    
    /*
     * function to delete kela
     */
    function delete_kelas($id)
    {
        return $this->db->delete('kelas',array('id'=>$id));
    }
}
