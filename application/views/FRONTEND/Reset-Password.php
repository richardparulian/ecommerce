<!-- Start Profile Authentication Area -->
<section class="profile-authentication-area ptb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="login-form">
                    <h2>Atur Ulang Kata Sandi</h2>
                    <?= $this->session->flashdata('error'); ?>
                    <?= form_open('frontend_controller/reset_password?hash=' . $hash); ?>
                    <div class="form-group required">
                        <label class="col-form-label">Kata Sandi Baru</label>
                        <input type="password" class="form-control" name="password1" value="<?= $this->session->flashdata('valueNewPassword'); ?>" placeholder="Masukkan kata sandi">
                        <?= $this->session->flashdata('errorNewPassword'); ?>
                    </div>
                    <div class="form-group required">
                        <label class="col-form-label">Ulangi Kata Sandi</label>
                        <input type="password" class="form-control" name="password2" value="<?= $this->session->flashdata('valueConfirmPassword'); ?>" placeholder="Masukkan ulang kata sandi">
                        <?= $this->session->flashdata('errorConfirmPassword'); ?>
                    </div>
                    <button type="submit">Setel Ulang Kata Sandi Saya</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Start Profile Authentication Area -->

<section class="facility-area bg-f7f8fa pb-1 pt-1"></section>