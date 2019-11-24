<html>

<head>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/login.css" />
</head>

<body>
<div class="container">
    <div class="loginbox col-4">
        <img src="<?php echo base_url(); ?>Asset/img/user.png" class="user">

        <form>
            <p>Email</p>
            <input type="text" name="" placeholder="Email">
            <p>Password</p>
            <input type="Password" name="" placeholder="Enter Password">
            <input type="submit" name="" value="Login">
            <a href="<?php echo base_url(); ?>register">Create New Account</a>
        </form>
    </div>
</div>
</body>
</html>