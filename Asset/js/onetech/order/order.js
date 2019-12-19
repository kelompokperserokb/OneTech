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
        e.preventDefault();

		var url = base_url.toString() + "/OneTech/Order/changeAddress";
		$.ajax({
			url: url,
			method: 'post',
			data:{

			},
			beforeSend: function () {

			},
			success: function (response) {

			},
		});

        $("#first-address-button").addClass("select-button");
        $("#first-address-form").removeClass("none");
        $("#another-address-button").removeClass("select-button");
        $("#another-address-form").addClass("none");
    });
});