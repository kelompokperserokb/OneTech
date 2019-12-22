var base_url = window.location.origin;
$(document).ready(function() {
	getProduct();
	$('[data-toggle="tooltip"]').tooltip();

	var edit = false;

	// var actions = '<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>' +
	//     '<a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>' +
	//     '<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>';
	var addbutton = '<button type="button" name="add" id="" class="btn btn-success btn-xs add" data-toggle="tooltip"><i class="fa fa-plus"></i> Add</button>';
	var editbutton = '<button type="button" name="edit" id="" class="btn btn-warning btn-xs edit" data-toggle="tooltip"><i class="fa fa-edit"></i> Edit</button>';
	var addeditbutton = '<button type="button" name="add" id="" class="btn btn-success btn-xs add" data-toggle="tooltip"><i class="fa fa-plus"></i> Add</button>' +
		'<button type="button" name="edit" id="" class="btn btn-warning btn-xs edit" data-toggle="tooltip"><i class="fa fa-edit"></i> Edit</button>';
	var deletebutton = '<button type="button" name="delete" id="" class="btn btn-danger btn-xs delete" data-toggle="tooltip"><i class="fa fa-remove"></i> Cancel</button>';

	// Append table with add row form on add new button click
	$(".add-new").click(function() {
		$(this).attr("disabled", "disabled");

		var index = $("table tbody tr:last-child").index();

		var url = base_url.toString() + "/onetech/Admin/getMerkCategory";
		$.ajax({
			url: url,
			beforeSend: function () {

			},
			success: function (response) {
				let data = response.split('##');
				let dataMerk = data[0].split("%");
				let dataCategory = data[1].split("%");
				let listMerk = '', listCategory = '';

				for (var i = 1; i<dataMerk.length; i++){
					let subData = dataMerk[i].split(';');
					listMerk += '<option value="' + subData[0] + '"> <input type="hidden" class="list-category" id="'+subData[0].replace(/ /g, "-")+'" value ="'+subData[1]+'">';
				}
				for (var i = 0; i<dataCategory.length - 1; i++){
					let subData = dataCategory[i].split(';');
					listCategory += '<option value="' + subData[0] + '"> <input type="hidden" class="list-category" id="'+subData[0].replace(/ /g, "-")+'" value ="'+subData[1]+'">';
				}
				printAddProduct(listMerk, listCategory, index);
			},
		});
	});

	function printAddProduct(listMerk, listCategory, index){
		var row = '<tr>' +
			'<input type="hidden" class="form-control" name="product-id" id="product-id" value="null">' +

			'<td><input autocomplete="off" type="text" class="form-control" name="product-name" id="product-name" value=""></td>' +
			'<td><input autocomplete="off" type="text" class="form-control" name="product-code" id="product-code" value=""></td>' +
			'<td><input autocomplete="off" type="number" class="form-control" name="discount" id="discount" value="0"></td>' +
			'<td><input autocomplete="off" type="date" id="start" name="date-start" value="2019-07-22" min="2019-01-01" max="2030-12-31" id="date-start" value=""></td>' +
			'<td><input autocomplete="off" type="date" id="start" name="date-end" value="2019-07-22" min="2019-01-01" max="2030-12-31" id="date-end" value=""></td>' +
			'<td>' + addeditbutton + '</td>' +
			'<td>' + deletebutton + '</td>' +
			'</tr>';
		$("table").append(row);

		$("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
		$("table tbody tr").eq(index + 1).find('td input').first().focus();
		$('[data-toggle="tooltip"]').tooltip();
	}

	// Add row on add button click
	$(document).on("click", ".add", function() {
		var empty = false;
		var input = $(this).parents("tr").find('input').not('.list-category');
		input.each(function() {
			if ($(this).val() == null) {
				$(this).addClass("error");
				empty = true;
			} else {
				$(this).removeClass("error");
			}
		});

		var product_id = "";


		var product_name = input[7].value;
		var product_code = input[8].value;

		var discount = input[14].value;
		var date_start = input[15].value;
		var date_end = input[16].value;

		if (!empty) {
			if (edit == true) {
				product_id = input[3].value;

				var url = base_url.toString() + "/onetech/Admin/editProduct";
				$.ajax({
					url: url,
					method: 'post',
					data: {
						product_id: product_id,
						product_name: product_name,
						product_code: product_code,
						discount: discount,
						date_start: date_start,
						date_end: date_end,
					},
					beforeSend: function () {

					},
					success: function () {
						alert('Product Updated');

						$(input[7]).parent("td").html(product_name);
						$(input[8]).parent("td").html(product_code);

						$(input[14]).parent("td").html(discount);
						$(input[15]).parent("td").html(date_start);
						$(input[16]).parent("td").html(date_end);
					},
				});
			} else {
				$.ajax({
					url: url,
					method: 'post',

					data: {

						product_name: product_name,
						product_code: product_code,

						discount: discount,
						date_start: date_start,
						date_end: date_end,
					},

					beforeSend: function () {

					},
					success: function (response) {
						alert('Product Added' + response);
						$(input[3]).parent("td").html(response);
					},
				});

				$(this).parents("tr").find(".error").first().focus();

				$(input[7]).parent("td").html(product_name);
				$(input[8]).parent("td").html(product_code);

				$(input[14]).parent("td").html(discount);
				$(input[15]).parent("td").html(date_start);
				$(input[16]).parent("td").html(date_end);

				$(".add-new").removeAttr("disabled");
			}
			$(this).parents("tr").find(".add, .edit").toggle();
		}
	});


	// Edit row on edit button click
	$(document).on("click", ".edit", function() {

		let column = $(this).parents("tr").find("td:not(:last-child)");

		printEditProduct(column);

		$.ajax({
			url: url,
			beforeSend: function () {

			},
			success: function (response) {


			},
		});

		$(this).parents("tr").find(".add, .edit").toggle();
	});

	function printEditProduct(column, listOptionMerk, listOptionCategory, selectedOptionMerk, selectedOptionCategory){
		$(column[3]).html('<input autocomplete="off" type="text" class="form-control" name="product-name" id="product-name" value="'+$(column[3]).text()+'">');
		$(column[4]).html('<input autocomplete="off" type="text" class="form-control" name="product-code" id="product-code" value="'+$(column[4]).text()+'">');

		$(column[10]).html('<input autocomplete="off" type="number" class="form-control" name="discount" id="discount" value="'+$(column[10]).text()+'">');
		$(column[11]).html('<input autocomplete="off" type="date" id="start" name="date-start" value="2019-07-22" min="2019-01-01" max="2030-12-31" id="date-start" value="'+$(column[11]).text()+'">');
		$(column[12]).html('<input autocomplete="off" type="date" id="start" name="date-end" value="2019-07-22" min="2019-01-01" max="2030-12-31" id="date-end" value="'+$(column[12]).text()+'">');

		$(".add-new").attr("disabled", "disabled");
		edit = true;
	}


	// Delete row on delete button click
	$(document).on("click", ".delete", function() {
		var productid = ($(this).parents("tr").find('input'))[3].value;
		if(deleteProduct(productid)) {
			$(this).parents("tr").remove();
			$(".add-new").removeAttr("disabled");
		}
	});
});
