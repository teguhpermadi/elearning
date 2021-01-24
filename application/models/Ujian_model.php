<?php

class Ujian_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function all_soal($tingkat, $mapel_id)
    {
        $author_id = user_info()['id'];
        return $this->db->select('soal.*, mapel.nama as namamapel')
        ->from('soal')
        ->where('soal.author_id', $author_id)
        ->join('mapel', 'mapel.id = soal.mapel_id')
        ->where('soal.tingkat', $tingkat)
        ->where('soal.mapel_id', $mapel_id)
        // ->where('soal.meta["category"]', $category)
        // ->where('soal.meta["tag"]', $tag)
        ->order_by('id', 'asc')
        ->get()->result_array();
    }

    function load_soal($id){
        return $this->db->get_where('soal', ['id' => $id])->row_array();
    }

    function get_all_ujian()
    {
        $author_id = user_info()['id'];
        return $this->db->select('ujian.*, mapel.nama as nama_mapel')
        ->from('ujian')
        ->where('author_id', $author_id)
        ->join('mapel', 'mapel.id = ujian.mapel_id')
        ->get()->result_array();
    }

    function save_ujian($params)
    {
        $this->db->insert('ujian',$params);
        return $this->db->insert_id();
    }

    function add_soalujian($params)
    {
        $this->db->insert('soal_ujian',$params);
        return $this->db->insert_id();
    }

    function count_soal($id)
    {
        $total = $this->db->get_where('soal_ujian', ['ujian_id' => $id])->num_rows();
        $pilgan = $this->db->select('soal_ujian.*')->from('soal_ujian')->where('soal_ujian.ujian_id', $id)->where('soal.jenis_soal = 1')->join('soal', 'soal.id = soal_ujian.soal_id')->get()->num_rows();
        $isian = $this->db->select('soal_ujian.*')->from('soal_ujian')->where('soal_ujian.ujian_id', $id)->where('soal.jenis_soal = 2')->join('soal', 'soal.id = soal_ujian.soal_id')->get()->num_rows();
        return [
            'total' => $total,
            'pilgan' => $pilgan,
            'isian' => $isian
        ];
    }

    function get_ujian($id)
    {
        return $this->db->get_where('ujian', ['id' => $id])->row_array();
    }

    function get_soal_ujian($id)
    {
        return $this->db->select('*')
        ->from('soal_ujian')
        ->where('soal_ujian.ujian_id', $id)
        // ->join('soal', 'soal.id = soal_ujian.soal_id')
        ->get()->result_array();
    }

    function update_ujian($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('ujian',$params);
    }
}
