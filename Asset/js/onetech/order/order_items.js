var base_url = window.location.origin;
$(document).ready(function() {
	var id = $(this).find("#param").val();
	console.log(id);
	getOrderItemsList();
});

function getOrderItemsList(){

	var url = base_url.toString() + "/OneTech/Admin/getOrderItemsList";
	$.ajax({
		url: url,
		beforeSend: function () {

		},
		success: function (response) {
			var data = response.split('%%');

			for (var i = 0; i<data.length -1 ; i++){
				var subData = data[i].split('##');
				printListOrderItems(subData);
			}
		},
	});
}

function printListOrderItems(data){
	console.log(data);
	var row = '<tr>'+
		'<td>' + data[0] + '</td>' +
		'<td>' + data[1] + '</td>' +
		'<td>' + data[2] + '</td>' +
		'<td>' + data[3] + '</td>' +
		'<td>' + data[4] + '</td>' +
		'<td>' + data[5] + '</td>' +
		'<td>' + data[6] + '</td>' +
		'</tr>';
	$("table").append(row);
}
