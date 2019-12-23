/*-------------------
    Quantity change
--------------------- */
var proQty = $('.pro-qty');
proQty.prepend('<span class="dec qtybtn">-</span>');
proQty.append('<span class="inc qtybtn">+</span>');
proQty.on('click', '.qtybtn', function () {
    var $button = $(this);
    var oldValue = parseFloat($button.parent().find('.quantity-item').val());
    var max = $button.parent().parent().find('.quota_prod').val();
    if ($button.hasClass('inc')) {
        if (oldValue < max) {
            var newVal = oldValue + 1;
        } else {
            newVal = max;
        }
    } else {
        // Don't allow decrementing below zero
        if (oldValue > 0) {
            var newVal = parseFloat(oldValue) - 1;
        } else {
            newVal = 0;
        }
    }
    $button.parent().find('input').val(newVal);

    var $order = $button.parent().parent().parent().parent().find('.order-product');
    var quantity = $order.parent().parent().find('.quantity-item').val();
    var type_id = $order.parent().parent().find('.type_id').val();
    var base_url = window.location.origin+"/onetech/Order/addToCart/"+type_id+"/"+quantity;
    $('.order-product').attr('href',base_url);
});

$(document).ready(function() {
	$(".order-product").click(function (e) {
		var quantity = $(this).parents("tr").find("input").val();
		var quota = $(this).parents("tr").find(".quota_prod").val();
		if (quota == 0)  {
			alert("Product is out of stock");
			e.preventDefault();
		} else if (quantity == 0){
			alert("Please order at least 1 item");
			e.preventDefault();
		}
	});
});
