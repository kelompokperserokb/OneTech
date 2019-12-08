var actions = '<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>' +
    '<a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>' +
    '<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>';

function getMerk(){

    var url = base_url.toString() + "/OneTech/Admin/getMerk";
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
        '<td>' + actions + '</td>' +
        '</tr>';
    $("table").append(row);
}

function getCategory(){

    var url = base_url.toString() + "/OneTech/Admin/getCategory";
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
        '<td>' + actions + '</td>' +
        '</tr>';
    $("table").append(row);
}

function getSubCategory(){

    var url = base_url.toString() + "/OneTech/Admin/getSubCategory";
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
        '<td>' + actions + '</td>' +
        '</tr>';
    $("table").append(row);
}