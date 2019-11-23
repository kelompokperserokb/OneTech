var base_url = window.location.origin;
$(document).ready(function(){
    $('#login').submit(function(e){
        e.preventDefault();
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;

        var url = base_url.toString()+"/OneTech/Account/loginAccount";
        $.ajax({
            url: url ,
            method: 'post',
            data: {username: username, password: password},
            beforeSend : function(){
                $('#message').text("");
            },
            success: function(response) {
                if (response == "true") {
                    alert('Login Success');
                    window.location.href = base_url.toString()+"/OneTech";
                } else if (response == "false") {
                    $('#message').text("Login Failed, Wrong Username or Password");
                } else {
                    $('#message').text("Please verify your account first, check your email");
                }
            },
        });
    });
    $('.close-modal').click(function(){
        $('#message').text("");
        $('#username').val("");
        $('#password').val("");
    });

    /*Personal account regist*/
     $('#regist-personal').submit(function(e){
        e.preventDefault();
        var password = document.getElementById('password_p').value;
        var password_correction = document.getElementById('password_correction_p').value;
        if (password == password_correction) {
            var email = document.getElementById('email_p').value;
            var first_name = document.getElementById('first_name_p').value;
            var last_name = document.getElementById('last_name_p').value;
            var address = document.getElementById('address_p').value;
            var account_type = document.getElementById('account_type_p').value;
            var phone_number = document.getElementById('phone_number_p').value;
            var institution_name = "";
            var institution_address = "";
            var institution_type = "";

            var url = base_url.toString() + "/OneTech/Account/registData";
            $.ajax({
                url: url,
                method: 'post',
                data: {email: email, password: password, first_name : first_name,
                    last_name : last_name, address : address, account_type : account_type, phone_number : phone_number,
                    institution_name : institution_name, institution_address : institution_address, institution_type : institution_type},
                beforeSend: function () {

                },
                success: function (response) {
                    if (response == "true") {
                        alert('Regist Success, Please Check Email to Activate account');
                        window.location.href = base_url.toString() + "/OneTech";
                    } else if (response == "false") {
                        alert("Email is registered");
                    } else {
                        alert("That is something wrong. Please try again later");
                    }
                },
            });
        } else {

        }
    });

     /*Bussiness Account regist*/
    $('#regist-business').submit(function(e){
        e.preventDefault();
        var password = document.getElementById('password_b').value;
        var password_correction = document.getElementById('password_correction_b').value;
        if (password == password_correction) {
            var email = document.getElementById('email_b').value;
            var first_name = document.getElementById('first_name_b').value;
            var last_name = document.getElementById('last_name_b').value;
            var address = document.getElementById('address_b').value;
            var account_type = document.getElementById('account_type_p').value;
            var phone_number = document.getElementById('phone_number_b').value;
            var institution_name = document.getElementById('institution_name_b').value;;
            var institution_address = document.getElementById('phone_address_b').value;;
            var institution_type = document.getElementById('institution_type_b').value;;

            var url = base_url.toString() + "/OneTech/Account/registData";
            $.ajax({
                url: url,
                method: 'post',
                data: {email: email, password: password, first_name : first_name,
                    last_name : last_name, address : address, account_type : account_type, phone_number : phone_number,
                    institution_name : institution_name, institution_address : institution_address, institution_type : institution_type},
                beforeSend: function () {

                },
                success: function (response) {
                    if (response == "true") {
                        alert('Regist Success, Please Check Email to Activate account');
                        window.location.href = base_url.toString() + "/OneTech";
                    } else if (response == "false") {
                        alert("Email is registered");
                    } else {
                        alert("That is something wrong. Please try again later");
                    }
                },
            });
        } else {

        }
    });

    /*Password Correction for personal*/
    $("#password_correction_p").on(
        "propertychange change keyup paste input", function() {
            var pass = document.getElementById('password_p').value;
            var passCorrect = document.getElementById('password_correction_p').value;

            if (pass == "" && passCorrect == "") {
                document.getElementById('password_correction_p').style.backgroundColor = "#F0f0f0";
            } else if (pass == passCorrect) {
                document.getElementById('password_correction_p').style.backgroundColor = "lightgreen";
            } else {
                document.getElementById('password_correction_p').style.backgroundColor = "red";
            }

        });
    $("#password_p").on(
        "propertychange change keyup paste input", function() {
            var pass = document.getElementById('password_p').value;
            var passCorrect = document.getElementById('password_correction_p').value;

            if (pass == "" && passCorrect == "") {
                document.getElementById('password_correction_p').style.backgroundColor = "#F0f0f0";
            } else if (pass == passCorrect) {
                document.getElementById('password_correction_p').style.backgroundColor = "lightgreen";
            } else {
                document.getElementById('password_correction_p').style.backgroundColor = "red";
            }
        });

    /*Password Correction for Bussines*/
    $("#password_correction_b").on(
        "propertychange change keyup paste input", function() {
            var pass = document.getElementById('password_b').value;
            var passCorrect = document.getElementById('password_correction_b').value;

            if (pass == "" && passCorrect == "") {
                document.getElementById('password_correction_b').style.backgroundColor = "#F0f0f0";
            } else if (pass == passCorrect) {
                document.getElementById('password_correction_b').style.backgroundColor = "lightgreen";
            } else {
                document.getElementById('password_correction_b').style.backgroundColor = "red";
            }

        });
    $("#password_b").on(
        "propertychange change keyup paste input", function() {
            var pass = document.getElementById('password_b').value;
            var passCorrect = document.getElementById('password_correction_b').value;

            if (pass == "" && passCorrect == "") {
                document.getElementById('password_correction_b').style.backgroundColor = "#F0f0f0";
            } else if (pass == passCorrect) {
                document.getElementById('password_correction_b').style.backgroundColor = "lightgreen";
            } else {
                document.getElementById('password_correction_b').style.backgroundColor = "red";
            }
        });
});
