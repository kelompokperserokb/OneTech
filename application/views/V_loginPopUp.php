<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

<form action="<?php echo base_url('account/loginAccount');?>" method="post">
    Email : <input type = "text" name="email"> <br>
    Password : <input type="password" name="password"> <br>
    <input type = "submit" value = "Login">
</form>`

</body>
</html>
