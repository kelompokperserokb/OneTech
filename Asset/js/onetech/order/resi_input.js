var base_url = window.location.origin;
$(document).ready(function() {
    getOrderList();

    $(document).on("click", ".confirm", function() {
        var row = $(this).parents("tr").find("td");
        var order_id = $(row[0]).text();
        var email = $(row[4]).text();
        var resi = $(row[15]).find("input.resi").val();
        var kurir = $(row[16]).find("input.kurir").val();

        if (resi == "-" || kurir == "-" || resi == "" || kurir == "") {
            alert("Isi nomer Resi dan kurir dengan benar");
            return;
        } else {
            confirm_resi(order_id, email, resi, kurir, row);
        }
    });

    $(document).on("click", ".edit_verifikasi", function() {
        var row = $(this).parents("tr").find("td");
        var order_id = $(row[0]).text();
        var email = $(row[4]).text();
        edit_verifikasi(order_id, email, row);
    });
});

function getOrderList(){

    var url = base_url.toString() + "/OneTech/Admin/getOrderListResi";
    $.ajax({
        url: url,
        beforeSend: function () {

        },
        success: function (response) {
            var data = response.split('%%');

            for (var i = 0; i<data.length -1 ; i++){
                var subData = data[i].split('##');
                if (subData[16] == 3) printListOrder(subData);
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
        '<td>' + data[12] + '</td>' +
        '<td>' + (parseInt(data[10])+parseInt(data[11])+parseInt(data[12])) + '</td>' +

        '<td><img src="' + data[13] + '"></td>' +
        '<td> <input class="form-control resi" type="text" value="' + data[14] + '" required> </td>' +
        '<td> <input class="form-control kurir" type="text" value="' + data[15] + '" required> </td>' +
        '<td><input type="button" class="btn btn-danger edit_verifikasi" value="Edit Verifikasi"> </td>' +
        '<td><input type="button" class="btn btn-info confirm" value="Confirm"></td>' +
        '<td><a href="'+ base_url + '/OneTech/admin/admin/admin/resi/items/'+data[0] +'">Items</a></td>' +
        '</tr>';
    $("table").append(row);
}

function confirm_resi(id, email, resi, kurir, row) {
    var url = base_url.toString() + "/OneTech/Admin/updateResi";
    $.ajax({
        url: url,
        method: 'post',
        data: {
            order_id: id,
            email: email,
            resi: resi,
            kurir: kurir,
        },

        beforeSend: function () {

        },
        success: function () {
            alert('Nomer Resi Updated');
            row.remove();
        },
    });
}

function edit_verifikasi(id, email, row) {
    var url = base_url.toString() + "/OneTech/Admin/edit_status/3";
    $.ajax({
        url: url,
        method: 'post',
        data: {
            order_id: id,
            email: email,
        },

        beforeSend: function () {

        },
        success: function () {
            alert('Edit Logistic Complete, order transfered to Logistic page');
            row.remove();
        },
    });
}
