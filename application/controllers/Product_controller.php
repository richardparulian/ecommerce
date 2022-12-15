<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_controller extends Backend_R_Controller
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
        
        $data['title']          = $this->settings->homepage_title;
        $data['product'] = $this->M_Global->get_result("Product");
        $this->load->view('BACKEND/__components/header', $data);
        $this->load->view('BACKEND/__components/topbar', $data);
        $this->load->view('BACKEND/__components/sidebar', $data);
        $this->load->view('BACKEND/product/page_index', $data);
        $this->load->view('BACKEND/__components/footer');

    }


    /**
     * your custome code
     */

    public function add_page()
    {

        $data['title']          = $this->settings->homepage_title;
        $data['subcat'] = $this->M_Global->get_result("SubCategory");
        $data['cat'] = $this->M_Global->get_result("Category");
        $this->load->view('BACKEND/__components/header', $data);
        $this->load->view('BACKEND/__components/topbar', $data);
        $this->load->view('BACKEND/__components/sidebar', $data);
        $this->load->view('BACKEND/product/page_add', $data);
        $this->load->view('BACKEND/__components/footer');

    }

    public function store()
    {
        $this->form_validation->set_rules('name', 'form_name', 'required|xss_clean');
        $this->form_validation->set_rules('sku', 'form_sku', 'required|xss_clean');
        $this->form_validation->set_rules('price', 'form_price', 'required|xss_clean');
        $this->form_validation->set_rules('slug', 'form_slug', 'required|xss_clean');


        $datenow = date('Y-m-d H:i:s');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errors', 'Error!');

            redirect(base_url('product-admin'));
        } else {
            
            $status = $this->input->post("status");
            $subcatid = $this->input->post("subcatid");
            //$totalstatus = count($status);
            $totalsub = count($subcatid);

            $data = array(
                "ProductName" => $this->input->post("name"),
                "ProductSKU" => $this->input->post("sku"),
                "ProductPrice" => $this->input->post("price"),
                "ProductPriceOld" => $this->input->post("priceold"),
                "ProductStatus" => $this->input->post("detail"),
                "ProductChoice" => $this->input->post("choice"),
                "ProductDescription" => $this->input->post("desc"),
                "Slug" => $this->input->post("slug"),
                "created_at" => $datenow
            );

          $idprod = $this->M_Global->insertid($data, 'Product');

          for ($i=0; $i < $totalsub; $i++) { 

            $subcatIn = $subcatid[$i];

                    $datapivot = array(
                        'SubCategoryID' => $subcatIn,
                        'ProductID' => $idprod,
                        'BannerID' => 0,

                    );   

                $this->M_Global->insertid($datapivot, 'ProductPivot');
                

            }
            redirect(base_url('product-admin'));
       
        }
    }

    public function add_picture()
    {
        $data['title']          = $this->settings->homepage_title;
        $sku = $this->uri->segment('3');
        $data['product'] = $this->M_Global->get_list("Product",['ProductID =' => $sku])->result();
        $data['pic'] = $this->M_Global->get_list("ProductPic",['ProductID =' => $sku])->result();
        $this->load->view('BACKEND/__components/header', $data);
        $this->load->view('BACKEND/__components/topbar', $data);
        $this->load->view('BACKEND/__components/sidebar', $data);
        $this->load->view('BACKEND/product/page_add_pic', $data);
        $this->load->view('BACKEND/__components/footer');
        
    }

    public function store_pic()
    {
        $this->form_validation->set_rules('id', 'form_id', 'required|xss_clean');
        $datenow = date('Y-m-d H:i:s');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errors', 'Error!');
            redirect(base_url('product'));
        } else {

            $filestore      = $_FILES['pic']['name'];

            $config['upload_path']   = '@static/img/products';
            $config['allowed_types'] = 'jpeg|jpg|png';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('pic')) {

                $error = array('error' => $this->upload->display_errors());
                print_r($error);

            } else {

                $data = array('upload_data' => $this->upload->data());
                $img = $data['upload_data']['file_name'];

            }

            $data = array(
            
                'PicName'  => $img,
                'ProductID' => $this->input->post("id"),
                'created_at' => $datenow          
              );

            $idnya = $this->M_Global->insert($data,'ProductPic');
            redirect(base_url('product_admin/add_picture/'.$this->input->post("id")));
        }
    }

    public function edit($id)
    {
        $data['title']          = $this->settings->homepage_title;
        $id = decrypt_url($id);
        $data['subcat'] = $this->M_Global->get_result("SubCategory");
        $data['product_edit'] = $this->M_Global->globalquery("SELECT * FROM ProductPivot 
            LEFT JOIN SubCategory ON ProductPivot.SubCategoryID = SubCategory.SubCategoryID 
            LEFT JOIN Product ON ProductPivot.ProductID = Product.ProductID WHERE Product.ProductID = '$id' ")->result();
        $this->load->view('BACKEND/__components/header', $data);
        $this->load->view('BACKEND/__components/topbar', $data);
        $this->load->view('BACKEND/__components/sidebar', $data);
        $this->load->view('BACKEND/product/page_edit', $data);
        $this->load->view('BACKEND/__components/footer');
    }

    public function store_edit()
    {  

        $this->form_validation->set_rules('product', 'form_product', 'required|xss_clean');
        $this->form_validation->set_rules('productsku', 'form_productsku', 'required|xss_clean');
        $this->form_validation->set_rules('productprice', 'form_productprice', 'required|xss_clean');
        $this->form_validation->set_rules('slug', 'form_slug', 'required|xss_clean');


        $datenow = date('Y-m-d H:i:s');

        if ($this->form_validation->run() == false) {
            
            $this->session->set_flashdata('message', validation_errors());
            redirect(base_url('product-admin'));

        } else {
            
            $status = $this->input->post("status");
            $subcatid = $this->input->post("subcatid");
            $slug = $this->input->post("slug");
            $name = $this->input->post("product");
            $desc = $this->input->post("desc");
            $sku = $this->input->post("productsku");
            $price = $this->input->post("productprice");
            $priceold = $this->input->post("priceold");
            $status = $this->input->post("detail");
            $choice =  $this->input->post("choice");
            $id =  $this->input->post("productid");

            //$totalstatus = count($status);
            $totalsub = count($subcatid);


          $this->M_Global->update("Product","
            Slug = '$slug',
            ProductName = '$name',
            ProductDescription = '$desc',
            ProductSKU = '$sku',
            ProductPrice = '$price',
            ProductPriceOld = '$priceold',
            ProductStatus = '$status',
            ProductChoice = '$choice' WHERE ProductID = '$id'
            ");

          $this->M_Global->delete("ProductPivot","ProductID = '$id' ");

          for ($i=0; $i < $totalsub; $i++) { 

            $subcatIn = $subcatid[$i];

                    $datapivot = array(
                        'SubCategoryID' => $subcatIn,
                        'ProductID' => $id,
                        'BannerID' => 0,

                    );   

                $this->M_Global->insertid($datapivot, 'ProductPivot');
                

            }
            redirect(base_url('product-admin'));
       
        }
            
    }

    public function delete()
    {
        $id = $this->uri->segment('3');

        $this->M_Global->delete("Product", "ProductID = '$id' ");
        $this->M_Global->delete("ProductPivot","ProductID = '$id' ");

        redirect(base_url('product-admin'));
    }

    public function delete_pic()
    {
        $id = $this->uri->segment('3');
        $productid = $this->uri->segment('4');

        $this->M_Global->delete("ProductPic", "PicID = '$id' ");

        redirect(base_url('product-admin/add_picture/'.$productid));
    }

}
