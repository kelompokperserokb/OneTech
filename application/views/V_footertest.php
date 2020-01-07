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
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="footer-content text-center">
								<p><span>CS:</span> 021 4584 1156</p>
								<p><span>WA:</span> 081808558855</p>
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
						<div class="col-md-6 col-sm-6 col-xs-12 footer-contacts">
							<div class="form contact-form">
								<div id="sendmessage">Your message has been sent. Thank you!</div>
								<div id="errormessage"></div>
								<form action="" method="post" role="form" class="contactForm">
									<div class="form-group">
										<input type="text" name="name" class="form-control" id="name"
											   placeholder="Your Name" data-rule="minlen:4"
											   data-msg="Please enter at least 4 chars"/>
										<div class="validation"></div>
									</div>
									<div class="form-group">
										<input type="email" class="form-control" name="email" id="email"
											   placeholder="Your Email" data-rule="email"
											   data-msg="Please enter a valid email"/>
										<div class="validation"></div>
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="subject" id="subject"
											   placeholder="Subject" data-rule="minlen:4"
											   data-msg="Please enter at least 8 chars of subject"/>
										<div class="validation"></div>
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="message" rows="5"
											   data-rule="required"
											   data-msg="Please write something for us"
											   placeholder="Message"></textarea>
										<div class="validation"></div>
									</div>
									<div class="text-center">
										<button onclick="giveAlert()" type="submit">Send Message</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!--	<div class="footer-area-bottom">-->
<!--		<div class="container">-->
<!--			<div class="row">-->
<!--				<div class="col-md-12 col-sm-12 col-xs-12">-->
<!--					<div class="copyright text-center">-->
<!--						<p>-->
<!--							&copy; Copyright <strong>eBusiness</strong>. All Rights Reserved-->
<!--						</p>-->
<!--					</div>-->
<!--					<div class="credits">-->
<!--						<---->
<!--				All the links in the footer should remain intact.-->
<!--				You can delete the links only if you purchased the pro version.-->
<!--				Licensing information: https://bootstrapmade.com/license/-->
<!--				Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eBusiness-->
<!--			  -->
<!--						Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
</footer>
<!-- Footer section end -->

<script>
    function giveAlert() {
        alert("Terima kasih. Email anda telah kami terima. Email balasan akan dikirim dalam waktu 1-2 hari kerja. Jika tidak ada cek folder spam");
    }
</script>

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


</body>

</html>

<!-- Footer section -->
<section class="footer-section">
	<div class="container">
		<div class="footer-logo text-center">
			<a href="index.html"><img src="./img/logo-light.png" alt=""></a>
		</div>
		<div class="row">
			<div class="col-lg-3 col-sm-6">
				<div class="footer-widget about-widget">
					<h2>About</h2>
					<p>Donec vitae purus nunc. Morbi faucibus erat sit amet congue mattis. Nullam frin-gilla faucibus urna, id dapibus erat iaculis ut. Integer ac sem.</p>
					<img src="img/cards.png" alt="">
				</div>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="footer-widget about-widget">
					<h2>Questions</h2>
					<ul>
						<li><a href="">About Us</a></li>
						<li><a href="">Track Orders</a></li>
						<li><a href="">Returns</a></li>
						<li><a href="">Jobs</a></li>
						<li><a href="">Shipping</a></li>
						<li><a href="">Blog</a></li>
					</ul>
					<ul>
						<li><a href="">Partners</a></li>
						<li><a href="">Bloggers</a></li>
						<li><a href="">Support</a></li>
						<li><a href="">Terms of Use</a></li>
						<li><a href="">Press</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="footer-widget about-widget">
					<h2>Questions</h2>
					<div class="fw-latest-post-widget">
						<div class="lp-item">
							<div class="lp-thumb set-bg" data-setbg="img/blog-thumbs/1.jpg"></div>
							<div class="lp-content">
								<h6>what shoes to wear</h6>
								<span>Oct 21, 2018</span>
								<a href="#" class="readmore">Read More</a>
							</div>
						</div>
						<div class="lp-item">
							<div class="lp-thumb set-bg" data-setbg="img/blog-thumbs/2.jpg"></div>
							<div class="lp-content">
								<h6>trends this year</h6>
								<span>Oct 21, 2018</span>
								<a href="#" class="readmore">Read More</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="footer-widget contact-widget">
					<h2>Questions</h2>
					<div class="con-info">
						<span>C.</span>
						<p>Your Company Ltd </p>
					</div>
					<div class="con-info">
						<span>B.</span>
						<p>1481 Creekside Lane  Avila Beach, CA 93424, P.O. BOX 68 </p>
					</div>
					<div class="con-info">
						<span>T.</span>
						<p>+53 345 7953 32453</p>
					</div>
					<div class="con-info">
						<span>E.</span>
						<p>office@youremail.com</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="social-links-warp">
		<div class="container">
			<div class="social-links">
				<a href="" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
				<a href="" class="google-plus"><i class="fa fa-google-plus"></i><span>g+plus</span></a>
				<a href="" class="pinterest"><i class="fa fa-pinterest"></i><span>pinterest</span></a>
				<a href="" class="facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>
				<a href="" class="twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>
				<a href="" class="youtube"><i class="fa fa-youtube"></i><span>youtube</span></a>
				<a href="" class="tumblr"><i class="fa fa-tumblr-square"></i><span>tumblr</span></a>
			</div>

			<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			<p class="text-white text-center mt-5">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
			<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

		</div>
	</div>
</section>
<!-- Footer section end -->



<!--====== Javascripts & Jquery ======-->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.slicknav.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
