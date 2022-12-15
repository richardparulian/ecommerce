<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blogcategory_controller extends Backend_R_Controller
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
        $data['get'] = $this->M_Global->get_result("BlogCategory");
        $this->load->view('BACKEND/__components/header', $data);
        $this->load->view('BACKEND/__components/topbar', $data);
        $this->load->view('BACKEND/__components/sidebar', $data);
        $this->load->view('BACKEND/blogcategory/page_index', $data);
        $this->load->view('BACKEND/__components/footer');

    }


    public function store()
    {
        $this->form_validation->set_rules('category', 'form_category', 'required|xss_clean');
        $this->form_validation->set_rules('slug', 'form_categorypos', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errors', 'Error!');
            redirect(base_url('blog-category'));
        } else {
            
            $data = array(
                "BlogCategoryName" => $this->input->post("category"),
                "Slug" => $this->input->post("slug")
            );


         $this->M_Global->insert($data, 'BlogCategory');

         redirect(base_url('blog-category'));
        }
    }

    public function edit($id)
    {
        $data['title']          = $this->settings->homepage_title;
        $data['cat_edit'] = $this->M_Global->get_list("BlogCategory",['BlogCategoryID =' => $id])->result();
        $this->load->view('BACKEND/__components/header', $data);
        $this->load->view('BACKEND/__components/topbar', $data);
        $this->load->view('BACKEND/__components/sidebar', $data);
        $this->load->view('BACKEND/blogcategory/page_edit', $data);
        $this->load->view('BACKEND/__components/footer');
    }

    public function store_edit()
    {

        $this->form_validation->set_rules('category', 'form_category', 'required|xss_clean');
        $this->form_validation->set_rules('slug', 'form_caturl', 'required');
        $this->form_validation->set_rules('catid', 'form_catid', 'required|xss_clean');

        $category = $this->input->post("category");
        $slug = $this->input->post("slug");
        $catid   = $this->input->post("catid");

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errors', 'Error!');
            redirect(base_url('blog-category'));
        
        } else {
            
           $this->M_Global->update("BlogCategory","
            BlogCategoryName = '$category',
            Slug  = '$slug'
            WHERE BlogCategoryID = '$catid'
            ");
            redirect(base_url('blog-category'));
        }


 
    }

    public function delete()
    {

        $id = $this->uri->segment('3');

        $this->M_Global->delete("BlogCategory", "BlogCategoryID = '$id' ");

        redirect(base_url('blog-category'));
    }


    /**
     * your custome code
     */

}
