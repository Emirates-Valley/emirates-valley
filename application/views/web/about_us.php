  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li>About us</li>
        </ol>
        <h2>About us</h2>
    Due to Increase in demand for new housing units in the country, Emirates Valley (Pvt) Limited planned to build a world class housing project on Western CPEC Route New Islamabad International Airport. Emirates Valley will be a dream city for its residents and an icon of world class design and architecture.
      </div>
    </section><!-- End Breadcrumbs -->

    <section id="alt-services" class="alt-services" >
      <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="row justify-content-around gy-4" style="display:none">
          <div class="col-lg-6 img-bg aos-init aos-animate" style="background-image: url(assets/img/slide/slide-3.jpg);" data-aos="zoom-in" data-aos-delay="100"></div><div class="col-lg-5 d-flex flex-column justify-content-center">
            <h3>About us</h3>
            <p>Esse voluptas cumque vel exercitationem. Reiciendis est hic accusamus. Non ipsam et sed minima temporibus laudantium. Soluta voluptate sed facere corporis dolores excepturi</p>
           
          
            
          </div>
        </div>
      </div>
    </section>

    <section id="team" class="team section-bg">
      <div class="container aos-init aos-animate" data-aos="fade-up">

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
            <div class="member aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
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
    </section>

  </main><!-- End #main -->

  