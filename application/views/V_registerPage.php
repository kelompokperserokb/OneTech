<!DOCTYPE html>
<html lang="en">

<head>
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
                                <div class="col-md-12" style='bottom : 22px;'>
                                    <label for="sel1">Institution type: </label>
                                    <select class="form-control" id="sel1">
                                        <option> 1</option>
                                        <option> 2</option>
                                        <option> 3</option>
                                        <option> 4</option>
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

</body>

</html>