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

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="<?php echo base_url()?>resource/vendors/bundle.js"></script>
</head>
<?php 
//   $userInfo = userInfo($this->session->userdata['EMIRATES']['userId']);
//   if($userInfo->link != ''){
//     $link = $userInfo->link;
//     $target = 'target="_blank"';
//   } else {
//     $link = base_url().'admin/dashboard';
//     $target = '';
//   }
//   if($userInfo->profile_pic != ''){
//     $profile_pic = base_url().'resource/images/user_images/'.$userInfo->profile_pic;
//   } else {
//     $profile_pic = base_url().'assets/media/image/user/man_avatar3.jpg';
//   }
$profile_pic = base_url().'assets/media/image/user/man_avatar3.jpg';
?>
<body class="hidden-navigation">
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

                <?php /* ?><div class="header-logo">
                    <a href="<?php echo $link?>" <?php echo $target?>>
                        <img class="logo" style="width:150px" src="<?php echo $company_logo?>" alt="logo">
                    </a>
                </div><?php */ ?>
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
                            <span class="nav-link-icon">
                            <i class="fa fa-users"></i>
                            </span>
                            <span>Staffs</span>
                        </a>
                        <ul>
                            <li>
                                <a href="<?php echo base_url().'admin/staff/add_staff'?>">
                                    <span>Add Staff</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/staff'?>">
                                    <span>Manage Staff</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/staff/registartion'?>">
                                    <span>Staff Registration</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <span class="nav-link-icon">
                            <i class="fa fa-users"></i>
                            </span>
                            <span>Clients</span>
                        </a>
                        <ul>
                            <li>
                                <a href="<?php echo base_url().'admin/client/add_client'?>">
                                    <span>Add Client</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/client'?>">
                                    <span>Manage Client</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <span class="nav-link-icon">
                            <i class="fa fa-users"></i>
                            </span>
                            <span>Business Partners</span>
                        </a>
                        <ul>
                            <li>
                                <a href="<?php echo base_url().'admin/client/businesspartner'?>">
                                    <span>Manage Business Partners</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/client/appointments'?>">
                                    <span>Manage Appointments</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/client/partner-estimates'?>">
                                    <span>Business Partner Estimates</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/client/nonpartner-estimates'?>">
                                    <span>Non Business Partner Estimates</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <span class="nav-link-icon">
                            <i class="fa fa-product-hunt" aria-hidden="true"></i>
                            </span>
                            <span>Inventory</span>
                        </a>
                        <ul>
                            <li>
                                <a href="<?php echo base_url().'admin/inventory/add_inventory'?>">
                                    <span>Add Product</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/inventory'?>">
                                    <span>Manage Inventory</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <span class="nav-link-icon">
                            <i class="fa fa-calendar"></i>
                            </span>
                            <span>Appointments</span>
                        </a>
                        <ul>
                            <li>
                                <a href="<?php echo base_url().'admin/event/add_appointment?type=appointment'?>">
                                    <span>Add Appointment</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/appointment'?>">
                                    <span>Manage Appointment</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <span class="nav-link-icon">
                            <i class="fa fa-tasks"></i>
                            </span>
                            <span>Job Posting</span>
                        </a>
                        <ul>
                            <li>
                                <a href="<?php echo base_url().'admin/job/add_job'?>">
                                    <span>Add Job</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/jobs'?>">
                                    <span>Manage Jobs</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <span class="nav-link-icon">
                            <i class="fa fa-credit-card"></i>
                            </span>
                            <span>Subscription</span>
                        </a>
                        <ul>
                            <li>
                                <a href="<?php echo base_url().'admin/subscription/package'?>">
                                    <span>Packages</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/jobs'?>">
                                    <span>Manage Jobs</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <span class="nav-link-icon">
                            <i class="fa fa-tasks"></i>
                            </span>
                            <span>Manage Projects</span>
                        </a>
                        <ul>
                            <li>
                                <a href="<?php echo base_url().'admin/projects'?>">
                                    <span>Manage Projects</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <span class="nav-link-icon">
                            <i class="fa fa-cog"></i>
                            </span>
                            <span>Admin Settings</span>
                        </a>
                        <ul>
                            <li>
                                <a href="<?php echo base_url().'admin/setting/manage_admin_users'?>">
                                    <span>Manage Users</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/setting/manage_title'?>">
                                    <span>Manage Title</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/setting/manage_sales_rep'?>">
                                    <span>Manage Sales Rep</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/setting/shared_files'?>">
                                    <span>Shared Files</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/setting/email_settings'?>">
                                    <span>Email Settings</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/setting/email_templates'?>">
                                    <span>Email Templates</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <span class="nav-link-icon">
                            <i class="fa fa-cog"></i>
                            </span>
                            <span>Applications</span>
                        </a>
                        <ul>
                            <li>
                                <a href="https://www.google.com/drive/" target="_blank">
                                    <span>Google Drive</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://onedrive.live.com/about/en-us/signin/" target="_blank">
                                    <span>One Drive</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://app.qbo.intuit.com/app/login" target="_blank">
                                    <span>Quick Books</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.paychex.com/" target="_blank">
                                    <span>Paychex Synchronization</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'admin/timesheet'?>">
                            <span class="nav-link-icon">
                                <i class="fa fa-clock-o"></i>
                            </span>    
                            <span>Timesheet</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'admin/livenotes'?>">
                            <span class="nav-link-icon">
                                <i class="fa fa-clock-o"></i>
                            </span>    
                            <span>Live Notes</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'admin/payroll'?>">
                            <span class="nav-link-icon">
                                <i class="fa fa-credit-card"></i>
                            </span>    
                            <span>Payroll</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="nav-link-icon">
                            <i class="fa fa-trash"></i>
                            </span>
                            <span>Trash</span>
                        </a>
                        <ul>
                            <li>
                                <a href="<?php echo base_url().'admin/trash/staff-trash'?>">
                                    <span>Staff Trash</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/trash/client-trash'?>">
                                    <span>Client Trash</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/trash/inventory-trash'?>">
                                    <span>Inventory Trash</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/trash/appointment-trash'?>">
                                    <span>Appointment Trash</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/trash/timesheet-trash'?>">
                                    <span>Timesheet Trash</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/trash/payroll-trash'?>">
                                    <span>Payroll Trash</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'admin/chat'?>">
                            <span class="nav-link-icon">
                                <i class="fa fa-comments-o"></i>
                            </span>    
                            <span>Chat System</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end::navigation -->