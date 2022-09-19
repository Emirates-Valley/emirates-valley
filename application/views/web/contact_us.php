  <main id="main">
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Contact us</li>
        </ol>
        <h2>Contact us</h2>
      </div>
    </section><!-- End Breadcrumbs -->

    <section class="contact-page">
      <div class="container">
        <div class="row justify-content-center">
				<div class="col-md-12">
					<div class="wrapper">
						<div class="row no-gutters">
              <div class="col-lg-5 col-md-5 d-flex align-items-stretch">
					
              
						  <iframe class="map"  src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d830.5342268693671!2d72.916321!3d33.627692!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x45fa72d7ed9b2401!2sEmirates%20valley!5e0!3m2!1sen!2sus!4v1663497816224!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
							</div>
							<div class="col-lg-7 col-md-7 order-md-last d-flex align-items-stretch">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4">Get in touch</h3>
									<?php 
                    if($this->session->userdata['SUCCESSMSG'] != ''){
                      echo '<div class="alert alert-success">';
                        echo $this->session->userdata['SUCCESSMSG'];
                      echo "</div>";
                    } 
                  ?>
				      		
									<form method="POST" action="<?php echo base_url().'contact-us'?>" id="contactForm" name="contactForm" class="contactForm">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="name">Full Name</label>
													<input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
												</div>
											</div>
											<div class="col-md-6"> 
												<div class="form-group">
													<label class="label" for="email">Email Address</label>
													<input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="subject">Subject</label>
													<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="#">Message</label>
													<textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message" style="height: 80px;" required></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" name="contact-us" value="Send Message" class="btn btn-get-started">
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							
						</div>
            
					</div>

          <div class="row mt-3">
            <div class="col-lg-4 col-md-5 d-flex align-items-stretch">
              <div class="info-wrap w-100 p-md-5 p-4">
                <div class="dbox w-100 d-flex align-items-start">
                  <div class="icon d-flex align-items-center justify-content-center">
                    <i class="bi bi-geo-alt-fill"></i>
                  </div>
                  <div class="text ps-3">
                    <p><span>Address:</span> House number 1054, Main Double Road, G-16/3, Islamabad</p>
                  </div>
                </div>
                
              </div>
            </div>
            <div class="col-lg-4 col-md-5 d-flex align-items-stretch">
              <div class="info-wrap w-100 p-md-5 p-4">
               
                <div class="dbox w-100 d-flex align-items-center">
                  <div class="icon d-flex align-items-center justify-content-center">
                    <i class="bi bi-telephone-fill"></i>
                  </div>
                  <div class="text ps-3">
                    <p><span>Phone:</span> <a href="tel://051-2761065-7">051-2761065-7</a></p>
                     <p><span>UAN:</span> <a href="tel://051111-101010">(051)111-101-010</a></p>
                  </div>
                </div>
               
                
              </div>
            </div>
            <div class="col-lg-4 col-md-5 d-flex align-items-stretch">
              <div class="info-wrap w-100 p-md-5 p-4">
                <div class="dbox w-100 d-flex align-items-center">
                  <div class="icon d-flex align-items-center justify-content-center">
                    <i class="bi bi-envelope-fill"></i>
                  </div>
                  <div class="text ps-3">
                    <p><span>Email:</span> <a href="mailto:info@emiratesvalley.com">info@emiratesvalley.com</a></p>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
				</div>
			</div>
      </div>
    </section>
    <?php 
      $this->session->unset_userdata('SUCCESSMSG');
    ?>
  </main><!-- End #main -->
