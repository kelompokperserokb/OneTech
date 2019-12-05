<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/bootstrap.min.css"/>
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

<!-- Page info -->
<div class="page-top-info">
    <div class="container">
        <h4>Your cart</h4>
        <div class="site-pagination">
            <a href="">Home</a> /
            <a href="">Your cart</a>
        </div>
    </div>
</div>
<!-- Page info end -->


<!-- cart section end -->
<section class="cart-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-table">
                    <h3>Your Cart</h3>
                    <div class="cart-table-warp">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-th">Product</th>
                                    <th class="quy-th">Quantity</th>
                                    <th class="size-th">Attributes</th>
                                    <th class="total-th">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="product-col">
                                        <img src="<?php echo base_url(); ?>Asset/img/tandatanya.jpg" alt="">
                                        <div class="pc-title">
                                            <h4>CHE40</h4>
                                            <p>Atlantic Welding ...</p>
                                        </div>
                                    </td>
                                    <td class="quy-col">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="1">
                                                <?php echo '<input type="hidden" id ="stock-quota" value="'.$stock.'" />'; ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="size-col">
                                        <h4>varian: 80~130 Ampere</h4>
                                    </td>
                                    <td class="total-col">
                                        <h4>Rp. 900.000</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="product-col">
                                        <img src="img/tandatanya.jpg" alt="">
                                        <div class="pc-title">
                                            <h4>CHE43</h4>
                                            <p>Atlanti Welding ...</p>
                                        </div>
                                    </td>
                                    <td class="quy-col">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="1">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="size-col">
                                        <h4>50~90 Ampere</h4>
                                    </td>
                                    <td class="total-col">
                                        <h4>Rp. 600.000</h4>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="total-cost">
                        <h6>Total <span>Rp. 1.500.000</span></h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 card-right">
                <!--<form class="promo-code-form">
                    <input type="text" placeholder="Enter promo code">
                    <button>Submit</button>
                </form>-->
                <a href="" class="site-btn">Proceed to checkout</a>
                <a href="" class="site-btn sb-dark">Continue shopping</a>
            </div>
        </div>
    </div>
</section>
<!-- cart section end -->



</body>
<script src="js/cart.js"></script>

</html>
