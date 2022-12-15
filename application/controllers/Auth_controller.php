<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_controller extends R_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Admin Login
     */
    public function admin_login()
    {
        if ($this->auth_check) {
            redirect(lang_base_url());
        }
        $data['title'] = "Admin Login";
        $data['description'] = "login" . " - " . $this->settings->site_title;
        $data['keywords'] = "login" . ', ' . $this->general_settings->application_name;

        $this->load->view('BACKEND/__components/header', $data);
        $this->load->view('AUTH/login.html', $data);
        //$this->load->view('FRONTEND/__components/footer');
    }

    /**
     * Customer Login Post
     */
    public function admin_login_post()
    {
        $this->load->library('bcrypt');
        //validate inputs
        $this->form_validation->set_rules('email', 'form_email', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('password', 'form_password', 'required|xss_clean|max_length[30]');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->auth_model->input_values());
            redirect($this->agent->referrer());
        } else {
            if ($this->auth_model->login()) {

                if ($this->session->userdata('r_sess_user_role') == 'admin') {
                    redirect(base_url('admin'));
                } else {
                    redirect(admin_url());
                }
            } else {
                //error
                $this->session->set_flashdata('form_data', $this->auth_model->input_values());
                $this->session->set_flashdata('error', 'login error');
                redirect($this->agent->referrer());
            }
        }
    }

    public function customer_login_post()
    {
        //validate inputs
        $this->form_validation->set_rules('username_email', 'Email or Username', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('password', 'Password', 'required|xss_clean|max_length[30]');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errorUsernameEmail', form_error('username_email', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorPassword', form_error('password', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('valueUsernameEmail', set_value('username_email'));
            $this->session->set_flashdata('valuePassword', set_value('password'));
            $this->session->set_flashdata('form_data', $this->auth_model->input_values());

            redirect($this->agent->referrer());
        } else {
            //validation success
            $this->_login();
        }
    }

    private function _login()
    {
        $segment    = $this->uri->segment(3);

        $decode     = base64_decode($segment);
        $urlDecode  = urldecode($decode);

        if ($this->auth_model->login()) {
            if ($this->session->userdata('r_sess_user_role') == 'customer') {
                if (!$segment) {
                    redirect(base_url('customer/account'));
                } else {
                    redirect($urlDecode);
                }
            } else {
                redirect('customer/account/login');
            }
        } else {
            //error
            $this->session->set_flashdata('form_data', $this->auth_model->input_values());
            $this->session->set_flashdata(
                'error',
                '<div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <div>Your login process error!</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            redirect($this->agent->referrer());
        }
    }

    public function forgot_password()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|max_length[200]');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errorEmail', form_error('email', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('valueEmail', set_value('email'));
            $this->session->set_flashdata('form_data', $this->auth_model->input_values());

            redirect($this->agent->referrer());
        } else {
            $email          = $this->input->post('email');
            $validateEmail  = $this->M_Global->getmultiparam("users", "email = '$email'")->row();

            if ($validateEmail) {
                $row                = $validateEmail;
                $user_id            = $row->id;
                $first_name         = $row->first_name;
                $last_name          = $row->last_name;
                $string             = time() . $user_id . $email;
                $hash_string        = hash('sha256', $string);
                $currentDate        = date('Y-m-d H:i');
                $hash_expiry        = date('Y-m-d H:i', strtotime($currentDate . ' + 1 days'));

                $data = array(
                    'first_name'    => $first_name,
                    'last_name'     => $last_name,
                    'hash'          => $hash_string,
                    'hash_expiry'   => $hash_expiry,
                );

                $message    = $this->load->view('FRONTEND/Email', $data, true);
                $subject    = "Reset your AED.co.id password account";
                $sentStatus = $this->_send_email($email, $subject, $message, 'forgot');

                if ($sentStatus == true) {
                    $this->M_Global->update_data("email = '$email'", $data, "users");
                    $this->session->set_flashdata(
                        'success',
                        '<div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        <div>Reset password link successfully sent, please check your email.</div>
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
                        <div>Email sending error!</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>'
                    );
                    redirect($this->agent->referrer());
                }
            } else {
                $this->session->set_flashdata(
                    'error',
                    '<div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                    <div>Invalid email!</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
                redirect($this->agent->referrer());
            }
        }
    }

    public function user_registration()
    {
        if ($this->auth_model->login()) {
            redirect(base_url());
        }
        //validate inputs
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim|xss_clean');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean|is_unique[users.username]', [
            'is_unique' => 'This username has already registered!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|valid_email|is_unique[users.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|xss_clean|min_length[8]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errorFirstName', form_error('first_name', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorLastName', form_error('last_name', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorUsername', form_error('username', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorEmail', form_error('email', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorNewPassword', form_error('password1', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('errorConfirmPassword', form_error('password2', '<small class="text-danger">', '</small>'));
            $this->session->set_flashdata('valueFirstName', set_value('first_name'));
            $this->session->set_flashdata('valueLastName', set_value('last_name'));
            $this->session->set_flashdata('valueUsername', set_value('username'));
            $this->session->set_flashdata('valueEmail', set_value('email'));
            $this->session->set_flashdata('valueNewPassword', set_value('password1'));
            $this->session->set_flashdata('valueConfirmPassword', set_value('password2'));
            $this->session->set_flashdata('form_data', $this->auth_model->input_values());

            redirect($this->agent->referrer());
        } else {
            $token          = base64_encode(random_bytes(32));
            $email          = htmlspecialchars($this->input->post('email', true));
            $string         = time() . $email;
            $hash_string    = hash('sha256', $string);
            $currentDate    = date('Y-m-d H:i');
            $hash_expiry    = date('Y-m-d H:i', strtotime($currentDate . ' + 1 days'));

            $data = array(
                'first_name'        => htmlspecialchars($this->input->post('first_name', true)),
                'last_name'         => htmlspecialchars($this->input->post('last_name', true)),
                'username'          => htmlspecialchars($this->input->post('username', true)),
                'slug'              => htmlspecialchars($this->input->post('username', true)),
                'email'             => $email,
                'email_status'      => 1,
                'token'             => $token,
                'hash'              => $hash_string,
                'hash_expiry'       => $hash_expiry,
                'password'          => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role'              => 'customer',
                'user_type'         => 'registered',
                'created_at'        => date('Y-m-d H:i:s', strtotime('now'))
            );
            $this->M_Global->insert($data, 'users');

            $data['subject']    = "Welcome to AED.co.id";
            $message            = $this->load->view('FRONTEND/Verify', $data, true);
            $sentStatus         = $this->_send_email($data['email'], $data['subject'], $message, 'verify');
            $lang               = $this->input->get('lang');

            if ($sentStatus == true) {
                if ($this->auth_model->login()) {
                    if ($this->session->userdata('r_sess_user_role') == 'customer') {

                        $this->session->set_flashdata(
                            'success',
                            '<div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert" style="margin-bottom: unset">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </svg>
                                <div>Congratulation! Thank you for registering with AED.co.id</div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>'
                        );

                        if ($lang) {
                            redirect('customer/account?lang=' . $lang);
                        } else {
                            redirect('customer/account');
                        }
                    } else {
                        redirect(admin_url());
                    }
                } else {
                    //error
                    $this->session->set_flashdata('form_data', $this->auth_model->input_values());
                    $this->session->set_flashdata(
                        'error',
                        '<div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div>Sorry, sign in process error! You can try sign in again.</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>'
                    );
                    redirect($this->agent->referrer());
                }
            }
        }
    }

    private function _send_email($email, $subject, $message, $type)
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

        if ($type == 'forgot') {
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
        } else if ($type == 'verify') {
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
        } else {
            return false;
        }
    }

    /**
     * Logout
     */
    public function logout()
    {
        if (!$this->auth_check) {
            redirect(lang_base_url());
        }
        $this->auth_model->logout();
        redirect(base_url());
    }


    public function logout_admin()
    {
        if (!$this->auth_check) {
            redirect(lang_base_url());
        }
        $this->auth_model->logout();
        redirect(admin_url());
    }


    /**
     * Connect with Google
     */
    public function connect_with_google()
    {
        require_once APPPATH . "third_party/google/vendor/autoload.php";

        $provider = new League\OAuth2\Client\Provider\Google([
            'clientId' => $this->general_settings->google_client_id,
            'clientSecret' => $this->general_settings->google_client_secret,
            'redirectUri' => base_url() . 'connect-with-google',
        ]);

        if (!empty($_GET['error'])) {
            // Got an error, probably user denied access
            exit('Got error: ' . htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8'));
        } elseif (empty($_GET['code'])) {

            // If we don't have an authorization code then get one
            $authUrl = $provider->getAuthorizationUrl();
            $_SESSION['oauth2state'] = $provider->getState();
            $this->session->set_userdata('g_login_referrer', $this->agent->referrer());
            header('Location: ' . $authUrl);
            exit();
        } elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
            // State is invalid, possible CSRF attack in progress
            unset($_SESSION['oauth2state']);
            exit('Invalid state');
        } else {
            // Try to get an access token (using the authorization code grant)
            $token = $provider->getAccessToken('authorization_code', [
                'code' => $_GET['code']
            ]);
            // Optional: Now you have a token you can look up a users profile data
            try {
                // We got an access token, let's now get the owner details
                $user = $provider->getResourceOwner($token);

                $g_user = new stdClass();
                $g_user->id = $user->getId();
                $g_user->email = $user->getEmail();
                $g_user->name = $user->getName();
                $g_user->avatar = $user->getAvatar();
                $g_user->first_name = $user->getFirstName();
                $g_user->last_name = $user->getLastName();

                $this->auth_model->login_with_google($g_user);

                if (!empty($this->session->userdata('g_login_referrer'))) {
                    redirect($this->session->userdata('g_login_referrer'));
                } else {
                    redirect(base_url());
                }
            } catch (Exception $e) {
                // Failed to get user details
                exit('Something went wrong: ' . $e->getMessage());
            }
        }
    }
}
