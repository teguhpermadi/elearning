<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Pengajar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pengajar_model');
    }

    /*
     * Listing of pengajar
     */
    function index()
    {
        $data['pengajar'] = $this->Pengajar_model->get_all_pengajar();
        $data['all_guru'] = $this->ion_auth->users('guru')->result_array();

        $data['_view'] = 'pengajar/index';
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pengajar/index', $data);
        $this->load->view('template/footer');
    }

    /*
     * Adding a new pengajar
     */
    function add()
    {
        if (isset($_POST) && count($_POST) > 0) {
            $data = [];
            $id_kelas = $this->input->post('id_kelas[]');

            foreach ($id_kelas as $kelas) {
                array_push($data, [
                    'id_mapel' => $this->input->post('id_mapel'),
                    'id_guru' => $this->input->post('id_guru'),
                    'id_kelas' => $kelas,
                ]);
            }
            // print_r($data);
            $this->db->insert_batch('pengajar', $data);
            // $pengajar_id = $this->Pengajar_model->add_pengajar($params);
            redirect('pengajar/index');
        } else {
            $this->load->model('Mapel_model');
            $data['all_mapel'] = $this->Mapel_model->get_all_mapel();

            $data['all_guru'] = $this->ion_auth->users('guru')->result_array();

            $this->load->model('Kelas_model');
            $data['all_kelas'] = $this->Kelas_model->get_all_kelas();

            $data['_view'] = 'pengajar/add';
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('pengajar/add', $data);
            $this->load->view('template/footer');
        }
    }

    /*
     * Editing a pengajar
     */
    function edit($id_guru)
    {

        $this->load->model('Mapel_model');
        $data['all_mapel'] = $this->Mapel_model->get_all_mapel();

        $this->load->model('Kelas_model');
        $data['all_kelas'] = $this->Kelas_model->get_all_kelas();
        $data['all_guru'] = $this->ion_auth->users('guru')->result_array();
        $data['data_mapel'] = $this->Pengajar_model->get_mapel_for_edit($id_guru);

        $data['pengajar'] = [
            'id_guru' => $id_guru,
        ];

        $data['_view'] = 'pengajar/edit';
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pengajar/edit', $data);
        $this->load->view('template/footer');
    }

    /*
     * Deleting pengajar
     */
    function remove($id)
    {
        $pengajar = $this->Pengajar_model->get_pengajar($id);

        // check if the pengajar exists before trying to delete it
        if (isset($pengajar['id'])) {
            $this->Pengajar_model->delete_pengajar($id);
            redirect('pengajar/index');
        } else
            show_error('The pengajar you are trying to delete does not exist.');
    }
}
