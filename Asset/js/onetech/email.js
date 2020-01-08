var base_url = window.location.origin;
$(document).ready(function(){
	$('#email-msg').submit(function(e) {
		e.preventDefault();
		var name = $('#name-msg').val();
		var from = $('#emailfrom-msg').val();
		var subject = $('#subject-msg').val();
		var message = $('#message-msg').val();

		if (name == "" || from == "" || subject == "" || message == "") {
			alert("Form tidak boleh kosong");
		} else {

			var url = base_url.toString() + "/Etc/sendEmail";
			$.ajax({
				url: url,
				method: 'post',
				data: {
					name: name,
					from: from,
					subject: subject,
					message: message,
				},
				beforeSend: function () {

				},
				success: function (response) {
					if (response == "true") {
						alert("Terima kasih. Email anda telah kami terima. Email balasan akan dikirim dalam waktu 1-2 hari kerja. Jika tidak ada cek folder spam");
						window.location.href = base_url.toString();
					} else {
						alert("Terjadi kesalahan system, mohon ulangi beberapa saat lagi");
					}
				},
			});
		}
	});
});
