<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Post extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Post_model');
        $this->load->model('Category_model');
        $this->load->model('Post_category_model');
        $this->load->model('Tag_model');
        $this->load->model('Post_tag_model');
        check_login();
    }

    /*
     * Listing of posts
     */
    function index()
    {
        // $data['posts'] = $this->Post_model->get_all_posts();
        $data['posts'] = $this->Post_model->get_all_posts_by_user_id();

        $data['_view'] = 'post/index';
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('post/index', $data);
        $this->load->view('template/footer');
    }

    /*
     * Adding a new post
     */
    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        $this->form_validation->set_rules('published_at', 'Published At', 'required');
        $this->form_validation->set_rules('published', 'Published', 'required');
        $this->form_validation->set_rules('category_id', 'Category', 'required');

        if ($this->form_validation->run()) {
            $params = array(
                'parrent_id' => $this->input->post('parrent_id'),
                'published' => $this->input->post('published'),
                'author_id' => user_info()['id'],
                'title' => $this->input->post('title'),
                // 'meta_title' => $this->input->post('meta_title'),
                // 'slug' => $this->input->post('slug'),
                // 'summary' => $this->input->post('summary'),
                'created_at' => datetime_now(),
                'updated_at' => datetime_now(),
                'published_at' => $this->input->post('published_at'),
                'content' => $this->input->post('content'),
            );

            $post_id = $this->Post_model->add_post($params);

            // tambahkan kedalam tabel kategori
            $category_id = (int)$this->input->post('category_id');

            // cek kategorinya
            if ($category_id) {

                $post_category = [
                    'post_id' => $post_id,
                    'category_id' => $category_id,
                ];

                $post_category_id = $this->Post_category_model->add_post_category($post_category);
            }

            // tambahkan kedalam tabel tag
            $tags_id = $this->input->post('tag_id[]');

            // cek tags id nya
            if ($tags_id) {
                foreach ($tags_id as $tag_id) {
                    # code...
                    $post_tag = [
                        'post_id' => $post_id,
                        'tag_id' => $tag_id,
                    ];
                    $post_tag_id = $this->Post_tag_model->add_post_tag($post_tag);
                }
            }

            redirect('post/index');
        } else {
            $data['all_posts'] = $this->Post_model->get_all_posts_by_user_id();
            $data['all_category'] = $this->Category_model->get_all_category_join_pengajar();
            $data['all_tag'] = $this->Tag_model->get_all_tag_join_pengajar();

            $data['_view'] = 'post/add';
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('post/add', $data);
            $this->load->view('template/footer');
        }
    }

    /*
     * Editing a post
     */
    function edit($id)
    {
        // check if the post exists before trying to edit it
        $data['post'] = $this->Post_model->get_post($id);
        $data['post_category'] = $this->Post_category_model->get_post_category_by_post_id($id);
        $data['post_tag'] = $this->Post_tag_model->get_post_tag_join_tag($id);

        // echo json_encode($data['post']);
        // die;

        if (isset($data['post']['id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('content', 'Content', 'required');
            $this->form_validation->set_rules('published_at', 'Published At', 'required');
            $this->form_validation->set_rules('published', 'Published', 'required');
            $this->form_validation->set_rules('category_id', 'Category', 'required');
            // $this->form_validation->set_rules('tag_id[]', 'Tag minimal pilih 1', 'required');


            if ($this->form_validation->run()) {
                $params = array(
                    'parrent_id' => $this->input->post('parrent_id'),
                    'published' => $this->input->post('published'),
                    'author_id' => user_info()['id'],
                    'title' => $this->input->post('title'),
                    // 'meta_title' => $this->input->post('meta_title'),
                    // 'slug' => $this->input->post('slug'),
                    // 'summary' => $this->input->post('summary'),
                    // 'created_at' => $this->input->post('created_at'),
                    'updated_at' => datetime_now(),
                    'published_at' => $this->input->post('published_at'),
                    'content' => $this->input->post('content'),
                );

                $this->Post_model->update_post($id, $params);

                // update post category
                $category_id = (int)$this->input->post('category_id');

                // cek kategori
                if ($category_id) {

                    $post_category = [
                        // 'post_id' => $post_id,
                        'category_id' => $category_id,
                    ];

                    $post_category_id = $this->Post_category_model->update_post_category_by_post_id($id, $post_category);
                }

                // update post tag

                $tags_id = $this->input->post('tag_id[]');
                // hapus dulu semua tag yang terkait dengan post id
                $this->db->delete('post_tag', ['post_id' => $id]);

                // cek tags id nya
                if ($tags_id) {
                    // jika ada tag yang dipilih
                    foreach ($tags_id as $tag_id) {
                        # code...
                        $post_tag = [
                            'post_id' => $id,
                            'tag_id' => $tag_id,
                        ];

                        $post_tag_id = $this->Post_tag_model->add_post_tag($post_tag);
                    }
                } else {
                    // hapus dulu semua tag yang terkait dengan post id
                    $this->db->delete('post_tag', ['post_id' => $id]);
                }

                redirect('post/index');
            } else {
                $data['all_posts'] = $this->Post_model->get_all_posts_by_user_id();
                $data['all_category'] = $this->Category_model->get_all_category_join_pengajar();
                $data['all_tag'] = $this->Tag_model->get_all_tag_join_pengajar();

                $data['_view'] = 'post/edit';
                $this->load->view('template/header');
                $this->load->view('template/sidebar');
                $this->load->view('post/edit', $data);
                $this->load->view('template/footer');
            }
        } else
            show_error('The post you are trying to edit does not exist.');
    }

    /*
     * Deleting post
     */
    function remove($id)
    {
        $post = $this->Post_model->get_post($id);

        // check if the post exists before trying to delete it
        if (isset($post['id'])) {
            $this->Post_model->delete_post($id);
            redirect('post/index');
        } else
            show_error('The post you are trying to delete does not exist.');
    }

    function view($id)
    {
        $data['post'] = $this->Post_model->get_post($id);

        // var_dump($data);
        // die;
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('post/view', $data);
        $this->load->view('template/footer');
    }
}
