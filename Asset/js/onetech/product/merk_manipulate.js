var base_url = window.location.origin;
$(document).ready(function() {
    getMerk();
    $('[data-toggle="tooltip"]').tooltip();

    var edit = false;

    var actions = '<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>' +
        '<a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>' +
        '<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>';
    // Append table with add row form on add new button click
    $(".add-new").click(function() {
        $(this).attr("disabled", "disabled");

        var index = $("table tbody tr:last-child").index();
        var row = '<tr><input type="hidden" class="form-control" name="merk-id" id="merk-id" value="null">' +
            '<td><input type="text" class="form-control" name="merk-name" id="merk-name" value=""></td>' +
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
            var merkName = ($(this).parents("tr").find('input'))[1].value;
            var id = '';

            if (edit == true) {
                var url = base_url.toString() + "/OneTech/Admin/editMerk";
                id = $(input[0]).val();
                $.ajax({
                    url: url,
                    method: 'post',
                    data: {
                        merkName: merkName, merkId: id,
                    },

                    beforeSend: function () {

                    },
                    success: function () {
                        alert('Merk Updated');
                    },
                });
            } else {
                var url = base_url.toString() + "/OneTech/Admin/addMerk";
                $.ajax({
                    url: url,
                    method: 'post',
                    data: {
                        merkName: merkName,
                    },

                    beforeSend: function () {

                    },
                    success: function (response) {
                        id = response;
                        $(input[0]).val(id);
                        if (response != null) {
                            alert('Merk Added');
                        } else {
                            alert('Add Merk Fail');
                        }
                    },
                });
            }

            $(this).parents("tr").find(".error").first().focus();


            $(input[1]).parent("td").html(merkName);



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
        deleteMerk(id);
        $(this).parents("tr").remove();
        $(".add-new").removeAttr("disabled");
    });
});

