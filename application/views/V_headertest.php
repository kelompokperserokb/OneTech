<!DOCTYPE html>
<html lang="en">
<head>
	<title>OneTech, Your Mining Solution Service</title>
	<meta charset="UTF-8">
	<meta name="description" content="OneTech, Your Mining Solution Service">
	<meta name="keywords" content="OneTech, Mining">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="apple-touch-icon" href="<?php echo base_url(); ?>Asset/img/logo/OT.jpg">
	<link rel="shortcut icon" href="<?php echo base_url(); ?>Asset/img/logo/OT.jpg">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/flaticon.css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/slicknav.min.css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/animate.css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/cat.css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/header-style.css"/>



	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
<!-- Page Preloder -->
<div id="preloder">
	<div class="loader"></div>
</div>
<!-- Header section -->
<header class="header-section">
    <div class="h_header-top">
        <div class="container h_container">
            <div class="row">
                <div class="col-lg-2 text-lg-left">
                    <!-- logo -->
                    <a href="<?php echo base_url(); ?>" class="h_site-logo">
						<img src="<?php echo base_url(); ?>Asset/img/Logo/OneTechReal.png" alt="">
                    </a>
                </div>
                <div class="col-xl-5 col-lg-4">
                    <form class="h_header-search-form" id="search" method="get" action="<?php echo base_url('viewproduct/search'); ?>">
                        <input name="value" type="text" placeholder="Search" id="search-text">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="h_user-panel">
                        <?php
                        if (!isset($_SESSION["email"])) {
                            echo '<div class="h_up-item">
                                    <i class="fa fa-user"></i>
                                    <a href="' . base_url() . 'login">Log In</a> | <a href="' . base_url() . 'register">Sign Up</a>
                                </div>';
						} else {
							echo '<div class="h_up-item h_main-menu">
										<li>
                                        <i class="fa fa-user"></i>
                                        <a href="#">Hi, ' . $_SESSION["name"] . '</a>
                                        <ul class="h_sub-menu">
                                            <li><a href="' . base_url("order") . '">My Order</a></li>
                                            <li><a href="' . base_url() . 'Account/logout">Sign Out</a></li>
                                        </ul>
                                        </li>
                                    </div>';
						} ?>
						<!-- <form action='".base_url('account/logout')."' >
							<button type='submit' style='width:auto; background-color: red;'>Logout</button>
						</form>-->
						<!--<button onclick=document.getElementById('id01').style.display='block' style='width:auto;'>Login</button>-->
						<div class="h_up-item">
							<i class="fa fa-shopping-cart"></i>
							<a href="<?php echo base_url('cart') ?>">My Cart</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="h_main-navbar">
		<div class="container h_container">
			<!-- menu -->
			<ul class="h_main-menu">
				<?php

				for ($i = 0; $i < $cat['data']["count"]; $i++) {
					$str2 = "";
					$str = '<li><a href="' . base_url() . 'viewproduct/cat/' . $cat['data']['data_array'][$i]->category_id . '" id="' . $cat['data']["data_array"][$i]->category_id . '" >' . $cat['data']["data_array"][$i]->category_name . '</a>
					<ul class="h_sub-menu">';
					for ($j = 0; $j < $suball['data']["count"]; $j++) {
						if ($cat['data']["data_array"][$i]->category_id == $suball['data']["data_array"][$j]->category_id) {
							$str2 .= '<li><a href="' . base_url() . 'viewproduct/cat/' . $cat['data']['data_array'][$i]->category_id . '/subcat/' . $suball['data']['data_array'][$j]->subcategory_id . '" id="' . $suball['data']["data_array"][$j]->subcategory_id . '" >' . $suball['data']["data_array"][$j]->subcategory_name . '</a></li>';
						}
					}
					echo $str . $str2 .
						'</ul>
                  </li>';

				}

				?>
			</ul>
		</div>
	</nav>
</header>

