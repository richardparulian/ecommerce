<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TagsController extends Backend_R_Controller
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
        $data['get'] = $this->M_Global->get_result("BlogTags");
        $this->load->view('BACKEND/__components/header', $data);
        $this->load->view('BACKEND/__components/topbar', $data);
        $this->load->view('BACKEND/__components/sidebar', $data);
        $this->load->view('BACKEND/tags/page_index', $data);
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



    public function store()
    {
        $this->form_validation->set_rules('tags', 'form_cat', 'required|xss_clean');
        $this->form_validation->set_rules('slug', 'form_slug', 'required|xss_clean');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errors', 'Error!');
            redirect(base_url('tags'));
        } else {
            
            $data = array(
                "BlogTagsName" => $this->input->post("tags"),
                "Slug" => $this->input->post("slug"),
            );


         $this->M_Global->insert($data, 'BlogTags');

         redirect(base_url('tags'));
        }
    }

    public function store_edit()
    {

        $this->form_validation->set_rules('tags', 'form_tags', 'required|xss_clean');
        $this->form_validation->set_rules('slug', 'form_slug', 'required');
        $this->form_validation->set_rules('id', 'form_id', 'required|xss_clean');

        $tags = $this->input->post("tags");
        $slug = $this->input->post("slug");
        $id   = $this->input->post("id");

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errors', 'Error!');
            redirect(base_url('tags'));
        
        } else {
            
           $this->M_Global->update("BlogTags","
            BlogTagsName = '$tags',
            Slug  = '$slug'
            WHERE BlogTagsID = '$id'
            ");
            redirect(base_url('tags'));
        }


 
    }

    public function delete()
    {

        $id = $this->uri->segment('3');

        $this->M_Global->delete("BlogTags", "BlogTagsID = '$id' ");

        redirect(base_url('tags'));
    }


    /**
     * your custome code
     */

}
