jQuery(document).ready(function() {
    jQuery(".showDescriptionModal").on('click',function() {
          var id = jQuery(this).data('id');
          
          jQuery.ajax({
                  type: 'POST',
                  dataType: 'json',
                  url: common_script.ajax_url,
                  data: {
                      'action': 'getProductDetails', //calls wp_ajax_nopriv_ajaxlogin
                      'productId': id,
                  },
                  success: function(data) {
                    //console.log(data);
                    if (data.message === true) {
                        jQuery('#product-title').html(data.name);
                        jQuery('#product-description').html(data.description);
                        jQuery('#product-price').html(data.product_price);
                        jQuery('img#product-image').attr('src', data.product_image);
                        jQuery('#view-product').attr('href', data.product_url);
                        jQuery("#showDescriptionModal").modal("show");
                    }
                  }
              });
      });
});