<section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="https://emiratesvalley.com/emirates-valley/">Home</a></li>
          <li>Latest Development</li>
        </ol>
        <h2></h2>

      </div>
    </section>    <!-- ======= Portfolio Section ======= -->
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