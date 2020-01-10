<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KUN Center - <?php echo $pagetitle; ?></title>
    <link rel="icon" href="<?php echo base_url('assets/img/favicon-kuncenter.png'); ?>" type="image/png">

    <link rel="stylesheet" href="<?php echo base_url('assets/vendors/bootstrap/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendors/fontawesome/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendors/themify-icons/themify-icons.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendors/linericon/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendors/owl-carousel/owl.theme.default.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendors/owl-carousel/owl.carousel.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendors/flat-icon/font/flaticon.css'); ?>">
    <!-- <link rel="stylesheet" href="<?php //echo base_url('assets/vendors/nice-select/nice-select.css'); ?>"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bs-datepicker/css/bootstrap-datepicker.min.css'); ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>

<body class="bg-shape">

    <!--================ Header Menu Area start =================-->
    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container box_1620">
                    <a class="navbar-brand logo_h" href="<?php echo base_url(); ?>"><img src="<?php echo base_url('assets/img/logo-publik-kuncenter.png'); ?>" width="50%" alt="kun center logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav justify-content-end">
                            <li class="nav-item <?php if(isset($page) && $page == 'home'){ echo 'active';} ?>"><a class="nav-link" href="<?php echo base_url(); ?>">Home</a></li>
                            <?php if ($this->session->userdata('status') == "login") { ?>
                                <li class="nav-item <?php if(isset($page) && $page == 'biodata'){ echo 'active';} ?>"><a class="nav-link" href="<?php echo base_url('biodata'); ?>">Biodata</a></li>
                                <li class="nav-item submenu dropdown <?php if(isset($page) && $page == 'perjalanan'){ echo 'active';} ?>">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Perjalanan</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('perjalanan/add_perjalanan'); ?>">Tambah Perjalanan</a>
                                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('perjalanan'); ?>">Historty Perjalanan</a>
                                    </ul>
                                </li>
                            <?php } ?>
                        </ul>

                        <div class="nav-right text-center text-lg-right py-4 py-lg-0">
                            <?php if ($this->session->userdata('status') == "login") { ?>
                                <span class="txt-scd">
                                    <img width="50px" src="<?php echo base_url('assets/img/user.png'); ?>" alt="">
                                    <?php echo $this->session->userdata('nama'); ?> | <a href="<?php echo base_url('login/logout'); ?>">Logout</a>
                                </span>
                            <?php } else { ?>
                                <a class="btn btn-sm button" href="<?php echo base_url('auth'); ?>">Login</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Menu Area =================-->