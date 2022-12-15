<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info_controller extends Backend_R_Controller
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
        $data['info'] = $this->M_Global->globalquery("SELECT * FROM Information")->result_array();
        $this->load->view('BACKEND/__components/header', $data);
        $this->load->view('BACKEND/__components/topbar', $data);
        $this->load->view('BACKEND/__components/sidebar', $data);
        $this->load->view('BACKEND/info/page_index', $data);
        $this->load->view('BACKEND/__components/footer');

    }


    public function store()
    {
        $this->form_validation->set_rules('tnc', 'form_category', 'required|xss_clean');
        $this->form_validation->set_rules('policy', 'form_categorypos', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errors', 'Error!');
            redirect(base_url('info-aed'));
        } else {
            $id  = $this->input->post("id");
            $tnc = $this->input->post("tnc");
            $policy = $this->input->post("policy");

         $this->M_Global->update("Information","TnC = '$tnc' , PrivacyPolicy = '$policy' WHERE InformationID = '$id' ");

         redirect(base_url('info-aed'));
        }
    }

    /**
     * your custome code
     */

}
