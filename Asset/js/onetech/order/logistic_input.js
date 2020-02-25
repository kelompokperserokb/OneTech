var base_url = window.location.origin;
$(document).ready(function() {
    getOrderListLogistic();

    $(document).on("click", ".confirm", function() {
        var row = $(this).parents("tr").find("td");
        var order_id = $(row[0]).text();
        var email = $(row[4]).text();

        var logistic_price = parseInt($(row[12]).find("input.logistic_price").val());
        updateLogistic(order_id, email, row, logistic_price);
    });

});

function getOrderListLogistic(){

    var url = base_url.toString() + "/onetech/Admin/getOrderListLogistic";
    $.ajax({
        url: url,
        beforeSend: function () {

        },
        success: function (response) {
            var data = response.split('%%');

            for (var i = 0; i<data.length -1 ; i++){
                var subData = data[i].split('##');
                if (subData[13] == 0) printListOrder(subData);
            }
        },
    });
}

function printListOrder(data){

    var row = '<tr>'+
        '<td>' + data[0] + '</td>' +
        '<td>' + data[1] + '</td>' +
        '<td>' + data[2] + '</td>' +
        '<td>' + data[3] + '</td>' +
        '<td>' + data[4] + '</td>' +
        '<td>' + data[5] + '</td>' +
        '<td>' + data[6] + '</td>' +
        '<td>' + data[7] + '</td>' +
        '<td>' + data[8] + '</td>' +
        '<td>' + data[9] + '</td>' +

        '<td>' + data[10] + '</td>' +
        '<td>' + data[11] + '</td>' +
        '<td> <input type="number" class="logistic_price" value="' + data[12] + '"> </td>' +
        '<td>' + (parseInt(data[10])+parseInt(data[11])+parseInt(data[12])) + '</td>' +
        '<td><input type="button" class="btn btn-info confirm" value="Input"></td>' +
        '<td><a href="'+ base_url + '/onetech/admin/admin/admin/logistic/items/'+data[0] +'">Items</a></td>' +
        '</tr>';
    $("table").append(row);
}

function updateLogistic(id, email, row, logistic_price) {
    var url = base_url.toString() + "/onetech/Admin/updateLogistic";
    $.ajax({
        url: url,
        method: 'post',
        data: {
            order_id: id,
            email: email,
            logistic_price: logistic_price,
        },

        beforeSend: function () {

        },
        success: function () {
            alert('Input Logistic Complete');
            createInvoicePDF(email, id, row);
        },
    });
}

function createInvoicePDF(email, order_id, row) {
    var url = base_url.toString() + "/onetech/Order/generatePDF";
    $.ajax({
        url: url,
        method: 'post',
        data: {
            email: email,
            order_id: order_id,
        },

        beforeSend: function () {

        },
        success: function () {
            row.remove();
        },
    });
}
