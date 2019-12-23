var base_url = window.location.origin;
(function($) {
    $(document).ready(function() {
    	CheckActiveOrder();
        recalculateCart();
    });

    $(window).on('load', function() {
        /*------------------
            Preloder
        --------------------*/
        $(".loader").fadeOut();
        $("#preloder").delay(400).fadeOut("slow");

    });

    /* Set rates + misc */
    var taxRate = 0;
    var shippingRate = 0;
    var fadeTime = 300;
    /*/!* Assign actions *!/
    $(".pro-qty").change(function() {
        updateQuantity(this);
    });

    $('.product-removal button').click(function() {
        removeItem(this);
    });*/


    /* Recalculate cart */
    function recalculateCart() {
        var parent = $("#table-cart");
        var subtotal = 0;

        /* Sum up row totals */
        $(parent.children()).each(function () {
            var price = price_to_number($(this).find('td').children('.price').html());
            subtotal += parseFloat(price);
        });

        /* Calculate totals */
        var tax = subtotal * taxRate;
        var shipping = (subtotal > 0 ? shippingRate : 0);
        var total = subtotal + tax + shipping;

        /* Update totals display */
        $('.total-cost').find('span').fadeOut(fadeTime, function () {
            $('.total-cost').find('span').html("Rp. "+currencyIndonesia(total.toFixed(2)));
            if (total == 0) {
                $('.checkout').fadeOut(fadeTime);
            } else {
                $('.checkout').fadeIn(fadeTime);
            }
            $('.total-cost').find('span').fadeIn(fadeTime);
        });
    }


    /* Update quantity */
    function updateQuantity(quantityInput) {
        /* Calculate line price */
        var productRow = (($(quantityInput).parent()).parent()).parent();
        var price = parseFloat(productRow.find('td').children('.price-hidden').val());
        var quantity = $(quantityInput).find('input').val();
        var linePrice = price * quantity;

        /* Update line price display and recalc cart totals */
        productRow.find('td').children('.price').each(function () {
            $(this).fadeOut(fadeTime, function () {
                $(this).text("Rp. "+currencyIndonesia(linePrice.toFixed(2)));
                recalculateCart();
                $(this).fadeIn(fadeTime);
            });
        });
    }


    /* Remove item from cart */
    function removeItem(removeButton) {
        /* Remove row from DOM and recalc cart total */
        $(removeButton).remove();
    }

    function addQuantityToDB(id, quantity){
        var type_id = id;
        var url = base_url.toString()+"/onetech/Order/updateCart";;

        $.ajax({
            url: url ,
            method: 'post',
            data: {type_id: type_id, quantity: quantity},
            success: function() {

            },
        });
    }

    /*-------------------
            Quantity change
        --------------------- */
    var proQty = $('.pro-qty');
    proQty.prepend('<span class="dec qtybtn">-</span>');
    proQty.append('<span class="inc qtybtn">+</span>');
    proQty.on('click', '.qtybtn', function () {
        let $button = $(this);
        let newVal = 0;
        let oldValue = parseFloat($button.parent().find('input#qty').val());
        let max = parseFloat($button.parent().find('input#stock-quota').val());
        if ($button.hasClass('inc')) {
            if (oldValue<max) {
                newVal = oldValue + 1;
            } else {
                newVal = max;
            }
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                newVal = oldValue - 1;
            } else {
                newVal = 0;
            }
        }

        addQuantityToDB($button.parent().find('input#type_id').val(), newVal);
        $button.parent().find('input#qty').val(newVal);
        updateQuantity($button.parent());

        if (newVal == 0) {
            var url = base_url.toString() + "/onetech/Order/removeFromCart";
            let type_id = $button.parent().find('input#type_id').val();
            $.ajax({
                url: url,
                method: 'post',
                data: { type_id: type_id, },
                beforeSend: function () {

                },
                success: function () {
                    removeItem($button.parents('tr'));
                    updateQuantity($button.parent());
					$('#proceed-order').attr('disabled','disabled');
                }
            });
        }
    });

    function CheckActiveOrder(){
		if ($("#proceed-order").is(":disabled")) return;
		var url = base_url.toString() + "/onetech/Order/checkOrderActive";
		$.ajax({
			url: url,
			success: function (response) {
				if (response == "true") {
					alert("You have an active order, complete your order first");
					$('#proceed-order').attr('disabled','disabled');
				}
			}
		});
	}

    /*-------------------
            Proceed to Order
        --------------------- */
    $('#proceed-order').click(function(e) {
        e.preventDefault();
        var url = base_url.toString() + "/onetech/Order/moveToOrder";
        window.location.href = url;
    });



})(jQuery);
