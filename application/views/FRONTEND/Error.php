<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Links of CSS files -->
    <link rel="stylesheet" href="<?= base_url('@static/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('@static/css/flaticon.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('@static/css/animate.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('@static/css/owl.carousel.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('@static/css/boxicons.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('@static/css/meanmenu.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('@static/css/nice-select.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('@static/css/fancybox.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('@static/css/rangeSlider.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('@static/css/magnific-popup.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('@static/css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('@static/css/responsive.css'); ?>">
    <!-- Title -->
    <title><?= xss_clean($title); ?> - <?= xss_clean($this->settings->site_title); ?></title>

    <link rel="icon" type="image/png" href="<?= base_url('@static/img/favicon.png'); ?>">
</head>

<body>
    <!-- Start 404 Error Area -->
    <section class="error-area ptb-70">
        <div class="container">
            <div class="error-content">
                <img src="<?= base_url('@static/img/error.png'); ?>" alt="image">
                <h3>Error 404 : Page Not Found</h3>
                <p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
                <a href="<?= base_url(); ?>" class="default-btn"><i class="flaticon-left-chevron"></i> Back to Homepage</a>
            </div>
        </div>
    </section>
    <!-- End 404 Error Area -->
</body>