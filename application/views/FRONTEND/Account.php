<style>
    .account-list {
        list-style-type: none;
        padding-left: unset
    }
</style>

<?= $this->session->flashdata('success'); ?>
<?= $this->session->flashdata('error'); ?>

<?php
if ($getLang) {
    $edit               = 'customer/account/information?lang=' . $getLang;
    $changePassword     = 'customer/account/change-password?lang=' . $getLang;
    $newAddress         = 'customer/account/new-address?lang=' . $getLang;
    $editAddress        = 'customer/account/address?lang=' . $getLang;
    $billingAddress     = 'customer/account/edit-address/' . encrypt_url(isset($getBillingAddress['AddressID']) ? $getBillingAddress['AddressID'] : '') . '?lang=' . $getLang;
    $shippingAddress    = 'customer/account/edit-address/' . encrypt_url(isset($getShippingAddress['AddressID']) ? $getShippingAddress['AddressID'] : '') . '?lang=' . $getLang;
    $defaultAddress     = 'customer/account/edit-address/' . encrypt_url(isset($getDefaultAddress['AddressID']) ? $getDefaultAddress['AddressID'] : '') . '?lang=' . $getLang;
} else {
    $edit               = 'customer/account/information';
    $changePassword     = 'customer/account/change-password';
    $newAddress         = 'customer/account/new-address';
    $editAddress        = 'customer/account/address';
    $billingAddress     = 'customer/account/edit-address/' . encrypt_url(isset($getBillingAddress['AddressID']) ? $getBillingAddress['AddressID'] : '');
    $shippingAddress    = 'customer/account/edit-address/' . encrypt_url(isset($getShippingAddress['AddressID']) ? $getShippingAddress['AddressID'] : '');
    $defaultAddress     = 'customer/account/edit-address/' . encrypt_url(isset($getDefaultAddress['AddressID']) ? $getDefaultAddress['AddressID'] : '');
}
?>

<div class="mt-2 text-uppercase">
    <h3><?= $language['title_my_account']; ?></h3>
</div>
<!-- <div class="mt-3 mb-3 row">
    <h5><?= $language['title_account_information']; ?></h5>
</div> -->
<hr />

<div class="mb-3 row">
    <div class="col-lg-6 col-md-6">
        <div class="mt-2">
            <h5><?= $language['title_contact_information']; ?></h6>
                <ul class="account-list">
                    <li><span><small><?= $user['first_name']; ?> <?= $user['last_name']; ?></small></span></li>
                    <li><span><small><?= $user['email']; ?></small></span></li>
                </ul>
        </div>
        <a href="<?= base_url($edit); ?>" class="badge rounded-pill bg-dark"><?= $language['title_edit']; ?></a>
        <a href="<?= base_url($changePassword); ?>" class="badge rounded-pill bg-dark"><?= $language['title_change_password']; ?></a>
    </div>

    <div class="col-lg-6 col-md-6">
        <!-- content -->
    </div>
</div>

<div class="mt-5 mb-3 row">
    <div class="col-lg-7 col-md-7">
        <div class="top-header-contact-info">
            <h5><?= $language['title_address']; ?></h5>
        </div>
    </div>
    <div class="col-lg-5 col-md-5">
        <div class="top-header-menu" style="text-align: unset;">
            <?php if ($countAddress < 1) : ?>
                <a href="<?= base_url($newAddress); ?>" class="badge rounded-pill bg-dark"><?= $language['title_manage_address']; ?></a>
            <?php else : ?>
                <a href="<?= base_url($editAddress); ?>" class="badge rounded-pill bg-dark"><?= $language['title_manage_address']; ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>
<hr />

