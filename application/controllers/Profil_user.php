<?php

class Profil_user extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_login();
        $this->load->model('Profil_user_model');
        $this->load->library('upload');
    }

    public function index()
    {
        $user = $this->ion_auth->user()->row();
        $user_groups = $this->ion_auth->get_users_groups($user->id)->result();
        $data['user'] = $this->Profil_user_model->get_user();
        $data['user_groups'] = $user_groups;
        // $data['js'] = $this->load->view('profil_user/js_index', $data, true);

        // print_r($data);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('profil_user/index', $data);
        $this->load->view('template/footer', $data);
    }

    function update()
    {
        $user_id = user_info()['id'];
        $phone = $this->input->post('phone');
        $nomor_induk = $this->input->post('nomor_induk');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $alamat = $this->input->post('alamat');
        $biografi = $this->input->post('biografi');
        $pendidikan = $this->input->post('pendidikan');
        $url_fb = $this->input->post('url_fb');
        $url_twitter = $this->input->post('url_twitter');
        $url_instagram = $this->input->post('url_instagram');
        $url_youtube = $this->input->post('url_youtube');

        // upload foto
        $config['upload_path']          = 'uploads/';
        $config['allowed_types']        = 'jpg';
        $config['overwrite']            = true;
        $config['file_name']            = 'foto_user_'.$user_id;

        $this->upload->initialize($config);
        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            // var_dump($error);
            $params = [
                'phone' => $phone,
                'nomor_induk' => $nomor_induk,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'alamat' => $alamat,
                'biografi' => $biografi,
                'pendidikan' => $pendidikan,
                'url_fb' => $url_fb,
                'url_twitter' => $url_twitter,
                'url_instagram' => $url_instagram,
                'url_youtube' => $url_youtube,
            ];
        } else {
            $data = array('upload_data' => $this->upload->data());
            var_dump($data);
            $params = [
                'foto' => $data['upload_data']['file_name'],
                'phone' => $phone,
                'nomor_induk' => $nomor_induk,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'alamat' => $alamat,
                'biografi' => $biografi,
                'pendidikan' => $pendidikan,
                'url_fb' => $url_fb,
                'url_twitter' => $url_twitter,
                'url_instagram' => $url_instagram,
                'url_youtube' => $url_youtube,
            ];
        }     

        $this->db->where('id', $user_id);
        $this->db->update('users', $params);
        // echo json_encode($params);
        redirect('profil_user');
    }
}
