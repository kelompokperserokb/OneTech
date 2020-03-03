<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang=""> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin - OneTech, Your Mining Solution Service</title>
    <meta name="description" content="Admin OneTech, Your Mining Solution Service">
	<meta name="keywords" content="OneTech, Mining">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>Asset/img/logo/OTA.jpg">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>Asset/img/logo/OTA.jpg">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/admin-cs-skin-elastic.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/admin-style.css">
<!--	<script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet"/>
</head>

<body>
<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
					<?php echo '<a href="' . base_url('admin/admin/admin').'"><i class="menu-icon fa fa-laptop"></i>Dashboard</a>';?>
                </li>
                <li class="menu-title">Admin authority</li><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Product Properties</a>
                    <ul class="sub-menu children dropdown-menu">
						<?php echo '<li><i class="fa fa-tag"></i><a href="' . base_url('admin/admin/admin/category') . '">Category</a></li>';?>
						<?php echo '<li><i class="fa fa-tags"></i><a href="' . base_url('admin/admin/admin/subcategory') . '">Sub-Category</a></li>';?>
						<?php echo '<li><i class="fa fa-bars"></i><a href="' . base_url('admin/admin/admin/merk') . '">Merk</a></li>';?>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Product</a>
                    <ul class="sub-menu children dropdown-menu">
						<?php echo '<li><i class="fa fa-list"></i><a href="' . base_url('admin/admin/admin/product') . '">Product</a></li>';?>
						<?php echo '<li><i class="fa fa-clipboard"></i><a href="' . base_url('admin/admin/admin/typeproduct') . '">Product Specification</a></li>';?>
						<?php echo '<li><i class="fa fa-dollar"></i><a href="' . base_url('admin/admin/admin/discount') . '">Add Discount Product</a></li>';?>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false"> <i class="menu-icon fa fa-shopping-cart"></i>Order</a>
                    <ul class="sub-menu children dropdown-menu">
						<?php echo '<li><i class="menu-icon fa fa-dollar"></i><a href="' . base_url("admin/admin/admin/logistic") . '">1. Input shipping cost estimation</a></li>';?>
						<?php echo '<li><i class="menu-icon fa fa-print"></i><a href="' . base_url('admin/admin/admin/waitingorder') . '">2. Waiting for proof of payment</a></li>';?>
						<?php echo '<li><i class="menu-icon fa fa-money"></i><a href="' . base_url('admin/admin/admin/verify') . '">3. Verify payment</a></li>';?>
						<?php echo '<li><i class="menu-icon fa fa-truck"></i><a href="' . base_url('admin/admin/admin/delivery') . '">4. Input delivery</a></li>';?>
						<?php echo '<li><i class="menu-icon fa fa-check"></i><a href="' . base_url('admin/admin/admin/ordered') . '">5. Order success</a></li>';?>
                    </ul>
                </li>
				<li class="menu-item-has-children dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
					   aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Client</a>
					<ul class="sub-menu children dropdown-menu">
						<?php echo '<li><i class="menu-icon fa fa-user"></i><a href="' . base_url('admin/admin/admin/client') . '">Client</a></li>';?>
					</ul>
				</li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->
<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header">
        <div class="top-left">
            <div class="navbar-header">
                <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                <?php echo '<a class="navbar-brand" href="' . base_url('admin/admin/admin').'"><img src="'.base_url().'Asset/img/logo/OneTechAdmin.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="' . base_url('admin/admin/admin').'"><img src="<?php echo base_url(); ?>Asset/img/logo/OTA.png" alt="Logo"></a>';?>
            </div>
        </div>
        <div class="top-right">
            <div class="header-menu">
                <div class="header-left">
