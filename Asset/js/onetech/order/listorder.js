var base_url = window.location.origin;
$(document).ready(function() {
    getOrderList();
});

function getOrderList(){

    var url = base_url.toString() + "/OneTech/Admin/getListorderFinal";
    $.ajax({
        url: url,
        beforeSend: function () {

        },
        success: function (response) {
            var data = response.split('%%');

            for (var i = 0; i<data.length -1 ; i++){
                var subData = data[i].split('##');
                if (subData[16] == 4) printListOrder(subData);
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
        '<td>' + data[14] + '</td>' +
        '<td>' + data[15] + '</td>' +
        '<td><a href="'+ base_url + '/OneTech/admin/admin/admin/listorder/items/'+data[0] +'">Items</a></td>' +
        '</tr>';
    $("table").append(row);
}

