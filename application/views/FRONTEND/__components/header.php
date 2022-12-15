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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
  <!-- Title -->
  <title><?= xss_clean($title); ?> - <?= xss_clean($this->settings->site_title); ?></title>
  <meta name="title" content="<?= xss_clean($title); ?> - <?= xss_clean($this->settings->site_title); ?>">
  <meta name="description" content="<?= xss_clean($description); ?> - <?= xss_clean($this->settings->site_title); ?>">
  <meta name="keywords" content="<?= xss_clean($keywords); ?> - <?= xss_clean($this->settings->site_title); ?>">
  <meta property="og:locale" content="en-US" />
  <meta property="og:site_name" content="PT. Kurnia Teknologi Indonesia" />
  <meta property="og:title" content="<?= xss_clean($title); ?> - <?= xss_clean($this->settings->site_title); ?>" />
  <meta property="og:description" content="<?= xss_clean($description); ?> - <?= xss_clean($this->settings->site_title); ?>" />
  <meta property="og:type" content="<?= xss_clean(isset($og_type) ? $og_type : ''); ?>" />
  <meta property="og:url" content="<?= xss_clean(isset($og_url) ? $og_url : ''); ?>" />
  <meta property="og:image" content="<?= xss_clean(isset($og_image) ? $og_image : ''); ?>" />

  <link rel="icon" type="image/png" href="<?= base_url('@static/img/favicon.png'); ?>">
</head>

<body>
  <div class="cover-progress">
    <div class="progress-container-body mt-2">
      <div class="loadingio-spinner-double-ring-ohgul5e72u">
        <div class="ldio-y7hfgd0ksn">
          <div></div>
          <div></div>
          <div>
            <div></div>
          </div>
          <div>
            <div></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view("FRONTEND/__components/top"); ?>