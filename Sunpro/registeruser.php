<?php include '../../../wp-load.php';



if (isset($_POST['hidden_value']) && $_POST['hidden_value'] == "RegisterUser") {
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$your_password = $_POST['your_password'];
	$your_email = $_POST['your_email'];
	$company = $_POST['company'];

	$user_activation_key = wp_generate_password(20, false);

	$full_name = $first_name . " " . $last_name;
	$theme_url = get_bloginfo('stylesheet_directory');
	$site_url = get_bloginfo('url');

	if (email_exists($your_email) || username_exists($your_email)) {

		$msg = "<span class='alert alert-danger'>Email Address Already exist! Please try another one.</span>";
		$error = 1;
	} else {
		$insert_new = wp_insert_user(array('user_login' => $your_email, 'user_nicename' => $full_name, 'user_email' => $your_email, 'user_pass' => $your_password, 'display_name' => $full_name, 'first_name' => $first_name, 'last_name' => $last_name, 'role' => 'customer'));

		if ($insert_new) {
			$user_id = username_exists($your_email); //login name	
			if ($user_id && !is_wp_error($user_id)) {
				//$activation_link = add_query_arg( array( 'key' => $user_activation_key, 'activate' => 'success', 'user' => $user_id ), get_permalink(256));

				//update_user_meta( $user_id, 'has_to_be_activated', $user_activation_key );				
				//update_user_meta( $user_id, 'phone_number', $phone_number );				
				update_user_meta($user_id, 'show_admin_bar_front', 'false');
				update_user_meta($user_id, 'company', $company);

				$info = array();
				$info['user_login'] = $your_email;
				$info['user_password'] = $your_password;

				$user_signon = wp_signon($info, false);
				if (is_wp_error($user_signon)) {
					$msg = "<span class='alert alert-danger'>Registration failed for some unknown reason. Please try again later.</span>";
					$error = 1;
				} else {

					$msg = "<span class='alert alert-success'>Registration successful, redirecting...</span>";
					$error = 0;
				}


				/*
					$to = $your_email;
					$from = "Support Team <no-reply@ayumetrix.com>";
					$subject  ="Welcome to Ayumetrix";
					$message = "<html>";
					$message .= "<head>
					<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
					<title>email-template</title>
					<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
					</head>";
					$message .= "<body style='margin:0; padding:0; font-family:helvetica'>";
					$message .= " <table style='width:100%; max-width:600px; margin:0 auto;' border='1' cellpadding='0' cellspacing='0'><tr><td>";
					$message .= " <table width='100%' cellpadding='0' cellspacing='0'>
										  <tr>
											  <td style='padding-left:8px; background:#451771; color:#fff; padding-top:10px; padding-bottom:6px; border-bottom:25px solid #451771; text-align:center;'><a href='javascript:void(0)'>Techie Academy</a></td>
										  </tr>
										  
									</table>";
						$message .= "<table width='100%' style='padding:0 10px;'>
						 <tr>
							  <td>
								 <h3 style='margin-bottom:30px;'>".__('Welcome')." ".$full_name."</h3>
								 <p style='color:#000; font-size:12px; font-family:arial; margin-bottom:20px;'>
								 Thanks for registering on <a style='color:#1876a5;' href='".$site_url."'>".$site_url.".</a></p>		
								 
								 										 
								 <p style='font-size:12px;'>Username: ".$your_email."</p>
								 
								 
								 
								 <p style='font-size:12px;'>".__('Thank You')."</p>
								 <p style='font-size:12px; font-weight:bold; color:#1876a5;'>The Support Team</p>
							  </td>

						  </tr>
					</table>";
					$message .= "<table style='width:100%; padding:20px 0; margin-top:20px; border-top:1px solid #ccc;'>
						<tr>
							<td style='font-size:12px; line-height:18px; padding:0 10px;'>
								This email was sent by <a style='color:#1876a5;' href='".$site_url."'> ".$site_url.".</a>
							</td>
						</tr>
					</table>";
					$message .= "</td></tr></table></body></html>";	
					$headers ="MIME-Version: 1.0" . "\r\n";
					$headers .="Content-type:text/html;charset=iso-8859-1" . "\r\n";
					$headers .="From: $from" . "\r\n";
					
					if ( $message && @mail($to, $subject, $message, $headers) ) {
					
						$msg = "<span class='alert alert-success'>Thank You for Registering! Please activate your account through the activation link which is just sent to your email.</span>";
						$error = 0;
					}
					else {
						
						$msg = "<span class='alert alert-danger'>Registration failed for some unknown reason. Please try again later.</span>";
						$error = 1;
					}

					*/
			}
		} else {
			$msg = "<span class='alert alert-danger'>Registration failed for some unknown reason. Please try again later.</span>";
			$error = 1;
		}
	}
} else {
	$msg = "<span class='alert alert-danger'>Registration failed for some unknown reason. Please try again later.</span>";
	$error = 1;
}

$result = array(
	"msg" => $msg,
	"error" => $error,
);

echo json_encode($result);
