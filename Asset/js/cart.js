(function($) {
    $(document).ready(function() {
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
        var productRow = $(removeButton).parent().parent().parent().parent();
        productRow.slideUp(fadeTime, function () {
            productRow.remove();
            recalculateCart();
        });
    }

    function addQuantityToDB(id, quantity){
        var type_id = id;
        var url = base_url.toString()+"/OneTech/Order/updateCart";;

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
        var $button = $(this);
        var oldValue = $button.parent().find('input#qty').val();
        /*var max = document.getElementById('stock_quota').value;*/
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;

        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        addQuantityToDB($button.parent().find('input#type_id').val(), newVal);
        $button.parent().find('input#qty').val(newVal);
        updateQuantity($button.parent());
    });
})(jQuery);
