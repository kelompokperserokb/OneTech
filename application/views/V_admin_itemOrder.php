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



    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body style="width: 2000px !important;">
		<input id="param" type="hidden" value="<?php echo $param1; ?>">
		<div class="row">
			<div class="col-md-12">
				<h2 class="heading-verify" data-aos="fade-up">Order Item</h2>
			</div>
		</div>
		<div class="back-link-itemorder">
			<a href="javascript:history.back()"> &lt;&lt; Back</a>
		</div>
		<div class="flex-container">
			<table >
				<colgroup>
					<col width="10%">
					<col width="10%">
					<col width="10%">
					<col width="20%">
					<col width="20%">
					<col width="20%">
					<col width="10%">

				</colgroup>
				<thead>
				<tr>
					<th>Merk</th>
					<th>Category</th>
					<th>Sub Category</th>
					<th>Product Name</th>
					<th>Product Code</th>
					<th>Product Type</th>
					<th>Quantity</th>
				</tr>
				</thead>
				<tbody>

				</tbody>

			</table>
		</div>
		<!-- end mini table-->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>Asset/js/onetech/order/order_items.js"></script>
</body>
