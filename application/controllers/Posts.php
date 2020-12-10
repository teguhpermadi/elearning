<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Posts extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Posts_model');
        $this->load->model('Category_model');
        $this->load->model('Tags_model');
        check_login();
        $this->load->library('upload');
    }

    function index()
    {
        $data['all_posts'] = $this->Posts_model->get_all_posts();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('posts/index', $data);
        $this->load->view('template/footer');
    }

    function add()
    {
        // dapatkan kategori dan tag berdasarkan table pengajar
        $data['category'] = $this->Posts_model->get_category_by();
        $data['tags'] = $this->Posts_model->get_tag_by();
        date_default_timezone_set('Asia/Jakarta');
        $data['datetime'] = date("Y-m-d\TH:i:s");

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('posts/add', $data);
        $this->load->view('template/footer');
    }

    function save()
    {

        date_default_timezone_set('Asia/Jakarta');
        $date_now = date("Y-m-d\TH:i");

        // handel status
        switch ($this->input->post('status')) {
            case 'terbitkan':
                $status = 1;
                $date = $date_now;
                break;
            case 'draf':
                $status = 0;
                $date = $date_now;
                break;
            case 'jadwalkan':
                $status = 1;
                $date = $this->input->post('date');
                break;

            default:
                $status = 1;
                $date = $date_now;
                break;
        }

        $params = [
            'author_id' => user_info()['id'],
            // 'parrent_id' => 
            'title' => $this->input->post('title'),
            // 'meta_title' => 
            'slug' => $this->input->post('slug'),
            // 'summary' => 
            'published' => $status,
            'created_at' => $date_now,
            // 'updated_at' => 
            'published_at' => $date,
            'content' => $this->input->post('content'),
        ];

        // print_r($params);

        $id_posts = $this->Posts_model->add_posts($params);

        $posts_category = [
            'post_id' => $id_posts,
            'category_id' => (int)$this->input->post('category'),
        ];
        $id_category = $this->Posts_model->add_posts_category($posts_category);

        $tags = $this->input->post('option[]');
        foreach ($tags as $tag) {
            $data_tag  = [
                'post_id' => $id_posts,
                'tag_id' => (int)$tag,
            ];
            $id_tag = $this->Posts_model->add_posts_tag($data_tag);
        }

        redirect('posts');
        // print_r($params);
        // print_r($posts_category);
        // print_r($data_tag);
    }

    function preview()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date_now = date("Y-m-d H:i");

        $data = [
            'author_id' => user_info()['id'],
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'published_at' => $date_now,
            'category' => $this->input->post('category'),
            'tags' => $this->input->post('option[]'),
        ];

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('posts/preview', $data);
        $this->load->view('template/footer');
    }

    function view($id)
    {
        $data['data_post'] = $this->Posts_model->get_post($id);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('posts/view', $data);
        $this->load->view('template/footer');
    }

    function edit($id)
    {
        $data['category'] = $this->Posts_model->get_category_by();
        $data['tags'] = $this->Posts_model->get_tag_by();
        $data['data_post'] = $this->Posts_model->get_post($id);
        $data['data_category'] = $this->Posts_model->get_category_by_post_id($id);
        $data['data_tag'] = $this->Posts_model->get_tag_by_post_id($id);

        // print_r($data['data_tag']);
        // die;

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('posts/edit', $data);
        $this->load->view('template/footer');
    }

    function update($post_id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date_now = date("Y-m-d\TH:i");

        // handel status
        switch ($this->input->post('status')) {
            case 'terbitkan':
                $status = 1;
                $date = $date_now;
                break;
            case 'draf':
                $status = 0;
                $date = $date_now;
                break;
            case 'jadwalkan':
                $status = 1;
                $date = $this->input->post('date');
                break;

            default:
                $status = 1;
                $date = $date_now;
                break;
        }

        $params = [
            'author_id' => user_info()['id'],
            // 'parrent_id' => 
            'title' => $this->input->post('title'),
            // 'meta_title' => 
            'slug' => $this->input->post('slug'),
            // 'summary' => 
            'published' => $status,
            // 'created_at' => $date_now,
            'updated_at' => $date_now,
            'published_at' => $date,
            'content' => $this->input->post('content'),
        ];

        $post_category = [
            // 'post_id' => $post_id,
            'category_id' => (int)$this->input->post('category'),
        ];

        $tags = $this->input->post('option[]');
        $post_tags = [];
        foreach ($tags as $tag) {
            array_push($post_tags, [
                'post_id' => $post_id,
                'tag_id' => (int)$tag,
            ]);
        }

        // update post
        $this->Posts_model->post_update($post_id, $params, $post_category, $post_tags);
        // print_r($params);
        // print_r($post_category);
        // print_r($post_tags);

        redirect('posts');

    }

    function remove($id)
    {
        $this->Posts_model->remove_post($id);
        redirect('posts');
    }

    //Upload image summernote
    function upload_image()
    {
        if (isset($_FILES["image"]["name"])) {
            $config['upload_path'] = 'uploads/posts/images/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['overwrite'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('image')) {
                $this->upload->display_errors();
                return FALSE;
            } else {
                $data = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './uploads/posts/images/' . $data['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '60%';
                $config['width'] = 800;
                $config['height'] = 800;
                $config['new_image'] = './uploads/posts/images/' . $data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                echo base_url() . 'uploads/posts/images/' . $data['file_name'];
            }
        }
    }

    //Delete image summernote
    function delete_image()
    {
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        if (unlink($file_name)) {
            echo 'File Delete Successfully';
        }
    }
}
