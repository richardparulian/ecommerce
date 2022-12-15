<style>
    .required .col-form-label:after {
        content: "*";
        color: red;
    }
</style>

<?php
if ($getLang) {
    $urls               = 'frontend_controller/edit_account?lang=' . $getLang;
    $changeEmail        = 'customer/account/change-email?lang=' . $getLang;
    $changePassword     = 'customer/account/change-password?lang=' . $getLang;
} else {
    $urls               = 'frontend_controller/edit_account';
    $changeEmail        = 'customer/account/change-email';
    $changePassword     = 'customer/account/change-password';
}
?>

<div class="mt-2 text-uppercase">
    <h3><?= $language['title_change_information']; ?></h3>
</div>

<div class="mt-3 mb-3">
    <h5 class="fw-normal"><?= $language['title_account_information']; ?></h5>
</div>
<hr />

<?= form_open($urls) ?>
<div class="mb-3 row required">
    <label for="firstName" class="col-sm-2 col-form-label"><?= $language['title_first_name']; ?></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="first_name" value="<?= $user['first_name']; ?>">
        <?= $this->session->flashdata('errorFirstName'); ?>
    </div>
</div>
<div class="mb-3 row required">
    <label for="lastName" class="col-sm-2 col-form-label"><?= $language['title_last_name']; ?></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="last_name" value="<?= $user['last_name']; ?>">
        <?= $this->session->flashdata('errorLastName'); ?>
    </div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 mb-5 remember-me-wrap">
    <a href="<?= base_url($changeEmail); ?>" class="badge rounded-pill bg-dark"><?= $language['title_change_email']; ?></a>
    <a href="<?= base_url($changePassword); ?>" class="badge rounded-pill bg-dark"><?= $language['title_change_password']; ?></a>
</div>

<div class="mb-4 row">
    <div class="col-sm-10">
        <button type="submit" class="load-progress default-btn"><i class='bx bx-save'></i> <?= $language['title_save']; ?></button>
    </div>
</div>
<?= form_close(); ?>