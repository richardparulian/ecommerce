<style>
    .account-list {
        list-style-type: none;
        padding-left: unset
    }

    .my-table {
        text-align: center;
        vertical-align: middle;
    }

    .my-table-width {
        width: 12%;
    }
</style>

<?= $this->session->flashdata('success'); ?>
<?= $this->session->flashdata('error'); ?>

<?php
if ($getLang) {
    $newAddress     = 'customer/account/new-address?lang=' . $getLang;
} else {
    $newAddress     = 'customer/account/new-address';
}
?>

<div class="mt-2 text-uppercase">
    <h3><?= $language['title_list_address']; ?></h3>
</div>

<div class="mb-5 row">
    <div class="col-lg-6 col-md-6">
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
    </div>
</div>

<div class="mt-2">
    <h3><?= $language['title_create_new_address']; ?></h3>
</div>

<div class="mb-5">
    <?php if ($countAddress < 1) : ?>
        <small><?= $language['title_address_info']; ?></small>
    <?php else : ?>
        <form>
            <div class="">
                <table id="example" class="table table-striped nowrap">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" class="my-table"><small><?= $language['title_first_name']; ?></small></th>
                            <th scope="col" class="my-table"><small><?= $language['title_last_name']; ?></small></th>
                            <th scope="col" class="my-table"><small><?= $language['title_company']; ?></small></th>
                            <th scope="col" class="my-table"><small><?= $language['title_phone_number']; ?></small></th>
                            <th scope="col" class="my-table"><small><?= $language['title_street_address']; ?></small></th>
                            <th scope="col" class="my-table"><small><?= $language['title_city']; ?></small></th>
                            <th scope="col" class="my-table"><small><?= $language['title_country']; ?></small></th>
                            <th scope="col" class="my-table"><small><?= $language['title_state']; ?></small></th>
                            <th scope="col" class="my-table"><small><?= $language['title_postcode']; ?></small></th>
                            <th scope="col" class="my-table"><small>#</small></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($getAddress as $address) : ?>
                            <tr>
                                <td><small><?= $address['AddressFirstName']; ?></small></td>
                                <td><small><?= $address['AddressLastName']; ?></small></td>
                                <td><small><?= $address['AddressCompany']; ?></small></td>
                                <td><small><?= $address['AddressPhone']; ?></small></td>
                                <td><small><?= smart_wordwrap($address['AddressStreet'], 30, "<br>\n"); ?></small></td>
                                <td><small><?= $address['AddressCity']; ?></small></td>
                                <td><small><?= $address['AddressCountry']; ?></small></td>
                                <td><small><?= $address['AddressState']; ?></small></td>
                                <td><small><?= $address['AddressPostalCode']; ?></small></td>
                                <td>
                                    <?php
                                    if ($getLang) {
                                        $editAddress    = 'customer/account/edit-address/' . encrypt_url($address['AddressID']) . '?lang=' . $getLang;
                                    } else {
                                        $editAddress    = 'customer/account/edit-address/' . encrypt_url($address['AddressID']);
                                    }
                                    ?>
                                    <a href="<?= base_url($editAddress); ?>" class="btn btn-sm btn-warning"><i class="bx bx-pencil"></i></a>
                                    <button type="button" class="btn btn-sm btn-danger" id="delete-address" data-id="<?= $address['AddressID']; ?>" data-firstname="<?= $address['AddressFirstName']; ?>" data-lastname="<?= $address['AddressLastName']; ?>" data-bs-toggle="modal" data-bs-target="#deleteAddress"><i class="bx bx-trash"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </form>
    <?php endif; ?>
</div>

<div class="mb-4 row">
    <div class="col-sm-10">
        <a href="<?= base_url($newAddress) ?>" class="default-btn"><i class='bx bx-plus'></i> <?= $language['title_add_address']; ?></a>
    </div>
</div>