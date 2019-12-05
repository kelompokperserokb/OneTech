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
            <h2>See <b>Product</b></h2>
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
            <th>Category</th>
            <th>Merk</th>
            <th>Name Product</th>
            <th>Image1</th>
            <th>Image2</th>
            <th>Image3</th>
            <th>CodeProduct</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Start Date</th>
            <th>Last Date</th>
            <th>Description</th>
            <th>Description Type Product</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <!--<tr>
            <td>Administration</td>
            <td>Administration</td>
            <td>John Doe</td>
            <td class="w-25">
                <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/sheep-5.jpg" class="img-fluid img-thumbnail" alt="Sheep">
            </td>
            <td class="w-25">
                <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/sheep-5.jpg" class="img-fluid img-thumbnail" alt="Sheep">
            </td>
            <td class="w-25">
                <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/sheep-5.jpg" class="img-fluid img-thumbnail" alt="Sheep">
            </td>
            <td>Administration</td>
            <td>Administration</td>
            <td>Administration</td>
            <td><input type="date" id="start" name="trip-start" value="2018-07-22" min="2018-01-01" max="2018-12-31"></td>
            <td><input type="date" id="start" name="trip-start" value="2018-07-22" min="2018-01-01" max="2018-12-31"></td>
            <td>Administration</td>
            <td>Administration</td>
            <td>
                <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
            </td>
        </tr>-->

        <tr>
            <!--<form>
            <td><input type="text" class="form-control" name="category" id="category"></td>
            <td><input type="text" class="form-control" name="merk" id="merk"></td>
            <td><input type="text" class="form-control" name="name-product" id="name-product"></td>
            <td><input type="file" accept="image/jpeg" class="form-control" name="image-product1" id="image-product1"></td>
            <td><input type="file" accept="image/jpeg" class="form-control" name="image-product2" id="image-product2"></td>
            <td><input type="file" accept="image/jpeg" class="form-control" name="image-product3" id="image-product3"></td>
            <td><input type="text" class="form-control" name="code-product" id="code-product"></td>
            <td><input type="text" class="form-control" name="price" id="price"></td>
            <td><input type="text" class="form-control" name="discount" id="discount"></td>
            <td><input type="date" id="start" name="date-start" value="2019-07-22" min="2019-01-01" max="2030-12-31" id="date-start"></td>
            <td><input type="date" id="start" name="date-end" value="2019-07-22" min="2019-01-01" max="2030-12-31" id="date-end"></td>
            <td><input type="text" class="form-control" name="desc-product" id="desc-product"></td>
            <td><input type="text" class="form-control" name="desc-type" id="desc-type"></td>
            <td>
                <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
            </td>
            </form>-->
        </tr>
        </tbody>
    </div>
</table>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/seeprod.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/onetech/product/upload.js"></script>
</body>

</html>