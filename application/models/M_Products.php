<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Blog extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
    }

    function query($query)
    {
        return $this->db->query($query);
    }

    function getAllProducts()
    {
        $query = $this->db->get('Product');
        return $query;
    }

    function getBlog()
    {
        $config['base_url']             = site_url('blog');
        $config['total_rows']           = $this->M_Blog->countAllBlog('Blog');
        $config['page_query_string']    = true;
        $config['use_page_numbers']     = false;
        $config['per_page']             = 10;
        $config['uri_segment']          = 2;
        $choice                         = $config["total_rows"] / $config["per_page"];
        $config["num_links"]            = floor($choice);

        $config['full_tag_open']        = '<div class="pagination-area text-center" style="list-style: none;">';
        $config['full_tag_close']       = '</div>';
        $config['first_link']           = 'First';
        $config['last_link']            = 'Last';
        $config['first_tag_open']       = '<div class="page-numbers">';
        $config['first_tag_close']      = '</div>';
        $config['prev_link']            = '&laquo';
        $config['prev_tag_open']        = '<div class="page-numbers">';
        $config['prev_tag_close']       = '</div>';
        $config['next_link']            = '&raquo';
        $config['next_tag_open']        = '<div class="page-numbers">';
        $config['next_tag_close']       = '</div>';
        $config['last_tag_open']        = '<div class="page-numbers">';
        $config['last_tag_close']       = '</div>';
        $config['cur_tag_open']         = '<span class="page-numbers current" aria-current="page">';
        $config['cur_tag_close']        = '</span>';
        $config['num_tag_open']         = '<div class="page-numbers">';
        $config['num_tag_close']        = '</div>';

        $this->pagination->initialize($config);

        $limit      = $config['per_page'];
        $page       = $this->input->get('page');
        $start      = ($page) ? $page  : 0;
        $query      = $this->db->get("Blog", $limit, $start, "BlogStatus = 1");

        return $query->result_array();
    }
}
