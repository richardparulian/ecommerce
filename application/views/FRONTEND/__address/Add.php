<style>
    .required .col-form-label:after {
        content: "*";
        color: red;
    }
</style>

<?= $this->session->flashdata('success'); ?>
<?= $this->session->flashdata('error'); ?>

<?php
if ($getLang) {
    $urls = 'frontend_controller/add_address?lang=' . $getLang;
} else {
    $urls = 'frontend_controller/add_address';
}
?>

<div class="mt-2 text-uppercase">
    <h3><?= $language['title_add_address']; ?></h3>
</div>

<?= form_open($urls) ?>
<div class="mt-3 mb-3">
    <h5><?= $language['title_account_information']; ?></h5>
</div>
<hr />

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
<div class="mb-3 row">
    <label for="company" class="col-sm-2 col-form-label"><?= $language['title_company']; ?></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="company" value="<?= $this->session->flashdata('valueCompany'); ?>">
        <?= $this->session->flashdata('errorCompany'); ?>
    </div>
</div>
<div class="mb-3 row required">
    <label for="phoneNumber" class="col-sm-2 col-form-label"><?= $language['title_phone_number']; ?></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="phone_number" value="<?= $this->session->flashdata('valuePhoneNumber'); ?>">
        <?= $this->session->flashdata('errorPhoneNumber'); ?>
    </div>
</div>

<div class="mt-5">
    <h5><?= $language['title_address']; ?></h5>
</div>
<hr />

<div class="mb-3 row required">
    <label for="address" class="col-sm-2 col-form-label"><?= $language['title_street_address']; ?></label>
    <div class="col-sm-10">
        <textarea name="address" class="form-control" cols="30" rows="3"><?= $this->session->flashdata('valueAddress'); ?></textarea>
        <?= $this->session->flashdata('errorAddress'); ?>
    </div>
</div>
<div class="mb-3 row required">
    <label for="city" class="col-sm-2 col-form-label"><?= $language['title_city']; ?></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="city" value="<?= $this->session->flashdata('valueCity'); ?>">
        <?= $this->session->flashdata('errorCity'); ?>
    </div>
</div>
<div class="mb-3 row required">
    <label for="province" class="col-sm-2 col-form-label"><?= $language['title_state']; ?></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="province" value="<?= $this->session->flashdata('valueProvince'); ?>">
        <?= $this->session->flashdata('errorProvince'); ?>
    </div>
</div>
<div class="mb-3 row required">
    <label for="postalCode" class="col-sm-2 col-form-label"><?= $language['title_postcode']; ?></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="postal_code" value="<?= $this->session->flashdata('valuePostalCode'); ?>">
        <?= $this->session->flashdata('errorPostalCode'); ?>
    </div>
</div>
<div class="mb-5 row required">
    <label for="country" class="col-sm-2 col-form-label"><?= $language['title_country']; ?></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="country" value="<?= $this->session->flashdata('valueCountry'); ?>">
        <?= $this->session->flashdata('errorCountry'); ?>
    </div>
</div>
<?php if ($countAddress > 0) : ?>
    <div class="mb-5">
        <div class="form-check form-switch">
            <input class="form-check-input" type="radio" name="my_category" value="2" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault"> <?= $language['title_use_billing_address']; ?></label>
        </div>

        <div class="form-check form-switch">
            <input class="form-check-input" type="radio" name="my_category" value="3" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault"> <?= $language['title_use_shipping_address']; ?></label>
        </div>
    </div>
<?php endif; ?>
<div class="mb-4 row">
    <div class="col-sm-10">
        <button type="submit" class="load-progress default-btn"><i class='bx bx-save'></i> <?= $language['title_save']; ?></button>
    </div>
</div>
<?= form_close(); ?>