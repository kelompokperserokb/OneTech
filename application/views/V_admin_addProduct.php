<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OneTech Admin</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/seeprod.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css/style.css" />
</head>

<body>
<body style="width: 2500px !important;">
<div class="flex-container">
    <!--<div class="table-wrapper">-->
    <!--<div class="table-title">-->
    <div class="row">
        <div class="col-sm-8">
            <h2>Add <b>Product</b></h2>
        </div>
        <div class="col-sm-4">
            <button type="button" class="btn btn-info add-new" id="add-new-button"><i class="fa fa-plus"></i> Add New</button>
        </div>
    </div>
</div>
<table class="table table-bordered ex1">
    <colgroup>
        <col width="6%">
        <col width="7%">
        <col width="7%">
        <col width="9%">
        <col width="9%">
        <col width="9%">
        <col width="7%">
        <col width="7%">
        <col width="7%">
        <col width="6%">
        <col width="6%">
        <col width="8%">
        <col width="8%">
        <col width="4%">
    </colgroup>
    <div class="fixed_header">
        <thead>
        <tr>
			<th>Merk</th>
            <th>Category</th>
			<th>Sub Category</th>
            <th>Name Product</th>
			<th>CodeProduct</th>
			<th>Price</th>
			<th>Description</th>
            <th>Image1</th>
            <th>Image2</th>
            <th>Image3</th>
            <th>Discount</th>
            <th>Start Date</th>
            <th>Last Date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </div>
</table>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/onetech/product/getData.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/onetech/product/deleteData.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/onetech/product/product_manipulate.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/onetech/product/upload.js"></script>
</body>

</html>
