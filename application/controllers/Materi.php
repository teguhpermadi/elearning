<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
        {
				parent::__construct();
                check_login();
                $this->load->model('Materi_model');
                $this->load->model('Mapel_model');
				$this->load->model('Pengajar_model');
				$this->load->library('upload');
        }

	public function index()
	{

        $data['kelas'] = $this->Materi_model->get_kelas_by_rombel();
        $data['all_mapel'] = $this->Materi_model->get_all_mapel();

        // var_dump($data['all_mapel']);

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('materi/all_mapel', $data);
		$this->load->view('template/footer');
    }
    
    function view_mapel()
    {
		$uri = explode('-', $this->uri->segment(3));
		$id_mapel = $uri[0];
		$id_kelas = $uri[1];
		
		$data['mapel_kelas'] = [
			'id_mapel' => $id_mapel,
			'id_kelas' => $id_kelas,
		];

        $data['mapel'] = $this->Mapel_model->get_mapel($id_mapel);
		$data['pengajar'] = $this->Pengajar_model->get_pengajar_by_mapel_and_kelas($id_mapel, $id_kelas);

        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('materi/view_mapel', $data);
		$this->load->view('template/footer');
	}
	
	function upload_files()
    {
        $config['upload_path']   = 'uploads/';
        $config['allowed_types'] = '*';
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $this->upload->initialize($config);

        if ($this->upload->do_upload('userfile')) {
            $token = $this->input->post('token');
            $post_id = $this->input->post('post_id');
            $file_name = $this->upload->data('file_name');
			$file_extension = $this->upload->data('file_ext');
			
			// insert data ke tabel upload
            $this->db->insert('upload', [
                'file_name' => $file_name,
                'token' => $token, 
                'author_id' => user_info()['id'],
				'file_extension' => $file_extension,
				'milik' => user_info()['role'],
				
				]);
				
			// insert data ke tabel attachfile
			$this->db->insert('attachfile', [
				'post_id' => $post_id,
				'author_id' => user_info()['id'],
				'token' => $token, 
				'created_at' => datetime_now(),
				'milik' => user_info()['role'],
			]);
        }
    }

    function delete_files()
    {

        $token = $this->input->post('token');
        $query = $this->db->get_where('upload', array('token' => $token));

        if ($query->num_rows() > 0) {

            $data = $query->row();
            $file_name = $data->file_name;


            if (file_exists($file = FCPATH . 'uploads/' . $file_name)) {
                unlink($file);
            }
        }
        $this->db->delete('upload', array('token' => $token));
        $this->db->delete('attachfile', array('token' => $token));
        echo json_encode(array('deleted' => true));
    }
}
