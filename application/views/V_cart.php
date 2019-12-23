<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/bootstrap.min.css"/>
	<style>
		.site-btn.disabled, .site-btn:disabled {cursor: not-allowed;}
	</style>
</head>

<body>

<!-- Page info -->
<div class="page-top-info">
    <div class="container">
        <h4>Your cart</h4>
        <div class="site-pagination">
            <a href="<?php echo base_url();?>">Home</a> /
            <a href="">Your cart</a>
        </div>
    </div>
</div>
<!-- Page info end -->


<!-- cart section end -->
<section class="cart-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-cart-table">
                    <h3>Your Cart</h3>
                    <div class="cart-table-warp">
                        <table>
                            <thead >
                                <col width="48%">
                                <col width="4%">
                                <col width="20%">
                                <col width="28%">
                                <tr">
                                    <th class="product-th">Product</th>
                                    <th class="quy-th">Quantity</th>
                                    <th class="attributes">Attributes</th>
                                    <th class="total-th">Price</th>
                                </tr>
                            </thead>
                            <tbody id="table-cart">
                                <?php
                                    for ($i = 0; $i < $data['count'] ; $i++ ) {
                                        $total = $data['data_array'][$i]->quantity * $data['data_array'][$i]->product_price;
                                        echo '<tr>
                                            <td class="cart-product-col">
                                                <img src="' . base_url() . 'Asset/img/tandatanya.jpg" alt="">
                                                <div class="cart-pc-title">
                                                    <h4>' . $data['data_array'][$i]->product_name . '</h4>
                                                    <p>' . $data['data_array'][$i]->product_code . '</p>
                                                </div>
                                            </td>
                                            <td class="quy-col">
                                                <div class="quantity">
                                                    <div class="pro-qty" id="4590">
                                                        <input id="qty" type="text" value="'.$data['data_array'][$i]->quantity.'">
                                                        <input type="hidden" id ="stock-quota" value="' . $data['data_array'][$i]->quota . '" />
                                                        <input type="hidden" id ="type_id" value="' . $data['data_array'][$i]->type_id . '" />
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart-attributes-col">
                                                <h4>' . $data['data_array'][$i]->product_type . '</h4>
                                            </td>
                                            <td class="cart-total-col" id="product-price">
                                                <h4 class="price">Rp. ' . number_format($total, 2, ",", ".") . '</h4>
                                                <input class="price-hidden" type="hidden" value="' . $data['data_array'][$i]->product_price . '">
                                            </td>
                                        </tr>';
                                    }
                                ?>
                        </table>
                    </div>
                    <div class="total-cost">
                        <h6>Total <span>Rp. 0,00</span></h6>
                    </div>
                </div>
            </div>

			<div class="col-lg-6 card-right">
			</div>
			<div class="col-lg-3 card-right">
				<a href="<?php echo base_url() ?>" class="site-btn sb-dark">Continue shopping</a>
			</div>
			<div class="col-lg-3 card-right">
				<?php if ($data['count'] > 0) echo '<button class="site-btn" id="proceed-order" >Proceed to checkout</button>';
				else echo '<button disabled="disabled" class="site-btn" id="proceed-order" >Proceed to checkout</button>'; ?>
			</div>
        </div>
    </div>
</section>
<!-- cart section end -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/cart.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/onetech/math.js"></script>
</body>


</html>
