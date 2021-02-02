<?php
 
class Absensi_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_all_siswa_by_class($id_kelas){
        return $this->db->select('concat(users.first_name, " " ,users.last_name) as nama, users.id as user_id')
        ->from('rombel')
        ->where('rombel.id_kelas', $id_kelas)
        ->join('users', 'users.id = rombel.id_siswa')
        ->get()
        ->result_array();
    }

    function check_absen($user_id, $post_id)
    {
        return $this->db->get_where('absensi', ['user_id' => $user_id, 'post_id' => $post_id])->row_array();    }
}