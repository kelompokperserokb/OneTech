function deleteMerk(id){
    var url = base_url.toString() + "/OneTech/Admin/deleteMerk";
    $.ajax({
        url: url,
        method: 'post',
        data: {
            merkId: id,
        },

        beforeSend: function () {

        },
        success: function () {
            alert("Remove Merk Success");
        },
    });
}

function deleteCategory(id){
    var url = base_url.toString() + "/OneTech/Admin/deleteCategory";
    $.ajax({
        url: url,
        method: 'post',
        data: {
            categoryId: id,
        },

        beforeSend: function () {

        },
        success: function () {
            alert("Remove Category Success");
        },
    });
}

function deleteSubCategory(categoryid, subcategoryid){
    var url = base_url.toString() + "/OneTech/Admin/deleteSubCategory";
    $.ajax({
        url: url,
        method: 'post',
        data: {
            categoryId: categoryid,
            subcategoryId: subcategoryid,
        },

        beforeSend: function () {

        },
        success: function () {
            alert("Remove Category Success");
        },
    });
}