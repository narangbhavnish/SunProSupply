jQuery(document).ready(function($) {
    jQuery('.single__add_to_cart_button').on('click', function(e) {
        e.preventDefault();
        $thisbutton = jQuery(this),
            $form = $thisbutton.closest('form.add_to_cart'),
            id = $thisbutton.val(),
            product_qty = $form.find('input[name=quantity]').val() || 1,
            product_id = $form.find('input[name=product_id]').val() || id,
            variation_id = $form.find('input[name=variation_id]').val() || 0;
        var data = {
            action: 'ql_woocommerce_ajax_add_to_cart',
            product_id: product_id,
            product_sku: '',
            quantity: product_qty,
            variation_id: variation_id,
        };
        jQuery.ajax({
            type: 'post',
            url: common_script.ajax_url,
            data: data,
            beforeSend: function(response) {
                $thisbutton.removeClass('added').addClass('loading');
            },
            complete: function(response) {
                $thisbutton.addClass('added').removeClass('loading');
            },
            success: function(response) {
                if (response.error & response.product_url) {
                    //console.log(response);
                    //window.location = response.product_url;
                    //jQuery('.add-to-cart-td-' + variation_id).innerHTML('');
                    $thisbutton.show();
                    return;
                } else {
                    //console.log(response.fragments);
                    //jQuery(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $thisbutton]);
                    jQuery('.add-to-cart-td-' + variation_id).html('<a href="javascript:void(0)" class="cart_added added_to_cart" data-bs-toggle="modal" data-bs-target="#exampleModal" role="button" title="View Cart">View cart</a>');
                    $thisbutton.hide();
                    location.reload();
                }
            },
        });
    });
});