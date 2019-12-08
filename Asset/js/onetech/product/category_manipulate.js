var base_url = window.location.origin;
$(document).ready(function() {
    getCategory();
    $('[data-toggle="tooltip"]').tooltip();

    var edit = false;

    var actions = '<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>' +
        '<a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>' +
        '<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>';
    // Append table with add row form on add new button click
    $(".add-new").click(function() {
        $(this).attr("disabled", "disabled");

        var index = $("table tbody tr:last-child").index();
        var row = '<tr><input type="hidden" class="form-control" name="category-id" id="category-id" value="null">' +
            '<td><input type="text" class="form-control" name="category-name" id="category-name" value=""></td>' +
            '<td>' + actions + '</td>' +
            '</tr>';
        $("table").append(row);

        $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
        $('[data-toggle="tooltip"]').tooltip();
    });
    // Add row on add button click
    $(document).on("click", ".add", function() {
        var empty = false;
        var input = $(this).parents("tr").find('input');
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
            var categoryName = ($(this).parents("tr").find('input'))[1].value;
            var id = '';

            if (edit == true) {
                var url = base_url.toString() + "/OneTech/Admin/editCategory";
                id = $(input[0]).val();
                $.ajax({
                    url: url,
                    method: 'post',
                    data: {
                        categoryName: categoryName, categoryId: id,
                    },

                    beforeSend: function () {

                    },
                    success: function () {
                        alert('Category Updated');


                        $(input[1]).parent("td").html(categoryName);
                    },
                });
            } else {
                var url = base_url.toString() + "/OneTech/Admin/addCategory";
                $.ajax({
                    url: url,
                    method: 'post',
                    data: {
                        categoryName: categoryName,
                    },

                    beforeSend: function () {

                    },
                    success: function (response) {
                        id = response;
                        $(input[0]).val(id);
                        if (response != null) {
                            alert('Category Added');
                        } else {
                            alert('Add Category Fail');
                        }

                        $(input[1]).parent("td").html(categoryName);
                    },
                });
            }
            $(this).parents("tr").find(".add, .edit").toggle();
            $(".add-new").removeAttr("disabled");
        }
    });
    // Edit row on edit button click
    $(document).on("click", ".edit", function() {
        $(this).parents("tr").find("td:not(:last-child)").each(function() {
            $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
        });
        $(this).parents("tr").find(".add, .edit").toggle();
        $(".add-new").attr("disabled", "disabled");
        edit = true;
    });
    // Delete row on delete button click
    $(document).on("click", ".delete", function() {
        var id = ($(this).parents("tr").find('input'))[0].value;
        deleteCategory(id);
        $(this).parents("tr").remove();
        $(".add-new").removeAttr("disabled");
    });
});