<div class="mb-5 row">
    <div class="col-lg-6 col-md-6 mb-3">
        <div class="mt-2">
            <h6><?= $language['title_billing_address']; ?></h6>
            <ul class="account-list">
                <?php if ($countBillingAddress > 0) : ?>
                    <li><span><small><?= $getBillingAddress['AddressFirstName']; ?> <?= $getBillingAddress['AddressLastName']; ?></small></span></li>
                    <li><span><small><?= $getBillingAddress['AddressPhone']; ?></small></span></li>
                    <li><span><small><?= $getBillingAddress['AddressStreet']; ?></small></span></li>
                    <li><span><small><?= $getBillingAddress['AddressCity']; ?>, <?= $getBillingAddress['AddressState']; ?>, <?= $getBillingAddress['AddressPostalCode']; ?></small></span></li>
                    <li><span><small><?= $getBillingAddress['AddressCountry']; ?></small></span></li>
                <?php else : ?>
                    <?php if ($countDefaultAddress > 0) : ?>
                        <li><span><small><?= $getDefaultAddress['AddressFirstName']; ?> <?= $getDefaultAddress['AddressLastName']; ?></small></span></li>
                        <li><span><small><?= $getDefaultAddress['AddressPhone']; ?></small></span></li>
                        <li><span><small><?= $getDefaultAddress['AddressStreet']; ?></small></span></li>
                        <li><span><small><?= $getDefaultAddress['AddressCity']; ?>, <?= $getDefaultAddress['AddressState']; ?>, <?= $getDefaultAddress['AddressPostalCode']; ?></small></span></li>
                        <li><span><small><?= $getDefaultAddress['AddressCountry']; ?></small></span></li>
                    <?php else : ?>
                        <small><?= $language['title_billing_address_info']; ?></small>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        </div>
        <?php if ($countBillingAddress > 0) : ?>
            <a href="<?= base_url($billingAddress); ?>" class="badge rounded-pill bg-dark float-right"><?= $language['title_change_address']; ?></a>
        <?php else : ?>
            <?php if ($countDefaultAddress > 0) : ?>
                <a href="<?= base_url($defaultAddress); ?>" class="badge rounded-pill bg-dark float-right"><?= $language['title_change_address']; ?></a>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <div class="col-lg-6 col-md-6">
        <div class="mt-2">
            <h6><?= $language['title_shipping_address']; ?></h6>
            <ul class="account-list">
                <?php if ($countShippingAddress > 0) : ?>
                    <li><span><small><?= $getShippingAddress['AddressFirstName']; ?> <?= $getShippingAddress['AddressLastName']; ?></small></span></li>
                    <li><span><small><?= $getShippingAddress['AddressPhone']; ?></small></span></li>
                    <li><span><small><?= $getShippingAddress['AddressStreet']; ?></small></span></li>
                    <li><span><small><?= $getShippingAddress['AddressCity']; ?>, <?= $getShippingAddress['AddressState']; ?>, <?= $getShippingAddress['AddressPostalCode']; ?></small></span></li>
                    <li><span><small><?= $getShippingAddress['AddressCountry']; ?></small></span></li>
                <?php else : ?>
                    <?php if ($countDefaultAddress > 0) : ?>
                        <li><span><small><?= $getDefaultAddress['AddressFirstName']; ?> <?= $getDefaultAddress['AddressLastName']; ?></small></span></li>
                        <li><span><small><?= $getDefaultAddress['AddressPhone']; ?></small></span></li>
                        <li><span><small><?= $getDefaultAddress['AddressStreet']; ?></small></span></li>
                        <li><span><small><?= $getDefaultAddress['AddressCity']; ?>, <?= $getDefaultAddress['AddressState']; ?>, <?= $getDefaultAddress['AddressPostalCode']; ?></small></span></li>
                        <li><span><small><?= $getDefaultAddress['AddressCountry']; ?></small></span></li>
                    <?php else : ?>
                        <small><?= $language['title_shipping_address_info']; ?></small>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        </div>
        <?php if ($countShippingAddress > 0) : ?>
            <a href="<?= base_url($shippingAddress); ?>" class="badge rounded-pill bg-dark float-right"><?= $language['title_change_address']; ?></a>
        <?php else : ?>
            <?php if ($countDefaultAddress > 0) : ?>
                <a href="<?= base_url($defaultAddress); ?>" class="badge rounded-pill bg-dark float-right"><?= $language['title_change_address']; ?></a>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>