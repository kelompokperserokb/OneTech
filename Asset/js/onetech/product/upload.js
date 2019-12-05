$(document).ready(function() {
    $(document).on("click", ".add", function() {
        alert("aaa");
/*        var username = document.getElementById('image-product1').files;
        var password = document.getElementById('password').value;*/
        var image1 = document.getElementById("#image-product1").files[0];
        var image2 = document.getElementById("#image-product2").files[0];
        var image3 = document.getElementById("#image-product3").files[0];

        var formData = new FormData();
        formData.append('image-product1', image1);
        formData.append('image-product2', image2);
        formData.append('image-product3', image3);

        var url = base_url.toString() + "/OneTech/Admin/upload";
        $.ajax({
            url: url,
            method: 'post',
            data : formData,
            beforeSend: function () {
            },
            success: function (response) {
                alert("a");
            },
        });
    });
});

