<?php

class Profil_user_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_user()
    {
        $user_id = user_info()['id'];
        return $this->db->get_where('users', ['id' => $user_id])->row_array();
    }
}