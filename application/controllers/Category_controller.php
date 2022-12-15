<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_controller extends Backend_R_Controller
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
        $data['menu'] = $this->M_Global->get_result("Category");
        $this->load->view('BACKEND/__components/header', $data);
        $this->load->view('BACKEND/__components/topbar', $data);
        $this->load->view('BACKEND/__components/sidebar', $data);
        $this->load->view('BACKEND/category/page_index', $data);
        $this->load->view('BACKEND/__components/footer');

    }


    public function store()
    {
        $this->form_validation->set_rules('category', 'form_category', 'required|xss_clean');
        $this->form_validation->set_rules('categorypos', 'form_categorypos', 'required');
        $this->form_validation->set_rules('categoryurl', 'form_categoryurl', 'required|xss_clean');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errors', 'Error!');
            redirect(base_url('category'));
        } else {
            
            $data = array(
                "CategoryName" => $this->input->post("category"),
                "CategoryUrl" => $this->input->post("categoryurl"),
                "CatPosition" => $this->input->post("categorypos"),
            );


         $this->M_Global->insert($data, 'Category');

         redirect(base_url('category'));
        }
    }

    public function edit($id)
    {
        $data['title']          = $this->settings->homepage_title;
        $data['cat_edit'] = $this->M_Global->get_list("Category",['CategoryID =' => $id])->result();

        $this->load->view('BACKEND/__components/header', $data);
        $this->load->view('BACKEND/__components/topbar', $data);
        $this->load->view('BACKEND/__components/sidebar', $data);
        $this->load->view('BACKEND/category/page_edit', $data);
        $this->load->view('BACKEND/__components/footer');
    }

    public function store_edit()
    {

        $this->form_validation->set_rules('category', 'form_category', 'required|xss_clean');
        $this->form_validation->set_rules('caturl', 'form_caturl', 'required');
        $this->form_validation->set_rules('catpos', 'form_catpos', 'required|xss_clean');
        $this->form_validation->set_rules('catid', 'form_catid', 'required|xss_clean');

        $category = $this->input->post("category");
        $caturl = $this->input->post("caturl");
        $catpos = $this->input->post("catpos");
        $catid   = $this->input->post("catid");

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errors', 'Error!');
            redirect(base_url('category'));
        
        } else {
            
           $this->M_Global->update("Category","
            CategoryName = '$category',
            CategoryUrl  = '$caturl',
            CatPosition = '$catpos'
            WHERE CategoryID = '$catid'
            ");
            redirect(base_url('category'));
        }


 
    }

    public function delete()
    {

        $id = $this->uri->segment('3');

        $this->M_Global->delete("Category", "CategoryID = '$id' ");

        redirect(base_url('category'));
    }


    /**
     * your custome code
     */

}
