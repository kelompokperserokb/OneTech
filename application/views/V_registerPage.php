<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>

	<form action="<?php echo base_url('account/checkVerify');?>" method="post">
		Email : <input type = "text" name="email"> <br>
		Password : <input type="password" name="password"> <br>
		Name : <input type = "text" name="name"> <br>
		Address : <input type = "text" name="address"> <br>
		Phone Number : <input type = "text" name="phoneNumber"> <br>
        <input type="hidden" name="accountType" value="Personal">
        <input type="hidden" name="typeOfInstitution" value="">
        <input type="hidden" name="institutionName" value="">
        <input type="hidden" name="institutionAddress" value="">
		<input type = "submit">
	</form>

</body>
</html>
