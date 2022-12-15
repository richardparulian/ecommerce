<style>
    .required .col-form-label:after {
        content: "*";
        color: red;
    }
</style>

<div class="mt-2 text-uppercase">
    <h3><?= $language['title_change_password']; ?></h3>
</div>

<div class="mt-3 mb-3">
    <h5 class="fw-normal"><?= $language['title_account_information']; ?></h5>
</div>
<hr />

<?= $this->session->flashdata('errors'); ?>
<?= form_open('Frontend_controller/edit_password', 'class="change-password"'); ?>
<div class="mb-3 row required">
    <label for="currentPassword" class="col-sm-3 col-form-label"><?= $language['title_current_password']; ?></label>
    <div class="col-sm-9">
        <input type="password" class="form-control" name="current_password" value="<?= $this->session->flashdata('valueCurrentPassword'); ?>">
        <?= $this->session->flashdata('errorCurrentPassword'); ?>
    </div>
</div>
<div class="mb-3 row required">
    <label for="newPassword" class="col-sm-3 col-form-label"><?= $language['title_new_password']; ?></label>
    <div class="col-sm-9">
        <input type="password" class="form-control" name="new_password" value="<?= $this->session->flashdata('valueNewPassword'); ?>">
        <?= $this->session->flashdata('errorNewPassword'); ?>
    </div>
</div>
<div class="mb-5 row required">
    <label for="confirmPassword" class="col-sm-3 col-form-label"><?= $language['title_confirm_password']; ?></label>
    <div class="col-sm-9">
        <input type="password" class="form-control" name="confirm_password" value="<?= $this->session->flashdata('valueConfirmPassword'); ?>">
        <?= $this->session->flashdata('errorConfirmPassword'); ?>
    </div>
</div>

<div class="mb-4 row">
    <div class="col-sm-10">
        <button type="submit" class="load-progress default-btn"><i class='bx bx-save'></i> <?= $language['title_save']; ?></button>
    </div>
</div>
<?= form_close(); ?>