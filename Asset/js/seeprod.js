$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();

    var actions = '<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>' +
        '<a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>' +
        '<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>';
    // Append table with add row form on add new button click
    $(".add-new").click(function() {
        $(this).attr("disabled", "disabled");

        var index = $("table tbody tr:last-child").index();
        var row = '<tr><form method="post" enctype="multipart/form-data" id="upload" target="uploadTarget">' +
            '<td><input type="text" class="form-control" name="category" id="category" value="AA"></td>' +
            '<td><input type="text" class="form-control" name="merk" id="merk" value=""></td>' +
            '<td><input type="text" class="form-control" name="name-product" id="name-product" value=""></td>' +
            '<td><input type="file" multiple accept="image/jpeg" class="form-control" name="image-product1" id="image-product1" value=""><img id="preview-image1"></td>' +
            '<td><input type="file" multiple accept="image/jpeg" class="form-control" name="image-product2" id="image-product2" value=""><img id="preview-image2"></td>' +
            '<td><input type="file" multiple accept="image/jpeg" class="form-control" name="image-product3" id="image-product3" value=""><img id="preview-image3"></td>' +
            '<td><input type="text" class="form-control" name="code-product" id="code-product" value=""></td>' +
            '<td><input type="text" class="form-control" name="price" id="price" value=""></td>' +
            '<td><input type="text" class="form-control" name="discount" id="discount" value=""></td>' +
            '<td><input type="date" id="start" name="date-start" value="2019-07-22" min="2019-01-01" max="2030-12-31" id="date-start" value=""></td>' +
            '<td><input type="date" id="start" name="date-end" value="2019-07-22" min="2019-01-01" max="2030-12-31" id="date-end" value=""></td>' +
            '<td><input type="text" class="form-control" name="desc-product" id="desc-product" value=""></td>' +
            '<td><input type="text" class="form-control" name="desc-type" id="desc-type" value=""></td>' +
            '<td>' + actions + '</td>' +
            '</form></tr>';
        $("table").append(row);

        $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
        $('[data-toggle="tooltip"]').tooltip();
    });
    // Add row on add button click
    $(document).on("click", ".add", function() {
        var category = ($(this).parents("tr").find('input'))[0].value;
        var merk = ($(this).parents("tr").find('input'))[1].value;
        var name_product = ($(this).parents("tr").find('input'))[2].value;
        var image_product1 = ($(this).parents("tr").find('input'))[3].value;
        var image_product2 = ($(this).parents("tr").find('input'))[4].value;
        var image_product3 = ($(this).parents("tr").find('input'))[5].value;
        var code_product = ($(this).parents("tr").find('input'))[6].value;
        var price = ($(this).parents("tr").find('input'))[7].value;
        var discount = ($(this).parents("tr").find('input'))[8].value;
        var date_start = ($(this).parents("tr").find('input'))[9].value;
        var date_end = ($(this).parents("tr").find('input'))[10].value;
        var desc_product = ($(this).parents("tr").find('input'))[11].value;
        var desc_type = ($(this).parents("tr").find('input'))[12].value;

       /* var url = base_url.toString()+"/OneTech/Account/loginAccount";
        $.ajax({
            url: url ,
            method: 'post',
            data: {category : category, merk : merk, name_product : name_product, image_product1 : image_product1, image_product2 : image_product2,
            image_product3 : image_product3, code_product : code_product, price : price, discount : discount,
                date_start : date_start, date_end : date_end, desc_product : desc_product, desc_type : desc_type},

            beforeSend : function(){
                $('#message').text("");
            },
            success: function(response) {
                if (response == "true") {
                    alert('Login Success');
                } else {
                    alert('Login Succesaadadas');
                }
            },
        });*/

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
        $(this).parents("tr").find(".error").first().focus();
        if (!empty) {

            $(input[0]).parent("td").html(category);
            $(input[1]).parent("td").html(merk);
            $(input[2]).parent("td").html(name_product);
            $(input[3]).parent("td").html('<img src ="' +image_product1+ '"> </img>');
            $(input[4]).parent("td").html('<img src ="' +image_product2+ '"> </img>');
            $(input[5]).parent("td").html('<img src ="' +image_product3+ '"> </img>');
            $(input[6]).parent("td").html(code_product);
            $(input[7]).parent("td").html(price);
            $(input[8]).parent("td").html(discount);
            $(input[9]).parent("td").html(date_start);
            $(input[10]).parent("td").html(date_end);
            $(input[11]).parent("td").html(desc_product);
            $(input[12]).parent("td").html(desc_type);


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
    });
    // Delete row on delete button click
    $(document).on("click", ".delete", function() {
        $(this).parents("tr").remove();
        $(".add-new").removeAttr("disabled");
    });
});