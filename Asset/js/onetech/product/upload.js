var base_url = window.location.origin;
function upload() {
    /*        var username = document.getElementById('image-product1').files;
            var password = document.getElementById('password').value;*/

    var image1 = $("#image-product1").prop('files')[0];
    var image2 = $("#image-product2").prop('files')[0];
    var image3 = $("#image-product3").prop('files')[0];


    var formData = new FormData();
    formData.append('image-product1', image1);
    formData.append('image-product2', image2);
    formData.append('image-product3', image3);

    var url = base_url.toString() + "/OneTech/Admin/upload";
    alert(url);
    $.ajax({
        url: url,
        method: 'post',
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function () {
            alert("HHHH");
        },
        success: function (response) {
            if (response.length != 0) {
                var data = response.split(";");
                $("#preview-image1").attr("src", data[0]);
                $("#preview-image2").attr("src", data[1]);
                $("#preview-image3").attr("src", data[2]);
            } else {
                alert('file not uploaded');
            }
        },
    });
}
