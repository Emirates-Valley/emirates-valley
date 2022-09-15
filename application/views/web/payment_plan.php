  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="<?php echo base_url()?>">Home</a></li>
          <li>Payment Plan</li>
        </ol>
        <h2>Payment Plan</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-12 entries">
<?php 
$active_news=json_decode(get_active_payment_plan(),true);
foreach($active_news as $vals){
?>
            <article class="entry">
                
              <div class="entry-img" style="max-height: fit-content;">
                <img src="<?php echo base_url()?>resource/images/other_images/<?php echo $vals['plan_image'];?>" alt="" class="img-fluid">
              </div>

                <h2 class="entry-title" style="display:none">
                <a href="news_details"><?php echo $vals['plan_title'];?></a>
              </h2>
              <div class="entry-content">
                
              </div>

            </article><!-- End blog entry -->

<?php } ?>

           

          </div><!-- End blog entries list -->

         

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
