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
}, "Enter valid email address.");

jQuery().ready(function() {
    //console.log(common_script);

    // validate signup form on keyup and submit
    jQuery("#member_login").validate({
        rules: {
            log: {
                required: {
                    depends: function() {
                        jQuery(this).val(jQuery(this).val().replace(/^\s+/, ""));
                        return true;
                    }
                },
                validEmail: true
            },
            pwd: {
                required: true
            }

        },
        errorPlacement: function(error, element) {
            if (element.attr("name") == "log")
                error.insertAfter(".email-label");
            else if (element.attr("name") == "pwd")
                error.insertAfter(".password-label");
            else
                error.insertAfter(element);
        },
        messages: {
            log: {
                required: "Email address is required."
            },
            pwd: {
                required: "Password is required."
            }

        },
        submitHandler: function(form) {

            jQuery('form#member_login div.status').show().html("<span class='alert alert-success'>Checking info, please wait...</span>");

            //console.log(common_script.ajax_url);
            //return;

            jQuery.ajax({
                type: 'POST',
                dataType: 'json',
                url: common_script.ajax_url,
                data: {
                    'action': 'memberlogin', //calls wp_ajax_nopriv_ajaxlogin
                    'username': jQuery('form#member_login #user_login').val(),
                    'password': jQuery('form#member_login #user_pass').val(),
                    'redirect_to': jQuery('form#member_login #redirect_to').val(),
                    //'remember': remember_login,
                    //'security': jQuery('form#member_login #security').val()
                },
                success: function(data) {
                    //console.log(data);
                    //return false;
                    if (data.loggedin == false) {
                        jQuery('form#member_login div.status').show().html(data.message);
                        jQuery('form#member_login div.status').delay(5000).fadeOut('slow');
                    } else {
                        jQuery('form#member_login div.status').show().html(data.message);
                        window.location.href = data.redirect_to;
                    }

                }
            });

        }
    });

});