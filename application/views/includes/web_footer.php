<!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>Emirates Valley</h3>
             <strong>Address:</strong> <p>House number 1054, Main Double Road, G-16/3, Islamabad</p>
                <br>
              <p>
                <strong>Phone:</strong><a href="tel://051-2761065-7" style="color:white"> 051-2761065-7</a><br>
                <strong>Email:</strong><a href="mailto:info@emiratesvalley.com" style="color:white"> info@emiratesvalley.com</a><br>
              </p>
             
            </div>
          </div>
          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url()?>">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url()?>about-us">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url()?>features">Features</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url()?>privacy-policy">Privacy policy</a></li>
            </ul>
          </div>
          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Social Networks</h4>
            <p>KEEP IN TOUCH</p>
            <div class="social-links mt-3">
            <?php 
              $active_gallery=json_decode(get_social_media(),true);
              foreach($active_gallery as $vals){
            ?>
              <a href="<?php echo $vals['twitter'];?>" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="<?php echo $vals['facebook'];?>" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="<?php echo $vals['instagram'];?>" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="<?php echo $vals['youtube'];?>" target="_blank" class="google-plus"><i class="bx bxl-youtube"></i></a>
              <a href="<?php echo $vals['linkedin'];?>" target="_blank" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            <?php } ?>
            </div>
            <!-- <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form> -->

          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Emirates Valley (Pvt) Limited</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/multi-responsive-bootstrap-template/ -->
        Designed by <a href="https://bootstrapmade.com/">2022</a>
      </div>
    </div>
  </footer><!-- End Footer -->
  <?php echo count_website_visitors()?>        
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url()?>assets/web/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?php echo base_url()?>assets/web/assets/vendor/aos/aos.js"></script>
  <script src="<?php echo base_url()?>assets/web/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url()?>assets/web/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo base_url()?>assets/web/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url()?>assets/web/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo base_url()?>assets/web/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url()?>assets/web/assets/js/main.js"></script>

</body>

</html>