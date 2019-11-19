<!DOCTYPE html>
<html>
<head>
	<title>403 Forbidden</title>
</head>
<body>
<?php
    foreach ($data as $row) {
        echo "
        <p> Nama Produk = $row->productName; </p> 
        <p> Produk Type = $row->productType; </p> 
        <p> Produk Quota = $row->productQuota; </p> 
        <p> Harga Produk = $row->productPrice; </p> 
        <p> Date Post = $row->DatePost; </p> 
        <br>
        <br>
        ";
    }
?>
<p>Directory access is forbidden.</p>

</body>
</html>
