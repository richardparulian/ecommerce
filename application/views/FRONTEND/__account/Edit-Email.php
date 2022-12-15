<style>
    .required .col-form-label:after {
        content: "*";
        color: red;
    }
</style>

<div class="mt-2 text-uppercase">
    <h3><?= $language['title_change_email']; ?></h3>
</div>

<div class="mt-3 mb-3">
    <h5 class="fw-normal"><?= $language['title_account_information']; ?></h5>
</div>
<hr />

<?= form_open('Frontend_controller/edit_email'); ?>
<div class="mb-3 row required">
    <label for="email" class="col-sm-2 col-form-label"><?= $language['title_email']; ?></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="email" value="<?= $user['email']; ?>">
        <?= $this->session->flashdata('errorEmail'); ?>
    </div>
</div>

<div class="mb-5 row required">
    <label for="password" class="col-sm-2 col-form-label"><?= $language['title_password']; ?></label>
    <div class="col-sm-10">
        <input type="password" class="form-control" name="password">
        <?= $this->session->flashdata('errorPassword'); ?>
    </div>
</div>

<div class="mb-4 row">
    <div class="col-sm-10">
        <button type="submit" class="load-progress default-btn"><i class='bx bx-save'></i> <?= $language['title_save']; ?></button>
    </div>
</div>
<?= form_close(); ?>