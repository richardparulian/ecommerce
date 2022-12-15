<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backend_controller extends Backend_R_Controller
{
    public function __construct()
    {
        parent::__construct();
        //check user   
        if (!is_admin()) {
            redirect('r/authentication');
        }

    }

    /**
     * index
     */
    public function index()
    {
        
        $data['title'] = $this->settings->homepage_title;
        $data['get'] = $this->M_Global->get_result("BlogCategory");
        $this->load->view('BACKEND/__components/header', $data);
        $this->load->view('BACKEND/__components/topbar', $data);
        $this->load->view('BACKEND/__components/sidebar', $data);
        $this->load->view('BACKEND/blogcategory/page_index', $data);
        $this->load->view('BACKEND/__components/footer');

    }

    /**
     * download database
     */
    public function backup_database() {
        $this->load->dbutil();
        $conf = [
            'format' => 'zip',
            'filename' => 'r_demo_aed_backup.sql'
        ];

        $backup = $this->dbutil->backup($conf);
        $db_name = 'backup_db' . date("d-m-Y_H-i-s") . '.zip';
        $save = APPPATH . '@static/sql/' . $db_name;

        $this->load->helper('file');
        write_file($save, $backup);
        $this->load->helper('download');
        force_download($db_name, $backup);

    }

    /**
     * your custome code
     */

}
