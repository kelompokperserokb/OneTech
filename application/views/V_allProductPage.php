<!DOCTYPE html>
<html lang="en">

<head>
		<link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/bootstrap.min.css"/>
</head>


<!-- RELATED PRODUCTS section -->
<section class="related-product-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h3>Browse all of product</h3>
				</div>
				<div class="section-title">
					<!--<h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, atque dolorem doloribus, ea excepturi inventore laudantium nulla numquam perferendis praesentium, quae quaerat quia quidem rem saepe sit temporibus voluptate voluptatum!</h5>-->
				</div>
			</div>
			<div class="col-md-3">
				<div id="content">
					<div class="panel panel-default sidebar-menu">
						<div class="panel-heading">
							<h3 class="panel-title">Categories</h3>
						</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked category-menuu">
								<?php
								for ($i = 0; $i < $cat['data']['count']; $i++) {
									echo ' <li>
        								<a href="' . base_url() . 'viewproduct/cat/' . $cat['data']['data_array'][$i]->category_id . '">
        									' . $cat['data']['data_array'][$i]->category_name . '
        								</a>
        							</li> ';
								} ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<!-- Product filter section -->
				<section class="product-filter-section">
					<div class="container">
						<div class="row">
							<?php for ($i = 0; $i < $product['data']['count']; $i++) {
								echo '<div class="col-lg-3 col-sm-6">
                    			<div class="product-item">
                        			<div class="pi-pic">
                            			<a href="' . base_url() . 'product/' . $product['data']['data_array'][$i]->product_id . '/">
                                			<img src="' . base_url() . 'Asset/img/products/' . ($i + 1) . '.jpg" alt="">
                            			</a>
                        			</div>
                        			<div class="pi-text">
                            			<h6>Rp. ' . number_format($product['data']['data_array'][$i]->product_price, 2, ",", ".") . '</h6>
                            			<a href="' . base_url() . 'product/' . $product['data']['data_array'][$i]->product_id . '/">
                                			<p>' . $product['data']['data_array'][$i]->product_name . '</p>
                            			</a>
                        			</div>
                        		</div>
                			</div>';
							} ?>
						</div>
					</div>
				</section>
			</div>
			<center class="paginationbox">
				<ul class="pagination">
					<?php
					$result = $product['data']['data_array'];
					$total_records = $allprod['data']['count'];
					$limit = 12;
					$total_pages = ceil($total_records / $limit);
					if($total_pages==0)
						$total_pages=1;
					echo "
                <li>
                	<a href='" . base_url() . "allproduct/1/'>
                		" . 'First Page' . "
                	</a>
                </li>
            ";
					for ($i = 1; $i <= $total_pages; $i++) {
						echo "
					<li>
						<a href='" . base_url() . "allproduct/" . $i . "/'>
                			" . $i . "
                		</a>
					</li>
				";
					};
					echo "
				<li>
					<a href='" . base_url() . "allproduct/" . $total_pages . "/'>
                		" . 'Last Page' . "
                	</a>
				</li>
			";
					?>
				</ul>
			</center>
		</div>
	</div>
</section>
<!-- Product filter section end -->


</html>
