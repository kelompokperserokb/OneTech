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


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>


<body>


    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="<?php echo base_url(); ?>Asset/img/tandatanya.jpg" alt="" width="72" height="72">
            <h2>Checkout form</h2>
            <!-- <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>-->
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">3</span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Product name</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted">$12</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Third item</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted">$8</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Third item</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted">$5</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between bg-light">
                        <div class="text-success">
                            <h6 class="my-0">Promo code</h6>
                            <small>EXAMPLECODE</small>
                        </div>
                        <span class="text-success">-$5</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong>$20</strong>
                    </li>
                </ul>

                <form class="card p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">Redeem</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Checkout</h4>
                <form class="needs-validation" novalidate>

                    <div class="col-md-6 mb-3">
                        <label for="cc-name">Alamat Pengirim</label>
                        <p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>
                        <small class="text-muted">Full name as displayed on card</small>

                    </div>

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <button type="submit" class="btn btn-secondary">Pilih Alamat lain</button>
                        </div>
                        <div class="col-md-5 mb-3">
                            <button type="submit" class="btn btn-secondary">Kirim ke beberapa alamat</button>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <h4 class="mb-3">Product</h4>
                            <div class="row">
                                <div class="col-sm-2 hidden-xs"><img src="<?php echo base_url(); ?>Asset/img/tandatanya.jpg" alt="..." class="img-responsive" /></div>
                                <div class="col-sm-10">
                                    <h4 class="mb-3">Product 1</h4>
                                    <small class="text-muted">Full name as displayed on card</small>
                                    <p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h4> </h4>
                            <br>
                            <td data-th="Price">$1.99</td>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="cc-expiration">Bukti pembayaran</label>
                            <input type='file' onchange="readURL(this);">
                        </div>

                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                </form>
            </div>
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; 2017-{{ site.time | date: "%Y" }} Company Name</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>

    <script src="<?php echo base_url(); ?>Asset/js/form-validation.js"></script>
</body>

</html>
