<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Rombel_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get rombel by id
     */
    function get_rombel($id)
    {
        return $this->db->get_where('rombel',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all rombel
     */
    function get_all_rombel()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('rombel')->result_array();
    }
        
    /*
     * function to add new rombel
     */
    function add_rombel($params)
    {
        $this->db->insert('rombel',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update rombel
     */
    function update_rombel($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('rombel',$params);
    }
    
    /*
     * function to delete rombel
     */
    function delete_rombel($id)
    {
        return $this->db->delete('rombel',array('id'=>$id));
    }

    function get_siswa()
    {
        $this->db->select('users.id, users.first_name');
        $this->db->from('users');
        $this->db->join('users_groups', 'users_groups.user_id = users.id');
        $this->db->join('groups', 'users_groups.group_id = groups.id');
        $this->db->where('users.active', 1);
        $this->db->where('groups.name', 'siswa');
        $this->db->where('users.id NOT IN (SELECT id_siswa FROM rombel)', null, false);
        return $this->db->get()->result_array();
    }

    function get_siswa_by_kelas($id_kelas)
    {
        return $this->db->select('rombel.id as id, users.first_name, users.last_name, users.id as user_id')
        ->from('users')
        ->join('rombel', 'users.id = rombel.id_siswa')
        ->where('rombel.id_kelas ='.$id_kelas)
        ->get()
        ->result_array();
    }

    // dapatkan semua siswa kemudian berikan check pada masing2 siswa untuk masing2
    function get_siswa_by_rombel($id_kelas)
    {
        return $this->db->select('users.id, users.first_name, rombel.id_kelas as check')
        ->from('users')
        ->join('rombel', 'users.id = rombel.id_siswa', 'left')
        ->join('users_groups', 'users_groups.user_id = users.id')
        ->join('groups', 'users_groups.group_id = groups.id')
        ->where('users.active', 1)
        ->where('groups.name = "siswa"')
        ->get()
        ->result_array();
    }
}
