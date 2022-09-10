<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel - Emirates Valley</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url()?>resource/images/favicon.png"/>

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo base_url()?>resource/vendors/bundle.css" type="text/css">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- App css -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/app.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url()?>resource/vendors/select2/css/select2.min.css" type="text/css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="<?php echo base_url()?>resource/vendors/bundle.js"></script>
    <script src="<?php echo base_url()?>assets/js/examples/toast.js"></script>
</head>
<?php 
  $userInfo = userInfo($this->session->userdata['EMIRATES']['userId']);
  if($userInfo->user_image != ''){
    $profile_pic = base_url().'resource/images/user_images/'.$userInfo->user_image;
  } else {
    $profile_pic = base_url().'assets/media/image/user/man_avatar3.jpg';
  }
?>
<body>
<!-- Preloader -->
<div class="preloader">
    <div class="preloader-icon"></div>
    <span>Loading...</span>
</div>
<!-- ./ Preloader -->
<!-- Layout wrapper -->
<div class="layout-wrapper">

    <!-- Header -->
    <div class="header d-print-none">
        <div class="header-container">
            <div class="header-left">
                <div class="navigation-toggler">
                    <a href="#" data-action="navigation-toggler">
                        <i data-feather="menu"></i>
                    </a>
                </div>

                <div class="header-logo">
                    <a href="<?php echo $link?>" <?php echo $target?>>
                        <img class="logo" style="width:100px" src="<?php echo $profile_pic?>" alt="Emirates Logo">
                    </a>
                </div>
            </div>

            <div class="header-body">
                <div class="header-body-left"></div>

                <div class="header-body-right">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown d-none d-md-block">
                            <a href="#" class="nav-link" title="Fullscreen" data-toggle="fullscreen">
                                <i class="maximize" data-feather="maximize"></i>
                                <i class="minimize" data-feather="minimize"></i>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" title="User menu" data-toggle="dropdown">
                                <figure class="avatar avatar-sm">
                                    <img src="<?php echo $profile_pic?>"
                                         class="rounded-circle"
                                         alt="avatar">
                                </figure>
                                <span class="ml-2 d-sm-inline d-none"><?php echo $userInfo->username?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                                <div class="text-center py-4">
                                    <figure class="avatar avatar-lg mb-3 border-0">
                                        <img src="<?php echo $profile_pic?>"
                                             class="rounded-circle" alt="image">
                                    </figure>
                                    <h5 class="text-center"><?php echo $userInfo->username?></h5>
                                    <div class="mb-3 small text-center text-muted"><?php echo $userInfo->email?></div>
                                </div>
                                <div class="list-group">
                                    <a href="<?php echo base_url().'admin/profile'?>" class="list-group-item">View Profile</a>
                                    <a href="<?php echo base_url().'admin/logout'?>" class="list-group-item text-danger">Sign Out!</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item header-toggler">
                    <a href="#" class="nav-link">
                        <i data-feather="arrow-down"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- ./ Header -->
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- begin::navigation -->
        <div class="navigation">
            <div class="navigation-header">
                <span>Navigation</span>
                <a href="#">
                    <i class="ti-close"></i>
                </a>
            </div>
            <div class="navigation-menu-body">
                <ul>
                    <li>
                        <a href="<?php echo base_url().'admin/dashboard'?>">
                            <span class="nav-link-icon">
                                <i data-feather="pie-chart"></i>
                            </span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="fa fa-globe"></span>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;Website Frontend</span>
                        </a>
                        <ul style="display:block">
                            <li>
                                <a href="<?php echo base_url().'admin/open/file'?>"><i class="fa fa-file"></i>&nbsp;Open File Management</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/slider/listing'?>"><i class="fa fa-sliders"></i>&nbsp;Slider Management</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/logo/listing'?>"><i class="fa fa-picture-o"></i>&nbsp;Logo Management</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/video/listing'?>"><i class="fa fa-video-camera"></i>&nbsp;Gallery Management</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/team/listing'?>"><i class="fa fa-users"></i>&nbsp;Team Management</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/dealer/listing'?>"><i class="fa fa-users"></i>&nbsp;Dealer Management</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/payment/listing'?>"><i class="fa fa-credit-card"></i>&nbsp;Payment Plan Management</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/news/listing'?>"><i class="fa fa-newspaper-o"></i>&nbsp;News Management</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/testimonial/listing'?>"><i class="fa fa-quote-left"></i>&nbsp;Testimonial Management</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/feature/listing'?>"><i class="fa fa-bars"></i>&nbsp;Feature Management</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-address-book"></i>&nbsp;Contact Us Management</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/about'?>"><i class="fa fa-info-circle"></i>&nbsp;About Management</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/social-media'?>"><i class="fa fa fa-instagram"></i>&nbsp;Social Media Setting</a>
                            </li>
                        </ul>
                    </li>
                </ul>    
            </div>
        </div>
        <!-- end::navigation -->