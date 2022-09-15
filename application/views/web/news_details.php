  <main id="main">
    <section class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="<?php echo base_url()?>">Home</a></li>
          <li><a href="<?php echo base_url()?>latest_news">News</a></li>
          <li>News Single</li>
        </ol>
        <h2>News details</h2>
      </div>
    </section><!-- End Breadcrumbs -->
    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-8 entries">
            <article class="entry entry-single">
              <div class="entry-img">
                <img src="<?php echo base_url();?>resource/images/other_images/<?php echo $news->news_image?>" alt="<?php echo $news->news_title?>" class="img-fluid">
              </div>
              <h2 class="entry-title">
                <a href="javascript:;"><?php echo $news->news_title?></a>
              </h2>
              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="javascript:;"><?php echo userInfo($news->user_id)->full_name?></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="javascript:;"><time datetime="<?php echo date('M d, Y',strtotime($news->dated))?>"><?php echo date('M d, Y',strtotime($news->dated))?></time></a></li>
                  <li class="d-flex align-items-center"></li>
                </ul>
              </div>
              <div class="entry-content">
                <p>
                  <?php echo $news->description?>
                </p>
              </div>
            </article><!-- End blog entry -->
          </div><!-- End blog entries list -->
        </div>
      </div>
    </section><!-- End Blog Single Section -->
  </main><!-- End #main -->