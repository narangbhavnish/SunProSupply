jQuery.validator.addMethod("noSpace", function(value, element) {
    if (value == "") {
        return true;
    } else {
        return value.indexOf(" ") < 0 && value != "";
    }
}, "Password with spaces are not allowed.");
jQuery(document).ready(function() {
    // validate signup form on keyup and submit
    jQuery("#wp_pass_reset").validate({
        rules: {
            enter_new_password: {
                required: {
                    depends: function() {
                        jQuery(this).val(jQuery(this).val().replace(/^\s+/, ""));
                        return true;
                    }
                },
                //noSpace: true,
                minlength: 5
            },
            enter_confirm_password: {
                required: {
                    depends: function() {
                        jQuery(this).val(jQuery(this).val().replace(/^\s+/, ""));
                        return true;
                    }
                },
                //noSpace: true,
                minlength: 5,
                equalTo: "#enter_new_password"
            }

        },
        errorPlacement: function(error, element) {
            if (element.attr("name") == "enter_new_password")
                error.insertAfter(".new-password-label");
            if (element.attr("name") == "enter_confirm_password")
                error.insertAfter(".confirm-password-label");
            else
                error.insertAfter(element);
        },
        messages: {
            enter_new_password: {
                required: "New password is required.",
                minlength: "Your password must be at least 5 characters long."

            },
            enter_confirm_password: {
                required: "Confirm Password is required.",
                minlength: "Your password must be at least 5 characters long.",
                equalTo: "Enter the same password as above."
            }

        },
        submitHandler: function(form) {
            jQuery('form#wp_pass_reset div.status').show().html("<span class='alert alert-success'>Updating, please wait...</span>");
            //return;
            jQuery.ajax({
                type: 'POST',
                dataType: 'json',
                url: common_script.ajax_url,
                data: {
                    'action': 'passwordupdate', //calls wp_ajax_nopriv_passwordreset
                    'enter_new_password': $('form#wp_pass_reset #enter_new_password').val(),
                    'getUserId': $('form#wp_pass_reset #getUserId').val(),
                    'tg_pwd_reset': $('form#wp_pass_reset #tg_pwd_reset').val(),
                    'tg_pwd_nonce': $('form#wp_pass_reset #tg_pwd_nonce').val()
                },
                success: function(data) {
                    jQuery('.status').html(data.message);
                    jQuery('.status').delay(5000).fadeOut('slow');
                    setTimeout(function() {
                        location.reload();
                    }, 5000);

                }
            });

        }
    });

});