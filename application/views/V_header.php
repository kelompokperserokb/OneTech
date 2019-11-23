<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Divisima | eCommerce Template</title>
    <meta charset="UTF-8">
    <meta name="description" content=" Divisima | eCommerce Template">
    <meta name="keywords" content="divisima, eCommerce, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="<?php echo base_url(); ?>Asset/img/favicon.ico" rel="shortcut icon"/>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/flaticon.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/slicknav.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/jquery-ui.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/owl.carousel.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/animate.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/header-style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>"/>


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
                    <form class="h_header-search-form">
                        <input type="text" placeholder="Search">
                        <button><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="h_user-panel">
                        <?php
                        session_start();
                        if (!isset($_SESSION["email"])) {
                            echo '<div class="h_up-item">
                                    <i class="fa fa-user"></i>
                                    <a href="#">Log In</a> | <a href="'.base_url().'register">Sign Up</a>
                                </div>';
                        } else {
                            echo "<div class=\"h_up-item h_main-menu\">
                                        <i class=\"fa fa-user\"></i>
                                        <a href=\"#\">Hi, Robertus Dwi</a>
                                        <ul class=\"h_sub-menu\">
                                            <li><a href=\"#\">My Profile</a></li>
                                            <li><a href=\"#\">My Order</a></li>
                                            <li><a href=\"#\">Sign Out</a></li>
                                        </ul>
                                    </div>
                       ";
                        }?>
                        <!-- <form action='".base_url('account/logout')."' >
                            <button type='submit' style='width:auto; background-color: red;'>Logout</button>
                        </form>-->
                        <!--<button onclick=document.getElementById('id01').style.display='block' style='width:auto;'>Login</button>-->
                        <div class="h_up-item">
                            <i class="fa fa-shopping-cart"></i>
                            <a href="#">My Cart</a>
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
                for($i = 0 ; $i < $data["count"] ; $i++){
                    echo '<li><a href="#" id="'.$data["data_array"][$i]->category_id.'" >'.$data["data_array"][$i]->category_name.'</a></li>';
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

</body>
</html>
