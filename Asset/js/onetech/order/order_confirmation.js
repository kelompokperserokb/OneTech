var base_url = window.location.origin;
$(document).ready(function() {
	getOrderList();

	$(document).on("click", ".confirm", function() {
		var row = $(this).parents("tr").find("td");
		var order_id = $(row[0]).text();
		var email = $(row[4]).text();
		verify(order_id, email, row);
	});

	$(document).on("click", ".un_confirm", function() {
		var row = $(this).parents("tr").find("td");
		var order_id = $(row[0]).text();
		var email = $(row[4]).text();
		unverify(order_id, email, row);
	});
});

function getOrderList(){

	var url = base_url.toString() + "/OneTech/Admin/getOrderList";
	$.ajax({
		url: url,
		beforeSend: function () {

		},
		success: function (response) {
			var data = response.split('%%');

			for (var i = 0; i<data.length -1 ; i++){
				var subData = data[i].split('##');
				printListOrder(subData);
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
	'<td><img src="' + data[11] + '"></td>' +
	'<td>' + (data[12] == 1 ? "Verify" : "Not Verify") + '</td>' +
	(data[12] == 0 ? '<td><input type="button" class="btn btn-info confirm" value="Verify"></td>' : '<td><input type="button" class="btn btn-danger un_confirm" value="Un-Verify"></td>') +
	'<td><a href="'+ base_url + '/OneTech/admin/admin/admin/verifyorder/items/'+data[0] +'">Items</a></td>' +
	'</tr>';
	$("table").append(row);
}

function verify(id, email, row) {
	var url = base_url.toString() + "/OneTech/Admin/verifyOrder";
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
			alert('Verify Complete');
			$(row[12]).html('Verify');
			$(row[13]).html('<input type="button" class="btn btn-danger un_confirm" value="Un-Verify">');
		},
	});
}

function unverify(id, email, row) {
	var url = base_url.toString() + "/OneTech/Admin/unverifyOrder";
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
			alert('Verify Complete');
			$(row[12]).html('Not Verify');
			$(row[13]).html('<input type="button" class="btn btn-info confirm" value="Verify">');
		},
	});
}
