var base_url = window.location.origin;
$(document).ready(function() {
    $("#first-address-button").click(function(e) {
        e.preventDefault();
        $("#first-address-button").addClass("select-button");
        $("#first-address-form").removeClass("none");
        $("#another-address-button").removeClass("select-button");
        $("#another-address-form").addClass("none");
    });

    $("#another-address-button").click(function(e) {
        e.preventDefault();
        $("#another-address-button").addClass("select-button");
        $("#another-address-form").removeClass("none");
        $("#first-address-button").removeClass("select-button");
        $("#first-address-form").addClass("none");
    });

    $("#save-address").click(function(e) {
        var address = $("#alamat").val();
        var phone = $("#phone").val();
        var orderid = $("#o-id").val();

        if (address && phone) {
            e.preventDefault();

            var url = base_url.toString() + "/onetech/Order/changeAddress";
            $.ajax({
                url: url,
                method: 'post',
                data:{
                    address : address,
                    phone : phone,
                    order_id : orderid,
                },
                beforeSend: function () {

                },
                success: function () {
                    alert("Alamat telah diupdate");

                    $("#first-address-button").addClass("select-button");
                    $("#first-address-form").removeClass("none");
                    $("#another-address-button").removeClass("select-button");
                    $("#another-address-form").addClass("none");

                    $("#address-detail-value").html(address);
                    $("#telephone-detail-value").html(phone);
                },
            });
        }
    });

	$("#upload-bukti").click(function(e) {
		e.preventDefault();
		uploadBukti();
	});
});

function uploadBukti(){
	var image = $("#bukti_pembayaran").prop('files')[0];

	var formData = new FormData();
	formData.append('bukti_pembayaran', image);

	var url = base_url.toString() + "/onetech/Order/uploadBukti";
	$.ajax({
		url: url,
		method: 'post',
		data: formData,
		processData: false,
		contentType: false,
		beforeSend: function () {

		},
		success: function (response) {
			console.log(response);
			if (response.length != 0) {
				var data = response.split(";");
				if (data[0] != "error") {
					/*$("#preview-bukti_pembayaran").attr("src", data[0]);

					var image_bukti = $('#preview-bukti_pembayaran').attr('src');*/

					let image_bukti = data[0];
					let order_id = $("#o-id").val();

					var url = base_url.toString() + "/onetech/Order/updateBukti";
					$.ajax({
						url: url,
						method: 'post',
						data: {
							order_id: order_id,
							image_bukti: image_bukti,
						},
						beforeSend: function () {

						},
						success: function () {
							alert('Upload Success');
							location.reload();
						},
					});

				} else {
					alert(data[1]);
				}

			}
		},
	});
}

