<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?= 'CoffeeShop - ' . esc($title) ?></title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= csrf_meta()?>

    <!-- Google Font: Thai Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('asset/plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('asset/css/adminlte.min.css') ?>"> 
    <!-- <link rel="stylesheet" href="<?php /*echo base_url('asset/css/rtl/adminlte.rtl.min.css')*/ ?>">  -->
	 
    <!-- SweetAlert2 Bootstrap or Dark -->
    <link rel="stylesheet" href="<?= base_url('asset/css/sweetalert2-dark.min.css') ?>">
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- DataTables -->
 	<link rel="stylesheet" href="<?= base_url('asset/plugins/datatables/DataTables-1.11.3/css/dataTables.bootstrap5.min.css') ;?>">
	<link rel="stylesheet" href="<?= base_url('asset/plugins/datatables/Responsive-2.2.9/css/responsive.bootstrap5.min.css') ;?>"> 

    <link rel="stylesheet" href="<?= base_url('asset/plugins/datatables/StateRestore-1.1.1/css/stateRestore.bootstrap5.min.css') ?>">
    <!-- Dark style -->
    <!-- <link rel="stylesheet" href="<?php /*echo base_url('asset/css/dark/adminlte-dark-addon.min.css')*/ ?>">   -->

</head>