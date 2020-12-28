<?php

class Flipbook_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function read_image($token)
    {
        $this->db->select('*')->from('upload')->where_in('token', $token);
        return  $this->db->last_query();
    }
}
