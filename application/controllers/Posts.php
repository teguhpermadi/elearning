<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Posts extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Posts_model');
        check_login();
    }

    function index()
    {
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('posts/index');
        $this->load->view('template/footer');
    }

    function add()
    {
        // dapatkan kategori dan tag berdasarkan table pengajar
        $data['category'] = $this->Posts_model->get_category_by();
        $data['tags'] = $this->Posts_model->get_tag_by();
        $data['script'] = "
        $('.summernote').summernote({
            height: 250, //set editable area's height
            codemirror: { // codemirror options
              theme: 'monokai'
            },
            placeholder: 'Tulis konten disini'
        })

        var now = new Date();
        var day = ('0' + now.getDate()).slice(-2);
        var month = ('0' + (now.getMonth() + 1)).slice(-2);
        var today = now.getFullYear()+'-'+(month)+'-'+(day) ;
        $('#date').val(today);

        $('#tanggal').hide(); 
        $('#status').change(function(){
            if($('#status').val() == 'terbit') {
                $('#tanggal').hide(); 
            } else if ($('#status').val() == 'draf') {
                $('#tanggal').hide(); 
            }
            else {
                $('#tanggal').show(); 
            } 
        });
        ";

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('posts/add', $data);
        $this->load->view('template/footer', $data);
    }

    function edit()
    {
    }

    function update()
    {
    }

    function remove()
    {
    }
}
