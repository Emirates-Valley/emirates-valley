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
                Emirates Valley is a new Dubai style living residential and commercial hub with lush green surroundings and 5 minutes approach from CPEC route and 15 minutes’ drive from New Islamabad International Airport. Emirates Valley will be a new milestone in the real estate sector of Pakistan catering to all the needs of the residents and investors. Emirates valley will be a modern lifestyle destination quipped with all modern amenities and peaceful environment.
              </p>
            </div>

            <div class="accordion-list">
              <ul>
                <li>
                  <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"> The Region's All Purpose Hub <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                    <p>
                      Located on CPEC Western route with close access to new Islamabad International Airport and twins Cities.
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
          ?>
              <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="service-item position-relative" >
                  
                <h4><?php echo $vals['title']; ?></h4>
                <div style="text-align: justify;"><p><?php echo $vals['description']; ?></p></div>
                
                <a href="features" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a></div>
              </div>
          <?php 
            } 
          ?>
         
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Testimonials Section ======= -->
    
   <!-- End Testimonials Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team</h2>
          <p>Check our Team</p>
        </div>
        <div class="row">
          <?php 
            $teams = json_decode(home_team(),true);
            foreach($teams as $team){
          ?>
              <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="member" data-aos="zoom-in" data-aos-delay="100">
                  <img src="<?php echo base_url()?>resource/images/other_images/<?php echo $team['team_image'];?>" class="img-fluid" alt="<?php echo $team['name'];?>">
                  <div class="member-info">
                    <div class="member-info-content">
                      <h4><a href="<?php echo base_url().'profile-detail/'.title_slug($team['name']).'-'.$team['team_id']?>"><?php echo $team['name'];?></a></h4>
                      <span><?php echo $team['designation'];?></span>
                    </div>
                    <div class="social">
                      <a href="#"><i class="bi bi-twitter"></i></a>
                      <a href="https://www.facebook.com/emiratesvalley"><i class="bi bi-facebook"></i></a>
                      <a href="https://www.instagram.com/emiratesvalley/"><i class="bi bi-instagram"></i></a>
                      <a href="https://www.linkedin.com/in/emirates-valley-2a29a7250/"><i class="bi bi-linkedin"></i></a>
                    </div>
                  </div>
                </div>
              </div>
          <?php 
            } 
          ?>
        </div>
      </div>
    </section><!-- End Team Section -->
</main><!-- End #main --> 