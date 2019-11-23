<!DOCTYPE html>
<html lang="en">

<head>
    <title>OneTech</title>
    <meta charset="UTF-8">
    <meta name="description" content=" One Tech">
    <meta name="keywords" content="One Tech">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="<?php echo base_url(''); ?>img/favicon.png" rel="shortcut icon" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/flaticon.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/slicknav.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style1.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/modal.css" />


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
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 text-center text-lg-left">

                        <!-- logo -->
                        <a class="navbar-brand page-scroll sticky-logo" href="<?php echo base_url(); ?>">
                            <h1 style="color: black"><span>One</span>Tech</h1>
                            <!-- Uncomment below if you prefer to use an image logo -->
                            <!--<img src="img/logo.png" alt="" title="">-->
                        </a>
                    </div>
                    <div class="col-xl-6 col-lg-5">
                        <form class="header-search-form">
                            <input type="text" placeholder="Search Item ....">
                            <button><i class="flaticon-search"></i></button>
                        </form>
                    </div>

                    <?php
                    session_start();
                    if (!isset($_SESSION["email"])) {
                        echo "<button onclick=document.getElementById('id01').style.display='block' style='width:auto;'>Login</button>";
                    } else {
                        echo "
                        <form action='".base_url('account/logout')."' >
                            <button type='submit' style='width:auto; background-color: red;'>Logout</button>
                        </form>";
                    }?>

                    <!-- Modal -->
                    <div id="id01" class="modal">
                        <form class="modal-content animate" method="post" id="login">
                            <div class="imgcontainer">
                                <span onclick="document.getElementById('id01').style.display='none'" class="close close-modal" title="Close Modal">&times;</span>
                                <img src="<?php echo base_url(); ?>img_avatar2.png" alt="Avatar" class="avatar">
                            </div>

                            <div class="container">
                                <label for="uname"><b>Username</b></label>
                                <input type="text" placeholder="Email" name="email" id="username" required>

                                <label for="psw"><b>Password</b></label>
                                <input type="password" placeholder="Enter Password" name="password" id="password" required>

                                <label><b id="message" style="color: red"></b></label>

                                <button type="submit">Login</button>
                                <label>
                                    <input type="checkbox" checked="checked" name="remember"> Remember me
                                </label>
                            </div>

                            <div class="container" style="background-color:#f1f1f1">
                                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn close-modal">Cancel</button>
                                <span class="psw">Forgot <a href="#">password?</a></span>
                            </div>
                        </form>
                    </div>
                    <!-- end Modal -->

                    <div class="col-md-1 col-sm-1">
                        <a class="services-icon" href="#">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>
                    <div class="col-md-1 col-sm-1">
                        <a class="services-icon" href="#">
                            <i class="fa fa-language"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        <nav class="main-navbar">
            <div class="container">
                <!-- menu -->
                <ul class="main-menu text-center">
                    <?php
                        for($i = 0 ; $i < $data["count"] ; $i++){
                            echo '<li><a href="#" id="'.$data["data_array"][$i]->category_id.'" >'.$data["data_array"][$i]->category_name.'</a></li>';
                        }
                    ?>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Header section end -->
    <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</html>