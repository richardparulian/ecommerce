<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog_controller extends Backend_R_Controller
{
    public function __construct()
    {
        parent::__construct();
        //check user   
        if (!is_admin()) {
            redirect('r/authentication');
        }

        $this->load->model('M_Global');


    }

    /**
     * index
     */
    public function index()
    {
        $data['title']          = $this->settings->homepage_title;
        $data['get'] = $this->M_Global->globalquery("SELECT * FROM Blog 
            LEFT JOIN BlogCategory on Blog.BlogCategoryID = BlogCategory.BlogCategoryID
            ");
        $data['gettags'] = $this->M_Global->globalquery("SELECT * FROM BlogPivot LEFT JOIN BlogTags ON BlogPivot.BlogTagsID = BlogTags.BlogTagsID");
        $data['gettagsonly'] = $this->M_Global->globalquery("SELECT * FROM BlogTags");
        $data['getcat'] = $this->M_Global->get_result("BlogCategory");
        $this->load->view('BACKEND/__components/header', $data);
        $this->load->view('BACKEND/__components/topbar', $data);
        $this->load->view('BACKEND/__components/sidebar', $data);
        $this->load->view('BACKEND/blog/page_index', $data);
        $this->load->view('BACKEND/__components/footer');

    }

    public function tag()
    {

        $data['title']          = $this->settings->homepage_title;
        $id = $this->uri->segment('3');
        $data['get'] = $this->M_Global->globalquery("SELECT * FROM BlogPivot LEFT JOIN BlogTags ON BlogPivot.BlogTagsID = BlogTags.BlogTagsID WHERE BlogPivot.BlogID = '$id' ");
        $this->load->view('BACKEND/__components/header', $data);
        $this->load->view('BACKEND/__components/topbar', $data);
        $this->load->view('BACKEND/__components/sidebar', $data);
        $this->load->view('BACKEND/blog/page_tag', $data);
        $this->load->view('BACKEND/__components/footer');

    }

    public function store_tags()
    {
         $this->form_validation->set_rules('tags', 'form_tags', 'required|xss_clean');
         $this->form_validation->set_rules('slug', 'form_slug', 'required|xss_clean');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errors', 'Error!');
            redirect(base_url('blog-admin'));
        }else{

            $data = array(
                "BlogTagsName" => $this->input->post("tags"),
                "Slug" => $this->input->post("slug"),

            );

            $this->M_Global->insert($data, 'BlogTags');

        }

    }


    public function store()
    {
        $this->form_validation->set_rules('cat', 'form_cat', 'required|xss_clean');
        $this->form_validation->set_rules('slug', 'form_slug', 'required|xss_clean');
        $this->form_validation->set_rules('title', 'form_title', 'required|xss_clean');
        $this->form_validation->set_rules('author', 'form_author', 'required|xss_clean');
        $this->form_validation->set_rules('date', 'form_date', 'required|xss_clean');
        $this->form_validation->set_rules('desc', 'form_desc', 'required|xss_clean');
        $this->form_validation->set_rules('status', 'form_status', 'required|xss_clean');

        $tags = $this->input->post('tags');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errors', 'Error!');
            redirect(base_url('blog-admin'));
        } else {


            $filestore      = $_FILES['image']['name'];

            $config['upload_path']   = '@static/img/blog';
            $config['allowed_types'] = 'jpeg|jpg|png';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image')) {

                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('errors', 'Error!');
                redirect(base_url('blog-admin'));

            } else {

                $data = array('upload_data' => $this->upload->data());
                $img = $data['upload_data']['file_name'];

            }

            $totaltags = count($tags);
            
            $data = array(
                "BlogCategoryID" => $this->input->post("cat"),
                "Slug" => $this->input->post("slug"),
                "BlogImage" => $img,
                "BlogTitle" => $this->input->post("title"),
                "BlogAuthor" => $this->input->post("author"),
                "BlogPublish" => $this->input->post("date"),
                "BlogDesc" => $this->input->post("desc"),
                "BlogStatus" => $this->input->post("status")
            );

            $idBlog = $this->M_Global->insertid($data, 'Blog');
            
            for ($i=0; $i < $totaltags; $i++) { 
                
                $thetags = $tags[$i];

                $datatags = array(

                    'BlogID' => $idBlog,
                    'BlogTagsID' => $thetags

                );

                $this->M_Global->insert($datatags, 'BlogPivot');
            
            }

         redirect(base_url('blog-admin'));
        }
    }

    public function edit($id)
    {
        $data['title']          = $this->settings->homepage_title;
        //$data['get'] = $this->M_Global->get_list("Blog",['BlogID =' => $id])->result();
        $data['get'] = $this->M_Global->globalquery("SELECT *,Blog.BlogID as bgid FROM Blog LEFT JOIN BlogPivot on Blog.BlogID = BlogPivot.BlogID where Blog.BlogID = '$id' ")->result();
        $data['getcat'] = $this->M_Global->get_result("BlogCategory");
        $data['gettagsonly'] = $this->M_Global->globalquery("SELECT * FROM BlogTags");
        $this->load->view('BACKEND/__components/header', $data);
        $this->load->view('BACKEND/__components/topbar', $data);
        $this->load->view('BACKEND/__components/sidebar', $data);
        $this->load->view('BACKEND/blog/page_edit', $data);
        $this->load->view('BACKEND/__components/footer');
    }

    public function store_edit()
    {

        $this->form_validation->set_rules('cat', 'form_cat', 'required|xss_clean');
        $this->form_validation->set_rules('slug', 'form_slug', 'required|xss_clean');
        $this->form_validation->set_rules('title', 'form_title', 'required|xss_clean');
        $this->form_validation->set_rules('author', 'form_author', 'required|xss_clean');
        $this->form_validation->set_rules('date', 'form_date', 'required|xss_clean');
        $this->form_validation->set_rules('desc', 'form_desc', 'required|xss_clean');
        $this->form_validation->set_rules('status', 'form_status', 'required|xss_clean');

        $cat = $this->input->post("cat");
        $slug = $this->input->post("slug");
        $title = $this->input->post("title");
        $author = $this->input->post("author");
        $date = $this->input->post("date");
        $desc = $this->input->post("desc");
        $tags = $this->input->post('tags');
        $status = $this->input->post("status");
        $nameimage = $this->input->post("nameimage");


        $id   = $this->input->post("id_blog");

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error',validation_errors());
            redirect(base_url('blog-admin'));
        
        } else {


            $filestore      = $_FILES['image']['name'];

            $config['upload_path']   = '@static/img/blog';
            $config['allowed_types'] = 'jpeg|jpg|png';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image')) {

                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('errors', 'Error!');
                //redirect(base_url('blog-admin'));

            } else {

                unlink('@static/img/blog/'.$nameimage); 
                $data = array('upload_data' => $this->upload->data());
                $img = $data['upload_data']['file_name'];

            }


           $totaltags = count((is_countable($tags)?$tags:[]));

           if ($filestore != '') {
              
              $this->M_Global->update("Blog","
            BlogCategoryID = '$cat',
            Slug  = '$slug',
            BlogTitle = '$title',
            BlogImage = '$img',
            BlogAuthor = '$author',
            BlogPublish = '$date',
            BlogDesc = '$desc',
            BlogStatus = '$status'
            WHERE BlogID = '$id'
            ");

           }else{

            $this->M_Global->update("Blog","
            BlogCategoryID = '$cat',
            Slug  = '$slug',
            BlogTitle = '$title',
            BlogAuthor = '$author',
            BlogPublish = '$date',
            BlogDesc = '$desc',
            BlogStatus = '$status'
            WHERE BlogID = '$id'
            ");

           }

        
            $this->M_Global->delete("BlogPivot","BlogID = '$id'");

            for ($i=0; $i < $totaltags; $i++) { 
                
                $thetags = $tags[$i];

                $datatags = array(

                    'BlogID' => $id,
                    'BlogTagsID' => $thetags

                );

                $this->M_Global->insert($datatags, 'BlogPivot');
            
            }

            redirect(base_url('blog-admin'));
        }


 
    }

    public function delete()
    {

        $id = $this->uri->segment('3');

        $this->M_Global->delete("Blog", "BlogID = '$id' ");

        redirect(base_url('blog-admin'));
    }


    /**
     * your custome code
     */

}
