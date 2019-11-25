<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>

<!-- product section -->
<section class="product-section">
	<div class="container">
		<div class="back-link">
			<a href="./category.html"> &lt;&lt; Back to Category</a>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="product-pic-zoom">
					<img class="product-big-img" src="<?php echo base_url(); ?>Asset/img/tandatanya.jpg" alt="">
				</div>
				<div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
					<div class="product-thumbs-track">
						<div class="pt active" data-imgbigurl="img/tandatanya.jpg"><img src="img/tandatanya.jpg" alt=""></div>
						<div class="pt" data-imgbigurl="<?php echo base_url(); ?>Asset/img/tandatanya.jpg"><img src="<?php echo base_url(); ?>Asset/img/tandatanya.jpg" alt=""></div>
						<div class="pt" data-imgbigurl="<?php echo base_url(); ?>Asset/img/tandatanya.jpg"><img src="<?php echo base_url(); ?>Asset/img/tandatanya.jpg" alt=""></div>
						<div class="pt" data-imgbigurl="<?php echo base_url(); ?>Asset/img/tandatanya.jpg"><img src="<?php echo base_url(); ?>Asset/img/tandatanya.jpg" alt=""></div>
					</div>
				</div>
			</div>
            <?php echo '
			<div class="col-lg-6 product-details">
				<h2 class="p-title">'.$product["data_array"][0]->product_name.'</h2>
				<h3 class="p-price">Rp. '.number_format($product["data_array"][0]->product_price,2,",",".").'</h3>
				<!--<h4 class="p-stock">Available: <span>'. $stock_status .'<input type="hidden" id ="stock_quota" value="'.$stock.'" /></span></h4>-->
				<!--<div class="p-review">
					<a href="">3 reviews</a>|<a href="">Add your review</a>
				</div>-->
				
				<!--<a href="#" class="site-btn">SHOP NOW</a>-->
				<div id="accordion" class="accordion-area">
					<div class="panel">
						<div class="panel-header" id="headingOne">
							<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">Description</button>
						</div>
						<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
							<div class="panel-body">
								<p>'.$product["data_array"][0]->product_desc.'</p>
								<p>'.$product["data_array"][0]->description_type.'</p>
							</div>
						</div>
					</div>
					<div class="panel">
						<div class="panel-header" id="headingTwo">
							<button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">care details </button>
						</div>
						<div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
							<div class="panel-body">
								<img src="<?php echo base_url(); ?>Asset/img/cards.png" alt="">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod
									nec.
								</p>
							</div>
						</div>
					</div>
					<div class="panel">
						<div class="panel-header" id="headingThree">
							<button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">shipping & Returns</button>
						</div>
						<div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
							<div class="panel-body">
								<h4>7 Days Returns</h4>
								<p>Cash on Delivery Available<br>Home Delivery <span>3 - 4 days</span></p>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod
									nec.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>';
			?>
		</div>
	</div>
</section>
<!-- product section end -->

<!-- mini table-->

<div class="flex-container">

	<table>
		<tr>
			<th>Product Code</th>
			<th>Product Type</th>
			<th>Quota</th>
			<th>Description Type</th>
            <th>Quantity</th>
			<th>order</th>
		</tr>
        <?php for ($i = 0 ; $i < $product_type["count"] ; $i++ ){
        echo '
        <tr>
			<td>'.$product["data_array"][0]->product_code.'</td>
			<td>'.$product_type["data_array"][$i]->product_type.'</td>
			<td>'.$product_type["data_array"][$i]->quota.'</td>
			<td>'.$product_type["data_array"][$i]->description_type.'</td>
			<td ><div class="quantity">
					<p>Quantity</p>
					<div class="pro-qty"><input type="text" value="1" name="quantity"></div>
				</div></td>
			<!--<td><a href="'.base_url().'product/'.$product["data_array"][0]->product_id.'/'.$product_type["data_array"][$i]->type_id.'">order</a></td>-->
			<td><a href="#">order</a></td>
		</tr>';} ?>

	</table>
</div>
<!-- end mini table-->


<script src="<?php echo base_url(); ?>Asset/js/main.js"></script>
</body>

</html>