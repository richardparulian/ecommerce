<?php

use LayerShifter\TLDSupport\Helpers\Arr;

defined('BASEPATH') or exit('No direct script access allowed');

class Frontend_controller extends Frontend_R_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Index
     */
    public function index()
    {
        $data['title']                  = $this->settings->homepage_title;
        $data['description']            = $this->settings->site_description;
        $data['keywords']               = $this->settings->keywords;
        $data['og_type']                = "Website";
        $data['og_url']                 = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        // menu & submenu
        $data['getallcategory']         = $this->M_Menu->getAllCategory();
        // language
        $data['getLanguage']            = $this->language_model->get_languages();
        $data['getLang']                = $this->input->get('lang');
        $data['language']               = $this->language_model->getLanguage($data['getLang']);

        $data['slider']                 = $this->M_Global->get_result("Banner")->result_array();
        $data['getclients']             = $this->M_Global->get_result("Client")->result_array();
        $data['getBasicConfiguration']  = $this->M_Global->getmultiparam("BasicConfiguration", "ConfigStatus = 1")->row_array();
        $configId                       = $data['getBasicConfiguration']['ConfigID'];
        $data['getMediaSocial']         = $this->M_Global->getmultiparam("MediaSocial", "ConfigID = '$configId' AND MediaSocialStatus = 1")->result_array();
        $getBestProduct                 = $this->M_Global->getmultiparam("Product", "ProductChoice = 1")->result_array();

        foreach ($getBestProduct as $value) {
            $productId          = $value['ProductID'];
            $array              = (array)$productId;

            foreach ($array as $arr) {
                $getProductPic  = $this->M_Global->getmultiparam("ProductPic", "ProductID = '$arr' ")->row_array();
            }

            $bestProduct[] = array(
                'ProductID'         => $value['ProductID'],
                'ProductName'       => $value['ProductName'],
                'Slug'              => $value['Slug'],
                'ProductSKU'        => $value['ProductSKU'],
                'ProductPrice'      => $value['ProductPrice'],
                'ProductPriceOld'   => $value['ProductPriceOld'],
                'ProductStatus'     => $value['ProductStatus'],
                'ProductPic'        => isset($getProductPic['PicName']) ? $getProductPic['PicName'] : 'Default-Product-Pic.png',
            );
        }

        $data['getBestProduct'] = $bestProduct;

        $this->load->view('FRONTEND/__components/header', $data);
        $this->load->view('FRONTEND/__components/nav', $data);
        $this->load->view('FRONTEND/Home', $data);
        $this->load->view('FRONTEND/__components/modal');
        $this->load->view('FRONTEND/__components/footer');
    }

    //your custom code here

    // Authentication
    public function authentication()
    {
        $data['title']                  = $this->settings->homepage_title;
        $data['description']            = $this->settings->site_description;
        $data['keywords']               = $this->settings->keywords;
        // menu & submenu
        $data['getallcategory']         = $this->M_Menu->getAllCategory();
        // basic configuration
        $data['getBasicConfiguration']  = $this->M_Global->getmultiparam("BasicConfiguration", "ConfigStatus = 1")->row_array();
        $configId                       = $data['getBasicConfiguration']['ConfigID'];
        $data['getMediaSocial']         = $this->M_Global->getmultiparam("MediaSocial", "ConfigID = '$configId' AND MediaSocialStatus = 1")->result_array();
        // language
        $data['getLanguage']            = $this->language_model->get_languages();
        $data['getLang']                = $this->input->get('lang');
        $data['language']               = $this->language_model->getLanguage($data['getLang']);
        // content
        $data['segment']                = $this->uri->segment(5);

        $this->load->view('FRONTEND/__components/header', $data);
        $this->load->view('FRONTEND/__components/nav', $data);
        $this->load->view('FRONTEND/Authentication', $data);
        $this->load->view('FRONTEND/__components/modal');
        $this->load->view('FRONTEND/__components/footer');
    }

    public function forgotten_password()
    {
        $data['title']              = $this->settings->homepage_title;
        $data['description']        = $this->settings->site_description;
        $data['keywords']           = $this->settings->keywords;
        // menu & submenu
        $data['getallcategory']     = $this->M_Menu->getAllCategory();
        // basic configuration
        $data['getBasicConfiguration']  = $this->M_Global->getmultiparam("BasicConfiguration", "ConfigStatus = 1")->row_array();
        $configId                       = $data['getBasicConfiguration']['ConfigID'];
        $data['getMediaSocial']         = $this->M_Global->getmultiparam("MediaSocial", "ConfigID = '$configId' AND MediaSocialStatus = 1")->result_array();
        // language
        $data['getLanguage']            = $this->language_model->get_languages();
        $data['getLang']                = $this->input->get('lang');
        $data['language']               = $this->language_model->getLanguage($data['getLang']);

        $this->load->view('FRONTEND/__components/header', $data);
        $this->load->view('FRONTEND/__components/nav', $data);
        $this->load->view('FRONTEND/Forgot-Password', $data);
        $this->load->view('FRONTEND/__components/modal');
        $this->load->view('FRONTEND/__components/footer');
    }

    public function reset_password()
    {
        $data['title']              = $this->settings->homepage_title;
        $data['description']        = $this->settings->site_description;
        $data['keywords']           = $this->settings->keywords;
        // menu & submenu
        $data['getallcategory']     = $this->M_Menu->getAllCategory();
        // basic configuration
        $data['getBasicConfiguration']  = $this->M_Global->getmultiparam("BasicConfiguration", "ConfigStatus = 1")->row_array();
        $configId                       = $data['getBasicConfiguration']['ConfigID'];
        $data['getMediaSocial']         = $this->M_Global->getmultiparam("MediaSocial", "ConfigID = '$configId' AND MediaSocialStatus = 1")->result_array();
        // language
        $data['getLanguage']            = $this->language_model->get_languages();
        $data['getLang']                = $this->input->get('lang');
        $data['language']               = $this->language_model->getLanguage($data['getLang']);

        if ($this->input->get('hash')) {
            $hash               = $this->input->get('hash');
            $data['hash']       = $hash;
            $getHashDetails     = $this->M_Global->getmultiparam("users", "hash = '$hash'")->row();

            if ($getHashDetails) {
                $hash_expiry = $getHashDetails->hash_expiry;
                $currentDate = date('Y-m-d H:i:');

                if ($currentDate < $hash_expiry) {
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $this->form_validation->set_rules('password1', 'New Password', 'required|trim|xss_clean|min_length[8]|matches[password2]', [
                            'matches'       => "Password dont match!",
                            'min_length'    => "Password too short!"
                        ]);
                        $this->form_validation->set_rules('password2', 'Confirm New Password', 'required|trim|xss_clean|matches[password1]');

                        if ($this->form_validation->run() == false) {
                            $this->session->set_flashdata('errorNewPassword', form_error('password1', '<small class="text-danger">', '</small>'));
                            $this->session->set_flashdata('errorConfirmPassword', form_error('password2', '<small class="text-danger">', '</small>'));
                            $this->session->set_flashdata('valueNewPassword', set_value('password1'));
                            $this->session->set_flashdata('valueConfirmPassword', set_value('password2'));

                            redirect($this->agent->referrer());
                        } else {
                            $newPassword = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);

                            $data = array(
                                'password'      => $newPassword,
                                'hash'          => null,
                                'hash_expiry'   => null
                            );
                            $this->M_Global->update_data("hash = '$hash'", $data, "users");
                            $this->session->set_flashdata(
                                'success',
                                '<div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </svg>
                                <div>Congratulations, successfully changed Password.</div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>'
                            );
                            redirect(base_url('customer/account/login'));
                        }
                    } else {
                        $this->load->view('FRONTEND/__components/header', $data);
                        $this->load->view('FRONTEND/__components/nav', $data);
                        $this->load->view('FRONTEND/Reset-Password', $data);
                        $this->load->view('FRONTEND/__components/modal');
                        $this->load->view('FRONTEND/__components/footer');
                    }
                } else {
                    $this->session->set_flashdata(
                        'errors',
                        '<div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div>Link is expired!</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>'
                    );
                    redirect(base_url('customer/account/forgot-password'));
                }
            } else {
                echo 'invalid link';
                exit;
            }
        } else {
            redirect(base_url('customer/account/forgot-password'));
        }
    }
    // 


    // Account
    public function my_account()
    {
        $data['title']                  = $this->settings->homepage_title;
        $data['description']            = $this->settings->site_description;
        $data['keywords']               = $this->settings->keywords;
        // menu & submenu
        $data['getallcategory']         = $this->M_Menu->getAllCategory();
        // basic configuration
        $data['getBasicConfiguration']  = $this->M_Global->getmultiparam("BasicConfiguration", "ConfigStatus = 1")->row_array();
        $configId                       = $data['getBasicConfiguration']['ConfigID'];
        $data['getMediaSocial']         = $this->M_Global->getmultiparam("MediaSocial", "ConfigID = '$configId' AND MediaSocialStatus = 1")->result_array();
        // language
        $data['getLanguage']            = $this->language_model->get_languages();
        $data['getLang']                = $this->input->get('lang');
        $data['language']               = $this->language_model->getLanguage($data['getLang']);

        // get information
        $usersId                        = $this->session->userdata('r_sess_user_id');
        $data['user']                   = $this->M_Global->getmultiparam("users", "id = '$usersId' ")->row_array();
        $data['countAddress']           = $this->M_Global->count("MyAddress", "CustomerID = '$usersId'");
        $data['countDefaultAddress']    = $this->M_Global->count("MyAddress", "CustomerID = '$usersId' AND AddressCategory = 1");
        $data['countBillingAddress']    = $this->M_Global->count("MyAddress", "CustomerID = '$usersId' AND AddressCategory = 2");
        $data['countShippingAddress']   = $this->M_Global->count("MyAddress", "CustomerID = '$usersId' AND AddressCategory = 3");
        $data['getDefaultAddress']      = $this->M_Global->getmultiparam("MyAddress", "CustomerID = '$usersId' AND AddressCategory = 1")->row_array();
        $data['getBillingAddress']      = $this->M_Global->getmultiparam("MyAddress", "CustomerID = '$usersId' AND AddressCategory = 2")->row_array();
        $data['getShippingAddress']     = $this->M_Global->getmultiparam("MyAddress", "CustomerID = '$usersId' AND AddressCategory = 3")->row_array();

        $this->load->view('FRONTEND/__components/header', $data);
        $this->load->view('FRONTEND/__components/nav', $data);
        $this->load->view('FRONTEND/__sidebar/start_section', $data);
        $this->load->view('FRONTEND/Account', $data);
        $this->load->view('FRONTEND/__sidebar/end_section', $data);
        $this->load->view('FRONTEND/__components/modal');
        $this->load->view('FRONTEND/__components/footer');
    }

    public function edit_account_information()
    {
        $data['title']                  = $this->settings->homepage_title;
        $data['description']            = $this->settings->site_description;
        $data['keywords']               = $this->settings->keywords;
        // menu & submenu
        $data['getallcategory']         = $this->M_Menu->getAllCategory();
        // basic configuration
        $data['getBasicConfiguration']  = $this->M_Global->getmultiparam("BasicConfiguration", "ConfigStatus = 1")->row_array();
        $configId                       = $data['getBasicConfiguration']['ConfigID'];
        $data['getMediaSocial']         = $this->M_Global->getmultiparam("MediaSocial", "ConfigID = '$configId' AND MediaSocialStatus = 1")->result_array();
        // language
        $data['getLanguage']            = $this->language_model->get_languages();
        $data['getLang']                = $this->input->get('lang');
        $data['language']               = $this->language_model->getLanguage($data['getLang']);

        if ($this->auth_model->is_logged_in()) {
            // get information
            $sessionId                      = $this->session->userdata('r_sess_user_id');
            $data['user']                   = $this->M_Global->getmultiparam("users", "id = '$sessionId' ")->row_array();
            $data['countAddress']           = $this->M_Global->count("MyAddress", "CustomerID = '$sessionId'");

            $this->load->view('FRONTEND/__components/header', $data);
            $this->load->view('FRONTEND/__components/nav', $data);
            $this->load->view('FRONTEND/__sidebar/start_section', $data);
            $this->load->view('FRONTEND/__account/Edit', $data);
            $this->load->view('FRONTEND/__sidebar/end_section', $data);
            $this->load->view('FRONTEND/__components/modal');
            $this->load->view('FRONTEND/__components/footer');
        } else {
            redirect('customer/account/login');
        }
    }

    public function edit_account()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim|xss_clean');

        $usersId    = $this->session->userdata('r_sess_user_id');
        $lang       = $this->input->get('lang');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errorFirstName', form_error('first_name', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorLastName', form_error('last_name', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('form_data', $this->auth_model->input_values());

            redirect($this->agent->referrer());
        } else {
            $data = array(
                'first_name'    => htmlspecialchars($this->input->post('first_name', true)),
                'last_name'     => htmlspecialchars($this->input->post('last_name', true))
            );
            $this->M_Global->update_data("id = '$usersId'", $data, "users");

            $this->session->set_flashdata(
                'success',
                '<div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    <div>Account updated successfully.</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
            );
            if ($lang) {
                redirect(base_url('customer/account?lang=' . $lang));
            } else {
                redirect(base_url('customer/account'));
            }
        }
    }

    public function change_password()
    {
        $data['title']                  = $this->settings->homepage_title;
        $data['description']            = $this->settings->site_description;
        $data['keywords']               = $this->settings->keywords;
        // menu & submenu
        $data['getallcategory']         = $this->M_Menu->getAllCategory();
        // basic configuration
        $data['getBasicConfiguration']  = $this->M_Global->getmultiparam("BasicConfiguration", "ConfigStatus = 1")->row_array();
        $configId                       = $data['getBasicConfiguration']['ConfigID'];
        $data['getMediaSocial']         = $this->M_Global->getmultiparam("MediaSocial", "ConfigID = '$configId' AND MediaSocialStatus = 1")->result_array();
        // language
        $data['getLanguage']            = $this->language_model->get_languages();
        $data['getLang']                = $this->input->get('lang');
        $data['language']               = $this->language_model->getLanguage($data['getLang']);

        if ($this->auth_model->is_logged_in()) {
            // get information
            $sessionId                      = $this->session->userdata('r_sess_user_id');
            $data['user']                   = $this->M_Global->getmultiparam("users", "id = '$sessionId' ")->row_array();
            $data['countAddress']           = $this->M_Global->count("MyAddress", "CustomerID = '$sessionId' AND AddressCategory IS NULL");

            $this->load->view('FRONTEND/__components/header', $data);
            $this->load->view('FRONTEND/__components/nav', $data);
            $this->load->view('FRONTEND/__sidebar/start_section', $data);
            $this->load->view('FRONTEND/__account/Edit-Password', $data);
            $this->load->view('FRONTEND/__sidebar/end_section', $data);
            $this->load->view('FRONTEND/__components/modal');
            $this->load->view('FRONTEND/__components/footer');
        } else {
            redirect('customer/account/login');
        }
    }

    public function edit_password()
    {
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim|xss_clean');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|trim|xss_clean|min_length[8]|matches[confirm_password]', [
            'matches'       => "Password dont match!",
            'min_length'    => "Password too short!"
        ]);
        $this->form_validation->set_rules('confirm_password', 'Confirm New Password', 'required|trim|xss_clean|matches[new_password]');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errorCurrentPassword', form_error('current_password', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorNewPassword', form_error('new_password', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorConfirmPassword', form_error('confirm_password', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('valueCurrentPassword', set_value('current_password'));
            $this->session->set_flashdata('valueNewPassword', set_value('new_password'));
            $this->session->set_flashdata('valueConfirmPassword', set_value('confirm_password'));

            redirect($this->agent->referrer());
        } else {
            $sessionId              = $this->session->userdata('r_sess_user_id');
            $username               = $this->session->userdata('r_sess_user_username');
            $currentPassword        = $this->input->post('current_password');
            $checkCurrentPassword   = $this->M_Global->getmultiparam("users", "id = '$sessionId' AND username = '$username' ")->row_array();

            if (!empty($checkCurrentPassword) && password_verify($currentPassword, $checkCurrentPassword['password'])) {
                $data = array(
                    'password'          => password_hash($this->input->post('new_password'), PASSWORD_DEFAULT)
                );
                $this->M_Global->update_data("id = '$sessionId'", $data, "users");
                $this->auth_model->logout();
                $this->session->set_flashdata(
                    'success',
                    '<div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    <div>Password has been changed! Please login.</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
                redirect(base_url('customer/account/login'));
            } else {
                $this->session->set_flashdata(
                    'errors',
                    '<div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                    <div>Your password is incorrect!</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
                redirect($this->agent->referrer());
            }
        }
    }

    public function change_email()
    {
        $data['title']                  = $this->settings->homepage_title;
        $data['description']            = $this->settings->site_description;
        $data['keywords']               = $this->settings->keywords;
        // menu & submenu
        $data['getallcategory']         = $this->M_Menu->getAllCategory();
        // basic configuration
        $data['getBasicConfiguration']  = $this->M_Global->getmultiparam("BasicConfiguration", "ConfigStatus = 1")->row_array();
        $configId                       = $data['getBasicConfiguration']['ConfigID'];
        $data['getMediaSocial']         = $this->M_Global->getmultiparam("MediaSocial", "ConfigID = '$configId' AND MediaSocialStatus = 1")->result_array();
        // language
        $data['getLanguage']            = $this->language_model->get_languages();
        $data['getLang']                = $this->input->get('lang');
        $data['language']               = $this->language_model->getLanguage($data['getLang']);

        if ($this->auth_model->is_logged_in()) {
            // get information
            $sessionId                      = $this->session->userdata('r_sess_user_id');
            $data['user']                   = $this->M_Global->getmultiparam("users", "id = '$sessionId' ")->row_array();
            $data['countAddress']           = $this->M_Global->count("MyAddress", "CustomerID = '$sessionId' AND AddressCategory IS NULL");

            $this->load->view('FRONTEND/__components/header', $data);
            $this->load->view('FRONTEND/__components/nav', $data);
            $this->load->view('FRONTEND/__sidebar/start_section', $data);
            $this->load->view('FRONTEND/__account/Edit-Email', $data);
            $this->load->view('FRONTEND/__sidebar/end_section', $data);
            $this->load->view('FRONTEND/__components/modal');
            $this->load->view('FRONTEND/__components/footer');
        } else {
            redirect('customer/account/login');
        }
    }

    public function edit_email()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|valid_email|is_unique[users.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password', 'form_password', 'required|xss_clean|max_length[30]');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errorEmail', form_error('email', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorPassword', form_error('password', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('form_data', $this->auth_model->input_values());

            redirect($this->agent->referrer());
        } else {
            $sessionId      = $this->session->userdata('r_sess_user_id');
            $username       = $this->session->userdata('r_sess_user_username');
            $password       = $this->input->post('password');
            $checkPassword  = $this->M_Global->getmultiparam("users", "id = '$sessionId' AND username = '$username' ")->row_array();

            if (!empty($checkPassword) && password_verify($password, $checkPassword['password'])) {
                $data = array(
                    'email'     => htmlspecialchars($this->input->post('email', true))
                );
                $this->M_Global->update_data("id = '$sessionId'", $data, "users");
                $this->auth_model->logout();

                $this->session->set_flashdata(
                    'success',
                    '<div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    <div>Email successfully updated.</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
                redirect(base_url('customer/account/login'));
            } else {
                $this->session->set_flashdata(
                    'error',
                    '<div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                    <div>Your password is incorrect!</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
                redirect(base_url('customer/account/change-email'));
            }
        }
    }

    public function my_address()
    {
        $data['title']                  = $this->settings->homepage_title;
        $data['description']            = $this->settings->site_description;
        $data['keywords']               = $this->settings->keywords;
        // menu & submenu
        $data['getallcategory']         = $this->M_Menu->getAllCategory();
        // basic configuration
        $data['getBasicConfiguration']  = $this->M_Global->getmultiparam("BasicConfiguration", "ConfigStatus = 1")->row_array();
        $configId                       = $data['getBasicConfiguration']['ConfigID'];
        $data['getMediaSocial']         = $this->M_Global->getmultiparam("MediaSocial", "ConfigID = '$configId' AND MediaSocialStatus = 1")->result_array();
        // language
        $data['getLanguage']            = $this->language_model->get_languages();

        if ($this->auth_model->is_logged_in()) {
            // get information
            $sessionId                      = $this->session->userdata('r_sess_user_id');
            $data['getLang']                = $this->input->get('lang');
            $data['language']               = $this->language_model->getLanguage($data['getLang']);
            $data['user']                   = $this->M_Global->getmultiparam("users", "id = '$sessionId' ")->row_array();
            $data['countAddress']           = $this->M_Global->count("MyAddress", "CustomerID = '$sessionId'");
            $data['countDefaultAddress']    = $this->M_Global->count("MyAddress", "CustomerID = '$sessionId' AND AddressCategory = 1");
            $data['countBillingAddress']    = $this->M_Global->count("MyAddress", "CustomerID = '$sessionId' AND AddressCategory = 2");
            $data['countShippingAddress']   = $this->M_Global->count("MyAddress", "CustomerID = '$sessionId' AND AddressCategory = 3");
            $data['getAddress']             = $this->M_Global->getmultiparam("MyAddress", "CustomerID = '$sessionId' AND AddressCategory IS NULL")->result_array();
            $data['getDefaultAddress']      = $this->M_Global->getmultiparam("MyAddress", "CustomerID = '$sessionId' AND AddressCategory = 1")->row_array();
            $data['getBillingAddress']      = $this->M_Global->getmultiparam("MyAddress", "CustomerID = '$sessionId' AND AddressCategory = 2")->row_array();
            $data['getShippingAddress']     = $this->M_Global->getmultiparam("MyAddress", "CustomerID = '$sessionId' AND AddressCategory = 3")->row_array();

            $this->load->view('FRONTEND/__components/header', $data);
            $this->load->view('FRONTEND/__components/nav', $data);
            $this->load->view('FRONTEND/__sidebar/start_section', $data);
            $this->load->view('FRONTEND/Address', $data);
            $this->load->view('FRONTEND/__sidebar/end_section', $data);
            $this->load->view('FRONTEND/__components/modal');
            $this->load->view('FRONTEND/__components/footer');
        } else {
            redirect('customer/account/login');
        }
    }

    public function add_account_address()
    {
        $data['title']                  = $this->settings->homepage_title;
        $data['description']            = $this->settings->site_description;
        $data['keywords']               = $this->settings->keywords;
        // menu & submenu
        $data['getallcategory']         = $this->M_Menu->getAllCategory();
        // basic configuration
        $data['getBasicConfiguration']  = $this->M_Global->getmultiparam("BasicConfiguration", "ConfigStatus = 1")->row_array();
        $configId                       = $data['getBasicConfiguration']['ConfigID'];
        $data['getMediaSocial']         = $this->M_Global->getmultiparam("MediaSocial", "ConfigID = '$configId' AND MediaSocialStatus = 1")->result_array();
        // language
        $data['getLanguage']            = $this->language_model->get_languages();
        $data['getLang']                = $this->input->get('lang');
        $data['language']               = $this->language_model->getLanguage($data['getLang']);

        if ($this->auth_model->is_logged_in()) {
            // get information
            $sessionId                      = $this->session->userdata('r_sess_user_id');
            $data['user']                   = $this->M_Global->getmultiparam("users", "id = '$sessionId' ")->row_array();
            $data['countAddress']           = $this->M_Global->count("MyAddress", "CustomerID = '$sessionId'");
            $data['countDefaultAddress']    = $this->M_Global->count("MyAddress", "CustomerID = '$sessionId' AND AddressCategory = 1");
            $data['getDefaultAddress']      = $this->M_Global->getmultiparam("MyAddress", "CustomerID = '$sessionId' AND AddressCategory = 1")->row_array();

            $this->load->view('FRONTEND/__components/header', $data);
            $this->load->view('FRONTEND/__components/nav', $data);
            $this->load->view('FRONTEND/__sidebar/start_section', $data);
            $this->load->view('FRONTEND/__address/Add', $data);
            $this->load->view('FRONTEND/__sidebar/end_section', $data);
            $this->load->view('FRONTEND/__components/modal');
            $this->load->view('FRONTEND/__components/footer');
        } else {
            redirect('customer/account/login');
        }
    }

    public function add_address()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim|xss_clean');
        $this->form_validation->set_rules('Company', 'Company', 'trim|xss_clean');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|trim|xss_clean');
        $this->form_validation->set_rules('address', 'Address', 'required|trim|xss_clean');
        $this->form_validation->set_rules('city', 'City', 'required|trim|xss_clean');
        $this->form_validation->set_rules('province', 'Province', 'required|trim|xss_clean');
        $this->form_validation->set_rules('postal_code', 'Postal Code', 'required|trim|xss_clean');
        $this->form_validation->set_rules('country', 'Country', 'required|trim|xss_clean');

        $lang           = $this->input->get('lang');
        $usersId        = $this->session->userdata('r_sess_user_id');
        $countAddress   = $this->M_Global->count("MyAddress", "CustomerID = '$usersId'");

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errorFirstName', form_error('first_name', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorLastName', form_error('last_name', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorCompany', form_error('company', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorPhoneNumber', form_error('phone_number', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorAddress', form_error('address', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorCity', form_error('city', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorProvince', form_error('province', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorPostalCode', form_error('postal_code', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorCountry', form_error('country', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('valueFirstName', set_value('first_name'));
            $this->session->set_flashdata('valueLastName', set_value('Last_name'));
            $this->session->set_flashdata('valueCompany', set_value('company'));
            $this->session->set_flashdata('valuePhoneNumber', set_value('phone_number'));
            $this->session->set_flashdata('valueAddress', set_value('address'));
            $this->session->set_flashdata('valueCity', set_value('city'));
            $this->session->set_flashdata('valueProvince', set_value('province'));
            $this->session->set_flashdata('valuePostalCode', set_value('postal_code'));
            $this->session->set_flashdata('valueCountry', set_value('country'));

            redirect($this->agent->referrer());
        } else {
            if ($countAddress < 1) {
                $addressCategory = 1;

                $data = array(
                    'CustomerID'        => $this->session->userdata('r_sess_user_id'),
                    'AddressFirstName'  => htmlspecialchars($this->input->post('first_name', true)),
                    'AddressLastName'   => htmlspecialchars($this->input->post('last_name', true)),
                    'AddressCompany'    => htmlspecialchars($this->input->post('company', true)),
                    'AddressPhone'      => htmlspecialchars($this->input->post('phone_number', true)),
                    'AddressStreet'     => htmlspecialchars($this->input->post('address', true)),
                    'AddressCity'       => htmlspecialchars($this->input->post('city', true)),
                    'AddressState'      => htmlspecialchars($this->input->post('province', true)),
                    'AddressPostalCode' => htmlspecialchars($this->input->post('postal_code', true)),
                    'AddressCountry'    => htmlspecialchars($this->input->post('country', true)),
                    'AddressCategory'   => $addressCategory,
                    'created_at'        => date('Y-m-d H:i:s', strtotime('now'))
                );
                $this->M_Global->insert($data, 'MyAddress');
            } else {
                $addressCategory = $this->input->post('my_category', true);

                if ($addressCategory == 2) {
                    $checkAddress   = $this->M_Global->getmultiparam("MyAddress", "CustomerID = '$usersId' AND (AddressCategory = 1 OR AddressCategory = 2)")->row_array();
                    $idAddress      = $checkAddress['AddressID'];
                    $category       = $checkAddress['AddressCategory'];

                    if ($category == 1) {
                        $update = array(
                            'AddressCategory'   => 3,
                            'updated_at'        => date('Y-m-d H:i:s', strtotime('now'))
                        );
                        $this->M_Global->update_data("AddressID = '$idAddress' AND CustomerID = '$usersId'",  $update, 'MyAddress');

                        $data = array(
                            'CustomerID'        => $this->session->userdata('r_sess_user_id'),
                            'AddressFirstName'  => htmlspecialchars($this->input->post('first_name', true)),
                            'AddressLastName'   => htmlspecialchars($this->input->post('last_name', true)),
                            'AddressCompany'    => htmlspecialchars($this->input->post('company', true)),
                            'AddressPhone'      => htmlspecialchars($this->input->post('phone_number', true)),
                            'AddressStreet'     => htmlspecialchars($this->input->post('address', true)),
                            'AddressCity'       => htmlspecialchars($this->input->post('city', true)),
                            'AddressState'      => htmlspecialchars($this->input->post('province', true)),
                            'AddressPostalCode' => htmlspecialchars($this->input->post('postal_code', true)),
                            'AddressCountry'    => htmlspecialchars($this->input->post('country', true)),
                            'AddressCategory'   => $addressCategory,
                            'created_at'        => date('Y-m-d H:i:s', strtotime('now'))
                        );
                        $this->M_Global->insert($data, 'MyAddress');
                    } elseif ($category == 2) {
                        $update = array(
                            'AddressCategory'   => null,
                            'updated_at'        => date('Y-m-d H:i:s', strtotime('now'))
                        );
                        $this->M_Global->update_data("AddressID = '$idAddress' AND CustomerID = '$usersId'",  $update, 'MyAddress');

                        $data = array(
                            'CustomerID'        => $this->session->userdata('r_sess_user_id'),
                            'AddressFirstName'  => htmlspecialchars($this->input->post('first_name', true)),
                            'AddressLastName'   => htmlspecialchars($this->input->post('last_name', true)),
                            'AddressCompany'    => htmlspecialchars($this->input->post('company', true)),
                            'AddressPhone'      => htmlspecialchars($this->input->post('phone_number', true)),
                            'AddressStreet'     => htmlspecialchars($this->input->post('address', true)),
                            'AddressCity'       => htmlspecialchars($this->input->post('city', true)),
                            'AddressState'      => htmlspecialchars($this->input->post('province', true)),
                            'AddressPostalCode' => htmlspecialchars($this->input->post('postal_code', true)),
                            'AddressCountry'    => htmlspecialchars($this->input->post('country', true)),
                            'AddressCategory'   => $addressCategory,
                            'created_at'        => date('Y-m-d H:i:s', strtotime('now'))
                        );
                        $this->M_Global->insert($data, 'MyAddress');
                    }
                } elseif ($addressCategory == 3) {
                    $checkAddress   = $this->M_Global->getmultiparam("MyAddress", "CustomerID = '$usersId' AND (AddressCategory = 1 OR AddressCategory = 3)")->row_array();
                    $idAddress      = $checkAddress['AddressID'];
                    $category       = $checkAddress['AddressCategory'];

                    if ($category == 1) {
                        $update = array(
                            'AddressCategory'   => 2,
                            'updated_at'        => date('Y-m-d H:i:s', strtotime('now'))
                        );
                        $this->M_Global->update_data("AddressID = '$idAddress' AND CustomerID = '$usersId'",  $update, 'MyAddress');

                        $data = array(
                            'CustomerID'        => $this->session->userdata('r_sess_user_id'),
                            'AddressFirstName'  => htmlspecialchars($this->input->post('first_name', true)),
                            'AddressLastName'   => htmlspecialchars($this->input->post('last_name', true)),
                            'AddressCompany'    => htmlspecialchars($this->input->post('company', true)),
                            'AddressPhone'      => htmlspecialchars($this->input->post('phone_number', true)),
                            'AddressStreet'     => htmlspecialchars($this->input->post('address', true)),
                            'AddressCity'       => htmlspecialchars($this->input->post('city', true)),
                            'AddressState'      => htmlspecialchars($this->input->post('province', true)),
                            'AddressPostalCode' => htmlspecialchars($this->input->post('postal_code', true)),
                            'AddressCountry'    => htmlspecialchars($this->input->post('country', true)),
                            'AddressCategory'   => $addressCategory,
                            'created_at'        => date('Y-m-d H:i:s', strtotime('now'))
                        );
                        $this->M_Global->insert($data, 'MyAddress');
                    } elseif ($category == 3) {
                        $update = array(
                            'AddressCategory'   => null,
                            'updated_at'        => date('Y-m-d H:i:s', strtotime('now'))
                        );
                        $this->M_Global->update_data("AddressID = '$idAddress' AND CustomerID = '$usersId'",  $update, 'MyAddress');

                        $data = array(
                            'CustomerID'        => $this->session->userdata('r_sess_user_id'),
                            'AddressFirstName'  => htmlspecialchars($this->input->post('first_name', true)),
                            'AddressLastName'   => htmlspecialchars($this->input->post('last_name', true)),
                            'AddressCompany'    => htmlspecialchars($this->input->post('company', true)),
                            'AddressPhone'      => htmlspecialchars($this->input->post('phone_number', true)),
                            'AddressStreet'     => htmlspecialchars($this->input->post('address', true)),
                            'AddressCity'       => htmlspecialchars($this->input->post('city', true)),
                            'AddressState'      => htmlspecialchars($this->input->post('province', true)),
                            'AddressPostalCode' => htmlspecialchars($this->input->post('postal_code', true)),
                            'AddressCountry'    => htmlspecialchars($this->input->post('country', true)),
                            'AddressCategory'   => $addressCategory,
                            'created_at'        => date('Y-m-d H:i:s', strtotime('now'))
                        );
                        $this->M_Global->insert($data, 'MyAddress');
                    }
                } else {
                    $data = array(
                        'CustomerID'        => $this->session->userdata('r_sess_user_id'),
                        'AddressFirstName'  => htmlspecialchars($this->input->post('first_name', true)),
                        'AddressLastName'   => htmlspecialchars($this->input->post('last_name', true)),
                        'AddressCompany'    => htmlspecialchars($this->input->post('company', true)),
                        'AddressPhone'      => htmlspecialchars($this->input->post('phone_number', true)),
                        'AddressStreet'     => htmlspecialchars($this->input->post('address', true)),
                        'AddressCity'       => htmlspecialchars($this->input->post('city', true)),
                        'AddressState'      => htmlspecialchars($this->input->post('province', true)),
                        'AddressPostalCode' => htmlspecialchars($this->input->post('postal_code', true)),
                        'AddressCountry'    => htmlspecialchars($this->input->post('country', true)),
                        'AddressCategory'   => $addressCategory,
                        'created_at'        => date('Y-m-d H:i:s', strtotime('now'))
                    );
                    $this->M_Global->insert($data, 'MyAddress');
                }
            }
        }

        $this->session->set_flashdata(
            'success',
            '<div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </svg>
            <div>Your address has been added successfully.</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        if ($lang) {
            redirect(base_url('customer/account/address?lang=' . $lang));
        } else {
            redirect(base_url('customer/account/address'));
        }
    }

    public function edit_account_address($addressId)
    {
        if (!$this->auth_model->is_logged_in()) {
            redirect('customer/account/login');
        }

        $data['title']                  = $this->settings->homepage_title;
        $data['description']            = $this->settings->site_description;
        $data['keywords']               = $this->settings->keywords;
        // menu & submenu
        $data['getallcategory']         = $this->M_Menu->getAllCategory();
        // basic configuration
        $data['getBasicConfiguration']  = $this->M_Global->getmultiparam("BasicConfiguration", "ConfigStatus = 1")->row_array();
        $configId                       = $data['getBasicConfiguration']['ConfigID'];
        $data['getMediaSocial']         = $this->M_Global->getmultiparam("MediaSocial", "ConfigID = '$configId' AND MediaSocialStatus = 1")->result_array();
        // language
        $data['getLanguage']            = $this->language_model->get_languages();
        $data['getLang']                = $this->input->get('lang');
        $data['language']               = $this->language_model->getLanguage($data['getLang']);

        // get information
        $getAddressId                   = decrypt_url($addressId);
        $usersId                        = $this->session->userdata('r_sess_user_id');
        $data['user']                   = $this->M_Global->getmultiparam("users", "id = '$usersId' ")->row_array();
        $data['countAddress']           = $this->M_Global->count("MyAddress", "CustomerID = '$usersId' AND AddressCategory IS NULL");
        $data['getAddress']             = $this->M_Global->getmultiparam("MyAddress", "AddressID = '$getAddressId' AND CustomerID = '$usersId' ")->row_array();
        $data['getDefaultCategory']     = $this->M_Global->getmultiparam("MyAddress", "CustomerID = '$usersId' AND AddressCategory = 1")->row_array();
        $data['getCategoryForBilling']  = $this->M_Global->getmultiparam("MyAddress", "CustomerID = '$usersId' AND (AddressCategory = 1 OR AddressCategory = 3)")->row_array();
        $data['getCategoryForShipping'] = $this->M_Global->getmultiparam("MyAddress", "CustomerID = '$usersId' AND (AddressCategory = 1 OR AddressCategory = 2)")->row_array();

        $this->load->view('FRONTEND/__components/header', $data);
        $this->load->view('FRONTEND/__components/nav', $data);
        $this->load->view('FRONTEND/__sidebar/start_section', $data);
        $this->load->view('FRONTEND/__address/Edit', $data);
        $this->load->view('FRONTEND/__sidebar/end_section', $data);
        $this->load->view('FRONTEND/__components/modal');
        $this->load->view('FRONTEND/__components/footer');
    }

    public function edit_address($addressId)
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim|xss_clean');
        $this->form_validation->set_rules('Company', 'Company', 'trim|xss_clean');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|trim|xss_clean');
        $this->form_validation->set_rules('address', 'Address', 'required|trim|xss_clean');
        $this->form_validation->set_rules('city', 'City', 'required|trim|xss_clean');
        $this->form_validation->set_rules('province', 'Province', 'required|trim|xss_clean');
        $this->form_validation->set_rules('postal_code', 'Postal Code', 'required|trim|xss_clean');
        $this->form_validation->set_rules('province', 'Province', 'required|trim|xss_clean');
        $this->form_validation->set_rules('postal_code', 'Postal Code', 'required|trim|xss_clean');
        $this->form_validation->set_rules('country', 'Country', 'required|trim|xss_clean');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errorFirstName', form_error('first_name', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorLastName', form_error('last_name', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorCompany', form_error('company', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorPhoneNumber', form_error('phone_number', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorAddress', form_error('address', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorCity', form_error('city', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorProvince', form_error('province', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorPostalCode', form_error('postal_code', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorCountry', form_error('country', '<small class="text-danger">', '</small>'));

            redirect($this->agent->referrer());
        } else {
            $getAddressId       = decrypt_url($addressId);
            $usersId            = $this->session->userdata('r_sess_user_id');
            $idAddress          = $this->input->post('address_id');
            $addressCategory    = $this->input->post('category', true);
            $myAddress          = $this->input->post('my_category', true);
            $lang               = $this->input->get('lang');

            if ($lang) {
                $urls1 = 'customer/account?lang=' . $lang;
                $urls2 = 'customer/account/address?lang=' . $lang;
            } else {
                $urls1 = 'customer/account';
                $urls2 = 'customer/account/address';
            }

            $data = array(
                'CustomerID'        => $this->session->userdata('r_sess_user_id'),
                'AddressFirstName'  => htmlspecialchars($this->input->post('first_name', true)),
                'AddressLastName'   => htmlspecialchars($this->input->post('last_name', true)),
                'AddressCompany'    => htmlspecialchars($this->input->post('company', true)),
                'AddressPhone'      => htmlspecialchars($this->input->post('phone_number', true)),
                'AddressStreet'     => htmlspecialchars($this->input->post('address', true)),
                'AddressCity'       => htmlspecialchars($this->input->post('city', true)),
                'AddressState'      => htmlspecialchars($this->input->post('province', true)),
                'AddressPostalCode' => htmlspecialchars($this->input->post('postal_code', true)),
                'AddressCountry'    => htmlspecialchars($this->input->post('country', true)),
                'updated_at'        => date('Y-m-d H:i:s', strtotime('now'))
            );
            $this->M_Global->update_data("AddressID = '$getAddressId'",  $data, 'MyAddress');

            if ($idAddress) {
                if ($addressCategory == 2) {
                    $data = array(
                        'AddressCategory'   => $addressCategory,
                        'updated_at'        => date('Y-m-d H:i:s', strtotime('now'))
                    );
                    $this->M_Global->update_data("AddressID = '$getAddressId' AND CustomerID = '$usersId'",  $data, 'MyAddress');

                    $update = array(
                        'AddressCategory'   => 3,
                        'updated_at'        => date('Y-m-d H:i:s', strtotime('now'))
                    );
                    $this->M_Global->update_data("AddressID = '$idAddress' AND CustomerID = '$usersId'",  $update, 'MyAddress');

                    $this->session->set_flashdata(
                        'success',
                        '<div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        <div>Your address has been changed successfully.</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>'
                    );
                    redirect(base_url($urls1));
                } elseif ($addressCategory == 3) {
                    $data = array(
                        'AddressCategory'   => $addressCategory,
                        'updated_at'        => date('Y-m-d H:i:s', strtotime('now'))
                    );
                    $this->M_Global->update_data("AddressID = '$getAddressId' AND CustomerID = '$usersId'",  $data, 'MyAddress');

                    $update = array(
                        'AddressCategory'   => 2,
                        'updated_at'        => date('Y-m-d H:i:s', strtotime('now'))
                    );
                    $this->M_Global->update_data("AddressID = '$idAddress' AND CustomerID = '$usersId'",  $update, 'MyAddress');

                    $this->session->set_flashdata(
                        'success',
                        '<div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        <div>Your address has been changed successfully.</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>'
                    );
                    redirect(base_url($urls1));
                } elseif ($addressCategory == 1) {
                    $data = array(
                        'AddressCategory'   => $addressCategory,
                        'updated_at'        => date('Y-m-d H:i:s', strtotime('now'))
                    );
                    $this->M_Global->update_data("AddressID = '$getAddressId' AND CustomerID = '$usersId'",  $data, 'MyAddress');

                    $update = array(
                        'AddressCategory'   => null,
                        'updated_at'        => date('Y-m-d H:i:s', strtotime('now'))
                    );
                    $this->M_Global->update_data("AddressID = '$idAddress' AND CustomerID = '$usersId'",  $update, 'MyAddress');

                    $this->session->set_flashdata(
                        'success',
                        '<div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        <div>Your address has been changed successfully.</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>'
                    );
                    redirect(base_url($urls1));
                } else {
                    $data = array(
                        'CustomerID'        => $this->session->userdata('r_sess_user_id'),
                        'AddressFirstName'  => htmlspecialchars($this->input->post('first_name', true)),
                        'AddressLastName'   => htmlspecialchars($this->input->post('last_name', true)),
                        'AddressCompany'    => htmlspecialchars($this->input->post('company', true)),
                        'AddressPhone'      => htmlspecialchars($this->input->post('phone_number', true)),
                        'AddressStreet'     => htmlspecialchars($this->input->post('address', true)),
                        'AddressCity'       => htmlspecialchars($this->input->post('city', true)),
                        'AddressState'      => htmlspecialchars($this->input->post('province', true)),
                        'AddressPostalCode' => htmlspecialchars($this->input->post('postal_code', true)),
                        'AddressCountry'    => htmlspecialchars($this->input->post('country', true)),
                        'updated_at'        => date('Y-m-d H:i:s', strtotime('now'))
                    );
                    $this->M_Global->update_data("AddressID = '$getAddressId' AND CustomerID = '$usersId'",  $data, 'MyAddress');

                    $this->session->set_flashdata(
                        'success',
                        '<div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        <div>Your address has been changed successfully.</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>'
                    );
                    redirect(base_url($urls2));
                }
            }

            if ($myAddress == 2) {
                $checkAddress   = $this->M_Global->getmultiparam("MyAddress", "CustomerID = '$usersId' AND AddressCategory = 1 OR AddressCategory = 2")->row_array();
                $idAddress      = $checkAddress['AddressID'];
                $category       = $checkAddress['AddressCategory'];

                if ($category == 1) {
                    $update = array(
                        'AddressCategory'   => 3,
                        'updated_at'        => date('Y-m-d H:i:s', strtotime('now'))
                    );

                    $this->M_Global->update_data("AddressID = '$idAddress' AND CustomerID = '$usersId'",  $update, 'MyAddress');

                    $data = array(
                        'AddressCategory'   => $myAddress,
                        'updated_at'        => date('Y-m-d H:i:s', strtotime('now'))
                    );
                    $this->M_Global->update_data("AddressID = '$getAddressId' AND CustomerID = '$usersId'",  $data, 'MyAddress');
                } elseif ($category == 2) {
                    $update = array(
                        'AddressCategory'   => null,
                        'updated_at'        => date('Y-m-d H:i:s', strtotime('now'))
                    );
                    $this->M_Global->update_data("AddressID = '$idAddress' AND CustomerID = '$usersId'",  $update, 'MyAddress');

                    $data = array(
                        'AddressCategory'   => $myAddress,
                        'updated_at'        => date('Y-m-d H:i:s', strtotime('now'))
                    );
                    $this->M_Global->update_data("AddressID = '$getAddressId' AND CustomerID = '$usersId'",  $data, 'MyAddress');
                }
            } elseif ($myAddress == 3) {
                $checkAddress   = $this->M_Global->getmultiparam("MyAddress", "CustomerID = '$usersId' AND AddressCategory = 1 OR AddressCategory = 3")->row_array();
                $idAddress      = $checkAddress['AddressID'];
                $category       = $checkAddress['AddressCategory'];

                if ($category == 1) {
                    $update = array(
                        'AddressCategory'   => 2,
                        'updated_at'        => date('Y-m-d H:i:s', strtotime('now'))
                    );

                    $this->M_Global->update_data("AddressID = '$idAddress' AND CustomerID = '$usersId'",  $update, 'MyAddress');

                    $data = array(
                        'AddressCategory'   => $myAddress,
                        'updated_at'        => date('Y-m-d H:i:s', strtotime('now'))
                    );
                    $this->M_Global->update_data("AddressID = '$getAddressId' AND CustomerID = '$usersId'",  $data, 'MyAddress');
                } elseif ($category == 3) {
                    $update = array(
                        'AddressCategory'   => null,
                        'updated_at'        => date('Y-m-d H:i:s', strtotime('now'))
                    );
                    $this->M_Global->update_data("AddressID = '$idAddress' AND CustomerID = '$usersId'",  $update, 'MyAddress');

                    $data = array(
                        'AddressCategory'   => $myAddress,
                        'updated_at'        => date('Y-m-d H:i:s', strtotime('now'))
                    );
                    $this->M_Global->update_data("AddressID = '$getAddressId' AND CustomerID = '$usersId'",  $data, 'MyAddress');
                }
            }
        }
        $this->session->set_flashdata(
            'success',
            '<div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </svg>
            <div>Your address has been changed successfully.</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        redirect(base_url($urls2));
    }

    public function delete_address()
    {
        $addressId  = $this->input->post('address_id');
        $usersId    = $this->session->userdata('r_sess_user_id');
        $lang       = $this->input->get('lang');

        if ($usersId || $addressId) {
            $this->M_Global->delete("MyAddress", "AddressID = '$addressId' AND CustomerID = '$usersId'");

            sleep(1);
            $this->session->set_flashdata(
                'success',
                '<div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
                <div>Your address has been remove successfully.</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            if ($lang) {
                redirect('customer/account/address?lang=' . $lang);
            } else {
                redirect('customer/account/address');
            }
        } else {
            sleep(1);
            $this->session->set_flashdata(
                'errors',
                '<div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <div>This process failed!</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            redirect($this->agent->referrer());
        }
    }
    // End Account


    // local storage
    public function add_to_cart()
    {
        $data = array(
            'id'    => $this->input->post('product_id'),
            'image' => $this->input->post('product_image'),
            'name'  => $this->input->post('product_name'),
            'slug'  => $this->input->post('product_slug'),
            'price' => $this->input->post('product_price'),
            'qty'   => (int)$this->input->post('product_qty')
        );
        $data['token']      = $this->security->get_csrf_hash();

        sleep(1);
        echo json_encode($data);
    }

    public function remove_cart()
    {
        $data = array(
            'id'    => $this->input->post('product_id'),
        );
        $data['token']      = $this->security->get_csrf_hash();

        sleep(1);
        echo json_encode($data);
    }
    // local storage


    // Cart
    public function get_cart_from_db()
    {
        $ip             = $this->input->ip_address(true);
        $getCartFromDB  = $this->M_Global->getmultiparam("Cart", "UsersID = '$ip' ")->result_array();
        $productCart    = [];

        foreach ($getCartFromDB as $cart) {
            $productId      = $cart['ProductID'];
            $getProduct     =  $this->M_Global->getmultiparam("Product", "ProductID = '$productId' ")->row_array();
            $getProductPic  = $this->M_Global->getmultiparam("ProductPic", "ProductID = '$productId' AND PicArr = 1")->row_array();

            $productCart[] = array(
                'UsersID'       => $ip,
                'ProductID'     => $cart['ProductID'],
                'ProductSlug'   => $getProduct,
                'ProductName'   => $cart['ProductName'],
                'ProductPrice'  => $cart['ProductPrice'],
                'ProductQty'    => $cart['ProductQty'],
                'ProductPic'    => $getProductPic
            );
        }
        echo json_encode($productCart);
    }

    public function remove_cart_from_db()
    {
        $usersId        = $this->session->userdata('r_sess_user_id');
        $productId      = $this->input->post('product_id');

        $data['token']  = $this->security->get_csrf_hash();

        $this->M_Global->delete("Cart", "UsersID = '$usersId' AND ProductID = '$productId' ");

        sleep(1);
        echo json_encode($data);
    }

    public function insert_cart_after_login()
    {
        $sessionId  = $this->session->userdata('r_sess_user_id');
        $input      = $this->input->post('string');
        $decode     = json_decode($input);

        foreach ($decode as $code) {
            $data = array(
                'UsersID'       => $sessionId,
                'ProductID'     => $code->id,
                'ProductName'   => $code->name,
                'ProductPrice'  => $code->price,
                'ProductQty'    => $code->qty,
                'created_at'    => date('Y-m-d H:i:s', strtotime('now'))
            );
            $ProductID  = $data['ProductID'];
            $UsersID    = $data['UsersID'];
            $getCart    = $this->M_Global->getmultiparam("Cart", "ProductID = '$ProductID' AND UsersID = '$UsersID'")->row_array();

            if ($getCart) {
                $qtyFinal   = $getCart['ProductQty'] + $data['ProductQty'];
                $cartID     = $getCart['CartID'];

                $result     = $this->M_Global->update("Cart", "ProductQty = '$qtyFinal' WHERE CartID = '$cartID'");
            } else {
                $result = $this->M_Global->insert($data, "Cart");
            }
        }

        echo json_encode($result);
    }

    public function add_cart_for_users()
    {
        $ip    = $this->input->ip_address(true);

        $data = array(
            'UsersID'       => $ip,
            'ProductID'     => $this->input->post('product_id'),
            'ProductName'   => $this->input->post('product_name'),
            'ProductPrice'  => $this->input->post('product_price'),
            'ProductQty'    => $this->input->post('product_qty'),
            'created_at'    => date('Y-m-d H:i:s', strtotime('now'))
        );
        $data['token']      = $this->security->get_csrf_hash();

        $ProductID          = $data['ProductID'];
        $UsersID            = $data['UsersID'];
        $getCart            = $this->M_Global->getmultiparam("Cart", "ProductID = '$ProductID' AND UsersID = '$UsersID'")->row_array();

        if ($getCart) {
            $qtyFinal   = $getCart['ProductQty'] + $data['ProductQty'];
            $cartID     = $getCart['CartID'];

            $dataUpdate = array(
                'ProductQty'    => $qtyFinal
            );

            $result = $this->M_Global->update_data("CartID = '$cartID'", $dataUpdate, "Cart");
        } else {
            $result = $this->M_Global->insert($data, "Cart");
        }

        if ($result) {
            sleep(1);
        }
        echo json_encode($data);
    }

    public function remove_cart_checkout()
    {
        $cartId     = $this->input->post('cart_id', true);
        $usersId    = $this->session->userdata('r_sess_user_id');
        $result     = $this->M_Global->delete("Cart", "UsersID = '$usersId' AND CartID = '$cartId' ");

        if ($result == 'success') {
            $this->session->set_flashdata(
                'success',
                '<div class="alert alert-success d-flex align-items-center alert-dismissible fade show mb-0" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    <div>Your item cart has been remove successfully.</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
            );
        } else {
            $this->session->set_flashdata(
                'errors',
                '<div class="alert alert-danger d-flex align-items-center alert-dismissible fade show mb-0" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                    <div>Process update cart failed!</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
            );
        }

        sleep(1);
        redirect($this->agent->referrer());
    }

    public function update_cart_checkout()
    {
        if ($this->input->post('id')) {
            $usersId    = $this->session->userdata('r_sess_user_id');
            $id_arr     = $this->input->post('id');

            foreach ($id_arr as $key) {
                $qty_arr    = $this->input->post('qty_' . $key);

                $data = array(
                    'ProductQty'    => $qty_arr,
                    'updated_at'    => date('Y-m-d H:i:s', strtotime('now'))
                );
                $result = $this->M_Global->update_data("UsersID = '$usersId' AND CartID = '$key' ", $data, "Cart");
            }
            if ($result == 'success') {
                $this->session->set_flashdata(
                    'success',
                    '<div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    <div>Your cart has been updated successfully.</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
            } else {
                $this->session->set_flashdata(
                    'errors',
                    '<div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                    <div>Process update cart failed!</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
            }
        } else {
            $this->session->set_flashdata(
                'errors',
                '<div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <div>Please check the box if you want to procced!</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
        }
        sleep(1);
        redirect($this->agent->referrer());
    }

    public function checkout_cart()
    {
        $data['title']                  = $this->settings->homepage_title;
        $data['description']            = $this->settings->site_description;
        $data['keywords']               = $this->settings->keywords;
        // menu & submenu
        $data['getallcategory']         = $this->M_Menu->getAllCategory();
        // basic configuration
        $data['getBasicConfiguration']  = $this->M_Global->getmultiparam("BasicConfiguration", "ConfigStatus = 1")->row_array();
        $configId                       = $data['getBasicConfiguration']['ConfigID'];
        $data['getMediaSocial']         = $this->M_Global->getmultiparam("MediaSocial", "ConfigID = '$configId' AND MediaSocialStatus = 1")->result_array();
        // language
        $data['getLanguage']            = $this->language_model->get_languages();
        // language
        $data['getLanguage']            = $this->language_model->get_languages();
        $data['getLang']                = $this->input->get('lang');
        $data['language']               = $this->language_model->getLanguage($data['getLang']);

        $this->load->view('FRONTEND/__components/header', $data);
        $this->load->view('FRONTEND/__components/nav', $data);
        $this->load->view('FRONTEND/Checkout-Before-Login', $data);
        $this->load->view('FRONTEND/__components/modal');
        $this->load->view('FRONTEND/__components/footer');
    }

    public function send_offer_for_guest()
    {
        $this->form_validation->set_rules('country', 'Country', 'required|trim|xss_clean');
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim|xss_clean');
        $this->form_validation->set_rules('company', 'Company', 'trim|xss_clean');
        $this->form_validation->set_rules('address', 'Address', 'required|trim|xss_clean');
        $this->form_validation->set_rules('city', 'City', 'required|trim|xss_clean');
        $this->form_validation->set_rules('state', 'State', 'required|trim|xss_clean');
        $this->form_validation->set_rules('postcode', 'Postcode', 'required|trim|xss_clean');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|trim|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|valid_email');
        $this->form_validation->set_rules('notes', 'Notes', 'trim|xss_clean');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errorCountry', form_error('country', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorFirstName', form_error('first_name', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorLastName', form_error('last_name', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorCompany', form_error('company', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorAddress', form_error('address', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorCity', form_error('city', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorState', form_error('state', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorPostcode', form_error('postcode', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorPhone', form_error('phone', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorEmail', form_error('email', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorNotes', form_error('notes', '<small class="text-danger">', '</small>'));

            $this->session->set_flashdata('valueCountry', set_value('country'));
            $this->session->set_flashdata('valueFirstName', set_value('first_name'));
            $this->session->set_flashdata('valueLastName', set_value('last_name'));
            $this->session->set_flashdata('valueCompany', set_value('company'));
            $this->session->set_flashdata('valueAddress', set_value('address'));
            $this->session->set_flashdata('valueCity', set_value('city'));
            $this->session->set_flashdata('valueState', set_value('state'));
            $this->session->set_flashdata('valuePostcode', set_value('postcode'));
            $this->session->set_flashdata('valuePhone', set_value('phone'));
            $this->session->set_flashdata('valueEmail', set_value('email'));
            $this->session->set_flashdata('valueNotes', set_value('notes'));

            redirect($this->agent->referrer());
        } else {
            $getConfig      = $this->M_Global->get_result("BasicConfiguration")->row_array();
            $invoiceNumber  = $this->M_Global->invoice_number();
            $subTotal       = 0;
            $totalSpend     = 0;
            $totalBilling   = 0;
            $input          = $this->input->post('string');
            $decode         = json_decode($input);
            $result         = [];

            foreach ($decode as $code) {
                $qty        = $code->qty;
                $price      = $code->price;
                $total      = $qty * $price;
                $subTotal += $total;

                $result[] = array(
                    'ProductID'     => $code->id,
                    'ProductName'   => $code->name,
                    'ProductQty'    => $code->qty,
                    'ProductPrice'  => $code->price,
                    'ProductTotal'  => $total
                );
            }

            $totalTax       = 0;
            $totalSpend     = $subTotal + $totalTax;
            $totalBilling   = $totalSpend;

            $invoice['main'] = array(
                'ConfigID'              => $getConfig['ConfigID'],
                'UsersID'               => null,
                'InvoiceNumber'         => $invoiceNumber,
                'InvoiceDate'           => date('Y-m-d H:i:s', strtotime('now')),
                'InvoiceCountry'        => $this->input->post('country', true),
                'InvoiceFirstName'      => $this->input->post('first_name', true),
                'InvoiceLastName'       => $this->input->post('last_name', true),
                'InvoiceCompany'        => $this->input->post('company', true),
                'InvoiceAddress'        => $this->input->post('address', true),
                'InvoiceCity'           => $this->input->post('city', true),
                'InvoiceState'          => $this->input->post('state', true),
                'InvoicePostcode'       => $this->input->post('postcode', true),
                'InvoicePhone'          => $this->input->post('phone', true),
                'InvoiceEmail'          => $this->input->post('email', true),
                'InvoiceNotes'          => $this->input->post('notes', true),
                'InvoiceSubtotal'       => $subTotal,
                'InvoiceTax'            => $totalTax,
                'InvoiceTotalSpend'     => $totalSpend,
                'InvoiceTotalBilling'   => $totalBilling,
                'created_at'            => date('Y-m-d H:i:s', strtotime('now'))
            );

            $data = array(
                'CompanyName'           => $getConfig['ConfigCompany'],
                'CompanyAddress'        => $getConfig['ConfigAddress'],
                'CompanyPhone'          => $getConfig['ConfigPhone'],
                'InvoiceNumber'         => $invoice['main']['InvoiceNumber'],
                'InvoiceDate'           => $invoice['main']['InvoiceDate'],
                'InvoiceFirstName'      => $invoice['main']['InvoiceFirstName'],
                'InvoiceLastName'       => $invoice['main']['InvoiceLastName'],
                'InvoiceAddress'        => $invoice['main']['InvoiceAddress'],
                'InvoiceCity'           => $invoice['main']['InvoiceCity'],
                'InvoiceState'          => $invoice['main']['InvoiceState'],
                'InvoicePostcode'       => $invoice['main']['InvoicePostcode'],
                'InvoiceCountry'        => $invoice['main']['InvoiceCountry'],
                'InvoicePhone'          => $invoice['main']['InvoicePhone'],
                'InvoiceEmail'          => $invoice['main']['InvoiceEmail'],
                'InvoiceNotes'          => $invoice['main']['InvoiceNotes'],
                'SubTotal'              => $subTotal,
                'TotalTax'              => $totalTax,
                'TotalSpend'            => $totalSpend,
                'TotalBilling'          => $totalBilling
            );

            $data['getCart']    = $result;

            $message            = $this->load->view('FRONTEND/Offer', $data, true);
            $subject            = "Offfer AED.co.id";
            $sentStatus         = $this->_send_offer($data['InvoiceEmail'], $subject, $message);

            if ($sentStatus == true) {
                $invoice['resultInv'] = $this->M_Global->insert($invoice['main'], "Invoice");

                if ($invoice['resultInv'] == 'success') {
                    $invNumber      = $invoice['main']['InvoiceNumber'];
                    $getInvoice     = $this->M_Global->getmultiparam("Invoice", "InvoiceNumber = '$invNumber'")->row_array();
                    $getInvoiceId   = $getInvoice['InvoiceID'];
                    $input          = $this->input->post('string');
                    $decode         = json_decode($input);

                    foreach ($decode as $code) {
                        $qty    = $code->qty;
                        $price  = $code->price;
                        $total  = $qty * $price;

                        $invoice['detail'] = array(
                            'InvoiceID'     => $getInvoiceId,
                            'ProductName'   => $code->name,
                            'ProductQty'    => $code->qty,
                            'ProductPrice'  => $code->price,
                            'ProductTotal'  => $total,
                            'created_at'    => date('Y-m-d H:i:s', strtotime('now'))
                        );
                        $invoice['resultInvd'] = $this->M_Global->insert($invoice['detail'], 'InvoiceDetail');
                    }
                }
            }
            $invoice['token'] = $this->security->get_csrf_hash();

            if ($invoice['resultInv'] == "success" && $invoice['resultInvd'] == "success") {
                $this->session->set_flashdata(
                    'success',
                    '<div class="alert alert-success d-flex align-items-center alert-dismissible fade show mb-0" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>
                    <div>Quotation has been sent successfully, please wait for more information.</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
            } else {
                $this->session->set_flashdata(
                    'error',
                    '<div class="alert alert-danger d-flex align-items-center alert-dismissible fade show mb-0" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                    <div>Quotation sending error!</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
            }

            sleep(2);
            echo json_encode($invoice);
        }
    }

    public function send_offer()
    {
        $usersId            = $this->session->userdata('r_sess_user_id');
        $validateUsers      = $this->M_Global->getmultiparam("users", "id = '$usersId' ")->row_array();
        $getConfig          = $this->M_Global->get_result("BasicConfiguration")->row_array();
        $getAddress         = $this->M_Global->getmultiparam("MyAddress", "CustomerID = '$usersId' AND AddressCategory = 2 ")->row_array();
        $getCart            = $this->M_Global->getmultiparam("Cart", "UsersID = '$usersId' ")->result_array();

        if ($validateUsers) {
            $ip             = $this->input->ip_address(true);
            $email          = $validateUsers['email'];
            $invoiceNumber  = $this->M_Global->invoice_number();
            $subTotal       = 0;
            $totalSpend     = 0;
            $totalBilling   = 0;
            $result         = [];

            foreach ($getCart as $cart) {
                $productPrice   = $cart['ProductPrice'];
                $productQty     = $cart['ProductQty'];
                $total          = $productPrice * $productQty;
                $subTotal      += $total;

                $result[] = array(
                    'CartID'        => $cart['CartID'],
                    'UsersID'       => $cart['UsersID'],
                    'ProductID'     => $cart['ProductID'],
                    'ProductName'   => $cart['ProductName'],
                    'ProductPrice'  => $cart['ProductPrice'],
                    'ProductQty'    => $cart['ProductQty'],
                    'ProductTotal'  => $total
                );
            }

            $totalTax       = 0;
            $totalSpend     = $total + $totalTax;
            $totalBilling   = $totalSpend;

            $dataInvoice = array(
                'ConfigID'              => $getConfig['ConfigID'],
                'UsersID'               => $usersId,
                'IP'                    => $ip,
                'InvoiceNumber'         => $invoiceNumber,
                'InvoiceDate'           => date('Y-m-d H:i:s', strtotime('now')),
                'InvoiceCountry'        => $getAddress['AddressCountry'],
                'InvoiceFirstName'      => $getAddress['AddressFirstName'],
                'InvoiceLastName'       => $getAddress['AddressLastName'],
                'InvoiceCompany'        => $getAddress['AddressCompany'],
                'InvoiceAddress'        => $getAddress['AddressStreet'],
                'InvoiceCity'           => $getAddress['AddressCity'],
                'InvoiceState'          => $getAddress['AddressState'],
                'InvoicePostcode'       => $getAddress['AddressPostalCode'],
                'InvoicePhone'          => $getAddress['AddressPhone'],
                'InvoiceEmail'          => $email,
                'InvoiceNotes'          => null,
                'InvoiceSubtotal'       => $subTotal,
                'InvoiceTax'            => $totalTax,
                'InvoiceTotalSpend'     => $totalSpend,
                'InvoiceTotalBilling'   => $totalBilling,
                'created_at'            => date('Y-m-d H:i:s', strtotime('now'))
            );

            $data = array(
                'CompanyName'           => $getConfig['ConfigCompany'],
                'CompanyAddress'        => $getConfig['ConfigAddress'],
                'CompanyPhone'          => $getConfig['ConfigPhone'],
                'InvoiceNumber'         => $dataInvoice['InvoiceNumber'],
                'InvoiceDate'           => $dataInvoice['InvoiceDate'],
                'InvoiceFirstName'      => $dataInvoice['InvoiceFirstName'],
                'InvoiceLastName'       => $dataInvoice['InvoiceLastName'],
                'InvoiceAddress'        => $dataInvoice['InvoiceAddress'],
                'InvoiceCity'           => $dataInvoice['InvoiceCity'],
                'InvoiceState'          => $dataInvoice['InvoiceState'],
                'InvoicePostcode'       => $dataInvoice['InvoicePostcode'],
                'InvoiceCountry'        => $dataInvoice['InvoiceCountry'],
                'InvoicePhone'          => $dataInvoice['InvoicePhone'],
                'InvoiceEmail'          => $dataInvoice['InvoiceEmail'],
                'InvoiceNotes'          => $dataInvoice['InvoiceNotes'],
                'SubTotal'              => $subTotal,
                'TotalTax'              => $totalTax,
                'TotalSpend'            => $totalSpend,
                'TotalBilling'          => $totalBilling
            );

            $data['getCart']    = $result;
            $message            = $this->load->view('FRONTEND/Offer', $data, true);
            $subject            = "Offfer AED.co.id";
            $sentStatus         = $this->_send_offer($email, $subject, $message, 'forgot');

            if ($sentStatus == true) {
                $result = $this->M_Global->insert($dataInvoice, "Invoice");

                if ($result == 'success') {
                    $invNumber  = $dataInvoice['InvoiceNumber'];
                    $getInvoice = $this->M_Global->getmultiparam("Invoice", "UsersID = '$usersId' AND InvoiceNumber = '$invNumber'")->row_array();

                    $this->_create_invoice_detail($getInvoice['InvoiceID'], $getInvoice['InvoiceDate']);
                }

                $this->session->set_flashdata(
                    'success',
                    '<div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    <div>Offer successfully sent, please check your email.</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
            } else {
                $this->session->set_flashdata(
                    'errors',
                    '<div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                    <div>Email sending error!</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
            }
        }
        sleep(1);
        redirect($this->agent->referrer());
    }

    private function _send_offer($email, $subject, $message)
    {
        $config = array(
            'mailtype'      => 'html',
            'charset'       => 'utf-8',
            'protocol'      => 'smtp',
            'smtp_host'     => 'smtp.office365.com',
            'smtp_port'     => 587,
            'smtp_user'     => 'it@kurniateknologi.com',
            'smtp_pass'     => 'wwxrcdfdpmfpbpxn',
            'charset'       => 'iso-8859-1',
            'wordwrap'      => TRUE,
            'smtp_crypto'   => 'tls',
            'crlf'          => "\r\n"
        );
        $this->email->initialize($config);

        $this->email->set_newline("\r\n");
        $this->email->from('it@kurniateknologi.com', 'AED');
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }

    private function _create_invoice_detail($invoiceId, $invoiceDate)
    {
        $usersId    = $this->session->userdata('r_sess_user_id');
        $getCart    = $this->M_Global->getmultiparam("Cart", "UsersID = '$usersId' ")->result_array();

        foreach ($getCart as $cart) {
            $cartId = $cart['CartID'];

            $data = array(
                'InvoiceID'     => $invoiceId,
                'ProductName'   => $cart['ProductName'],
                'ProductPrice'  => $cart['ProductPrice'],
                'ProductQty'    => $cart['ProductQty'],
                'created_at'    => $invoiceDate
            );
            $result = $this->M_Global->insert($data, "InvoiceDetail");

            if ($result == 'success') {
                $this->M_Global->delete("Cart", "CartID = '$cartId' AND UsersID = '$usersId '");
            } else {
                echo "error";
            }
        }
    }
    // End Cart


    // Products
    public function quickview_product()
    {
        $productid          = $this->input->post("productid");
        $products           = $this->M_Global->getmultiparam("Product", "ProductID = '$productid' ")->row_array();
        $brandId            = $products['BrandID'];
        $productpic         = $this->M_Global->getmultiparam("ProductPic", "ProductID = '$productid' ")->row_array();
        $brand              = $this->M_Global->getmultiparam("Brand", "BrandID = '$brandId' ")->row_array();
        $cart               = $this->M_Global->getmultiparam("Cart", "ProductID = '$productid' ")->row_array();

        $product = array(
            'ProductID'         => $products['ProductID'],
            'ProductSlug'       => $products['Slug'],
            'ProductName'       => $products['ProductName'],
            'ProductSKU'        => $products['ProductSKU'],
            'Quantity'          => $cart,
            'ProductPrice'      => $products['ProductPrice'],
            'ProductPriceOld'   => isset($products['ProductPriceOld']) ? $products['ProductPriceOld'] : '',
            'ProductStatus'     => $products['ProductStatus'],
            'ProductPic'        => $productpic,
            'ProductBrand'      => isset($brand) ? $brand : ''
        );
        $data               = $product;
        $data['token']      = $this->security->get_csrf_hash();

        echo json_encode($data);
    }

    public function filter_price()
    {
        $this->form_validation->set_rules('amount1', 'First Amount', 'required|trim|xss_clean');
        $this->form_validation->set_rules('amount2', 'Second Amount', 'required|trim|xss_clean');

        if ($this->form_validation->run()) {
            $amount1    = $this->input->post('amount1', true);
            $amount2    = $this->input->post('amount2', true);
            $lang       = $this->input->get('lang');
            $filter     = $this->input->get('filter');

            if ($filter && $lang) {
                redirect(parse_url($this->agent->referrer(), PHP_URL_PATH) . '?min-price=' . $amount1 . '&max-price=' . $amount2 . '&filter=' . $filter . '&&lang=' . $lang);
            } elseif (!$filter && $lang) {
                redirect(parse_url($this->agent->referrer(), PHP_URL_PATH) . '?min-price=' . $amount1 . '&max-price=' . $amount2 . '&&lang=' . $lang);
            } elseif ($filter && !$lang) {
                redirect(parse_url($this->agent->referrer(), PHP_URL_PATH) . '?min-price=' . $amount1 . '&max-price=' . $amount2 . '&filter=' . $filter);
            } else {
                redirect(parse_url($this->agent->referrer(), PHP_URL_PATH) . '?min-price=' . $amount1 . '&max-price=' . $amount2);
            }
        }
    }

    public function product_category()
    {
        // menu & submenu
        $data['getallcategory']         = $this->M_Menu->getAllCategory();
        // basic configuration
        $data['getBasicConfiguration']  = $this->M_Global->getmultiparam("BasicConfiguration", "ConfigStatus = 1")->row_array();
        $configId                       = $data['getBasicConfiguration']['ConfigID'];
        $data['getMediaSocial']         = $this->M_Global->getmultiparam("MediaSocial", "ConfigID = '$configId' AND MediaSocialStatus = 1")->result_array();
        // language
        $data['getLanguage']            = $this->language_model->get_languages();
        //$lang                           = $this->input->get('lang');
        $data['getFilter']              = $this->input->get('filter');
        $data['getLang']                = $this->input->get('lang');
        $data['language']               = $this->language_model->getLanguage($data['getLang']);

        // content
        $segment2                       = $this->uri->segment(2);
        $getSubCategory                 = $this->M_Global->getmultiparam("SubCategory", "SubUrl = '$segment2'")->row();

        if (!$getSubCategory) {
            redirect(base_url());
        } else {
            $lowHigh                        = $this->input->get('filter');
            $amount1                        = $this->input->get('min-price');
            $amount2                        = $this->input->get('max-price');
            $data['filter']                 = $lowHigh;
            $data['getSubCategory']         = $this->M_Global->getmultiparam("SubCategory", "SubUrl = '$segment2'")->row_array();
            $subCategoryId                  = $data['getSubCategory']['SubCategoryID'];

            $data['title']                  = isset($data['getSubCategory']['SubCategoryName']) ? $data['getSubCategory']['SubCategoryName'] : '';

            $data['subdescription']         = isset($data['getSubCategory']['SubCatDescription']) ? $data['getSubCategory']['SubCatDescription'] : '';

            $data['description']            = isset($data['getSubCategory']['MetaDescription']) ? $data['getSubCategory']['MetaDescription'] : '';

            $data['keywords']               = isset($data['getSubCategory']['Keyword']) ? $data['getSubCategory']['Keyword'] : '';
            $data['og_type']                = "Product";
            $data['og_url']                 = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if ($amount1 || $amount2) {
                $getProductPivot                = $this->M_Global->q2join("ProductPivot", "Product", "a.ProductID", "b.ProductID", "SubCategoryID = '$subCategoryId' AND b.ProductPrice BETWEEN '$amount1' AND '$amount2' ORDER BY b.ProductPrice " . $lowHigh)->result_array();
                $data['countProduct']           = $this->M_Global->q2join("ProductPivot", "Product", "a.ProductID", "b.ProductID", "SubCategoryID = '$subCategoryId' AND b.ProductPrice BETWEEN '$amount1' AND '$amount2' ORDER BY b.ProductPrice " . $lowHigh)->num_rows();
            } else {
                $getProductPivot                = $this->M_Global->q2join("ProductPivot", "Product", "a.ProductID", "b.ProductID", "SubCategoryID = '$subCategoryId' ORDER BY b.ProductPrice " . $lowHigh)->result_array();
                $data['countProduct']           = $this->M_Global->q2join("ProductPivot", "Product", "a.ProductID", "b.ProductID", "SubCategoryID = '$subCategoryId' ORDER BY b.ProductPrice " . $lowHigh)->num_rows();
            }
            $pivot                              = [];

            foreach ($getProductPivot as $piv) {
                $productId  = $piv['ProductID'];
                $array      = (array)$productId;

                foreach ($array as $arr) {
                    $getProductImage    = $this->M_Global->getmultiparam("ProductPic", "PicArr = 1 AND ProductID = '$arr' ")->row_array();
                }

                $pivot[] = array(
                    'ProductPivotID'        => $piv['ProductPivotID'],
                    'SubCategoryID'         => $piv['SubCategoryID'],
                    'ProductID'             => $piv['ProductID'],
                    'BannerID'              => $piv['BannerID'],
                    'Slug'                  => $piv['Slug'],
                    'ProductName'           => $piv['ProductName'],
                    'ProductDescription'    => $piv['ProductDescription'],
                    'ProductSKU'            => $piv['ProductSKU'],
                    'ProductPrice'          => $piv['ProductPrice'],
                    'ProductPriceOld'       => $piv['ProductPriceOld'],
                    'ProductStatus'         => $piv['ProductStatus'],
                    'ProductImage'          => isset($getProductImage['PicName']) ? $getProductImage['PicName'] : 'Default-Product-Pic.png'
                );
            }

            foreach ($pivot as $key) {
                $id             = $key['ProductID'];
                $data['cart']   = $this->M_Global->getmultiparam("Cart", "ProductID = '$id'")->row_array();
            }

            $data['getProduct'] = $pivot;

            $this->load->view('FRONTEND/__components/header', $data);
            $this->load->view('FRONTEND/__components/nav', $data);
            $this->load->view('FRONTEND/SubCategory', $data);
            $this->load->view('FRONTEND/__components/modal');
            $this->load->view('FRONTEND/__components/footer');
        }
    }

    public function product($slug)
    {
        // menu & submenu
        $data['getallcategory']         = $this->M_Menu->getAllCategory();
        // basic configuration
        $data['getBasicConfiguration']  = $this->M_Global->getmultiparam("BasicConfiguration", "ConfigStatus = 1")->row_array();
        $configId                       = $data['getBasicConfiguration']['ConfigID'];
        $data['getMediaSocial']         = $this->M_Global->getmultiparam("MediaSocial", "ConfigID = '$configId' AND MediaSocialStatus = 1")->result_array();
        // language
        $data['getLanguage']            = $this->language_model->get_languages();
        $data['getLang']                = $this->input->get('lang');
        $data['language']               = $this->language_model->getLanguage($data['getLang']);

        // content
        $getProducts                    = $this->M_Global->getmultiparam("Product", "Slug = '$slug' ")->row_array();

        if (!$getProducts) {
            redirect(base_url());
        } else {
            $productId1                     = $getProducts['ProductID'];
            $brandId1                       = $getProducts['BrandID'];
            $getProductPivot1               = $this->M_Global->getmultiparam("ProductPivot", "ProductID = '$productId1' ")->row_array();
            $subCategoryId1                 = $getProductPivot1['SubCategoryID'];
            $getProductPivot2               = $this->M_Global->getmultiparam("ProductPivot", "SubCategoryID = '$subCategoryId1' ")->result_array();
            $getProductPicArr               = $this->M_Global->getmultiparam("ProductPic", "ProductID = '$productId1' AND PicArr = 1 ")->row_array();
            $productRelated                 = [];

            $data['getSubCategory']         = $this->M_Global->getmultiparam("SubCategory", "SubCategoryID = '$subCategoryId1' ")->row_array();
            $data['getProduct']             = $this->M_Global->getmultiparam("Product", "ProductID = '$productId1' ")->row_array();
            $data['getProductPic']          = $this->M_Global->getmultiparam("ProductPic", "ProductID = '$productId1' ")->result_array();
            $data['getProductPicArr']       = isset($getProductPicArr['PicName']) ? $getProductPicArr['PicName'] : 'Default-Product-Pic.png';
            $data['getBrand']               = $this->M_Global->getmultiparam("Brand", "BrandID = '$brandId1' AND BrandStatus = 1 ")->row_array();
            // $data['getProductSpec']         = $this->M_Global->getmultiparam("ProductSpec", "ProductID = '$productId1' ")->result_array();
            // $data['getIncludes']            = $this->M_Global->getmultiparam("Includes", "ProductID = '$productId1' ")->result_array();

            // product related
            foreach ($getProductPivot2 as $value) {
                $productId2                 = $value['ProductID'];
                $array1                     = (array)$productId2;

                foreach ($array1 as $arr1) {
                    $getProductRelated          = $this->M_Global->getmultiparam("Product", "ProductID = '$arr1' ")->result_array();

                    foreach ($getProductRelated as $key) {
                        $productId3         = $key['ProductID'];
                        $array2             = (array)$productId3;

                        foreach ($array2 as $arr2) {
                            $getPicRelated      = $this->M_Global->getmultiparam("ProductPic", "PicArr = 1 AND ProductID = '$arr2' ")->row_array();
                        }
                    }
                    $productRelated[] = array(
                        'ProductID'         => $key['ProductID'],
                        'ProductName'       => $key['ProductName'],
                        'Slug'              => $key['Slug'],
                        'ProductSKU'        => $key['ProductSKU'],
                        'ProductPrice'      => $key['ProductPrice'],
                        'ProductPriceOld'   => $key['ProductPriceOld'],
                        'ProductStatus'     => $key['ProductStatus'],
                        'ProductPic'        => isset($getPicRelated['PicName']) ? $getPicRelated['PicName'] : 'Default-Product-Pic.png',
                    );
                }
            }
            $data['getProductRelated'] = $productRelated;

            $data['title']                  = isset($getProducts['ProductName']) ? $getProducts['ProductName'] : '';
            $data['description']            = isset($getProducts['MetaDescription']) ? $getProducts['MetaDescription'] : '';
            $data['keywords']               = isset($getProducts['Keyword']) ? $getProducts['Keyword'] : '';
            $data['og_type']                = "Product";
            $data['og_url']                 = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $data['og_image']               = base_url('@static/img/products/' . $productRelated[0]['ProductPic']);

            $this->load->view('FRONTEND/__components/header', $data);
            $this->load->view('FRONTEND/__components/nav', $data);
            $this->load->view('FRONTEND/Product', $data);
            $this->load->view('FRONTEND/__components/modal');
            $this->load->view('FRONTEND/__components/footer');
        }
    }

    public function search_products()
    {
        $this->form_validation->set_rules('search', 'Query', 'trim|xss_clean');

        if ($this->form_validation->run()) {
            if ($this->input->post("search")) {
                $keyword    = $this->input->post("search", true);
                $lang       = $this->input->get('lang');

                if (!$lang) {
                    redirect("shop?result=" . $keyword);
                } else {
                    redirect("shop?result=" . $keyword . '&&lang=' . $lang);
                }
            } else {
                redirect($this->agent->referrer());
            }
        } else {
            redirect($this->agent->referrer());
        }
    }

    public function filter_price_for_search()
    {
        $this->form_validation->set_rules('amount1_search', 'First Amount', 'required|trim|xss_clean');
        $this->form_validation->set_rules('amount2_search', 'Second Amount', 'required|trim|xss_clean');

        if ($this->form_validation->run()) {
            $amount1    = $this->input->post('amount1_search', true);
            $amount2    = $this->input->post('amount2_search', true);
            $result     = $this->input->get('result');
            $sort       = $this->input->get('sort');
            $lang       = $this->input->get('lang');

            if ($result && $sort && $lang) {
                redirect(parse_url($this->agent->referrer(), PHP_URL_PATH) . '?result=' . $result . '&min-price=' . $amount1 . '&max-price=' . $amount2 . '&sort=' . $sort . '&&lang=' . $lang);
            } elseif ($result && $sort && !$lang) {
                redirect(parse_url($this->agent->referrer(), PHP_URL_PATH) . '?result=' . $result . '&min-price=' . $amount1 . '&max-price=' . $amount2 . '&sort=' . $sort);
            } elseif ($result && !$sort && $lang) {
                redirect(parse_url($this->agent->referrer(), PHP_URL_PATH) . '?result=' . $result . '&min-price=' . $amount1 . '&max-price=' . $amount2 . '&&lang=' . $lang);
            } elseif ($result && !$sort && !$lang) {
                redirect(parse_url($this->agent->referrer(), PHP_URL_PATH) . '?result=' . $result . '&min-price=' . $amount1 . '&max-price=' . $amount2);
            }
        }
    }

    public function result_products()
    {
        $data['title']                  = $this->settings->homepage_title;
        $data['description']            = $this->settings->site_description;
        $data['keywords']               = $this->settings->keywords;
        // menu & submenu
        $data['getallcategory']         = $this->M_Menu->getAllCategory();
        // basic configuration
        $data['getBasicConfiguration']  = $this->M_Global->getmultiparam("BasicConfiguration", "ConfigStatus = 1")->row_array();
        $configId                       = $data['getBasicConfiguration']['ConfigID'];
        $data['getMediaSocial']         = $this->M_Global->getmultiparam("MediaSocial", "ConfigID = '$configId' AND MediaSocialStatus = 1")->result_array();
        // language
        $data['getLanguage']            = $this->language_model->get_languages();
        $data['getLang']                = $this->input->get('lang');
        $data['language']               = $this->language_model->getLanguage($data['getLang']);
        // get param search
        $data['getResult']              = $this->input->get('result');
        // get param sort by
        $data['sortBy']                 = $this->input->get('sort');

        if ($this->input->get('result')) {
            $keyword                    = $this->input->get('result');
            $data['search']             = $keyword;
            //$data['countresult']        = $this->M_Global->getmultiparam("Product", "ProductName LIKE '%$keyword%' OR ProductPrice LIKE '%$keyword%' ")->num_rows();
            $searchResult               = $this->M_Global->getmultiparam("Product", "ProductName LIKE '%$keyword%' OR ProductPrice LIKE '%$keyword%' ")->result_array();
        }

        $amount1                        = $this->input->get('min-price');
        $amount2                        = $this->input->get('max-price');

        if ($amount1 || $amount2) {
            $searchResult               = $this->M_Global->getmultiparam("Product", "(ProductName LIKE '%$keyword%' OR ProductPrice LIKE '%$keyword%') AND ProductPrice BETWEEN '$amount1' AND '$amount2' ORDER BY ProductPrice " . $data['sortBy'])->result_array();
            $data['countresult']        = $this->M_Global->getmultiparam("Product", "(ProductName LIKE '%$keyword%' OR ProductPrice LIKE '%$keyword%') AND ProductPrice BETWEEN '$amount1' AND '$amount2' ORDER BY ProductPrice " . $data['sortBy'])->num_rows();
        } else {
            $searchResult               = $this->M_Global->getmultiparam("Product", "ProductName LIKE '%$keyword%' OR ProductPrice LIKE '%$keyword%' ORDER BY ProductPrice " . $data['sortBy'])->result_array();
            $data['countresult']        = $this->M_Global->getmultiparam("Product", "ProductName LIKE '%$keyword%' OR ProductPrice LIKE '%$keyword%' ORDER BY ProductPrice " . $data['sortBy'])->num_rows();
        }

        $product                    = [];

        foreach ($searchResult as $result) {
            $productId = $result['ProductID'];
            $array = (array)$productId;

            foreach ($array as $arr) {
                $getPicture     = $this->M_Global->getmultiparam("ProductPic", "PicArr = 1 AND ProductID = '$arr' ")->row_array();
            }
            $product[] = array(
                'ProductID'         => $result['ProductID'],
                'Slug'              => $result['Slug'],
                'ProductName'       => $result['ProductName'],
                'ProductSKU'        => $result['ProductSKU'],
                'ProductPriceOld'   => $result['ProductPriceOld'],
                'ProductPrice'      => $result['ProductPrice'],
                'ProductStatus'     => $result['ProductStatus'],
                'ProductPic'        => isset($getPicture['PicName']) ? $getPicture['PicName'] : 'Default-Product-Pic.png'
            );
        }
        $data['getproduct'] = $product;

        $this->load->view('FRONTEND/__components/header', $data);
        $this->load->view('FRONTEND/__components/nav', $data);
        $this->load->view('FRONTEND/Search', $data);
        $this->load->view('FRONTEND/__components/modal');
        $this->load->view('FRONTEND/__components/footer');
    }

    public function products()
    {
        $data['title']                  = $this->settings->homepage_title;
        $data['description']            = $this->settings->site_description;
        $data['keywords']               = $this->settings->keywords;
        // menu & submenu
        $data['getallcategory']         = $this->M_Menu->getAllCategory();
        // basic configuration
        $data['getBasicConfiguration']  = $this->M_Global->getmultiparam("BasicConfiguration", "ConfigStatus = 1")->row_array();
        $configId                       = $data['getBasicConfiguration']['ConfigID'];
        $data['getMediaSocial']         = $this->M_Global->getmultiparam("MediaSocial", "ConfigID = '$configId' AND MediaSocialStatus = 1")->result_array();
        // language
        $data['getLanguage']            = $this->language_model->get_languages();
        //$lang                           = $this->input->get('lang');
        $data['getFilter']              = $this->input->get('filter');
        $data['getLang']                = $this->input->get('lang');
        $data['language']               = $this->language_model->getLanguage($data['getLang']);

        // content
        $lowHigh                        = $this->input->get('filter');
        $amount1                        = $this->input->get('min-price');
        $amount2                        = $this->input->get('max-price');
        $data['filter']                 = $lowHigh;

        $config['base_url']             = site_url('products');
        $config['total_rows']           = $this->M_Blog->countAllBlog('Product');
        $config['page_query_string']    = true;
        $config['use_page_numbers']     = false;
        $config['per_page']             = 9;
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
        $start      = ($page) ? $page  : '';

        if ($amount1 || $amount2) {
            $this->db->where("ProductPrice BETWEEN '$amount1' AND '$amount2'");
            $this->db->order_by("ProductPrice", $lowHigh);
            $this->db->limit($limit, $start);
            $getProducts            = $this->db->get("Product")->result_array();
            $data['countProduct']   = $this->db->get("Product")->num_rows();
        } else {
            $this->db->order_by("ProductPrice", $lowHigh);
            $this->db->limit($limit, $start);
            $getProducts            = $this->db->get("Product")->result_array();
            $data['countProduct']   = $this->db->get("Product")->num_rows();
        }
        $products                       = [];

        foreach ($getProducts as $value) {
            $productId  = $value['ProductID'];
            $array      = (array)$productId;

            foreach ($array as $arr) {
                $getProductImage    = $this->M_Global->getmultiparam("ProductPic", "PicArr = 1 AND ProductID = '$arr' ")->row_array();
            }

            $products[] = array(
                'ProductID'             => $value['ProductID'],
                'Slug'                  => $value['Slug'],
                'ProductName'           => $value['ProductName'],
                'ProductDescription'    => $value['ProductDescription'],
                'ProductSKU'            => $value['ProductSKU'],
                'ProductPrice'          => $value['ProductPrice'],
                'ProductPriceOld'       => $value['ProductPriceOld'],
                'ProductStatus'         => $value['ProductStatus'],
                'ProductImage'          => isset($getProductImage['PicName']) ? $getProductImage['PicName'] : 'Default-Product-Pic.png'
            );
        }

        foreach ($products as $key) {
            $id              = $key['ProductID'];
            $data['cart']    = $this->M_Global->getmultiparam("Cart", "ProductID = '$id'")->row_array();
        }

        $data['getProducts'] = $products;

        $this->load->view('FRONTEND/__components/header', $data);
        $this->load->view('FRONTEND/__components/nav', $data);
        $this->load->view('FRONTEND/Products', $data);
        $this->load->view('FRONTEND/__components/modal');
        $this->load->view('FRONTEND/__components/footer');
    }
    // End Products


    // Blog
    public function blog()
    {
        $data['title']                  = $this->settings->homepage_title;
        $data['description']            = $this->settings->site_description;
        $data['keywords']               = $this->settings->keywords;
        // menu & submenu
        $data['getallcategory']         = $this->M_Menu->getAllCategory();
        // basic configuration
        $data['getBasicConfiguration']  = $this->M_Global->getmultiparam("BasicConfiguration", "ConfigStatus = 1")->row_array();
        $configId                       = $data['getBasicConfiguration']['ConfigID'];
        $data['getMediaSocial']         = $this->M_Global->getmultiparam("MediaSocial", "ConfigID = '$configId' AND MediaSocialStatus = 1")->result_array();
        // language
        $data['getLanguage']            = $this->language_model->get_languages();
        $data['getLang']                = $this->input->get('lang');
        $data['language']               = $this->language_model->getLanguage($data['getLang']);
        // sidebar blog
        $data['getAllBlogCategory']     = $this->M_Blog->getAllCategory();
        $data['getAllTags']             = $this->M_Blog->getAllTags();

        $data['getBlog']                = $this->M_Blog->getBlog();

        $this->load->view('FRONTEND/__components/header', $data);
        $this->load->view('FRONTEND/__components/nav', $data);
        $this->load->view('FRONTEND/__sidebar_blog/start_section', $data);
        $this->load->view('FRONTEND/Blog', $data);
        $this->load->view('FRONTEND/__sidebar_blog/end_section', $data);
        $this->load->view('FRONTEND/__components/modal');
        $this->load->view('FRONTEND/__components/footer');
    }

    public function blog_category($slug)
    {
        $data['title']                  = $this->settings->homepage_title;
        $data['description']            = $this->settings->site_description;
        $data['keywords']               = $this->settings->keywords;
        // menu & submenu
        $data['getallcategory']         = $this->M_Menu->getAllCategory();
        // basic configuration
        $data['getBasicConfiguration']  = $this->M_Global->getmultiparam("BasicConfiguration", "ConfigStatus = 1")->row_array();
        $configId                       = $data['getBasicConfiguration']['ConfigID'];
        $data['getMediaSocial']         = $this->M_Global->getmultiparam("MediaSocial", "ConfigID = '$configId' AND MediaSocialStatus = 1")->result_array();
        // language
        $data['getLanguage']            = $this->language_model->get_languages();
        $data['getLang']                = $this->input->get('lang');
        $data['language']               = $this->language_model->getLanguage($data['getLang']);

        // sidebar blog
        $data['getAllBlogCategory']     = $this->M_Blog->getAllCategory();
        $data['getAllTags']             = $this->M_Blog->getAllTags();

        $data['getCategory']            = $this->M_Global->getmultiparam("BlogCategory", "Slug = '$slug' ")->row_array();
        $categoryId                     = isset($data['getCategory']['BlogCategoryID']) ? $data['getCategory']['BlogCategoryID'] : '';
        $data['getBlog']                = $this->M_Global->getmultiparam("Blog", "BlogCategoryID = '$categoryId' ")->result_array();

        $this->load->view('FRONTEND/__components/header', $data);
        $this->load->view('FRONTEND/__components/nav', $data);
        $this->load->view('FRONTEND/__sidebar_blog/start_section', $data);
        $this->load->view('FRONTEND/Blog', $data);
        $this->load->view('FRONTEND/__sidebar_blog/end_section');
        $this->load->view('FRONTEND/__components/modal');
        $this->load->view('FRONTEND/__components/footer');
    }

    public function blog_tags($slug)
    {
        $data['title']                  = $this->settings->homepage_title;
        $data['description']            = $this->settings->site_description;
        $data['keywords']               = $this->settings->keywords;
        // menu & submenu
        $data['getallcategory']         = $this->M_Menu->getAllCategory();
        // basic configuration
        $data['getBasicConfiguration']  = $this->M_Global->getmultiparam("BasicConfiguration", "ConfigStatus = 1")->row_array();
        $configId                       = $data['getBasicConfiguration']['ConfigID'];
        $data['getMediaSocial']         = $this->M_Global->getmultiparam("MediaSocial", "ConfigID = '$configId' AND MediaSocialStatus = 1")->result_array();
        // language
        $data['getLanguage']            = $this->language_model->get_languages();
        $data['getLang']                = $this->input->get('lang');
        $data['language']               = $this->language_model->getLanguage($data['getLang']);

        // sidebar blog
        $data['getAllBlogCategory']     = $this->M_Blog->getAllCategory();
        $data['getAllTags']             = $this->M_Blog->getAllTags();

        $data['getTags']                = $this->M_Global->getmultiparam("BlogTags", "Slug = '$slug' ")->row_array();
        $tagsId                         = $data['getTags']['BlogTagsID'];
        $getBlogPivot                   = $this->M_Global->getmultiparam("BlogPivot", "BlogTagsID = '$tagsId' ")->result_array();

        foreach ($getBlogPivot as $pivot) {
            $blogId     = $pivot['BlogID'];
            $array      = (array)$blogId;

            foreach ($array as $arr) {
                $getBlog    = $this->M_Global->getmultiparam("Blog", "BlogID = '$arr' ")->result_array();

                foreach ($getBlog as $blogs) {
                    $blog[] = array(
                        'BlogID'            => $blogs['BlogID'],
                        'BlogCategoryID'    => $blogs['BlogCategoryID'],
                        'Slug'              => $blogs['Slug'],
                        'BlogImage'         => $blogs['BlogImage'],
                        'BlogTitle'         => $blogs['BlogTitle'],
                        'BlogAuthor'        => $blogs['BlogAuthor'],
                        'BlogPublish'       => $blogs['BlogPublish'],
                        'BlogDesc'          => $blogs['BlogDesc'],
                        'BlogStatus'        => $blogs['BlogStatus']
                    );
                }
            }
        }
        $data['getBlog'] = $blog;

        $this->load->view('FRONTEND/__components/header', $data);
        $this->load->view('FRONTEND/__components/nav', $data);
        $this->load->view('FRONTEND/__sidebar_blog/start_section', $data);
        $this->load->view('FRONTEND/Blog', $data);
        $this->load->view('FRONTEND/__sidebar_blog/end_section');
        $this->load->view('FRONTEND/__components/modal');
        $this->load->view('FRONTEND/__components/footer');
    }

    public function blog_detail($slug)
    {
        // menu & submenu
        $data['getallcategory']         = $this->M_Menu->getAllCategory();
        // basic configuration
        $data['getBasicConfiguration']  = $this->M_Global->getmultiparam("BasicConfiguration", "ConfigStatus = 1")->row_array();
        $configId                       = $data['getBasicConfiguration']['ConfigID'];
        $data['getMediaSocial']         = $this->M_Global->getmultiparam("MediaSocial", "ConfigID = '$configId' AND MediaSocialStatus = 1")->result_array();
        // language
        $data['getLanguage']            = $this->language_model->get_languages();
        $data['getLang']                = $this->input->get('lang');
        $data['language']               = $this->language_model->getLanguage($data['getLang']);

        // sidebar blog
        $data['getAllBlogCategory']     = $this->M_Blog->getAllCategory();
        $data['getAllTags']             = $this->M_Blog->getAllTags();

        $data['getBlogPrevNext']        = $this->M_Blog->get_prev_next($slug);

        if (!$data['getBlogPrevNext']) {
            redirect(base_url());
        } else {
            $blogSlug                       = $data['getBlogPrevNext'][0]['Slug'];
            $blogNext                       = $data['getBlogPrevNext'][0]['next_name'];
            $blogPrev                       = $data['getBlogPrevNext'][0]['previous_name'];
            $data['getBlog']                = $this->M_Global->getmultiparam("Blog", "Slug = '$blogSlug' ")->row_array();
            $data['getBlogNext']            = $this->M_Global->getmultiparam("Blog", "Slug = '$blogNext' ")->row_array();
            $data['getBlogPrev']            = $this->M_Global->getmultiparam("Blog", "Slug = '$blogPrev' ")->row_array();
            $blogId                         = $data['getBlog']['BlogID'];
            $blogCategoryId                 = $data['getBlog']['BlogCategoryID'];
            $data['getBlogCategory']        = $this->M_Global->getmultiparam("BlogCategory", "BlogCategoryID = '$blogCategoryId' ")->row_array();
            $getBlogPivot                   = $this->M_Global->getmultiparam("BlogPivot", "BlogID = '$blogId' ")->result_array();
            $tag                            = [];

            $data['title']                  = isset($data['getBlog']['BlogTitle']) ? $data['getBlog']['BlogTitle'] : '';
            $data['description']            = isset($data['getBlog']['MetaDescription']) ? $data['getBlog']['MetaDescription'] : '';
            $data['keywords']               = isset($data['getBlog']['Keyword']) ? $data['getBlog']['Keyword'] : '';
            $data['og_type']                = "Articel";
            $data['og_url']                 = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $data['og_image']               = base_url('@static/img/blog/' . $data['getBlog']['BlogImage']);

            foreach ($getBlogPivot as $pivot) {
                $blogTagsId = $pivot['BlogTagsID'];
                $array      = (array)$blogTagsId;

                foreach ($array as $arr) {
                    $getBlogTags = $this->M_Global->getmultiparam("BlogTags", "BlogTagsID = '$arr' ")->result_array();

                    foreach ($getBlogTags as $tags) {
                        $tag[] = array(
                            'BlogTagsID'    => $tags['BlogTagsID'],
                            'BlogTagsName'  => $tags['BlogTagsName'],
                            'Slug'          => $tags['Slug']
                        );
                    }
                }
            }
            $data['getAllBlogTags']     = $tag;
            $data['count']              = count($data['getAllBlogTags']);

            $this->load->view('FRONTEND/__components/header', $data);
            $this->load->view('FRONTEND/__components/nav', $data);
            $this->load->view('FRONTEND/__sidebar_blog/start_section', $data);
            $this->load->view('FRONTEND/Blog-Detail', $data);
            $this->load->view('FRONTEND/__sidebar_blog/end_section');
            $this->load->view('FRONTEND/__components/modal');
            $this->load->view('FRONTEND/__components/footer');
        }
    }

    public function filter_blog()
    {
        if ($this->input->post("search_blog")) {
            $blogTitle  = $this->input->post("search_blog");
            $lang       = $this->input->get('lang');

            if ($lang) {
                redirect("blog/q?result=" . $blogTitle . '&&lang=' . $lang);
            } else {
                redirect("blog/q?result=" . $blogTitle);
            }
        }
    }

    public function result_filter()
    {
        $data['title']                  = $this->settings->homepage_title;
        $data['description']            = $this->settings->site_description;
        $data['keywords']               = $this->settings->keywords;
        // menu & submenu
        $data['getallcategory']         = $this->M_Menu->getAllCategory();
        // basic configuration
        $data['getBasicConfiguration']  = $this->M_Global->getmultiparam("BasicConfiguration", "ConfigStatus = 1")->row_array();
        $configId                       = $data['getBasicConfiguration']['ConfigID'];
        $data['getMediaSocial']         = $this->M_Global->getmultiparam("MediaSocial", "ConfigID = '$configId' AND MediaSocialStatus = 1")->result_array();
        // language
        $data['getLanguage']            = $this->language_model->get_languages();
        $data['getLang']                = $this->input->get('lang');
        $data['language']               = $this->language_model->getLanguage($data['getLang']);

        // sidebar blog
        $data['getAllBlogCategory']     = $this->M_Blog->getAllCategory();
        $data['getAllTags']             = $this->M_Blog->getAllTags();


        if ($this->input->get('result')) {
            $blogTitle                      = $this->input->get('result');
            $data['search']                 = $blogTitle;
            $data['countResult']            = $this->M_Global->getlike("Blog", "BlogTitle", "'%$blogTitle%'")->num_rows();
            $data['getAllBlog']             = $this->M_Global->getlike("Blog", "BlogTitle", "'%$blogTitle%'")->result_array();
        }

        $this->load->view('FRONTEND/__components/header', $data);
        $this->load->view('FRONTEND/__components/nav', $data);
        $this->load->view('FRONTEND/__sidebar_blog/start_section', $data);
        $this->load->view('FRONTEND/Blog-Result', $data);
        $this->load->view('FRONTEND/__sidebar_blog/end_section', $data);
        $this->load->view('FRONTEND/__components/modal');
        $this->load->view('FRONTEND/__components/footer');
    }
    // End Blog


    public function contact()
    {
        $data['title']              = $this->settings->homepage_title;
        $data['description']        = $this->settings->site_description;
        $data['keywords']           = $this->settings->keywords;
        // menu & submenu
        $data['getallcategory']     = $this->M_Menu->getAllCategory();
        // basic configuration
        $data['getBasicConfiguration']  = $this->M_Global->getmultiparam("BasicConfiguration", "ConfigStatus = 1")->row_array();
        $configId                       = $data['getBasicConfiguration']['ConfigID'];
        $data['getMediaSocial']         = $this->M_Global->getmultiparam("MediaSocial", "ConfigID = '$configId' AND MediaSocialStatus = 1")->result_array();
        // language
        $data['getLanguage']            = $this->language_model->get_languages();
        $data['getLang']                = $this->input->get('lang');
        $data['language']               = $this->language_model->getLanguage($data['getLang']);

        $this->load->view('FRONTEND/__components/header', $data);
        $this->load->view('FRONTEND/__components/nav', $data);
        $this->load->view('FRONTEND/Contact', $data);
        $this->load->view('FRONTEND/__components/modal');
        $this->load->view('FRONTEND/__components/footer');
    }

    public function customer_question()
    {
        if ($this->auth_model->is_logged_in()) {
            $idCustomer     = $this->session->userdata('r_sess_user_id');
        } else {
            $idCustomer     = null;
        }

        $nameCustomer   = $this->input->post('name');
        $emailCustomer  = $this->input->post('email');
        $phoneCustomer  = $this->input->post('phone_number');
        $subject        = $this->input->post('subject');
        $message        = $this->input->post('message');

        $data = array(
            'CustomerID'        => $idCustomer,
            'QuestionName'      => $nameCustomer,
            'QuestionEmail'     => $emailCustomer,
            'QuestionPhone'     => $phoneCustomer,
            'QuestionSubject'   => $subject,
            'QuestionMessage'   => $message,
            'created_at'        => date('Y-m-d H:i:s', strtotime('now'))
        );

        $result = $this->M_Global->insert($data, "CustomerQuestion");

        if ($result == "success") {
            $this->session->set_flashdata(
                "success",
                '<div class="alert alert-success d-flex align-items-center alert-dismissible fade show mb-0" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
                <div>Thanks for your information. We\'ll be in touch with you soon.</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
        } else {
            echo "error";
        }

        redirect('contact-us');
    }

    public function service()
    {
        $data['title']              = $this->settings->homepage_title;
        $data['description']        = $this->settings->site_description;
        $data['keywords']           = $this->settings->keywords;
        // menu & submenu
        $data['getallcategory']     = $this->M_Menu->getAllCategory();
        // basic configuration
        $data['getBasicConfiguration']  = $this->M_Global->getmultiparam("BasicConfiguration", "ConfigStatus = 1")->row_array();
        $configId                       = $data['getBasicConfiguration']['ConfigID'];
        $data['getMediaSocial']         = $this->M_Global->getmultiparam("MediaSocial", "ConfigID = '$configId' AND MediaSocialStatus = 1")->result_array();
        // language
        $data['getLanguage']            = $this->language_model->get_languages();
        $data['getLang']                = $this->input->get('lang');
        $data['language']               = $this->language_model->getLanguage($data['getLang']);

        $this->load->view('FRONTEND/__components/header', $data);
        $this->load->view('FRONTEND/__components/nav', $data);
        $this->load->view('FRONTEND/Service', $data);
        $this->load->view('FRONTEND/__components/modal');
        $this->load->view('FRONTEND/__components/footer');
    }

    public function about_us()
    {
        $data['title']              = $this->settings->homepage_title;
        $data['description']        = $this->settings->site_description;
        $data['keywords']           = $this->settings->keywords;
        // menu & submenu
        $data['getallcategory']     = $this->M_Menu->getAllCategory();
        // basic configuration
        $data['getBasicConfiguration']  = $this->M_Global->getmultiparam("BasicConfiguration", "ConfigStatus = 1")->row_array();
        $configId                       = $data['getBasicConfiguration']['ConfigID'];
        $data['getMediaSocial']         = $this->M_Global->getmultiparam("MediaSocial", "ConfigID = '$configId' AND MediaSocialStatus = 1")->result_array();
        // language
        $data['getLanguage']            = $this->language_model->get_languages();
        $data['getLang']                = $this->input->get('lang');
        $data['language']               = $this->language_model->getLanguage($data['getLang']);

        $this->load->view('FRONTEND/__components/header', $data);
        $this->load->view('FRONTEND/__components/nav', $data);
        $this->load->view('FRONTEND/About', $data);
        $this->load->view('FRONTEND/__components/modal');
        $this->load->view('FRONTEND/__components/footer');
    }

    public function faqs()
    {
        $data['title']              = $this->settings->homepage_title;
        $data['description']        = $this->settings->site_description;
        $data['keywords']           = $this->settings->keywords;
        // menu & submenu
        $data['getallcategory']     = $this->M_Menu->getAllCategory();
        // basic configuration
        $data['getBasicConfiguration']  = $this->M_Global->getmultiparam("BasicConfiguration", "ConfigStatus = 1")->row_array();
        $configId                       = $data['getBasicConfiguration']['ConfigID'];
        $data['getMediaSocial']         = $this->M_Global->getmultiparam("MediaSocial", "ConfigID = '$configId' AND MediaSocialStatus = 1")->result_array();
        // language
        $data['getLanguage']            = $this->language_model->get_languages();
        $data['getLang']                = $this->input->get('lang');
        $data['language']               = $this->language_model->getLanguage($data['getLang']);

        $data['getFaq']                 = $this->M_Global->get_result("FaQ")->result_array();

        $this->load->view('FRONTEND/__components/header', $data);
        $this->load->view('FRONTEND/__components/nav', $data);
        $this->load->view('FRONTEND/FAQ', $data);
        $this->load->view('FRONTEND/__components/modal');
        $this->load->view('FRONTEND/__components/footer');
    }

    public function privacy_policy()
    {
        $data['title']              = $this->settings->homepage_title;
        $data['description']        = $this->settings->site_description;
        $data['keywords']           = $this->settings->keywords;
        // menu & submenu
        $data['getallcategory']     = $this->M_Menu->getAllCategory();
        // basic configuration
        $data['getBasicConfiguration']  = $this->M_Global->getmultiparam("BasicConfiguration", "ConfigStatus = 1")->row_array();
        $configId                       = $data['getBasicConfiguration']['ConfigID'];
        $data['getMediaSocial']         = $this->M_Global->getmultiparam("MediaSocial", "ConfigID = '$configId' AND MediaSocialStatus = 1")->result_array();
        // language
        $data['getLanguage']            = $this->language_model->get_languages();
        $data['getLang']                = $this->input->get('lang');
        $data['language']               = $this->language_model->getLanguage($data['getLang']);
        // content
        $data['getPrivacyPolicy']       = $this->M_Global->get_result('Information')->row();

        $this->load->view('FRONTEND/__components/header', $data);
        $this->load->view('FRONTEND/__components/nav', $data);
        $this->load->view('FRONTEND/Privacy-Policy', $data);
        $this->load->view('FRONTEND/__sidebar_right/end_section', $data);
        $this->load->view('FRONTEND/__components/modal');
        $this->load->view('FRONTEND/__components/footer');
    }

    public function terms_of_service()
    {
        $data['title']              = $this->settings->homepage_title;
        $data['description']        = $this->settings->site_description;
        $data['keywords']           = $this->settings->keywords;
        // menu & submenu
        $data['getallcategory']     = $this->M_Menu->getAllCategory();
        // basic configuration
        $data['getBasicConfiguration']  = $this->M_Global->getmultiparam("BasicConfiguration", "ConfigStatus = 1")->row_array();
        $configId                       = $data['getBasicConfiguration']['ConfigID'];
        $data['getMediaSocial']         = $this->M_Global->getmultiparam("MediaSocial", "ConfigID = '$configId' AND MediaSocialStatus = 1")->result_array();
        // language
        $data['getLanguage']            = $this->language_model->get_languages();
        $data['getLang']                = $this->input->get('lang');
        $data['language']               = $this->language_model->getLanguage($data['getLang']);
        // content
        $data['getTermsConditions']     = $this->M_Global->get_result('Information')->row();

        $this->load->view('FRONTEND/__components/header', $data);
        $this->load->view('FRONTEND/__components/nav', $data);
        $this->load->view('FRONTEND/Terms-of-Service', $data);
        $this->load->view('FRONTEND/__sidebar_right/end_section', $data);
        $this->load->view('FRONTEND/__components/modal');
        $this->load->view('FRONTEND/__components/footer');
    }

    public function shipping_returns()
    {
        $data['title']              = $this->settings->homepage_title;
        $data['description']        = $this->settings->site_description;
        $data['keywords']           = $this->settings->keywords;
        // menu & submenu
        $data['getallcategory']     = $this->M_Menu->getAllCategory();
        // basic configuration
        $data['getBasicConfiguration']  = $this->M_Global->getmultiparam("BasicConfiguration", "ConfigStatus = 1")->row_array();
        $configId                       = $data['getBasicConfiguration']['ConfigID'];
        $data['getMediaSocial']         = $this->M_Global->getmultiparam("MediaSocial", "ConfigID = '$configId' AND MediaSocialStatus = 1")->result_array();
        // language
        $data['getLanguage']            = $this->language_model->get_languages();
        $data['getLang']                = $this->input->get('lang');
        $data['language']               = $this->language_model->getLanguage($data['getLang']);

        $this->load->view('FRONTEND/__components/header', $data);
        $this->load->view('FRONTEND/__components/nav', $data);
        $this->load->view('FRONTEND/Shipping-Returns', $data);
        $this->load->view('FRONTEND/__sidebar_right/end_section', $data);
        $this->load->view('FRONTEND/__components/modal');
        $this->load->view('FRONTEND/__components/footer');
    }

    public function manual_brochures()
    {
        $data['title']                  = $this->settings->homepage_title;
        $data['description']            = $this->settings->site_description;
        $data['keywords']               = $this->settings->keywords;
        // menu & submenu
        $data['getallcategory']         = $this->M_Menu->getAllCategory();
        // basic configuration
        $data['getBasicConfiguration']  = $this->M_Global->getmultiparam("BasicConfiguration", "ConfigStatus = 1")->row_array();
        $configId                       = $data['getBasicConfiguration']['ConfigID'];
        $data['getMediaSocial']         = $this->M_Global->getmultiparam("MediaSocial", "ConfigID = '$configId' AND MediaSocialStatus = 1")->result_array();
        // language
        $data['getLanguage']            = $this->language_model->get_languages();
        $data['getLang']                = $this->input->get('lang');
        $data['language']               = $this->language_model->getLanguage($data['getLang']);

        $this->load->view('FRONTEND/__components/header', $data);
        $this->load->view('FRONTEND/__components/nav', $data);
        $this->load->view('FRONTEND/Manual-Brochures', $data);
        $this->load->view('FRONTEND/__components/modal');
        $this->load->view('FRONTEND/__components/footer');
    }

    public function helpful_video()
    {
        $data['title']                  = $this->settings->homepage_title;
        $data['description']            = $this->settings->site_description;
        $data['keywords']               = $this->settings->keywords;
        // menu & submenu
        $data['getallcategory']         = $this->M_Menu->getAllCategory();
        // basic configuration
        $data['getBasicConfiguration']  = $this->M_Global->getmultiparam("BasicConfiguration", "ConfigStatus = 1")->row_array();
        $configId                       = $data['getBasicConfiguration']['ConfigID'];
        $data['getMediaSocial']         = $this->M_Global->getmultiparam("MediaSocial", "ConfigID = '$configId' AND MediaSocialStatus = 1")->result_array();
        // language
        $data['getLanguage']            = $this->language_model->get_languages();
        $data['getLang']                = $this->input->get('lang');
        $data['language']               = $this->language_model->getLanguage($data['getLang']);

        $this->load->view('FRONTEND/__components/header', $data);
        $this->load->view('FRONTEND/__components/nav', $data);
        $this->load->view('FRONTEND/Helpful-Video', $data);
        $this->load->view('FRONTEND/__components/modal');
        $this->load->view('FRONTEND/__components/footer');
    }

    // static page
    public function static_page($slug)
    {
        $data['title']                  = $this->settings->homepage_title;
        $data['description']            = $this->settings->site_description;
        $data['keywords']               = $this->settings->keywords;
        // menu & submenu
        $data['getallcategory']         = $this->M_Menu->getAllCategory();
        // basic configuration
        $data['getBasicConfiguration']  = $this->M_Global->getmultiparam("BasicConfiguration", "ConfigStatus = 1")->row_array();
        $configId                       = $data['getBasicConfiguration']['ConfigID'];
        $data['getMediaSocial']         = $this->M_Global->getmultiparam("MediaSocial", "ConfigID = '$configId' AND MediaSocialStatus = 1")->result_array();
        // language
        $data['getLanguage']            = $this->language_model->get_languages();
        $data['getLang']                = $this->input->get('lang');
        $data['language']               = $this->language_model->getLanguage($data['getLang']);

        $data['getStaticPage'] = $this->M_Global->getmultiparam("StaticPage", "Slug = '$slug' ")->row_array();

        $this->load->view('FRONTEND/__components/header', $data);
        $this->load->view('FRONTEND/__components/nav', $data);
        $this->load->view('FRONTEND/Static-Page', $data);
        $this->load->view('FRONTEND/__components/modal');
        $this->load->view('FRONTEND/__components/footer');
    }
    // end static page
}
