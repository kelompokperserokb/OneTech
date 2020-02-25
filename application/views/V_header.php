

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

	<link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" rel="stylesheet">

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
                <div class="col-lg-2 text-center text-lg-left">
                    <!-- logo -->
                    <a href="<?php echo base_url(); ?>" class="h_site-logo">
                        <img src="<?php echo base_url(); ?>Asset/img/logoot.jpg" alt="">
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
							$name = explode(' ', trim($_SESSION["name"]));
							echo '<div class="h_up-item h_main-menu">
										<li>
                                        <i class="fa fa-user"></i>
                                        <a class="h_nopad" href="#">Hi, ' . $name[0] . '</a>
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
<!--						<div class="h_up-item h_main-menu">-->
<!--							<li>-->
<!--								<a class="languagestyle" href="#"><span class="flag-icon flag-icon-us"></span>  English</a>-->
<!--								<ul class="h_sub-menu">-->
<!--									<li><a href="#us"><span class="flag-icon flag-icon-us"> </span>  English</a></li>-->
<!--									<li><a href="#id"><span class="flag-icon flag-icon-id"> </span>  Indonesian</a></li>-->
<!--								</ul>-->
<!--							</li>-->
<!--						</div>-->
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
