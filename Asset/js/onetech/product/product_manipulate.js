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
			'<input type="hidden" class="form-control" name="merk-id" id="merk-id" value="null">' +
			'<input type="hidden" class="form-control" name="category-id" id="category-id" value="null">' +
			'<input type="hidden" class="form-control" name="subcategory-id" id="subcategory-id" value="null">' +
			'<input type="hidden" class="form-control" name="product-id" id="product-id" value="null">' +
			'<td><input autocomplete="off"  type="text" class="form-control" name="merk-name" id="merk-name" list="listmerk" value="">' +
			'<datalist id="listmerk" class="list-category">' +
			listMerk +
			'</datalist></td>' +
			'<td><input autocomplete="off" type="text" class="form-control" name="category-name" id="category-name" onchange="changeValueCategoryName()" list="listcategory" value="">' +
			'<datalist id="listcategory" class="list-category">' +
			listCategory +
			'</datalist></td>' +
			'<td><input autocomplete="off" readonly type="text" class="form-control" name="subcategory-name" id="subcategory-name" list="listsubcategory" value="">' +
			'<datalist id="listsubcategory" class="list-category">' +
			'</datalist></td>' +
			'<td><input autocomplete="off" type="text" class="form-control" name="product-name" id="product-name" value=""></td>' +
			'<td><input autocomplete="off" type="text" class="form-control" name="product-code" id="product-code" value=""></td>' +
			'<td><input autocomplete="off" type="number" class="form-control" name="product-price" id="product-price" value="0"></td>' +
			'<td><input autocomplete="off" type="text" class="form-control" name="desc-product" id="desc-product" value=""></td>' +
			'<td><input autocomplete="off" type="file" accept="image/jpeg" class="form-control" name="image-product1" id="image-product1" value=""><img id="preview-image1" src=""></td>' +
			'<td><input autocomplete="off" type="file" accept="image/jpeg" class="form-control" name="image-product2" id="image-product2" value=""><img id="preview-image2" src=""></td>' +
			'<td><input autocomplete="off" type="file" accept="image/jpeg" class="form-control" name="image-product3" id="image-product3" value=""><img id="preview-image3" src=""></td>' +
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
		var merk_name = input[4].value;
		var category_name = input[5].value;
		var subcategory_name = input[6].value;

		var merk_id = ($("#listmerk").find('#' + merk_name.replace(/ /g, "-")))[0].value;
		var category_id = ($("#listcategory").find('#' + category_name.replace(/ /g, "-")))[0].value;
		var subcategory_id = ($("#listsubcategory").find('#' + subcategory_name.replace(/ /g, "-")))[0].value;

		var product_name = input[7].value;
		var product_code = input[8].value;
		var product_price = input[9].value;
		var product_desc = input[10].value;

        if (!empty) {
			if (edit == true) {
				var image1 = $("#image-product1").prop('files')[0];
				var image2 = $("#image-product2").prop('files')[0];
				var image3 = $("#image-product3").prop('files')[0];

				let image_product1 = $('#image-product1').attr('value');
				let image_product2 = $('#image-product2').attr('value');
				let image_product3 = $('#image-product3').attr('value');

				var formData = new FormData();
				formData.append('image-product1', image1);
				formData.append('image-product2', image2);
				formData.append('image-product3', image3);

				var url = base_url.toString() + "/onetech/Admin/upload";
				$.ajax({
					url: url,
					method: 'post',
					data: formData,
					processData: false,
					contentType: false,
					beforeSend: function () {

					},
					success: function (response) {
						if (response.length != 0) {
							var data = response.split(";");
							product_id = input[3].value;

							image_product1 = data[0];
							image_product2 = data[1];
							image_product3 = data[2];

							var url = base_url.toString() + "/onetech/Admin/editProduct";
							$.ajax({
								url: url,
								method: 'post',
								data: {
									merk_id: merk_id,
									category_id: category_id,
									subcategory_id: subcategory_id,
									product_id: product_id,
									product_name: product_name,
									product_code: product_code,
									product_price: product_price,
									product_desc: product_desc,
									image_product1: image_product1,
									image_product2: image_product2,
									image_product3: image_product3,
								},
								beforeSend: function () {

								},
								success: function () {
									alert('Product Updated');

									$(input[0]).val(merk_id);
									$(input[1]).val(category_id);
									$(input[2]).val(subcategory_id);

									$(input[4]).parent("td").html(merk_name);
									$(input[5]).parent("td").html(category_name);
									$(input[6]).parent("td").html(subcategory_name);
									$(input[7]).parent("td").html(product_name);
									$(input[8]).parent("td").html(product_code);
									$(input[9]).parent("td").html(product_price);
									$(input[10]).parent("td").html(product_desc);
									$(input[11]).parent("td").html('<img id="preview-image1" src="' + image_product1 + '">');
									$(input[12]).parent("td").html('<img id="preview-image2" src="' + image_product2 + '">');
									$(input[13]).parent("td").html('<img id="preview-image3" src="' + image_product3 + '">');
								},
							});
						} else {
							var url = base_url.toString() + "/onetech/Admin/editProduct";
							$.ajax({
								url: url,
								method: 'post',
								data: {
									merk_id: merk_id,
									category_id: category_id,
									subcategory_id: subcategory_id,
									product_id: product_id,
									product_name: product_name,
									product_code: product_code,
									product_price: product_price,
									product_desc: product_desc,
									image_product1: image_product1,
									image_product2: image_product2,
									image_product3: image_product3,
								},
								beforeSend: function () {

								},
								success: function () {
									alert('Product Updated');

									$(input[0]).val(merk_id);
									$(input[1]).val(category_id);
									$(input[2]).val(subcategory_id);

									$(input[4]).parent("td").html(merk_name);
									$(input[5]).parent("td").html(category_name);
									$(input[6]).parent("td").html(subcategory_name);
									$(input[7]).parent("td").html(product_name);
									$(input[8]).parent("td").html(product_code);
									$(input[9]).parent("td").html(product_price);
									$(input[10]).parent("td").html(product_desc);
									$(input[11]).parent("td").html('<img id="preview-image1" src="' + image_product1 + '">');
									$(input[12]).parent("td").html('<img id="preview-image2" src="' + image_product2 + '">');
									$(input[13]).parent("td").html('<img id="preview-image3" src="' + image_product3 + '">');
								},
							});
						}
					},
				});
			} else {
				var image1 = $("#image-product1").prop('files')[0];
				var image2 = $("#image-product2").prop('files')[0];
				var image3 = $("#image-product3").prop('files')[0];

				var formData = new FormData();
				formData.append('image-product1', image1);
				formData.append('image-product2', image2);
				formData.append('image-product3', image3);

				var url = base_url.toString() + "/onetech/Admin/upload";
				$.ajax({
					url: url,
					method: 'post',
					data: formData,
					processData: false,
					contentType: false,
					beforeSend: function () {

					},
					success: function (response) {
						console.log(response);
						if (response.length != 0) {
							var data = response.split(";");
							$("#preview-image1").attr("src", data[0]);
							$("#preview-image2").attr("src", data[1]);
							$("#preview-image3").attr("src", data[2]);

							var image_product1 = $('#preview-image1').attr('src');
							var image_product2 = $('#preview-image2').attr('src');
							var image_product3 = $('#preview-image3').attr('src');

							var url = base_url.toString() + "/onetech/Admin/addProduct";
							$.ajax({
								url: url,
								method: 'post',

								data: {
									merk_id: merk_id,
									category_id: category_id,
									subcategory_id: subcategory_id,
									product_name: product_name,
									product_code: product_code,
									product_price: product_price,
									product_desc: product_desc,
									image_product1: image_product1,
									image_product2: image_product2,
									image_product3: image_product3,
									discount: 0,
									date_start: "0000-00-00",
									date_end: "0000-00-00",
								},

								beforeSend: function () {

								},
								success: function (response) {
									alert('Product Added' + response);
									$(input[3]).parent("td").html(response);
								},
							});

							$(this).parents("tr").find(".error").first().focus();

							$(input[4]).parent("td").html(merk_name);
							$(input[5]).parent("td").html(category_name);
							$(input[6]).parent("td").html(subcategory_name);
							$(input[7]).parent("td").html(product_name);
							$(input[8]).parent("td").html(product_code);
							$(input[9]).parent("td").html(product_price);
							$(input[10]).parent("td").html(product_desc);
							$(input[11]).parent("td").html('<img id="preview-image1" src="' + image_product1 + '">');
							$(input[12]).parent("td").html('<img id="preview-image2" src="' + image_product2 + '">');
							$(input[13]).parent("td").html('<img id="preview-image3" src="' + image_product3 + '">');

							$(".add-new").removeAttr("disabled");
						}
					},
				});
			}
			$(this).parents("tr").find(".add, .edit").toggle();
		}
    });


    // Edit row on edit button click
	$(document).on("click", ".edit", function() {
		var url = base_url.toString() + "/onetech/Admin/getMerkCategory";
		let column = $(this).parents("tr").find("td:not(:last-child)");

		$.ajax({
			url: url,
			beforeSend: function () {

			},
			success: function (response) {
				let data = response.split('##');
				let dataMerk = data[0].split("%");
				let dataCategory = data[1].split("%");
				let listMerk = '', listCategory = '';
				let selectedOptionMerk='', selectedOptionCategory='';;

				for (var i = 1; i<dataMerk.length; i++){
					let subData = dataMerk[i].split(';');
					if ($(column[0]).text() === subData[0]) {
						selectedOptionMerk = subData[0];
					}
					listMerk += '<option value="' + subData[0] + '"> <input type="hidden" class="list-category" id="'+subData[0].replace(/ /g, "-")+'" value ="'+subData[1]+'">';
				}
				for (var i = 0; i<dataCategory.length - 1; i++){
					let subData = dataCategory[i].split(';');
					if ($(column[1]).text() === subData[0]) {
						selectedOptionCategory = subData[0];
					}
					listCategory += '<option value="' + subData[0] + '"> <input type="hidden" class="list-category" id="'+subData[0].replace(/ /g, "-")+'" value ="'+subData[1]+'">';
				}
				printEditProduct(column, listMerk, listCategory, selectedOptionMerk, selectedOptionCategory);
			},
		});

		$(this).parents("tr").find(".add, .edit").toggle();
	});

	function printEditProduct(column, listOptionMerk, listOptionCategory, selectedOptionMerk, selectedOptionCategory){
		$(column[0]).html('<input autocomplete="off" type="text" class="form-control" name="merk-name" id="merk-name" list="listmerk" value="'+selectedOptionMerk+'" list="list-category">' +
			'<datalist id="listmerk" class="list-category">' +
			listOptionMerk +
			'</datalist>');
		$(column[1]).html('<input autocomplete="off" type="text" class="form-control" name="category-name" id="category-name" onchange="changeValueCategoryName()" list="listcategory" value="'+selectedOptionCategory+'" list="list-category">' +
			'<datalist id="listcategory" class="list-category">' +
			listOptionCategory +
			'</datalist>');
		$(column[2]).html('<input autocomplete="off" readonly type="text" class="form-control" name="subcategory-name" id="subcategory-name" list="listsubcategory" value="'+$(column[2]).text()+'" list="list-category">' +
			'<datalist id="listsubcategory" class="list-category">' +
			'</datalist></td>');
		changeValueCategoryName();
		$(column[3]).html('<input autocomplete="off" type="text" class="form-control" name="product-name" id="product-name" value="'+$(column[3]).text()+'">');
		$(column[4]).html('<input autocomplete="off" type="text" class="form-control" name="product-code" id="product-code" value="'+$(column[4]).text()+'">');
		$(column[5]).html('<input autocomplete="off" type="number" class="form-control" name="product-price" id="product-price" value="'+$(column[5]).text()+'">');
		$(column[6]).html('<input autocomplete="off" type="text" class="form-control" name="desc-product" id="desc-product" value="'+$(column[6]).text()+'">');

		$(column[7]).html('<input autocomplete="off" type="file" accept="image/jpeg" class="form-control" name="image-product1" id="image-product1" value="'+$(column[7]).find('img').attr('src')+'">');
		$(column[8]).html('<input autocomplete="off" type="file" accept="image/jpeg" class="form-control" name="image-product2" id="image-product2" value="'+$(column[8]).find('img').attr('src')+'">');
		$(column[9]).html('<input autocomplete="off" type="file" accept="image/jpeg" class="form-control" name="image-product3" id="image-product3" value="'+$(column[9]).find('img').attr('src')+'">');

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

function changeValueCategoryName() {
	let categoryid = $("#"+($('#category-name').val()).replace(/ /g, "-")).val();
	if (categoryid != null) {
		var url = base_url.toString() + "/onetech/Admin/getDependentSubCategory";
		$.ajax({
			url: url,
			method: 'post',
			data : {categoryId: categoryid},
			beforeSend: function () {

			},
			success: function (response) {
				var data = response.split('%');
				var list = "";
				var hiddenInput = "";
				for (var i = 0; i<data.length - 1 ; i++){
					var subData = data[i].split(';');
					list += '<option value="' + subData[0] + '">';
					hiddenInput += '<input type="hidden" class="list-category" id="'+subData[0].replace(/ /g, "-")+'" value ="'+subData[1]+'"/>';
				}
				$("#subcategory-name").prop('readonly', false);

				$("#listsubcategory").html(list);
				$("#listsubcategory").append(hiddenInput);
			},
		});
	} else {
		$("#subcategory-name").val("");
		$("#subcategory-name").prop('readonly', true);
	}
}
