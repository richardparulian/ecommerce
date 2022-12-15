<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Brand_controller extends Backend_R_Controller
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
        $data['get'] = $this->M_Global->globalquery("SELECT * FROM Brand LEFT JOIN Product ON Brand.ProductID = Product.ProductID");
        $data['getproduct'] = $this->M_Global->get_result("Product");
        $this->load->view('BACKEND/__components/header', $data);
        $this->load->view('BACKEND/__components/topbar', $data);
        $this->load->view('BACKEND/__components/sidebar', $data);
        $this->load->view('BACKEND/brand/page_index', $data);
        $this->load->view('BACKEND/__components/footer');

    }


    public function store()
    {
        $this->form_validation->set_rules('prodid', 'form_prodid', 'required|xss_clean');
        $this->form_validation->set_rules('brand', 'form_brand', 'required');
        $this->form_validation->set_rules('status', 'form_status', 'required|xss_clean');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errors', 'Error!');
            redirect(base_url('brand-admin'));
        } else {
            
            $data = array(
                "ProductID" => $this->input->post("prodid"),
                "BrandName" => $this->input->post("brand"),
                "BrandStatus" => $this->input->post("status"),
            );


         $this->M_Global->insert($data, 'Brand');

         redirect(base_url('brand-admin'));
        }
    }

    public function edit($id)
    {
        $data['title']          = $this->settings->homepage_title;
        $data['get'] = $this->M_Global->globalquery("SELECT * FROM Brand LEFT JOIN Product ON Brand.ProductID = Product.ProductID WHERE BrandID = '$id' ")->result();
        $data['getproduct'] = $this->M_Global->get_result("Product");
        $this->load->view('BACKEND/__components/header', $data);
        $this->load->view('BACKEND/__components/topbar', $data);
        $this->load->view('BACKEND/__components/sidebar', $data);
        $this->load->view('BACKEND/brand/page_edit', $data);
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

        $this->M_Global->delete("Brand", "BrandID = '$id' ");

        redirect(base_url('brand-admin'));
    }


    /**
     * your custome code
     */

}
