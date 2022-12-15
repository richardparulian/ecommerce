<style>
    .required .col-form-label:after {
        content: "*";
        color: red;
    }
</style>

<?php
if ($getLang) {
    $urls = 'frontend_controller/edit_address/' . encrypt_url($getAddress['AddressID']) . '?lang=' . $getLang;
} else {
    $urls = 'frontend_controller/edit_address/' . encrypt_url($getAddress['AddressID']);
}
?>

<div class="mt-2 text-uppercase">
    <h3><?= $language['title_change_address']; ?></h3>
</div>

<div class="mt-3 mb-3">
    <h5><?= $language['title_account_information']; ?></h5>
</div>
<hr />

<?= form_open($urls); ?>
<div class="mb-3 row required">
    <label for="firstName" class="col-sm-2 col-form-label"><?= $language['title_first_name']; ?></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="first_name" value="<?= $getAddress['AddressFirstName']; ?>">
        <?= $this->session->flashdata('errorFirstName'); ?>
    </div>
</div>
<div class="mb-3 row required">
    <label for="lastName" class="col-sm-2 col-form-label"><?= $language['title_last_name']; ?></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="last_name" value="<?= $getAddress['AddressLastName']; ?>">
        <?= $this->session->flashdata('errorLastName'); ?>
    </div>
</div>
<div class="mb-3 row">
    <label for="company" class="col-sm-2 col-form-label"><?= $language['title_company']; ?></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="company" value="<?= $getAddress['AddressCompany']; ?>">
        <?= $this->session->flashdata('errorCompany'); ?>
    </div>
</div>
<div class="mb-3 row required">
    <label for="phoneNumber" class="col-sm-2 col-form-label"><?= $language['title_phone_number']; ?></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="phone_number" value="<?= $getAddress['AddressPhone']; ?>">
        <?= $this->session->flashdata('errorPhoneNumber'); ?>
    </div>
</div>

<div class="mt-5 text-uppercase">
    <h5><?= $language['title_address']; ?></h5>
</div>
<hr />

<div class="mb-3 row required">
    <label for="address" class="col-sm-2 col-form-label"><?= $language['title_street_address']; ?></label>
    <div class="col-sm-10">
        <textarea name="address" class="form-control" cols="30" rows="3"><?= $getAddress['AddressStreet']; ?></textarea>
        <?= $this->session->flashdata('errorAddress'); ?>
    </div>
</div>
<div class="mb-3 row required">
    <label for="city" class="col-sm-2 col-form-label"><?= $language['title_city']; ?></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="city" value="<?= $getAddress['AddressCity']; ?>">
        <?= $this->session->flashdata('errorCity'); ?>
    </div>
</div>
<div class="mb-3 row required">
    <label for="province" class="col-sm-2 col-form-label"><?= $language['title_state']; ?></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="province" value="<?= $getAddress['AddressState']; ?>">
        <?= $this->session->flashdata('errorProvince'); ?>
    </div>
</div>
<div class="mb-3 row required">
    <label for="postalCode" class="col-sm-2 col-form-label"><?= $language['title_postcode']; ?></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="postal_code" value="<?= $getAddress['AddressPostalCode']; ?>">
        <?= $this->session->flashdata('errorPostalCode'); ?>
    </div>
</div>
<div class="mb-5 row required">
    <label for="country" class="col-sm-2 col-form-label"><?= $language['title_country']; ?></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="country" value="<?= $getAddress['AddressCountry']; ?>">
        <?= $this->session->flashdata('errorCountry'); ?>
    </div>
</div>
<div class="mb-5 row">
    <div class="col-sm-12">
        <?php if ($getAddress['AddressCategory'] == 2) : ?>
            <div class="alert alert-info d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-info-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                </svg>
                <div>
                    This is your default billing address!
                </div>
            </div>
            <div class="align-items-center">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="category" value="1" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> <?= $language['title_use_shipping_address']; ?></label>
                </div>
            </div>
            <input type="hidden" name="address_id" value="<?= isset($getCategoryForBilling['AddressID']) ? $getCategoryForBilling['AddressID'] : ''; ?>">
        <?php elseif ($getAddress['AddressCategory'] == 3) : ?>
            <div class="alert alert-info d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-info-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                </svg>
                <div>
                    This is your default shipping address!
                </div>
            </div>
            <div class="align-items-center">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="category" value="1" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> <?= $language['title_use_billing_address']; ?></label>
                </div>
            </div>
            <input type="hidden" name="address_id" value="<?= isset($getCategoryForShipping['AddressID']) ? $getCategoryForShipping['AddressID'] : ''; ?>">
        <?php elseif ($getAddress['AddressCategory'] == null) : ?>
            <div class="align-items-center">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="radio" name="my_category" value="2" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> <?= $language['title_use_billing_address']; ?></label>
                </div>

                <div class="form-check form-switch">
                    <input class="form-check-input" type="radio" name="my_category" value="3" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> <?= $language['title_use_shipping_address']; ?></label>
                </div>
            </div>
        <?php else : ?>
            <div class="alert alert-info d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-info-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                </svg>
                <div>
                    This is your default billing address & shipping address!
                </div>
            </div>
            <input type="hidden" name="category" value="<?= $getAddress['AddressCategory']; ?>">
        <?php endif; ?>
    </div>
</div>
<div class="mb-4 row">
    <div class="col-sm-10">
        <button type="submit" class="load-progress default-btn"><i class='bx bx-save'></i> <?= $language['title_save']; ?></button>
    </div>
</div>
<?= form_close(); ?>