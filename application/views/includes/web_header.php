<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Emirates Valley</title>
  <meta content="Due to Increase in demand for new housing units in the country, Emirates Valley (Pvt) Limited planned to build a world class housing project." name="description">
  <meta content="Emirates Valley,Emirates valley housing society,Emirates valley booking,Emirates valley plot rates,Emirates valley islamabad,Emirates valley housing project" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url()?>assets/web/assets/img/favicon.png" rel="icon">
  <link href="<?php echo base_url()?>assets/web/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url()?>assets/web/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/web/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/web/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/web/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/web/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/web/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/web/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/web/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url()?>assets/web/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Multi - v4.8.1
  * Template URL: https://bootstrapmade.com/multi-responsive-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
<?php 
$logo=json_decode(get_active_logo(),true);
//echo "<pre>";print_r($logo);
$logo_active='1661450111android-chrome-192x192.png';
foreach($logo as $vals){
$logo_active=$vals['logo_image'];
}
?>
      <h1 class="logo"><a href="<?php echo base_url()?>"><img class="logo" src="<?php echo base_url()?>resource/images/other_images/<?php echo $logo_active; ?>" alt="Emirates Valley"></a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="<?php echo base_url()?>">Home</a></li>
          <li><a class="nav-link scrollto" href="<?php echo base_url()?>about-us">About Us</a></li>
          <li><a class="nav-link scrollto" href="<?php echo base_url()?>payment-plan">Payment Plan</a></li>
          <li><a class="nav-link scrollto " href="#services">Features</a></li>
          <li><a class="nav-link scrollto" href="<?php echo base_url()?>latest-news">Latest News</a></li>
          <li><a class="nav-link scrollto" href="<?php echo base_url()?>latest-development">Latest Development</a></li>
         <!--  <li class="dropdown"><a href="#"><span>Smart Villas</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
          <li><a class="nav-link scrollto" href="<?php echo base_url()?>contact-us">Contact</a></li>
          <li><a class="getstarted scrollto" href="<?php echo base_url()?>contact-us">Booking</a></li>
          <li><a class="getstarted scrollto" href="#" style="background: #D4AF37;">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->