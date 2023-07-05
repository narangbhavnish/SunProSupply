jQuery().ready(function() {
    // validate signup form on keyup and submit
    jQuery("#registration_form").validate({
        rules: {
            first_name: "required",
            last_name: "required",

            your_password: {
                required: true,
                minlength: 5
            },
            confirm_password: {
                required: true,
                minlength: 5,
                equalTo: "#your_password"
            },
            your_email: {
                required: true,
                email: true
            },
            agree: {
                required: true,
            }

        },
        errorPlacement: function(error, element) {
            if (element.attr("name") == "first_name")
                error.insertAfter(".fname-label");
            if (element.attr("name") == "last_name")
                error.insertAfter(".lname-label");
            if (element.attr("name") == "your_email")
                error.insertAfter(".email-label");
            else if (element.attr("name") == "your_password")
                error.insertAfter(".password-label");
            else if (element.attr("name") == "confirm_password")
                error.insertAfter(".confirm-password-label");
            else if (element.attr("name") == "agree")
                error.insertAfter(".form-check-label");
            else
                error.insertAfter(element);
        },
        messages: {
            first_name: "First name is required.",
            last_name: "Last name is required.",

            your_password: {
                required: "Password is required.",
                minlength: "Your password must be at least 5 characters long."
            },
            confirm_password: {
                required: "Confirm password is required.",
                minlength: "Your password must be at least 5 characters long.",
                equalTo: "Enter the same password as above."
            },
            your_email: "Email address is required.",
            agree: "Accept TOS is required."

        },
        submitHandler: function(form) {


            jQuery('div.status').show().html("<span class='green'>Sending user info, please wait...</span>");
            //var first_name = jQuery('#first_name').val() != '' ? jQuery.trim(jQuery('#first_name').val()) : "";
            //var last_name = jQuery('#last_name').val() != '' ? jQuery.trim(jQuery('#last_name').val()) : "";
            var your_password = jQuery('#your_password').val() != '' ? jQuery.trim(jQuery('#your_password').val()) : "";
            var your_email = jQuery('#your_email').val() != '' ? jQuery.trim(jQuery('#your_email').val()) : "";
            //var phone_number = jQuery('#phone_number').val() != '' ? jQuery.trim(jQuery('#phone_number').val()) : "";
            var hidden_value = jQuery.trim(jQuery('#hidden_value').val());
            var templateUrl = common_script.templateUrl;


            jQuery.ajax({
                type: "POST",
                dataType: "json",
                url: templateUrl + "/registeruser.php",
                data: { your_password: your_password, your_email: your_email, hidden_value: hidden_value },
                success: function(response) {
                    //console.log(response);
                    if (response.error == 1) {
                        jQuery('div.status').show().html(response.msg);
                    } else {
                        jQuery('div.status').show().html(response.msg);
                        window.location = common_script.homeUrl + "/my-account/";
                    }

                }
            });

            return false;

        }
    });


});