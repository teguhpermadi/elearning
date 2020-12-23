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
        $this->load->library('upload');
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
                        'tag_id' => (int)$tag_id,
                    ];
                    $post_tag_id = $this->Post_tag_model->add_post_tag($post_tag);
                }
            }

            // simpan data file yang di upload
            $token = $this->input->post('token[]');
            if ($token) {
                foreach ($token as $value) {
                    # code...
                    $attachfile = [
                        'post_id' => $post_id,
                        'author_id' => user_info()['id'],
                        'token' => $value,
                        'created_at' => datetime_now(),
                    ];

                    // print_r($attachfile);
                    $this->Post_model->attachfile($attachfile);
                }
            }

            redirect('post/index');
        } else {
            $data['all_posts'] = $this->Post_model->get_all_posts_by_user_id();
            $data['all_category'] = $this->Category_model->get_all_category_join_pengajar();
            $data['all_tag'] = $this->Tag_model->get_all_tag_join_pengajar();
            $data['get_file'] = $this->Post_model->get_file();
            $data['js'] = $this->load->view('post/js_add', $data, true);

            $data['_view'] = 'post/add';
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('post/add', $data);
            $this->load->view('template/footer', $data);
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
        $data['attachfile'] = $this->Post_model->get_attachfile($id);
        // echo json_encode($data['post_tag']);
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
                }

                // simpan data file yang di upload
                $token = $this->input->post('token[]');
                // hapus dulu semua data attachfile terkait post ini
                $this->db->delete('attachfile', ['post_id' => $id]);

                if ($token) {
                    foreach ($token as $value) {
                        # code...
                        $attachfile = [
                            'post_id' => $id,
                            'author_id' => user_info()['id'],
                            'token' => $value,
                            'created_at' => datetime_now(),
                        ];

                        // print_r($attachfile);
                        $this->Post_model->attachfile($attachfile);
                    }
                }

                redirect('post/index');
            } else {
                $data['all_posts'] = $this->Post_model->get_all_posts_by_user_id();
                $data['all_category'] = $this->Category_model->get_all_category_join_pengajar();
                $data['all_tag'] = $this->Tag_model->get_all_tag_join_pengajar();
                $data['js'] = $this->load->view('post/js_add', $data, true);

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
            $this->db->delete('attachfile', ['post_id' => $id]);
            redirect('post/index');
        } else
            show_error('The post you are trying to delete does not exist.');
    }

    function view($id)
    {
        $data['post'] = $this->Post_model->get_post($id);
        $data['attachfile'] = $this->Post_model->get_attachfile($id);
        $data['js'] = $this->load->view('post/js_view', $data, true);
        // var_dump($data);
        // die;
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('post/view', $data);
        $this->load->view('template/footer', $data);
    }

    //Upload image summernote
    function upload_image()
    {
        if (isset($_FILES["image"]["name"])) {
            $config['upload_path'] = 'uploads/';
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
                $config['source_image'] = './uploads/' . $data['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '60%';
                $config['width'] = 800;
                $config['height'] = 800;
                $config['new_image'] = './uploads/' . $data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                echo base_url() . 'uploads/' . $data['file_name'];
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

    function add_comment()
    {
        date_default_timezone_set('Asia/Jakarta');
        $params = [
            'author_id' => $this->input->post('author_id'),
            'post_id' => $this->input->post('post_id'),
            'parrent_id' => $this->input->post('parrent_id'),
            'published' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'published_at' => date('Y-m-d H:i:s'),
            'content' => $this->input->post('content'),
        ];

        $comment_id = $this->Post_model->add_comment($params);
    }

    function load_comment($post_id)
    {
        $comment_html = '';
        $all_comment = $this->Post_model->load_comment($post_id);
        $level = 1;

        foreach ($all_comment as $comment) {
            $comment_html .= '
                <div class="card-comment">
                    <img class="img-circle img-sm" src=#">

                    <div class="comment-text">
                        <span class="username">
                        ' . $comment['first_name'] . '
                            <span class="text-muted float-right">' . time_elapsed_string($comment['published_at'], null) . '</span>
                        </span>
                        ' . $comment['content'] . '
                    </div>
                <div class="reply">
                <button type="button" class="btn btn-default btn-sm reply" id="' . $comment['id'] . '" data-author="' . $comment['first_name'] . '"><i class="fas fa-share"></i> Balas</button>
                </div>
                </div>
            ';
            $comment_html .= $this->load_reply($comment['post_id'], $comment['id'], $level);
        }

        echo json_encode($comment_html);
    }

    function load_reply($post_id, $parrent_id, $level)
    {
        $comment_html = '';
        $reply = $this->Post_model->load_reply($post_id, $parrent_id);
        $get_reply = $reply->result_array();

        $marginleft = 48 * $level;
        $next_level = $level + 1;

        $max_level = 4;

        foreach ($get_reply as $comment) {
            $comment_html .= '
                            <div class="card-comment" style="margin-left:' . $marginleft . 'px">
                                <img class="img-circle img-sm" src=#">

                                <div class="comment-text">
                                    <span class="username">
                                    ' . $comment['first_name'] . '
                                        <span class="text-muted float-right">' . time_elapsed_string($comment['published_at'], null) . '</span>
                                    </span>
                                    ' . $comment['content'] . '
                                </div>
                            ';

            if ($level < $max_level) {
                $comment_html .= '<div class="reply">
                                <button type="button" class="btn btn-default btn-sm reply" id="' . $comment['id'] . '" data-author="' . $comment['first_name'] . '"><i class="fas fa-share"></i> Balas</button>
                                </div>
                                </div>';
            } else {
                $comment_html .= '
                                </div>';
            }
            $comment_html .= $this->load_reply($comment['post_id'], $comment['id'], $next_level);
        }

        return $comment_html;
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
            $file_name = $this->upload->data('file_name');
            $this->db->insert('upload', ['file_name' => $file_name, 'token' => $token, 'author_id' => user_info()['id']]);
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
        echo json_encode(array('deleted' => true));
    }

    function download_attachfile($file_name)
    {
        force_download('uploads/' . $file_name, NULL);
    }

    function delete_attachfile()
    {
        $token = $this->input->post('token');
        $filename = $this->input->post('filename');
        $this->db->delete('upload', ['token' => $token]);
        $this->db->delete('attachfile', ['token' => $token]);

        $file_name = 'uploads/' . $filename;

        if (file_exists($file_name)) {
            unlink($file_name);
                echo 'File Delete Successfully';
        }
    }

    function view_file($file_name)
    {
        $data['file_name'] = $file_name;
        $this->load->view('post/view_pdf', $data);
    }
}
