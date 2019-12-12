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
            <div class="col-lg-8">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/cart.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/onetech/math.js"></script>
</body>


</html>
