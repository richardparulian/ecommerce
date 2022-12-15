<!-- Start Profile Authentication Area -->
<section class="profile-authentication-area ptb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="login-form">
                    <h2>Lupa Kata Sandi</h2>
                    <?= $this->session->flashdata('error'); ?>
                    <?= form_open('auth_controller/forgot_password'); ?>
                    <div class="form-group required">
                        <label class="col-form-label">email</label>
                        <input type="text" class="form-control" name="email" value="<?= $this->session->flashdata('valueEmail'); ?>" placeholder="email">
                        <?= $this->session->flashdata('errorEmail'); ?>
                    </div>

                    <button type="submit">Atur Ulang Kata Sandi</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Start Profile Authentication Area -->

<section class="facility-area bg-f7f8fa pb-1 pt-1"></section>