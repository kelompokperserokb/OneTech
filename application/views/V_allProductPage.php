<!DOCTYPE html>
<html lang="en">

<head>

</head>


<!-- RELATED PRODUCTS section -->
<section class="related-product-section">
    <div class="container">
        <div class="section-title">
            <h2>PRODUCT</h2>
        </div>

        <!-- Product filter section -->
        <section class="product-filter-section">
            <div class="container">
                <div class="section-title">
                    <h2>BROWSE TOP SELLING PRODUCTS</h2>
                </div>
				<div class="row">
					<?php for($i = 0 ; $i<$product['data']['count']; $i++){
						echo '<div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <a href="'.base_url().'product/'.$product['data']['data_array'][$i]->product_id.'/">
                                <img src="'.base_url().'Asset/img/products/'.($i+1).'.jpg" alt="">
                            </a>
                            <div class="pi-links">
                                <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
<!--                                <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>-->
                            </div>
                        </div>
                        <div class="pi-text">
                            <h6>Rp. '.number_format($product['data']['data_array'][$i]->product_price,2,",",".").'</h6>
                            <a href="'.base_url().'product/'.$product['data']['data_array'][$i]->product_id.'/">
                                <p>'.$product['data']['data_array'][$i]->product_name.'</p>
                            </a>
                        </div>
                    </div>
                </div>';
					} ?>

				</div>
            </div>
        </section>
        <!-- Product filter section end -->
    </div>
</section>
</html>
