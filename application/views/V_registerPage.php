<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
<!-- checkout section  -->
<section class="checkout-section spad">

    <button class="tablink" onclick="openPage('Personal Account', this, 'red')">Personal Account</button>
    <button class="tablink" onclick="openPage('Buisness Account', this, 'green')" id="defaultOpen">Buisness Account</button>

    <div id="Personal Account" class="tabcontent">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 order-2 order-lg-1">
                    <form class="checkout-form">
                        <div class="row address-inputs">
                            <div class="col-md-12">
                                <input type="text" placeholder="Email">
                                <input type="text" placeholder="Password">
                                <input type="text" placeholder="Password Correction">
                                <input type="text" placeholder="First Name">
                                <input type="text" placeholder="Last Name">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Address">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Phone no.">
                            </div>

                    </form>
                </div>
                <div class="form contact-form">

                    <div class="text-center"><button type="submit">REGISTER</button></div>

                </div>
            </div>
        </div>
    </div>
    </div>

    <div id="Buisness Account" class="tabcontent">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 order-2 order-lg-1">
                    <form class="checkout-form">
                        <div class="row address-inputs">
                            <div class="col-md-12">
                                <input type="text" placeholder="Email">
                                <input type="text" placeholder="Password">
                                <input type="text" placeholder="Password Correction">
                                <input type="text" placeholder="First Name">
                                <input type="text" placeholder="Last Name">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Address">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Phone no.">
                            </div>
                            <div class="col-md-12">
                                <input type="text" placeholder="Institution Name">
                            </div>
                            <div class="col-md-12">
                                <input type="text" placeholder="Institution Address">
                            </div>
                            <div class="col-md-5">
                                <div class="col-md-12" style="bottom" : 22px;>
                                    <label for="sel1">Select list (select one):</label>
                                    <select class="form-control" id="sel1">
                                        <option>Institution type 1</option>
                                        <option>Institution type 2</option>
                                        <option>Institution type 3</option>
                                        <option>Institution type 4</option>
                                    </select>
                                </div>
                            </div>
                    </form>

                </div>
                <div class="form contact-form">
                    <div class="text-center"><button type="submit">REGISTER</button></div>
                </div>
            </div>
        </div>
    </div>
    </div>

</section>

<!--====== Javascripts & Jquery ======-->
<script src="<?php echo base_url(); ?>js/tabs.js"></script>
<script src="<?php echo base_url(); ?>js/registerw3.js"></script>

</body>

</html>