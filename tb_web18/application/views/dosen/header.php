<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/img/apple-icon.png')?>">
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/favicon.ico')?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Pengajuan Judul Tugas Akhir - <?php echo $status?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- CSS Files -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/light-bootstrap-dashboard.css?v=2.0.1')?>" rel="stylesheet" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url('assets/datatables/datatables.min.css') ?>">
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-image="<?php echo base_url()?>assets/img/sidebar-6.jpg" data-color="">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="#" class="simple-text">
                        Pengajuan Judul TUGAS AKHIR
                    </a>
                </div>
                <ul class="nav">
                    <li>
                        <a class="nav-link" href="dashboard.html">
                            <i class="nc-icon nc-chart-pie-36"></i>
                            <p>Beranda</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./user.html">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Dosen</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url('dosen/mhsview')?>">
                            <i class="nc-icon nc-single-02"></i>
                            <p>Mahasiswa</p>
                        </a>  
                    </li>
                    <li>
                        <a class="nav-link" href="./typography.html">
                            <i class="nc-icon nc-notes"></i>
                            <p>Usulan</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./icons.html">
                            <i class="nc-icon nc-single-copy-04"></i>
                            <p>Ulasan</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./maps.html">
                            <i class="nc-icon nc-badge"></i>
                            <p>Bimbingan</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./notifications.html">
                            <i class="nc-icon nc-settings-tool-66"></i>
                            <p>Pengaturan</p>
                        </a>
                    </li>
                    <li class="nav-item active active-pro">
                        <a class="nav-link active" href="dosen/logout">
                            <i class="nc-icon nc-button-power"></i>
                            <p>Keluar</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class=" container-fluid  ">
                    <a class="navbar-brand"> <?php
                                echo $title;
                            ?> </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">

                        <ul class="navbar-nav ml-auto">
                            <?php
                            switch ($nav) {
                                case "mhsview" || "mhstambah" || "mhsupload" :
                                        echo "<li class='nav-item'>
                                            <a class='nav-link' href='".base_url('dosen/mhsview')."'>
                                                <span class='no-icon'>Lihat Data</span>
                                            </a>
                                        </li>";
                                        echo "<li class='nav-item'>
                                            <a class='nav-link' href='".base_url('dosen/mhstambah')."'>
                                                <span class='no-icon'>Tambah Data</span>
                                            </a>
                                        </li>";
                                        echo "<li class='nav-item'>
                                            <a class='nav-link' href='".base_url('dosen/mhsupload')."'>
                                                <span class='no-icon'>Unggah Data</span>
                                            </a>
                                        </li>";
                                    break;

                                default:
                                    echo "<li class='nav-item'>
                                        <a class='nav-link' href='#'>
                                            <span class='no-icon'>Kosong</span>
                                        </a>
                                    </li>";
                                    break;
                                }
                            ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="no-icon"><?php echo $status?></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Pengaturan</a>
                                    <div class="divider"></div>
                                    <a class="dropdown-item" href="<?php echo base_url('dosen/logout')?>">Keluar</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
           