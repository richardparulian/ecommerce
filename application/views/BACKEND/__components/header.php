<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <title><?= xss_clean($title); ?> - <?= xss_clean($this->settings->site_title); ?></title>

    <!-- Favicon -->
    <link rel="icon" href="<?php echo ('@static_backend/img/Icon Apps_Gray_Home.ico'); ?>" type="image/ico">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="<?php echo base_url('@static_backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url('@static_backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo base_url('@static_backend/plugins/jqvmap/jqvmap.min.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('@static_backend/css/adminlte.min.css'); ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="<?php echo base_url('@static_backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url('@static_backend/plugins/daterangepicker/daterangepicker.css'); ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo base_url('@static_backend/plugins/summernote/summernote-bs4.min.css'); ?>">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="<?php echo base_url('@static_backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet"
        href="<?php echo base_url('@static_backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url('@static_backend/plugins/select2/css/select2.min.css'); ?>">
    <link rel="stylesheet"
        href="<?php echo base_url('@static_backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet"
        href="<?php echo base_url('@static_backend/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css'); ?>">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="<?php echo base_url('@static_backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet"
        href="<?php echo base_url('@static_backend/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css'); ?>">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="<?php echo base_url('@static_backend/plugins/bs-stepper/css/bs-stepper.min.css'); ?>">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="<?php echo base_url('@static_backend/plugins/dropzone/min/dropzone.min.css'); ?>">
    <!-- SweetAlert2 -->
    <link rel="stylesheet"
        href="<?php echo base_url('@static_backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'); ?>">
        
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
    

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">