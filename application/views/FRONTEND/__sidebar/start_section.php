<section class="main-banner-with-categories">
    <div class="container">
        <div class="user-actions page-title-content mb-1">
            <ul style="margin-top: unset;">
                <li><a href="<?= base_url(); ?>"><small>Home</small></a></li>
                <?php if ($this->uri->segment(3) == 'new-address' || $this->uri->segment(3) == 'address') : ?>
                    <li><small><?= $language['title_list_address']; ?></small></li>
                <?php elseif ($this->uri->segment(3) == 'information') : ?>
                    <li><small><?= $language['title_account_information']; ?></small></li>
                <?php elseif ($this->uri->segment(3) == 'edit-address') : ?>
                    <li><a href="<?= base_url('customer/account/address'); ?>"><small>My Address</small></a></li>
                    <li><small><?= $language['title_change_address']; ?></small></li>
                <?php elseif ($this->uri->segment(3) == 'change-email') : ?>
                    <li><a href="<?= base_url('customer/account/information'); ?>"><small>Account Information</small></a></li>
                    <li><small><?= $language['title_change_email']; ?></small></li>
                <?php elseif ($this->uri->segment(3) == 'change-password') : ?>
                    <li><a href="<?= base_url('customer/account/information'); ?>"><small>Account Information</small></a></li>
                    <li><small><?= $language['title_change_password']; ?></small></li>
                <?php else : ?>
                    <li><small><?= $language['title_my_account']; ?></small></li>
                <?php endif; ?>
            </ul>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="megamenu-container">
                    <div class="megamenu-title">
                        <?= $language['title_account_setting']; ?>
                    </div>

                    <div class="megamenu-category">
                        <ul class="side nav">
                            <?php
                            if ($getLang) {
                                $myAccount          = 'customer/account?lang=' . $getLang;
                                $newAddress         = 'customer/account/new-address?lang=' . $getLang;
                                $editAddress        = 'customer/account/address?lang=' . $getLang;
                                $accountInformation = 'customer/account/information?lang=' . $getLang;
                            } else {
                                $myAccount          = 'customer/account';
                                $newAddress         = 'customer/account/new-address';
                                $editAddress        = 'customer/account/address';
                                $accountInformation = 'customer/account/information';
                            }
                            ?>
                            <li class="nav-item">
                                <a href="<?= base_url($myAccount); ?>" class="nav-link"><?= $language['title_my_account']; ?></a>
                            </li>

                            <?php if ($countAddress < 1) : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url($newAddress); ?>" class="nav-link"><?= $language['title_list_address']; ?></a>
                                </li>
                            <?php else : ?>
                                <li class="nav-item <?= ($this->uri->segment(3) == 'edit-address' ? 'active' : ''); ?>">
                                    <a href="<?= base_url($editAddress); ?>" class="nav-link"><?= $language['title_list_address']; ?></a>
                                </li>
                            <?php endif; ?>

                            <li class="nav-item <?= ($this->uri->segment(3) == 'change-email' || $this->uri->segment(3) == 'change-password' ? 'active' : ''); ?>">
                                <a href="<?= base_url($accountInformation); ?>" class="nav-link"><?= $language['title_account_information']; ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12">