<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!-- Start Top Header Area -->
<div class="top-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-7">
                <ul class="top-header-contact-info">
                    <li><i class='bx bx-phone-call'></i> <a href="tel:<?= hp($getBasicConfiguration['ConfigPhone']); ?>"><small><?= $getBasicConfiguration['ConfigPhone']; ?> Ext. <?= $getBasicConfiguration['ConfigExt']; ?></small></a></li>
                    <li><i class='bx bx-map'></i><a href="<?= $getBasicConfiguration['ConfigAddressUrl']; ?>" target="_blank"><small><?= $getBasicConfiguration['ConfigAddress']; ?></small></a></li>
                </ul>
            </div>

            <div class="col-lg-5 col-md-5">
                <ul class="top-header-menu">
                    <li>
                        <div class="dropdown language-switcher d-inline-block">
                            <?php if ($getLang == 'en') : ?>
                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="<?= base_url($getLanguage[0]->flag_path); ?>" class="shadow-sm" alt="flag">
                                    <small> <?= $getLanguage[0]->name; ?><i class="bx bx-chevron-down"></i></small>
                                </button>
                            <?php else : ?>
                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="<?= base_url($getLanguage[1]->flag_path); ?>" class="shadow-sm" alt="flag">
                                    <small> <?= $getLanguage[1]->name; ?><i class="bx bx-chevron-down"></i></small>
                                </button>
                            <?php endif; ?>

                            <?php if ($getLang == 'en') : ?>
                                <div class="dropdown-menu">
                                    <?php
                                    $check1 = $this->input->get('result');
                                    $check2 = $this->input->get('sort');
                                    $check3 = $this->input->get('filter');
                                    $check4 = $this->input->get('min-price');
                                    $check5 = $this->input->get('max-price');

                                    if ($check1 || $check2 || $check3 || $check4 || $check5) {
                                        $current_url = explode("&&", $_SERVER['REQUEST_URI']);
                                    } else {
                                        $current_url = explode("?", $_SERVER['REQUEST_URI']);
                                    }
                                    ?>
                                    <a href="<?= base_url($current_url[0]); ?>" class="dropdown-item d-flex align-items-center">
                                        <img src="<?= base_url($getLanguage[1]->flag_path); ?>" class="shadow-sm" alt="flag" style="margin-right: 5px;">
                                        <small> <?= $getLanguage[1]->name; ?></small>
                                    </a>
                                </div>
                            <?php else : ?>
                                <div class="dropdown-menu">
                                    <?php
                                    $check1 = $this->input->get('result');
                                    $check2 = $this->input->get('sort');
                                    $check3 = $this->input->get('filter');
                                    $check4 = $this->input->get('min-price');
                                    $check5 = $this->input->get('max-price');

                                    if ($check1 || $check2 || $check3 || $check4 || $check5) {
                                        $url = "$_SERVER[REQUEST_URI]&&lang=";
                                    } else {
                                        $url = "$_SERVER[REQUEST_URI]?lang=";
                                    }
                                    ?>
                                    <a href="<?= base_url($url . $getLanguage[0]->short_form); ?>" class="dropdown-item d-flex align-items-center">
                                        <img src="<?= base_url($getLanguage[0]->flag_path); ?>" class="shadow-sm" alt="flag" style="margin-right: 5px;">
                                        <small><?= $getLanguage[0]->name; ?></small>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Top Header Area -->