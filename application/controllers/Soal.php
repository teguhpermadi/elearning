<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Soal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Soal_model');
    }

    /*
     * Listing of soal
     */
    function index()
    {
        $data['soal'] = $this->Soal_model->get_all_soal();

        $data['_view'] = 'soal/index';
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('soal/index', $data);
        $this->load->view('template/footer');
    }

    /*
     * Adding a new soal
     */
    function add()
    {
        if (isset($_POST) && count($_POST) > 0) {
            $jenis_soal = $this->input->post('jenis_soal');
            if ($jenis_soal == 1) {
                // jika soal pilihan ganda
                $params = array(
                    'mapel_id' => $this->input->post('mapel_id'),
                    'tingkat' => $this->input->post('tingkat'),
                    'jenis_soal' => $this->input->post('jenis_soal'),
                    'author_id' => user_info()['id'],
                    'created_at' => datetime_now(),
                    'soal' => $this->input->post('soal'),
                    'skor' => $this->input->post('skor'),
                    'petunjuk' => $this->input->post('petunjuk'),
                    'kunci' => $this->input->post('kunci[1]'), // ambil array ke-1
                    'pembahasan' => $this->input->post('pembahasan'),
                    'opsi' => json_encode([
                        'a' => $this->input->post('opsi[0]'),
                        'b' => $this->input->post('opsi[1]'),
                        'c' => $this->input->post('opsi[2]'),
                        'd' => $this->input->post('opsi[3]'),
                    ]),
                );
            } else {
                // jika soal isian
                $params = array(
                    'mapel_id' => $this->input->post('mapel_id'),
                    'tingkat' => $this->input->post('tingkat'),
                    'jenis_soal' => $this->input->post('jenis_soal'),
                    'author_id' => user_info()['id'],
                    'created_at' => datetime_now(),
                    'soal' => $this->input->post('soal'),
                    'skor' => $this->input->post('skor'),
                    'petunjuk' => $this->input->post('petunjuk'),
                    'kunci' => $this->input->post('kunci[0]'), // ambil array ke-0
                    'pembahasan' => $this->input->post('pembahasan'),
                    'opsi' => null,
                );
            }

            $soal_id = $this->Soal_model->add_soal($params);
            redirect('soal/index');
            // header('Content-Type: application/json');
            // echo json_encode($params);
        } else {
            $this->load->model('Mapel_model');
            $this->load->model('Category_model');
            $data['all_mapel'] = $this->Category_model->get_all_category_join_pengajar();
            // $data['all_mapel'] = $this->Mapel_model->get_all_mapel();
            $data['js'] = $this->load->view('soal/js_add', $data, true);

            $data['_view'] = 'soal/add';
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('soal/add', $data);
            $this->load->view('template/footer');
        }
    }

    /*
     * Editing a soal
     */
    function edit($id)
    {
        // check if the soal exists before trying to edit it
        $data['soal'] = $this->Soal_model->get_soal($id);
        // echo json_encode($data['soal']);

        // die;
        if (isset($data['soal']['id'])) {
            if (isset($_POST) && count($_POST) > 0) {
                $jenis_soal = $this->input->post('jenis_soal');
                if ($jenis_soal == '1') {
                    // jika soal pilihan ganda
                    $params = array(
                        'mapel_id' => $this->input->post('mapel_id'),
                        'tingkat' => $this->input->post('tingkat'),
                        // 'jenis_soal' => $this->input->post('jenis_soal'),
                        // 'author_id' => user_info()['id'],
                        // 'created_at' => datetime_now(),
                        'soal' => $this->input->post('soal'),
                        'skor' => $this->input->post('skor'),
                        'petunjuk' => $this->input->post('petunjuk'),
                        'kunci' => $this->input->post('kunci'),
                        'pembahasan' => $this->input->post('pembahasan'),
                        'opsi' => json_encode([
                            'a' => $this->input->post('opsi[0]'),
                            'b' => $this->input->post('opsi[1]'),
                            'c' => $this->input->post('opsi[2]'),
                            'd' => $this->input->post('opsi[3]'),
                        ]),
                    );
                } else {
                    // jika soal isian
                    $params = array(
                        'mapel_id' => $this->input->post('mapel_id'),
                        'tingkat' => $this->input->post('tingkat'),
                        // 'jenis_soal' => $this->input->post('jenis_soal'),
                        // 'author_id' => user_info()['id'],
                        // 'created_at' => datetime_now(),
                        'soal' => $this->input->post('soal'),
                        'skor' => $this->input->post('skor'),
                        'petunjuk' => $this->input->post('petunjuk'),
                        'kunci' => $this->input->post('kunci'),
                        'pembahasan' => $this->input->post('pembahasan'),
                        'opsi' => null,
                    );
                }

                // $params = array(
                //     'mapel_id' => $this->input->post('mapel_id'),
                //     'tingkat' => $this->input->post('tingkat'),
                //     // 'jenis_soal' => $this->input->post('jenis_soal'),
                //     // 'author_id' => user_info()['id'],
                //     // 'created_at' => datetime_now(),
                //     'soal' => $this->input->post('soal'),
                //     'skor' => $this->input->post('skor'),
                //     'petunjuk' => $this->input->post('petunjuk'),
                //     'kunci' => $this->input->post('kunci[0]'),
                //     'pembahasan' => $this->input->post('pembahasan'),
                //     'opsi' => $this->input->post('opsi'),
                // );

                $this->Soal_model->update_soal($id, $params);
                redirect('soal/index');
            } else {
                $this->load->model('Mapel_model');
                $data['all_mapel'] = $this->Mapel_model->get_all_mapel();
                $data['js'] = $this->load->view('soal/js_add', $data, true);

                $data['_view'] = 'soal/edit';
                $this->load->view('template/header');
                $this->load->view('template/sidebar');
                $this->load->view('soal/edit', $data);
                $this->load->view('template/footer');
            }
        } else
            show_error('The soal you are trying to edit does not exist.');
    }

    /*
     * Deleting soal
     */
    function remove($id)
    {
        $soal = $this->Soal_model->get_soal($id);

        // check if the soal exists before trying to delete it
        if (isset($soal['id'])) {
            $this->Soal_model->delete_soal($id);
            redirect('soal/index');
        } else
            show_error('The soal you are trying to delete does not exist.');
    }
    
}