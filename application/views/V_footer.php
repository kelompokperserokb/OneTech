<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/style1.css"/>
</head>
<!-- Start Footer bottom Area -->
<footer>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-content">
                        <div class="footer-head">
                            <h1 style="color: black"><span>One</span>Tech</h1>
                            <p>
                                OneTech hadir dengan konsep One Stop Online Shopping untuk menjawab kebutuhan masyarakat
                                modern akan kemudahan berbelanja, kapanpun dan dimanapun Anda menginginkannya baik
                                retail maupun grosir.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-content text-center">
                        <div class="footer-head">
                            <h4>Information</h4>
                            <div class="footer-contacts">
                                <a href="<?php echo base_url(); ?>about">
                                    <p><span>About Us</span></p>
                                </a>
                                <a href="<?php echo base_url(); ?>howtoorder">
                                    <p><span>How to Order</span></p>
                                </a>
                                <a href="<?php echo base_url(); ?>payment">
                                    <p><span>Payment</span></p>
                                </a>
								<a href="<?php echo base_url(); ?>delivery">
									<p><span>Logistics and Delivery</span></p>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="footer-head text-center">
						<h4>--Connect With Us--</h4>
					</div>
					<div class="row">
						<div class="col-md-5 col-sm-5 col-xs-12">
							<div class="footer-content text-center">
								<p>CS: 021 4584 1156</p>
								<a href = "https://wa.me/6281808558855" target="_blank"><p>WA: <span>081808558855</span></p></a>
							</div>
							<div class="footer-icons">
								<h6 class="mid">Our Official Merchant Site</h6>
								<ul class="mid">
									<li>
										<a href="http://tokopedia.com"><img src="<?php echo base_url(); ?>Asset/img/Social/tokopedia.png" alt=""</img></a>
									</li>
									<li>
										<a href="http://shopee.com"><img src="<?php echo base_url(); ?>Asset/img/Social/shopee.png" alt=""</img></a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-12 footer-contacts">
							<div class="form contact-form">
								<div id="sendmessage">Your message has been sent. Thank you!</div>
								<div id="errormessage"></div>
								<form id="email-msg" method="post" role="form" class="contactForm">
									<div class="form-group">
										<input type="text" name="name" class="form-control" id="name-msg"
											   placeholder="Your Name" data-rule="minlen:4"
											   data-msg="Please enter at least 4 chars"/>
										<div class="validation"></div>
									</div>
									<div class="form-group">
										<input type="email" class="form-control" name="email" id="emailfrom-msg"
											   placeholder="Your Email" data-rule="email"
											   data-msg="Please enter a valid email"/>
										<div class="validation"></div>
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="subject" id="subject-msg"
											   placeholder="Subject" data-rule="minlen:4"
											   data-msg="Please enter at least 8 chars of subject"/>
										<div class="validation"></div>
									</div>
									<div class="form-group">
										<textarea class="form-control" name="message" rows="5" id="message-msg"
											   data-rule="required"
											   data-msg="Please write something for us"
											   placeholder="Message"></textarea>
										<div class="validation"></div>
									</div>
									<div class="text-center">
										<button type="submit">Send Message</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-area-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="copyright text-center">
						<p>
							&copy; Copyright <strong>eBusiness</strong>. All Rights Reserved
						</p>
					</div>
					<div class="credits">
						Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer section -->
	<section class="footer-section">
		<div class="social-links-warp">
			<div class="container">
				<p style="color: #FFFFFF" class="text-white text-center mt-5">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
			</div>
		</div>
	</section>
	<!-- Footer section end -->
</footer>

<!-- Footer section end -->

<!--====== Javascripts & Jquery ======-->
<script src="<?php echo base_url(); ?>Asset/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/jquery.slicknav.min.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/jquery.zoom.min.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/jquery-ui.min.js"></script>

<script src="<?php echo base_url(); ?>Asset/js/jcarousel/jquery.jcarousel.min.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/jquery.fancybox.pack.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/jquery.fancybox-media.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/google-code-prettify/prettify.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/jquery.flexslider.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/jquery.nivo.slider.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/modernizr.custom.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/jquery.ba-cond.min.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/jquery.slitslider.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/onetech/authentication.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/onetech/email.js"></script>


</body>

</html>
