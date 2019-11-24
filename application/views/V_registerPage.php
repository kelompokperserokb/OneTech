<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
<!-- checkout section  -->
<section class="checkout-section spad">
    <button class="tablink" onclick="openPage('Personal Account', this, 'red') " id="defaultOpen">Personal Account</button>
    <button class="tablink" onclick="openPage('Business Account', this, 'green')" >Buisness Account</button>

    <div id="Personal Account" class="tabcontent">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 order-2 order-lg-1">
                    <form class="checkout-form" id="regist-personal" method="post">
                        <div class="row">
                            <input type="hidden" value="personal" id="account_type_p">
                            <div class="col-md-12">
                                <input type="text" placeholder="Email" id="email_p" required>
                                <input type="text" placeholder="Password" id="password_p" required>
                                <input type="text" placeholder="Password Correction" id="password_correction_p" required>
                                <input type="text" placeholder="First Name" id="first_name_p" required>
                                <input type="text" placeholder="Last Name" id="last_name_p" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Address" id="address_p" required>
                            </div>

                            <div class="col-md-6">
                                <input type="text" placeholder="Phone no." id="phone_number_p" required>
                            </div>
                            <div class="contact-form col-md-12">
                                <div class="text-center"><button type="submit">REGISTER</button></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div id="Business Account" class="tabcontent">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 order-2 order-lg-1">
                    <form class="checkout-form" id="regist-business" method="post">
                        <div class="row">
                            <input type="hidden" value="business" id="account_type_b">
                            <div class="col-md-12">
                                <input type="text" placeholder="Email" id="email_b" required>
                                <input type="text" placeholder="Password" id="password_b" required>
                                <input type="text" placeholder="Password Correction" id="password_correction_b" required>
                                <input type="text" placeholder="First Name" id="first_name_b" required>
                                <input type="text" placeholder="Last Name" id="last_name_b" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Address" id="address_b" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Phone no." id="phone_number_b" required>
                            </div>
                            <div class="col-md-12">
                                <input type="text" placeholder="Institution Name" id="institution_name_b" required>
                            </div>
                            <div class="col-md-12">
                                <input type="text" placeholder="Institution Address" id="institution_address_b" required>
                            </div>
                            <div class="col-md-5">
                                <div class="col-md-12" style='bottom : 22px;'>
                                    <label for="institution_type">Institution type: </label>
                                    <select class="form-control" id="institution_type_b" required>
                                        <option> 1</option>
                                        <option> 2</option>
                                        <option> 3</option>
                                        <option> 4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="contact-form col-md-12">
                                <div class="text-center"><button type="submit">REGISTER</button></div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    </div>
</section>

<!--====== Javascripts & Jquery ======-->
<script src="<?php echo base_url(); ?>Asset/js/tabs.js"></script>

</body>

</html>