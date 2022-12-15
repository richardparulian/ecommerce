<!-- Start Profile Authentication Area -->
<section class="profile-authentication-area ptb-70">
    <div class="container">
        <?= $this->session->flashdata('success'); ?>
        <?= $this->session->flashdata('error'); ?>
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="login-form billing-details">
                    <h2><?= $language['title_sign_in']; ?></h2>

                    <?= form_open('auth_controller/customer_login_post/' . $segment); ?>
                    <div class="form-group">
                        <label><?= $language['title_username_or_email']; ?> <span class="required">*</span></label>
                        <input type="text" class="form-control" name="username_email" value="<?= $this->session->flashdata('valueUsernameEmail'); ?>" placeholder="Username or email">
                        <?= $this->session->flashdata('errorUsernameEmail'); ?>
                    </div>

                    <div class="form-group">
                        <label><?= $language['title_password']; ?> <span class="required">*</span></label>
                        <input type="password" class="form-control form-password" name="password" value="<?= $this->session->flashdata('valuePassword'); ?>" placeholder="Password">
                        <?= $this->session->flashdata('errorPassword'); ?>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6 col-sm-6 remember-me-wrap">
                            <p>
                                <input type="checkbox" class="form-checkbox" id="test2">
                                <label for="test2"><?= $language['title_show_password']; ?></label>
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 lost-your-password-wrap">
                            <a href="<?= base_url('customer/account/forgot-password'); ?>" class="lost-your-password"><?= $language['title_forgot_password']; ?>?</a>
                        </div>
                    </div>
                    <button type="submit"><?= $language['title_sign_in']; ?></button>
                    <?= form_close(); ?>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="register-form billing-details">
                    <h2><?= $language['title_register_now']; ?></h2>
                    <?php
                    if ($getLang) {
                        $urls = 'auth_controller/user_registration/' . $segment . '?lang=' . $getLang;
                    } else {
                        $urls = 'auth_controller/user_registration/' . $segment;
                    }
                    ?>
                    <?= form_open($urls); ?>
                    <div class="form-group">
                        <label><?= $language['title_first_name']; ?> <span class="required">*</span></label>
                        <input type="text" class="form-control" name="first_name" placeholder="First name" value="<?= $this->session->flashdata('valueFirstName'); ?>">
                        <?= $this->session->flashdata('errorFirstName'); ?>
                    </div>

                    <div class="form-group">
                        <label><?= $language['title_last_name']; ?> <span class="required">*</span></label>
                        <input type="text" class="form-control" name="last_name" placeholder="Last name" value="<?= $this->session->flashdata('valueLastName'); ?>">
                        <?= $this->session->flashdata('errorLastName'); ?>
                    </div>

                    <div class="form-group">
                        <label><?= $language['title_username']; ?> <span class="required">*</span></label>
                        <input type="text" class="form-control" name="username" placeholder="Username" value="<?= $this->session->flashdata('valueUsername'); ?>">
                        <?= $this->session->flashdata('errorUsername'); ?>
                    </div>

                    <div class="form-group">
                        <label><?= $language['title_email']; ?> <span class="required">*</span></label>
                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?= $this->session->flashdata('valueEmail'); ?>">
                        <?= $this->session->flashdata('errorEmail'); ?>
                    </div>

                    <div class="form-group">
                        <label><?= $language['title_password']; ?> <span class="required">*</span></label>
                        <input type="password" class="form-control" name="password1" placeholder="Password" value="<?= $this->session->flashdata('valueNewPassword'); ?>">
                        <?= $this->session->flashdata('errorNewPassword'); ?>
                    </div>

                    <div class="form-group">
                        <label><?= $language['title_confirm_password']; ?> <span class="required">*</span></label>
                        <input type="password" class="form-control" name="password2" placeholder="Confirm Password" value="<?= $this->session->flashdata('valueConfirmPassword'); ?>">
                        <?= $this->session->flashdata('errorConfirmPassword'); ?>
                    </div>

                    <p class="description">The password should be at least eight characters long. To make it stronger, use upper and lower case letters, numbers, and symbols like ! " ? $ % ^ & )</p>
                    <button type="submit"><?= $language['title_register']; ?></button>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Start Profile Authentication Area -->

<section class="facility-area bg-f7f8fa pb-1 pt-1"></section>