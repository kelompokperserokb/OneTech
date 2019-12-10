<!DOCTYPE html>
<html lang="en">

<head>
    <title>OneTech</title>
    <meta charset="UTF-8">
    <meta name="description" content=" One Tech">
    <meta name="keywords" content="One Tech">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="<?php echo base_url(); ?>Asset/img/favicon.png" rel="shortcut icon" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/flaticon.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/slicknav.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/jquery-ui.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/animate.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/style.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/style1.css" />



    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<div class="row justify-content-center text-center mb-5">
    <div class="col-md-5 mb-6">
        <h2 class="heading" data-aos="fade-up">Verify</h2>
    </div>
</div>
<div class="flex-container">

    <table>
        <tr>
            <th>Id order</th>
            <th>Email</th>
            <th>Date Order</th>
            <th>Total Price</th>
            <th>Proof Of Payment </th>
            <th>Status</th>
            <th>order</th>
        </tr>
        <tr>
            <td>1234124</td>
            <td>lolo@gmail.com</td>
            <td>2 sep 2019</td>
            <td>Rp. 150.000</td>
            <td><input type='file' onchange="readURL(this);" />

                <td>Not Verify</td>
                <td><input type="button" class="btn btn-info" value="Verify"></td>
        </tr>

    </table>
</div>
<!-- end mini table-->

<script src="<?php echo base_url(); ?>Asset/js/upload.js"></script>
