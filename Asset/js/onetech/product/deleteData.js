function deleteMerk(id){
	if(confirm("Are you sure you want to delete this?")) {
		var url = base_url.toString() + "/onetech/Admin/deleteMerk";
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
	} else {
		return false;
	}
}

function deleteCategory(id){
	if(confirm("Are you sure you want to delete this?")) {
		var url = base_url.toString() + "/onetech/Admin/deleteCategory";
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
	} else {
		return false;
	}

}

function deleteSubCategory(categoryid, subcategoryid){
	if(confirm("Are you sure you want to delete this?")) {
		var url = base_url.toString() + "/onetech/Admin/deleteSubCategory";
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
	} else {
		return false;
	}
}

function deleteProduct(productid){
	if(confirm("Are you sure you want to delete this?")) {
		var url = base_url.toString() + "/onetech/Admin/deleteProduct";
		$.ajax({
			url: url,
			method: 'post',
			data: {
				product_id: productid,
			},

			beforeSend: function () {

			},
			success: function () {
				alert("Remove Category Success");
			},
		});
	} else {
		return false;
	}
}

function deleteTypeProduct(product_id, type_id){
	if(confirm("Are you sure you want to delete this?")) {
		var url = base_url.toString() + "/onetech/Admin/deleteTypeProduct";
		$.ajax({
			url: url,
			method: 'post',
			data: {
				product_id: product_id,
				type_id: type_id,
			},

			beforeSend: function () {

			},
			success: function () {
				alert("Remove Category Success");
			},
		});
	} else {
		return false;
	}
}
