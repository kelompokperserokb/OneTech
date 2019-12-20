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

            var url = base_url.toString() + "/OneTech/Order/changeAddress";
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
});