<!--====== Javascripts & Jquery ======-->
<script src="<?php echo base_url(); ?>Asset/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/jquery.slicknav.min.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/jquery.zoom.min.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/main.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/onetech/search.js"></script>

</body>
</html>

<header role="banner">
	<div id="cd-logo"><a href="#0"><img src="https://codyhouse.co/demo/login-signup-modal-window/img/cd-logo.svg" alt="Logo"></a></div>

	<nav class="main-nav">
		<ul>
			<!-- inser more links here -->
			<li><a class="cd-signin" href="#0">Sign in</a></li>
			<li><a class="cd-signup" href="#0">Sign up</a></li>
		</ul>
	</nav>
</header>

<div class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
	<div class="cd-user-modal-container"> <!-- this is the container wrapper -->
		<ul class="cd-switcher">
			<li><a href="#0">Sign in</a></li>
			<li><a href="#0">New account</a></li>
		</ul>

		<div id="cd-login"> <!-- log in form -->
			<form class="cd-form">
				<p class="fieldset">
					<label class="image-replace cd-email" for="signin-email">E-mail</label>
					<input class="full-width has-padding has-border" id="signin-email" type="email" placeholder="E-mail">
					<span class="cd-error-message">Error message here!</span>
				</p>

				<p class="fieldset">
					<label class="image-replace cd-password" for="signin-password">Password</label>
					<input class="full-width has-padding has-border" id="signin-password" type="text"  placeholder="Password">
					<a href="#0" class="hide-password">Hide</a>
					<span class="cd-error-message">Error message here!</span>
				</p>

				<p class="fieldset">
					<input type="checkbox" id="remember-me" checked>
					<label for="remember-me">Remember me</label>
				</p>

				<p class="fieldset">
					<input class="full-width" type="submit" value="Login">
				</p>
			</form>

			<p class="cd-form-bottom-message"><a href="#0">Forgot your password?</a></p>
			<!-- <a href="#0" class="cd-close-form">Close</a> -->
		</div> <!-- cd-login -->

		<div id="cd-signup"> <!-- sign up form -->
			<form class="cd-form">
				<p class="fieldset">
					<label class="image-replace cd-username" for="signup-username">Username</label>
					<input class="full-width has-padding has-border" id="signup-username" type="text" placeholder="Username">
					<span class="cd-error-message">Error message here!</span>
				</p>

				<p class="fieldset">
					<label class="image-replace cd-email" for="signup-email">E-mail</label>
					<input class="full-width has-padding has-border" id="signup-email" type="email" placeholder="E-mail">
					<span class="cd-error-message">Error message here!</span>
				</p>

				<p class="fieldset">
					<label class="image-replace cd-password" for="signup-password">Password</label>
					<input class="full-width has-padding has-border" id="signup-password" type="text"  placeholder="Password">
					<a href="#0" class="hide-password">Hide</a>
					<span class="cd-error-message">Error message here!</span>
				</p>

				<p class="fieldset">
					<input type="checkbox" id="accept-terms">
					<label for="accept-terms">I agree to the <a href="#0">Terms</a></label>
				</p>

				<p class="fieldset">
					<input class="full-width has-padding" type="submit" value="Create account">
				</p>
			</form>

			<!-- <a href="#0" class="cd-close-form">Close</a> -->
		</div> <!-- cd-signup -->

		<div id="cd-reset-password"> <!-- reset password form -->
			<p class="cd-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

			<form class="cd-form">
				<p class="fieldset">
					<label class="image-replace cd-email" for="reset-email">E-mail</label>
					<input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
					<span class="cd-error-message">Error message here!</span>
				</p>

				<p class="fieldset">
					<input class="full-width has-padding" type="submit" value="Reset password">
				</p>
			</form>

			<p class="cd-form-bottom-message"><a href="#0">Back to log-in</a></p>
		</div> <!-- cd-reset-password -->
		<a href="#0" class="cd-close-form">Close</a>
	</div> <!-- cd-user-modal-container -->
</div> <!-- cd-user-modal -->
