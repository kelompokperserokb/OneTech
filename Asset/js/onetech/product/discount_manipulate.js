var base_url = window.location.origin;
$(document).ready(function() {
	getProductDiscount();
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


	// Add row on add button click
	$(document).on("click", ".add", function() {
		if ($(this).parents("tr").find('input#discount').val() > 0 && $(this).parents("tr").find('input#discount').val() <= 99) {
			$(this).parents("tr").find('input#discount').removeClass("error");
			var empty = false;
			var input = $(this).parents("tr").find('input');
			input.each(function () {
				if ($(this).val() == null) {
					$(this).addClass("error");
					empty = true;
				} else {
					$(this).removeClass("error");
				}
			});

			var product_id = "";

			var discount = input[1].value;
			var date_start = input[2].value;
			var date_end = input[3].value;

			if (!empty) {
				var url = base_url.toString() + "/onetech/Admin/editProductDiscount";
				product_id = input[0].value;

				$.ajax({
					url: url,
					method: 'post',
					data: {
						product_id: product_id,
						discount: discount,
						date_start: date_start,
						date_end: date_end,
					},
					beforeSend: function () {

					},
					success: function () {
						alert('Discount Updated');

						$(input[1]).parent("td").html(discount);
						$(input[2]).parent("td").html(date_start);
						$(input[3]).parent("td").html(date_end);
					},
				});
				$(this).parents("tr").find(".add, .edit").toggle();
			}
		} else {
			alert("Please give the valid discount between 1% - 99%");
			$(this).parents("tr").find('input#discount').addClass("error");
		}

		$(this).parents("tr").find(".error").first().focus();
	});


	// Edit row on edit button click
	$(document).on("click", ".edit", function() {
		let column = $(this).parents("tr").find("td:not(:last-child)");

		printEditProduct(column);

		$(this).parents("tr").find(".add, .edit").toggle();
	});

	function printEditProduct(column){
		$(column[2]).html('<input autocomplete="off" type="number" class="form-control" name="discount" id="discount" max="99" value="'+$(column[2]).text()+'">');
		$(column[3]).html('<input autocomplete="off" type="date" id="start" name="date-start" value="2019-07-22" min="2019-01-01" max="2030-12-31" id="date-start" value="'+$(column[3]).text()+'">');
		$(column[4]).html('<input autocomplete="off" type="date" id="start" name="date-end" value="2019-07-22" min="2019-01-01" max="2030-12-31" id="date-end" value="'+$(column[4]).text()+'">');

	}


	// Delete row on delete button click
	$(document).on("click", ".delete", function() {
		var productid = ($(this).parents("tr").find('input'))[0].value;
		let column = $(this).parents("tr").find("td:not(:last-child)");
		if(deleteProductDiscount(productid)) {
			$(column[2]).html(0);
			$(column[3]).html("0000-00-00");
			$(column[4]).html("0000-00-00");
		}
		if($(this).parents("tr").find(".add").is(':visible'))
		{
			$(this).parents("tr").find(".add, .edit").toggle();
		}
	});
});
