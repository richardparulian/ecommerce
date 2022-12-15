<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SubCategory_controller extends Backend_R_Controller
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
        $data['subcat'] = $this->M_Global->join_only("SubCategory","Category","SubCategory.CategoryID","Category.CategoryID");
        $data['cat'] = $this->M_Global->get_result("Category");
        $this->load->view('BACKEND/__components/header', $data);
        $this->load->view('BACKEND/__components/topbar', $data);
        $this->load->view('BACKEND/__components/sidebar', $data);
        $this->load->view('BACKEND/subcategory/page_index', $data);
        $this->load->view('BACKEND/__components/footer');

    }


    public function store()
    {
        $this->form_validation->set_rules('cat', 'form_cat', 'required|xss_clean');
        $this->form_validation->set_rules('subname', 'form_subname', 'required');
        $this->form_validation->set_rules('subpos', 'form_subpos', 'required|xss_clean');
        $this->form_validation->set_rules('suburl', 'form_suburl', 'required|xss_clean');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errors', 'Error!');
            redirect(base_url('sub-category'));
        } else {
            
            $data = array(
                "CategoryID" => $this->input->post("cat"),
                "SubCategoryName" => $this->input->post("subname"),
                "SubCatPosition" => $this->input->post("subpos"),
                "SubUrl" => $this->input->post("suburl"),
            );


         $this->M_Global->insert($data, 'SubCategory');

         redirect(base_url('sub-category'));
        }
    }

    public function edit($id)
    {
        $data['title']          = $this->settings->homepage_title;
        $id = decrypt_url($id);

        $data['subcat_edit'] = $this->M_Global->get_list("SubCategory",['SubCategoryID =' => $id])->result();
        $data['cat'] = $this->M_Global->get_result("Category");
        $this->load->view('BACKEND/__components/header', $data);
        $this->load->view('BACKEND/__components/topbar', $data);
        $this->load->view('BACKEND/__components/sidebar', $data);
        $this->load->view('BACKEND/subcategory/page_edit', $data);
        $this->load->view('BACKEND/__components/footer');
    }

    public function store_edit()
    {

        $this->form_validation->set_rules('subcat', 'form_subcat', 'required|xss_clean');
        $this->form_validation->set_rules('subcatpos', 'form_subcatpos', 'required');
        $this->form_validation->set_rules('subcaturl', 'form_subcaturl', 'required|xss_clean');
        $this->form_validation->set_rules('subcatid', 'form_subcatid', 'required|xss_clean');
        $this->form_validation->set_rules('cat', 'form_cat', 'required|xss_clean');

        $subcat = $this->input->post("subcat");
        $subcatpos = $this->input->post("subcatpos");
        $subcaturl = $this->input->post("subcaturl");
        $subcatid   = $this->input->post("subcatid");
        $cat   = $this->input->post("cat");

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errors', 'Error!');
            redirect(base_url('sub-category'));
        
        } else {
            
           $this->M_Global->update("SubCategory","
            CategoryID = '$cat',
            SubCategoryName  = '$subcat',
            SubCatPosition = '$subcatpos',
            SubUrl         = '$subcaturl'
            WHERE SubCategoryID = '$subcatid'
            ");
            redirect(base_url('sub-category'));
        }


 
    }

    public function delete()
    {

        $id = $this->uri->segment('3');

        $this->M_Global->delete("SubCategory", "SubCategoryID = '$id' ");

        redirect(base_url('sub-category'));
    }


    /**
     * your custome code
     */

}
