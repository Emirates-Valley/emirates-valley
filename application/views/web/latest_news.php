  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="<?php echo base_url()?>">Home</a></li>
          <li>News</li>
        </ol>
        <h2>News</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">
<?php 
$active_news=json_decode(get_active_news(),true);
foreach($active_news as $vals){
?>
            <article class="entry">

              <div class="entry-img">
                <img src="<?php echo base_url()?>resource/images/other_images/<?php echo $vals['news_image'];?>" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="<?php echo base_url().'detail/'.$vals['slug'].'-'.$vals['news_id']?>"><?php echo $vals['news_title'];?></a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="<?php echo base_url().'detail/'.$vals['slug'].'-'.$vals['news_id']?>">Admin</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="<?php echo base_url().'detail/'.$vals['slug'].'-'.$vals['news_id']?>"><time datetime="2020-01-01"> <?php echo $vals['dated'];?></time></a></li>
                  <li class="d-flex align-items-center"></li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                 <?php echo $vals['description'];?>
                </p>
                <div class="read-more">
                  <a href="<?php echo base_url().'detail/'.$vals['slug'].'-'.$vals['news_id']?>">Read More</a>
                </div>
              </div>

            </article><!-- End blog entry -->

<?php } ?>

            <div class="blog-pagination" style="display:none">
              <ul class="justify-content-center">
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
              </ul>
            </div>

          </div><!-- End blog entries list -->

         

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
