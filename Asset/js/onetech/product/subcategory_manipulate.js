var base_url = window.location.origin;
$(document).ready(function() {
    getSubCategory();

    $('[data-toggle="tooltip"]').tooltip();

    var edit = false;

    var actions = '<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>' +
        '<a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>' +
        '<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>';

    // Append table with add row form on add new button click
    $(".add-new").click(function() {
        $(this).attr("disabled", "disabled");

        var index = $("table tbody tr:last-child").index();

        var url = base_url.toString() + "/onetech/Admin/getCategory";
        $.ajax({
            url: url,
            beforeSend: function () {

            },
            success: function (response) {
                var data = response.split('%');
                var list = '';
                for (var i = 0; i<data.length - 1 ; i++){
                    var subData = data[i].split(';');
                    list += '<option value="' + subData[0] + '"> <input type="hidden" class="list-category" id="'+subData[0].replace(/ /g, "-")+'" value ="'+subData[1]+'">';
                }
                printAddSubCategory(list, index);
            },
        });


    });

    function printAddSubCategory(listOption, index){
        var row = '<tr><input type="hidden" class="form-control" name="category-id" id="category-id" value="null">' +
            '<input type="hidden" class="form-control" name="subcategory-id" id="subcategory-id" value="null">' +
            '<td><input type="text" class="form-control" name="category-name" id="category-name" value="" list="categorylist">' +
            '<datalist id="categorylist">' +
            listOption +
            '</datalist></td>' +
            '<td><input type="text" class="form-control" name="subcategory-name" id="subcategory-name" value=""></td>' +
            '<td>' + actions + '</td>' +
            '</tr>';
        $("table").append(row);

        $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
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
            var categoryName = $(input[2]).val();
            var categoryId = ($(this).parents("tr").find('input#'+categoryName.replace(/ /g, "-")))[0].value;
            var subCategoryName = $(input[3]).val();
            var subCategoryId = '';

            if (edit == true) {
                var url = base_url.toString() + "/onetech/Admin/editSubCategory";
                subCategoryId = $(input[1]).val();
                $.ajax({
                    url: url,
                    method: 'post',
                    data: {
                        categoryId: categoryId,
                        subCategoryId: subCategoryId,
                        subCategoryName: subCategoryName,
                    },
                    beforeSend: function () {

                    },
                    success: function () {
                        alert('Sub Category Updated');

                        $(input[0]).val(categoryId);
                        $(input[2]).parent("td").html(categoryName);
                        $(input[3]).parent("td").html(subCategoryName);
                    },
                });
            } else {
                var url = base_url.toString() + "/onetech/Admin/addSubCategory";
                $.ajax({
                    url: url,
                    method: 'post',
                    data: {
                        categoryId: categoryId,
                        subCategoryName: subCategoryName,
                    },

                    beforeSend: function () {

                    },
                    success: function (response) {
                        id = response;
                        $(input[0]).val(categoryId);
                        $(input[1]).val(id);

                        if (response != null) {
                            alert('SubCategory Added');
                        } else {
                            alert('Add Sub Category Fail');
                        }

                        $(input[2]).parent("td").html(categoryName);
                        $(input[3]).parent("td").html(subCategoryName);
                    },
                });
            }
            $(this).parents("tr").find(".add, .edit").toggle();
            $(".add-new").removeAttr("disabled");
        }
    });
    // Edit row on edit button click
    $(document).on("click", ".edit", function() {
        var url = base_url.toString() + "/onetech/Admin/getCategory";
        let column = $(this).parents("tr").find("td:not(:last-child)");
        $.ajax({
            url: url,
            beforeSend: function () {

            },
            success: function (response) {
                var data = response.split('%');
                var list = '';
                let selectedOption='';
                for (var i = 0; i<data.length - 1 ; i++){
                    var subData = data[i].split(';');
                    if ($(column[0]).text() === subData[0]) {
                        list += '<option value="' + subData[0] + '"> <input type="hidden" class="list-category" id="' + subData[0].replace(/ /g, "-") + '" value ="' + subData[1] + '">';
                        selectedOption = subData[0];
                    } else {
                        list += '<option value="' + subData[0] + '"> <input type="hidden" class="list-category" id="' + subData[0].replace(/ /g, "-") + '" value ="' + subData[1] + '">';
                    }
                }
                printEditSubCategory(column, list, selectedOption);
            },
        });
        $(this).parents("tr").find(".add, .edit").toggle();
    });

    function printEditSubCategory(column, listOption, selectedOption){
        $(column[0]).html('<input type="text" class="form-control" name="category-name" id="category-name" value="'+selectedOption+'" list="categorylist">' +
            '<datalist id="categorylist">' +
            listOption +
            '</datalist>');
        $(column[1]).html('<input type="text" class="form-control" name="subcategory-name" id="subcategory-name" value="'+$(column[1]).text()+'">');
        $(".add-new").attr("disabled", "disabled");
        edit = true;
    }

    // Delete row on delete button click
    $(document).on("click", ".delete", function() {
        var categoryid = ($(this).parents("tr").find('input'))[0].value;
        var subcategoryid = ($(this).parents("tr").find('input'))[1].value;
        deleteSubCategory(categoryid, subcategoryid);
        $(this).parents("tr").remove();
        $(".add-new").removeAttr("disabled");
    });
});

