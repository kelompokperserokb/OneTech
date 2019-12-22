<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/bootstrap-337.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/slider-style.css">

</head>

<body>
<div class="container main-container">

	<div id="carousel-example-generic" class="carousel slide" data-interval="7000">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-example-generic" data-slide-to="1"></li>
			<li data-target="#carousel-example-generic" data-slide-to="2"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">

			<!-- First slide -->
			<div class="item active deepskyblue">
				<img src="<?php echo base_url(); ?>Asset/img/slider/1.jpg" alt="Slider Image 1">
			</div> <!-- /.item -->

			<!-- Second slide -->
			<div class="item skyblue">
				<img src="<?php echo base_url(); ?>Asset/img/slider/2.jpg" alt="Slider Image 1">
			</div><!-- /.item -->

			<!-- Third slide -->
			<div class="item darkerskyblue">
				<img src="<?php echo base_url(); ?>Asset/img/slider/3.jpg" alt="Slider Image 1">
			</div><!-- /.item -->

		</div><!-- /.carousel-inner -->

		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div><!-- /.carousel -->

</div><!-- /.container -->

	<script src="<?php echo base_url(); ?>Asset/js/jquery-331.min.js"></script>
	<script src="<?php echo base_url(); ?>Asset/js/bootstrap-337.min.js"></script>
</body>

</html>
