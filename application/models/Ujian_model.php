<?php

class Ujian_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_soal()
    {
        $author_id = user_info()['id'];
        return $this->db->select('*')
        ->from('soal')
        ->where('soal.aktif', 1)
        ->where('soal.author_id', $author_id)
        // ->where('soal.meta["category"]', $category)
        // ->where('soal.meta["tag"]', $tag)
        ->order_by('id', 'asc')
        ->get()->result_array();
    }

    function load_soal($id){
        return $this->db->get_where('soal', ['id' => $id])->row_array();
    }

    function get_ujian()
    {
        return $this->db->select('*')
        ->from('ujian')
        ->get()->result_array();
    }
}
