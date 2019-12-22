// var actions = '<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>' +
//     '<a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>' +
//     '<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>';
var addbutton = '<button type="button" name="add" id="" class="btn btn-success btn-xs add" data-toggle="tooltip"><i class="fa fa-plus"></i> Add</button>';
var editbutton = '<button type="button" name="edit" id="" class="btn btn-warning btn-xs edit" data-toggle="tooltip"><i class="fa fa-edit"></i> Edit</button>';
var addeditbutton = '<button type="button" name="add" id="" class="btn btn-success btn-xs add" data-toggle="tooltip"><i class="fa fa-plus"></i> Add</button>' +
	'<button type="button" name="edit" id="" class="btn btn-warning btn-xs edit" data-toggle="tooltip"><i class="fa fa-edit"></i> Edit</button>';
var deletebutton = '<button type="button" name="delete" id="" class="btn btn-danger btn-xs delete" data-toggle="tooltip"><i class="fa fa-trash"></i> Delete</button>';

function getMerk(){

    var url = base_url.toString() + "/onetech/Admin/getMerk";
    $.ajax({
        url: url,
        beforeSend: function () {

        },
        success: function (response) {
            var data = response.split('%');

            for (var i = 0; i<data.length -1 ; i++){
                var subData = data[i].split(';');
                printMerk(subData);
            }
        },
    });


}

function printMerk(data){
    var row = '<tr><input type="hidden" class="form-control" name="merk-id" id="merk-id" value="'+ data[1] +'">' +
        '<td>'+ data[0] +'</td>' +
        '<td>' + addeditbutton + '</td>' +
		'<td>' + deletebutton + '</td>' +
        '</tr>';
    $("table").append(row);
}

function getCategory(){

    var url = base_url.toString() + "/onetech/Admin/getCategory";
    $.ajax({
        url: url,
        beforeSend: function () {

        },
        success: function (response) {
            var data = response.split('%');

            for (var i = 0; i<data.length -1 ; i++){
                var subData = data[i].split(';');
                printCategory(subData);
            }
        },
    });


}

function printCategory(data){
    var row = '<tr><input type="hidden" class="form-control" name="category-id" id="category-id" value="'+ data[1] +'">' +
        '<td>'+ data[0] +'</td>' +
        '<td>' + addeditbutton + '</td>' +
		'<td>' + deletebutton + '</td>' +
        '</tr>';
    $("table").append(row);
}

function getSubCategory(){

    var url = base_url.toString() + "/onetech/Admin/getSubCategory";
    $.ajax({
        url: url,
        beforeSend: function () {

        },
        success: function (response) {
            var data = response.split('%');

            for (var i = 0; i<data.length -1 ; i++){
                var subData = data[i].split(';');
                printSubCategory(subData);
            }
        },
    });
}

function printSubCategory(data){
    var row = '<tr><input type="hidden" class="form-control" name="category-id" id="category-id" value="'+ data[1] +'">' +
        '<input type="hidden" class="form-control" name="subcategory-id" id="subcategory-id" value="'+ data[3] +'">' +
        '<td>'+ data[0] +'</td>' +
        '<td>'+ data[2] +'</td>' +
        '<td>' + addeditbutton + '</td>' +
		'<td>' + deletebutton + '</td>' +
        '</tr>';
    $("table").append(row);
}

function getProduct(){
	var url = base_url.toString() + "/onetech/Admin/getProduct";
	$.ajax({
		url: url,
		beforeSend: function () {

		},
		success: function (response) {
			var data = response.split('%%');

			for (var i = 0; i<data.length -1 ; i++){
				var subData = data[i].split('##');
				printProduct(subData);
			}
		},
	});


}

function printProduct(data){
	var row = '<tr>'+
		'<input type="hidden" class="form-control" name="merk-id" id="merk-id" value="'+ data[0] +'">' +
		'<input type="hidden" class="form-control" name="category-id" id="category-id" value="'+ data[1] +'">' +
		'<input type="hidden" class="form-control" name="subcategory-id" id="subcategory-id" value="'+ data[2] +'">' +
		'<input type="hidden" class="form-control" name="product-id" id="product-id" value="'+ data[3] +'">' +
		'<td>'+ data[4] +'</td>' +
		'<td>'+ data[5] +'</td>' +
		'<td>'+ data[6] +'</td>' +
		'<td>'+ data[7] +'</td>' +
		'<td>'+ data[8] +'</td>' +
		'<td>'+ data[9] +'</td>' +
		'<td>'+ data[10] +'</td>' +
		'<td><img src="'+data[11] +'" ></td>' +
		'<td><img src="'+data[12] +'" ></td>' +
		'<td><img src="'+data[13] +'" ></td>' +
		'<td>' + addeditbutton + '</td>' +
		'<td>' + deletebutton + '</td>' +
		'</tr>';
	$("table").append(row);
}

function getTypeProduct(){

	var url = base_url.toString() + "/onetech/Admin/getTypeProduct";
	$.ajax({
		url: url,
		beforeSend: function () {

		},
		success: function (response) {
			var data = response.split('%');

			for (var i = 0; i<data.length -1 ; i++){
				var subData = data[i].split(';');
				printTypeProduct(subData);
			}
		},
	});
}

function printTypeProduct(data){
	var row = '<tr>'+
		'<input type="hidden" class="form-control" name="product-id" id="product-id" value="'+ data[0] +'">' +
		'<input type="hidden" class="form-control" name="type-id" id="type-id" value="'+ data[2] +'">' +
		'<td>'+ data[1] +'</td>' +
		'<td>'+ data[3] +'</td>' +
		'<td>'+ data[4] +'</td>' +
		'<td>'+ data[5] +'</td>' +
		'<td>' + addeditbutton + '</td>' +
		'<td>' + deletebutton + '</td>' +
		'</tr>';
	$("table").append(row);
}

