<!DOCTYPE html>
<html lang="en">

<!-- layout: examples title: Checkout example extra_css: "form-validation.css" extra_js: "form-validation.js" body_class: "bg-light" --->

<head>
    <title>OneTech</title>
    <meta charset="UTF-8">
    <meta name="description" content=" One Tech">
    <meta name="keywords" content="One Tech">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="img/favicon.png" rel="shortcut icon" />

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
    <link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/order.css" />


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>


<body>


	<div class="container checkout">
		<div class="py-5 text-center">
			<!--<img class="d-block mx-auto mb-4" src="<?php /*echo base_url(); */?>Asset/img/tandatanya.jpg" alt="" width="72" height="72">-->
			<h2>Checkout form</h2>
			<!-- <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>-->
		</div>

        <?php
            if ($status == -1) {
                echo '<div class="col-md-12 text-center"><strong>'.$text.'</strong></div>';
            }
            else {
                $total_price = $order->totalPrice + $order->logistic_price + $order->unique_price;
                echo '<div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your Order</span>
                          <span class="badge badge-secondary badge-pill">'. $orderitem_count .'</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total Harga Barang</span>
                            <strong>Rp. ' . number_format($order->totalPrice, 2, ",", ".") . '</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Biaya Kirim</span>
                            <strong>Rp. ' . number_format($order->logistic_price, 2, ",", ".") . '</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Kode Unik</span>
                            <strong>Rp. ' . number_format($order->unique_price, 2, ",", ".") . '</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <strong s>Total Pembayaran</strong>
                            <strong>Rp. ' . number_format($total_price, 2, ",", ".") . '</strong>
                        </li>
                    </ul>
			    </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Alamat Pengiriman</h4>
                    <form class="needs-validation" novalidate>
    
                        <div id="first-address-form">
                            <div class="col-md-6 mb-3">
                                <label id="address-detail">Alamat</label>
                                <p>'. $order->address_order .'</p>
                                <label id="telephone-detail">No Telepon</label>
                                <p>'. $order->phonenumber_order .'</p>
                            </div>
                        </div>
                        <div id="another-address-form" class="none">
                            <div class="mb-3">
                                <label for="alamat">Alamat </label>
                                <input type="alamat" class="form-control" id="alamat" placeholder="Jl. Jakarta" required>
                                <div class="invalid-feedback">
                                    Please enter a valid address for shipping updates.
                                </div>
                            </div>
        
                            <div class="mb-3">
                                <label for="phone">No. HP</label>
                                <input type="phone" class="form-control" id="phone" placeholder="0833xxx" required>
                                <div class="invalid-feedback">
                                    Please enter your no. hp address.
                                </div>
                            </div>
                            <div class="col-md-5 mb-3">
                                <button class="button select-button" id="save-address">Simpan Alamat</button>
                            </div>                
                        </div>
    
                         <div class="row">
                            <div class="col-md-5 mb-3">
                                <button class="button select-button" id="first-address-button">Alamat Anda</button>
                            </div>
                            <div class="col-md-5 mb-3">
                                <button class="button" id="another-address-button">Kirim ke beberapa alamat</button>
                            </div>
                        </div> 
                        
                        <br>
    
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="mb-3">Product</h4>';
                                foreach ($orderitem as $row){
                                	echo '
									<div class="row">
										<div class="col-sm-2 hidden-xs"><img src="'.$row->product_img_1.'" alt="image product" class="img-responsive" /></div>
										<div class="col-sm-10">
											<h4 class="mb-3">'. $row->product_name .'</h4>
											<p>'. $row->product_desc .'</p>
											<small class="text-muted">Rp. ' . number_format($row->product_price, 2, ",", ".") . '</small>
											<br> <small class="text-muted">'. $row->quantity .' barang</small>
										</div>
										<div class="col-md-12 sub-total">
											<h4 >Subtotal</h4> 
											<p  align="right">Rp. ' . number_format(($row->product_price * $row->quantity), 2, ",", ".") . '</p>
										</div>
									</div>';
								}
                            echo '</div>
                        </div>';

                if ($status == 0) {
                    echo $text;
                } else if ($status == 1) {
                    echo '
                                <div class="row">
                                    <div class="col-md-5 mb-3">
                                        <h4 class="mb-3">Bukti Pembayaran</h4>
                                        <input type=\'file\' onchange="readURL(this);">
                                    </div>
                                </div>;';
                } else if ($status == 2) {
                    echo $text;
                }
            }

				echo '</form>
			</div>
		</div>'; ?>

	</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>Asset/js/form-validation.js"></script>
    <script src="<?php echo base_url(); ?>Asset/js/onetech/order/order.js"></script>
    <script src="<?php echo base_url(); ?>Asset/js/onetech/math.js"></script>
</body>

</html>
