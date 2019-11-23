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
});
