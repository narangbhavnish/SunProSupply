jQuery.validator.addMethod("validEmail", function(value, element) {
    if (value == '')
        return true;
    var temp1;
    temp1 = true;
    var ind = value.indexOf('@');
    var str2 = value.substr(ind + 1);
    var str3 = str2.substr(0, str2.indexOf('.'));
    if (str3.lastIndexOf('-') == (str3.length - 1) || (str3.indexOf('-') != str3.lastIndexOf('-')))
        return false;
    var str1 = value.substr(0, ind);
    if ((str1.lastIndexOf('_') == (str1.length - 1)) || (str1.lastIndexOf('.') == (str1.length - 1)) || (str1.lastIndexOf('-') == (str1.length - 1)))
        return false;
    str = /(^[a-zA-Z0-9]+[\._-]{0,1})+([a-zA-Z0-9]+[_]{0,1})*@([a-zA-Z0-9]+[-]{0,1})+(\.[a-zA-Z0-9]+)*(\.[a-zA-Z]{2,3})$/;
    temp1 = str.test(value);
    return temp1;
}, "Please enter a valid email address.");

jQuery().ready(function() {
    // validate signup form on keyup and submit
    jQuery("#wp_pass_reset").validate({
        rules: {
            enter_email_address: {
                required: {
                    depends: function() {
                        jQuery(this).val(jQuery(this).val().replace(/^\s+/, ""));
                        return true;
                    }
                },
                validEmail: true
            }

        },
        errorPlacement: function(error, element) {
            if (element.attr("name") == "enter_email_address")
                error.insertAfter(".email-label");
            else
                error.insertAfter(element);
        },
        messages: {
            enter_email_address: {
                required: "Email Address is required."
            }

        },
        submitHandler: function(form) {
            jQuery('form#wp_pass_reset div.status').show().html("<span class='alert alert-success'>Checking info, please wait...</span>");
            //return;
            jQuery.ajax({
                type: 'POST',
                dataType: 'json',
                url: common_script.ajax_url,
                data: {
                    'action': 'passwordreset', //calls wp_ajax_nopriv_passwordreset
                    'enter_email_address': $('form#wp_pass_reset #enter_email_address').val(),
                    'tg_pwd_reset': $('form#wp_pass_reset #tg_pwd_reset').val(),
                    'tg_pwd_nonce': $('form#wp_pass_reset #tg_pwd_nonce').val()
                },
                success: function(data) {
                    jQuery('.status').html(data.message);
                    jQuery('.status').delay(5000).fadeOut('slow');
                    jQuery('#enter_email_address').val('');

                }
            });

        }
    });

});