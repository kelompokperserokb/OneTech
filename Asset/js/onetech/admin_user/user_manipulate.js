var base_url = window.location.origin;
$(document).ready(function() {
	getUser();
});

function getUser(){

	var url = base_url.toString() + "/onetech/Admin/getUser";
	$.ajax({
		url: url,
		beforeSend: function () {

		},
		success: function (response) {
			var data = response.split('%');

			for (var i = 0; i<data.length -1 ; i++){
				var subData = data[i].split(';');
				printUser(subData);
			}
		},
	});
}

function printUser	(data){
	var row = '<tr>'+
		'<td>'+ data[0] +'</td>' +
		'<td>'+ data[1] +'</td>' +
		'<td>'+ data[2] +'</td>' +
		'<td>'+ data[3] +'</td>' +
		'<td>'+ data[4] +'</td>' +
		'<td>'+ data[5] +'</td>' +
		'<td>'+ data[6] +'</td>' +
		'<td>'+ data[7] +'</td>' +
		'<td>'+ data[8] +'</td>' +
		'<td>'+ data[9] +'</td>' +
		'<td>'+ data[10] +'</td>' +
		'</tr>';
	$("table").append(row);
}