<!--                    <div class="dropdown for-notification">-->
<!--                        <button class="btn btn-secondary dropdown-toggle" type="button" id="notification"-->
<!--                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                            <i class="fa fa-bell"></i>-->
<!--                            <span class="count bg-danger">3</span>-->
<!--                        </button>-->
<!--                        <div class="dropdown-menu" aria-labelledby="notification">-->
<!--                            <p class="red">You have 3 Notification</p>-->
<!--                            <a class="dropdown-item media" href="#">-->
<!--                                <i class="fa fa-check"></i>-->
<!--                                <p>Server #1 overloaded.</p>-->
<!--                            </a>-->
<!--                            <a class="dropdown-item media" href="#">-->
<!--                                <i class="fa fa-info"></i>-->
<!--                                <p>Server #2 overloaded.</p>-->
<!--                            </a>-->
<!--                            <a class="dropdown-item media" href="#">-->
<!--                                <i class="fa fa-warning"></i>-->
<!--                                <p>Server #3 overloaded.</p>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="dropdown for-message">-->
<!--                        <button class="btn btn-secondary dropdown-toggle" type="button" id="message"-->
<!--                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                            <i class="fa fa-envelope"></i>-->
<!--                            <span class="count bg-primary">4</span>-->
<!--                        </button>-->
<!--                        <div class="dropdown-menu" aria-labelledby="message">-->
<!--                            <p class="red">You have 4 Mails</p>-->
<!--                            <a class="dropdown-item media" href="#">-->
<!--                                <span class="photo media-left"><img alt="avatar" src="Asset/img/admin/avatar/1.jpg"></span>-->
<!--                                <div class="message media-body">-->
<!--                                    <span class="name float-left">Jonathan Smith</span>-->
<!--                                    <span class="time float-right">Just now</span>-->
<!--                                    <p>Hello, this is an example msg</p>-->
<!--                                </div>-->
<!--                            </a>-->
<!--                            <a class="dropdown-item media" href="#">-->
<!--                                <span class="photo media-left"><img alt="avatar" src="Asset/img/admin/avatar/2.jpg"></span>-->
<!--                                <div class="message media-body">-->
<!--                                    <span class="name float-left">Jack Sanders</span>-->
<!--                                    <span class="time float-right">5 minutes ago</span>-->
<!--                                    <p>Lorem ipsum dolor sit amet, consectetur</p>-->
<!--                                </div>-->
<!--                            </a>-->
<!--                            <a class="dropdown-item media" href="#">-->
<!--                                <span class="photo media-left"><img alt="avatar" src="Asset/img/admin/avatar/3.jpg"></span>-->
<!--                                <div class="message media-body">-->
<!--                                    <span class="name float-left">Cheryl Wheeler</span>-->
<!--                                    <span class="time float-right">10 minutes ago</span>-->
<!--                                    <p>Hello, this is an example msg</p>-->
<!--                                </div>-->
<!--                            </a>-->
<!--                            <a class="dropdown-item media" href="#">-->
<!--                                <span class="photo media-left"><img alt="avatar" src="Asset/img/admin/avatar/4.jpg"></span>-->
<!--                                <div class="message media-body">-->
<!--                                    <span class="name float-left">Rachel Santos</span>-->
<!--                                    <span class="time float-right">15 minutes ago</span>-->
<!--                                    <p>Lorem ipsum dolor sit amet, consectetur</p>-->
<!--                                </div>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--                <div class="user-area dropdown float-right">-->
<!--                    <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true"-->
<!--                       aria-expanded="false">-->
<!--                        <img class="user-avatar rounded-circle" src="Asset/img/admin/admin.jpg" alt="User Avatar">-->
<!--                    </a>-->
<!---->
<!--                    <div class="user-menu dropdown-menu">-->
<!--                        <a class="nav-link" href="#"><i class="fa fa-user"></i>My Profile</a>-->
<!---->
<!--                        <a class="nav-link" href="#"><i class="fa fa-user"></i>Notifications <span-->
<!--                                class="count">13</span></a>-->
<!---->
<!--                        <a class="nav-link" href="#"><i class="fa fa-cog"></i>Settings</a>-->
<!---->
<!--                        <a class="nav-link" href="#"><i class="fa fa-power-off"></i>Logout</a>-->
<!--                    </div>-->
<!--                </div>-->
					<a class="dropdown" href=" <?php echo base_url('admin/admin/admin/logout'); ?>"><i class="fa fa-power-off"></i> Logout</a>
            </div>
        </div>
    </header>
    <!-- /#header -->
    <div class="clearfix"></div>
</div>
<!-- /#right-panel -->
</body>
</html>
