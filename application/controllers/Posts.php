<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Posts extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Posts_model');
        check_login();
        $this->load->library('upload');
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
        // tulis script di footer
        $data['script'] = "
        $(document).ready(function() {
            // summernote
            $('.summernote').summernote({
                height: 250, //set editable area's height
                codemirror: { // codemirror options
                  theme: 'monokai'
                },
                placeholder: 'Tulis konten disini',
            })
    
            // event ketika status di klik
            $('#tanggal').hide(); 
            $('#status').change(function(){
                if($('#status').val() == 1) {
                    $('#tanggal').hide(); 
                } else if ($('#status').val() == 0) {
                    $('#tanggal').hide(); 
                }
                else {
                    $('#tanggal').show(); 
                } 
            });
        });

        function uploadImage(image) {
            var data = new FormData();
            data.append('image', image);
            $.ajax({
                url: '<?php echo site_url('posts/upload_image')?>',
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: 'POST',
                success: function(url) {
                    $('.summernote').summernote('insertImage', url);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function deleteImage(src) {
            $.ajax({
                data: {src : src},
                type: 'POST',
                url: '<?php echo site_url('posts/delete_image')?>',
                cache: false,
                success: function(response) {
                    console.log(response);
                }
            });
        }

        ";

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('posts/add', $data);
        $this->load->view('template/footer', $data);
    }

    function save()
    {
        $params = [
            'author_id' => user_info()['id'],
            'title' => $this->input->post('title'),
            'slug' => $this->input->post('slug'),
            // 'summary' => $this->input->post('summary'),
            'published' => $this->input->post('status'),
            'created_at' => $this->input->post('date'),
            'updated_at' => $this->input->post('date'),
            'published_at' => $this->input->post('date'),
            'content' => $this->input->post('content'),
        ];
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

    //Upload image summernote
    function upload_image(){
        if(isset($_FILES["image"]["name"])){
            $config['upload_path'] = './uploads/images/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('image')){
                $this->upload->display_errors();
                return FALSE;
            }else{
                $data = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./uploads/images/'.$data['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= TRUE;
                $config['quality']= '60%';
                $config['width']= 800;
                $config['height']= 800;
                $config['new_image']= './uploads/images/'.$data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                echo base_url().'uploads/images/'.$data['file_name'];
            }
        }
    }
 
    //Delete image summernote
    function delete_image(){
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        if(unlink($file_name))
        {
            echo 'File Delete Successfully';
        }
    }
}
