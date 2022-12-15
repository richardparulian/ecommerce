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

    function getAllBlog()
    {
        $query = $this->db->get('Blog');
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

    function getAllCategory()
    {
        $getBlogCategory                = $this->M_Global->get_result("BlogCategory")->result_array();

        foreach ($getBlogCategory as $cat) {
            $blogCategoryId                 = $cat['BlogCategoryID'];
            $countBlogRelatedForCategory    = $this->M_Global->getmultiparam("Blog", "BlogCategoryID = '$blogCategoryId' ")->num_rows();

            $category[] = array(
                'BlogCategoryID'        => $cat['BlogCategoryID'],
                'BlogCategoryName'      => $cat['BlogCategoryName'],
                'Slug'                  => $cat['Slug'],
                'TotalCategory'         => $countBlogRelatedForCategory
            );
        }
        return $category;
    }

    function getAllTags()
    {
        $getBlogTags                    = $this->M_Global->get_result("BlogTags")->result_array();

        foreach ($getBlogTags as $tag) {
            $blogTagsId                 = $tag['BlogTagsID'];
            $getBlogPivotRelated        = $this->M_Global->getmultiparam("BlogPivot", "BlogTagsID = '$blogTagsId' ")->num_rows();

            $tags[] = array(
                'BlogTagsID'    => $tag['BlogTagsID'],
                'BlogTagsName'  => $tag['BlogTagsName'],
                'Slug'          => $tag['Slug'],
                'TotalTags'     => $getBlogPivotRelated
            );
        }
        return $tags;
    }

    function countAllBlog($table)
    {
        return $this->db->get($table)->num_rows();
    }

    function get_prev_next($slug = null)
    {
        $query =  $this->db->query("SELECT Slug,(SELECT Slug FROM Blog s1 WHERE s1.BlogID < s.BlogID ORDER BY BlogID DESC LIMIT 1) as previous_name,
        (SELECT Slug FROM Blog s2 WHERE s2.BlogID > s.BlogID ORDER BY BlogID ASC LIMIT 1) as next_name FROM Blog s WHERE Slug = '$slug' ");

        if ($query->num_rows() > 0) {
            $data =  $query->result_array();

            return $data;
        } else {
            return $query->free_result();
        }

        // return $data;
    }

    function cut_words($sentence, $word_count)
    {
        $space_count = 0;
        $print_string = '';
        for ($i = 0; $i < strlen($sentence); $i++) {
            if ($sentence[$i] == ' ')
                $space_count++;
            $print_string .= $sentence[$i];

            if ($space_count == $word_count)
                break;
        }
        return trim($print_string . '...');
    }
}
