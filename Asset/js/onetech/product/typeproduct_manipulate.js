var base_url = window.location.origin;
$(document).ready(function() {
    getTypeProduct();

    $('[data-toggle="tooltip"]').tooltip();

    var edit = false;

    var actions = '<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>' +
        '<a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>' +
        '<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>';

    // Append table with add row form on add new button click
    $(".add-new").click(function() {
        $(this).attr("disabled", "disabled");

        var index = $("table tbody tr:last-child").index();

        var url = base_url.toString() + "/onetech/Admin/getProductList";
        $.ajax({
            url: url,
            beforeSend: function () {

            },
            success: function (response) {
                var data = response.split('%%');
                var list = '';
                for (var i = 0; i<data.length - 1 ; i++){
                    var subData = data[i].split('##');
                    list += '<option value="' + subData[1] + '"> <input type="hidden" class="list-category" id="'+subData[1].replace(/ /g, "-")+'" value ="'+subData[0]+'">';
                }
                printAddTypeProduct(list, index);
            },
        });


    });

    function printAddTypeProduct(listOption, index){
        var row = '<tr>'+
			'<input type="hidden" class="form-control" name="product-id" id="product-id" value="null">' +
            '<input type="hidden" class="form-control" name="type-id" id="type-id" value="null">' +
            '<td><input type="text" class="form-control" name="product-name" id="product-name" value="" list="categorylist">' +
            '<datalist id="categorylist">' +
            listOption +
            '</datalist></td>' +
            '<td><input type="text" class="form-control" name="type-name" id="type-name" value=""></td>' +
			'<td><input type="number" class="form-control" name="quota" id="quota" value=""></td>' +
			'<td><input type="text" class="form-control" name="description" id="description" value=""></td>' +
            '<td>' + actions + '</td>' +
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
            if (!$(this).val()) {
                $(this).addClass("error");
                empty = true;
            } else {
                $(this).removeClass("error");
            }
        });

        if (!empty) {
            $(this).parents("tr").find(".error").first().focus();
			var product_name = $(input[2]).val();
			var product_id = ($(this).parents("tr").find('input#'+product_name.replace(/ /g, "-")))[0].value;
            var type_name = $(input[3]).val();
			var quota = $(input[4]).val();
			var description = $(input[5]).val();
            var type_id = '';

            if (edit == true) {
                var url = base_url.toString() + "/onetech/Admin/editTypeProduct";
                type_id = $(input[1]).val();
                $.ajax({
                    url: url,
                    method: 'post',
                    data: {
                        product_id: product_id,
						type_id: type_id,
                        type_name: type_name,
						quota : quota,
						description : description,
                    },
                    beforeSend: function () {

                    },
                    success: function () {
                        alert('Type Product Updated');

                        $(input[0]).val(product_id);
						$(input[2]).parent("td").html(product_name);
                        $(input[3]).parent("td").html(type_name);
						$(input[4]).parent("td").html(quota);
						$(input[5]).parent("td").html(description);
                    },
                });
            } else {
                var url = base_url.toString() + "/onetech/Admin/addTypeProduct";
                $.ajax({
                    url: url,
                    method: 'post',
                    data: {
						product_id: product_id,
						type_name: type_name,
						quota : quota,
						description : description,
                    },

                    beforeSend: function () {

                    },
                    success: function (response) {
                    	console.log(response);
                        id = response;
                        $(input[0]).val(product_id);
                        $(input[1]).val(id);

                        if (response != null) {
                            alert('Type Product Added');
                        } else {
                            alert('Add type Product Fail');
                        }

                        $(input[2]).parent("td").html(product_name);
                        $(input[3]).parent("td").html(type_name);
						$(input[4]).parent("td").html(quota);
						$(input[5]).parent("td").html(description);
                    },
                });
            }
            $(this).parents("tr").find(".add, .edit").toggle();
            $(".add-new").removeAttr("disabled");
        }
    });
    // Edit row on edit button click
    $(document).on("click", ".edit", function() {
        let column = $(this).parents("tr").find("td:not(:last-child)");

		var url = base_url.toString() + "/onetech/Admin/getProductList";
		$.ajax({
			url: url,
			beforeSend: function () {

			},
			success: function (response) {
				var data = response.split('%%');
				var list = '';
				let selectedOption='';
				for (var i = 0; i<data.length - 1 ; i++){
					var subData = data[i].split('##');
					if ($(column[0]).text() === subData[1]) {
						selectedOption = subData[1];
					}
					list += '<option value="' + subData[1] + '"> <input type="hidden" class="list-category" id="' + subData[1].replace(/ /g, "-") + '" value ="' + subData[0] + '">';
				}
				printEditTypeProduct(column, list, selectedOption);
			},
		});

        $(this).parents("tr").find(".add, .edit").toggle();
    });

    function printEditTypeProduct(column, listOption, selectedOption){
        $(column[0]).html('<input type="text" class="form-control" name="product-name" id="product-name" value="'+selectedOption+'" list="categorylist">' +
            '<datalist id="categorylist">' +
            listOption +
            '</datalist>');
        $(column[1]).html('<input type="text" class="form-control" name="type-name" id="type-name" value="'+$(column[1]).text()+'">');
		$(column[2]).html('<input type="number" class="form-control" name="quota" id="quota" value="'+$(column[2]).text()+'">');
		$(column[3]).html('<input type="text" class="form-control" name="description" id="description" value="'+$(column[3]).text()+'">');
        $(".add-new").attr("disabled", "disabled");
        edit = true;
    }

    // Delete row on delete button click
    $(document).on("click", ".delete", function() {
        var product_id = ($(this).parents("tr").find('input'))[0].value;
        var type_id = ($(this).parents("tr").find('input'))[1].value;
        deleteTypeProduct(product_id, type_id);
        $(this).parents("tr").remove();
        $(".add-new").removeAttr("disabled");
    });
});

