<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Nilai extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Nilai_model');
        $this->load->model('Rombel_model');
        check_login();
    } 

    // rekap nilai guru
    function index()
    {
        $data['all_class'] = $this->Nilai_model->get_my_class();
        
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nilai/rekap_guru',$data);
        $this->load->view('template/footer');
    }
    
}