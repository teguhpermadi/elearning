<?php

class Dashboard_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function count_guru()
    {
        return $this->db->get_where('users_groups', ['group_id' => 2])->num_rows();
    }
    function count_siswa()
    {
        return $this->db->get_where('users_groups', ['group_id' => 3])->num_rows();
    }
    function count_mapel()
    {
        $query = $this->db->query('SELECT * FROM mapel');
        return $query->num_rows();
    }

    function cek_login()
    {
        return $this->db->select('*')
        ->from('user_longtime')
        ->join('users', 'users.id = user_longtime.user_id')
        ->get()
        ->result_array();
    }
}
