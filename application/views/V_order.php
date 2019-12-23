<!DOCTYPE html>
<!-- layout: examples title: Checkout example extra_css: "form-validation.css" extra_js: "form-validation.js" body_class: "bg-light" --->
<head>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/bootstrap.min.css" />
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
            	$normal_price = $order->totalPrice + $total_discount;
                $total_price = $order->totalPrice + $order->logistic_price + $order->unique_price;
                echo '<div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <input type="hidden" id="o-id" value="'.$order->order_id.'">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your Order</span>
                          <span class="badge badge-secondary badge-pill">'. $orderitem_count .'</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total Harga Barang</span>
                            <strong>Rp. ' . number_format($normal_price, 2, ",", ".") . '</strong>
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
                            <span>Discount</span>
                            <strong>- Rp. ' . number_format($total_discount, 2, ",", ".") . '</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <strong s>Total Pembayaran</strong>
                            <strong>Rp. ' . number_format($total_price, 2, ",", ".") . '</strong>
                        </li>
                    </ul>
			    </div>
                <div class="col-md-8 order-md-1">
                	<div class="container card">
                    <h4 class="mb-3">Alamat Pengiriman</h4>
                    <form class="needs-validation" novalidate>
    
                        <div id="first-address-form">
                            <div class="col-md-6 mb-3">
                                <label id="address-detail">Alamat :</label>
                                <p id="address-detail-value">'. $order->address_order .'</p>
                                <label id="telephone-detail">No Telepon :</label>
                                <p id="telephone-detail-value">'. $order->phonenumber_order .'</p>
                            </div>
                        </div>
                        <div id="another-address-form" class="none">
                            <div class="col-md-12 mb-3">
                                <label for="alamat">Alamat </label>
                                <input type="alamat" class="form-control" id="alamat" placeholder="" required>
                                <div class="invalid-feedback">
                                    Please enter a valid address for shipping updates.
                                </div>
                            </div>
        
                            <div class="col-md-12 mb-3">
                                <label for="phone">No. HP</label>
                                <input type="phone" class="form-control" id="phone" placeholder="" required>
                                <div class="invalid-feedback">
                                    Please enter your no. hp address.
                                </div>
                            </div>
                            <div class="col-md-5 mb-3">
                                <button class="button select-button" id="save-address">Simpan Alamat</button>
                            </div>                
                        </div>'.
                        ($status == 0 ?
                         '<div class="row marg">
                            <div class="col-md-5 mb-3">
                                <button class="button select-button" id="first-address-button">Alamat Anda</button>
                            </div>
                            <div class="col-md-5 mb-3">
                                <button class="button" id="another-address-button">Pilih alamat lain</button>
                            </div>
                        </div>' : '')
                        .'
                        </form>
                        </div>
                        <br>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="mb-3">Product</h4>';
                                foreach ($orderitem as $row){
									$pricetoview = $row->product_price;
									if($row->discount > 0 && $row->discount < 100) {
										$order_date = date("Y-m-d");
										$order_date = date('Y-m-d', strtotime($order_date));
										$begin = date('Y-m-d', strtotime($row->startDateDiscount));
										$end = date('Y-m-d', strtotime($row->lastDateDiscount));
										if(($order_date >= $begin) && ($order_date <= $end)) {
											$pricetoview = $row->product_price - ($row->product_price * ($row->discount/100));
										}
									}
                                	echo '
									<div class="row">
										<div class="col-sm-2 hidden-xs"><img src="'.$row->product_img_1.'" alt="image product" class="img-responsive" /></div>
										<div class="col-sm-10">
											<h4 class="mb-3">'. $row->product_name .'</h4>
											<p>'. $row->product_desc .'</p>
											<small class="text-muted">Rp. ' . number_format($pricetoview, 2, ",", ".") . ' x '. $row->quantity .' barang</small>
										</div>
										<div class="col-md-12 sub-total">
											<h4 >Subtotal</h4> 
											<p  align="right">Rp. ' . number_format(($pricetoview * $row->quantity), 2, ",", ".") . '</p>
										</div>
									</div>';
								}
                            echo '</div>
                        </div>
                        <div class="container card">';
                			if ($status == 0) {
                   				echo $text;
                			} else if ($status == 1 || $status == 2) {
                    			echo '
                                	<div class="row">
                                    	<div class="col-md-5 mb-3">
                                        	<h4 class="mb-3">Bukti Pembayaran</h4>
                                        	<input accept="image/jpeg,image/png" id="bukti_pembayaran" type="file">
                                        	<input id="upload-bukti" type="submit">
                                    	</div>
                                	</div>';
                    			echo $text;
                			} else {
                    			echo $text;
                			}
            			}
            	echo '</div>
			</div>
		</div>'; ?>

	</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>Asset/js/form-validation.js"></script>
    <script src="<?php echo base_url(); ?>Asset/js/onetech/order/order.js"></script>
    <script src="<?php echo base_url(); ?>Asset/js/onetech/math.js"></script>
</body>

</html>
