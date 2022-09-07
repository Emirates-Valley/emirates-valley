<!-- ======= Hero Section ======= -->
<?php 

///echo "<pre>"; print_r();echo "</pre>";exit;

?>
<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">
<?php 


//echo "<pre>"; print_r($features);echo "</pre>";exit;

$sliders=json_decode(home_slider(),true);

$i=1;
$classs='';
foreach($sliders as $vals){
 if($i==1){
   $classs='active';
 }else{
  $classs='';
 }
  $i+1;
?>
        <!-- Slide 1 -->
        <div class="carousel-item <?php echo $classs; ?>" style="background-image: url(<?php echo base_url()?>resource/images/other_images/<?php echo $vals['slider_image']; ?>)">
          <div class="carousel-container">
            <div class="container">
              
              <h2 class="animate__animated animate__fadeInDown"><?php echo $vals['title']; ?></h2>
              <p class="animate__animated animate__fadeInUp"><?php echo $vals['description']; ?></p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>
<?php 

}
?>

        <!-- Slide 2 -->
       <!--  <div class="carousel-item" style="background-image: url(<?php echo base_url()?>assets/web/assets/img/slide/slide-2.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Lorem Ipsum Dolor</h2>
              <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div> -->

        <!-- Slide 3 -->
       <!--  <div class="carousel-item" style="background-image: url(<?php echo base_url()?>assets/web/assets/img/slide/slide-3.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Sequi ea ut et est quaerat</h2>
              <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div> -->

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">
<section id="clients" class="clients section-bg">
   <div class="container">
      <div class="row aos-init aos-animate" data-aos="zoom-in">
         <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center"> <img src="<?php echo base_url()?>assets/web/assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
         <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center"> <img src="<?php echo base_url()?>assets/web/assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
         <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center"> <img src="<?php echo base_url()?>assets/web/assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
         <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center"> <img src="<?php echo base_url()?>assets/web/assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
         <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center"> <img src="<?php echo base_url()?>assets/web/assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
         <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center"> <img src="<?php echo base_url()?>assets/web/assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
      </div>
   </div>
</section>
    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-5 align-items-stretch video-box" style='background-image: url("<?php echo base_url()?>assets/web/assets/img/why-us.jpg");' data-aos="zoom-in" data-aos-delay="100">
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch">

            <div class="content">
              <h3><strong>WHY Emirates Valley</strong></h3>
              <p>
                M_1 motorway !!! Emirates valley site just 5-7 minutes away from Fahtejang CPEC interchange. Just 10 minutes away from New Islamabad International Airport.
              </p>
            </div>

            <div class="accordion-list">
              <ul>
                <li>
                  <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"> The Region's All Purpose Hub <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                    <p>
                      Located on Motorway (M2) with close access with new Islamabad International Airport and twins Cities.
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed">The Home Of Luxury, The center of Now  <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      We smartely offer perfect combination of business and leisure
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed">Unmatched Facilities
                    <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      Unmatched structural planning, design and civic facilities
                    </p>
                  </div>
                </li>

              </ul>
            </div>

          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title pb-0">
          <h2>FEATURES</h2>
          <p>Check our FEATURES</p>
        </div>

        <div class="row">
<?php 
$features=json_decode(home_features(),true);
foreach($features as $vals){
  // 
?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon mb-3"><img style="width: 64px;" src="<?php echo base_url()?>resource/images/other_images/<?php echo $vals['feature_image'];?>"></div>
            <h4><?php echo $vals['title']; ?></h4>
            <p><?php echo $vals['description']; ?></p>
             <a href="features" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a></div>
          </div>
<?php } ?>
         
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials cta">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimonials</h2>
          <p>Testimonials</p>
        </div>
<?php 
$testimonial=json_decode(home_testimonial(),true);
?>
        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
 <?php 
foreach($testimonial as $vals){
  // 
?>
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="<?php echo base_url()?>resource/images/other_images/<?php echo $vals['testimonial_image'];?>" class="testimonial-img" alt="">
                  <h3><?php echo $vals['name']; ?></h3>
                  <h4><?php echo $vals['designation']; ?></h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    <?php echo $vals['comments']; ?>
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->
<?php } ?>
         
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->



    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio pb-4">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>LATEST DEVELOPMENT</h2>
          <p>Check our LATEST DEVELOPMENT</p>
        </div>

      

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
<?php 
$active_gallery=json_decode(get_active_gallery(),true);
foreach($active_gallery as $vals){
?>
          <div class="col-lg-3 col-md-6 portfolio-item filter-app">
            <img src="<?php echo base_url()?>resource/images/other_images/<?php echo $vals['video_file'];?>" class="img-fluid" alt="">
            <div class="portfolio-info">
              <a href="<?php echo base_url()?>resource/images/other_images/<?php echo $vals['video_file'];?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bi bi-zoom-in"></i></a>
            </div>
          </div>

         
<?php 
}
?>

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team</h2>
          <p>Check our Team</p>
        </div>

        <div class="row">
<?php 
$team=json_decode(home_team(),true);

foreach($team as $vals){
  // 
?>
          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <img src="<?php echo base_url()?>resource/images/other_images/<?php echo $vals['team_image'];?>" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4><?php echo $vals['name'];?></h4>
                  <span><?php echo $vals['designation'];?></span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
<?php } ?>
        

        </div>

      </div>
    </section><!-- End Team Section -->
</main><!-- End #main --> 