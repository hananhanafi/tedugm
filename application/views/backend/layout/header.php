<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard | <?= $this->session->userdata('team_name')  ?> Team</title>
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url()?>assets/images/favicons/ted184T.png">
    <link rel="mask-icon" href="<?php echo base_url()?>assets/images/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url()?>assets/images/favicons/ted184T.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/images/favicons/ted184T.png">

    <!-- Bootstrap core CSS-->
    <link href="<?= base_url('assets/backend/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/backend/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/lightcase/css/lightcase.css') ?>">
    


    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/backend/') ?>css/sb-admin.css" rel="stylesheet">
    <style>

    </style>
  </head>
  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="#"><?= $this->session->userdata('team_name')?></a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <div class="d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <a href="<?= site_url('logout') ?>"</a><button class="btn btn-danger">Logout</button></a>
      </div>

      <!-- Navbar -->   
    </nav>

    <div id="wrapper">

      <!-- Admin Sidebar -->
       <?php if ($this->session->userdata('role_id') == 1): ?>
        <ul class="sidebar navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="<?= site_url('admin/dashboard') ?>">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span>
            </a>
          </li>
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-fw fa-folder"></i>
              <span>Science Project</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
              <a class="dropdown-item" href="<?= site_url('admin/science-project/peserta') ?>">Data Peserta</a>
              <a class="dropdown-item" href="<?= site_url('admin/science-project/abstrak') ?>">Abstrak</a>
              <a class="dropdown-item" href="<?= site_url('admin/science-project/pembayaran') ?>">Pembayaran</a>
              <a class="dropdown-item" href="<?= site_url('admin/science-project/proposal') ?>">Proposal</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-fw fa-folder"></i>
              <span>Line Follower &amp; Sumo Robot</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
              <a class="dropdown-item" href="<?= site_url('admin/competition/peserta') ?>">Data Peserta</a>
              <a class="dropdown-item" href="<?= site_url('admin/competition/pembayaran') ?>">Pembayaran</a>
            </li>
        </ul>

        <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= site_url('admin/').$this->uri->segment(2) ?>"><?= $this->uri->segment(2) ?></a> 
            </li>
            <li class="breadcrumb-item active">
              <?= $this->uri->segment(3) ?>
            </li>
          </ol>
      <?php endif ?>

      <!-- Science project Sidebar -->
      <?php if ($this->session->userdata('role_id') == 2): ?>
        <ul class="sidebar navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="<?= site_url('science-project') ?>">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('science-project/anggota') ?>">
              <i class="fas fa-fw fa-chart-area"></i>
              <span>Data Anggota</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('science-project/abstrak') ?>">
              <i class="fas fa-fw fa-table"></i>
              <span>Submit Abstrak</span></a>
          </li>
       
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('science-project/pembayaran') ?>">
              <i class="fas fa-fw fa-table"></i>
              <span>Pembayaran</span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('science-project/proposal') ?>">
              <i class="fas fa-fw fa-table"></i>
              <span>Proposal</span></a>
          </li>
        
        </ul>

        <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= site_url('science-project')?>"><?= $this->uri->segment(1) ?></a> 
            </li>
            <li class="breadcrumb-item active">
              <?= $this->uri->segment(2) ?>
            </li>
          </ol>
      <?php endif ?>

       <?php if ($this->session->userdata('role_id') == 3): ?>
        <ul class="sidebar navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="<?= site_url('competition') ?>">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('competition/anggota') ?>">
              <i class="fas fa-fw fa-chart-area"></i>
              <span>Data Anggota</span></a>
          </li>
      
       
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('competition/pembayaran') ?>">
              <i class="fas fa-fw fa-table"></i>
              <span>Pembayaran</span></a>
          </li>

        
        </ul>

        <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= site_url('competition')?>"><?= $this->uri->segment(1) ?></a> 
            </li>
            <li class="breadcrumb-item active">
              <?= $this->uri->segment(2) ?>
            </li>
          </ol>
      <?php endif ?>

      