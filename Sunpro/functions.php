<?php

define('THEME_NAME', 'SunPro');
define('TEXT_DOMAIN', 'SunPro');
define('SITE_URL', site_url('/'));
define('THEME_URL', get_theme_file_uri() . '/');
define('COMPANY_NAME', 'SunPro Supply');
define('COMPANY_EMAIL', 'noreply@firstprinciples.io');
define('ADMIN_EMAIL', 'noreply@firstprinciples.io');

define('EQUIPMENT_CATEGORY_ID', '337');
define('EQUIPMENT_CATEGORY_SLUG', 'equipment');


add_theme_support('widgets');

add_action('after_setup_theme', 'yourtheme_setup');

function yourtheme_setup()
{
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}

include_once('includes/components/WooComponents/categories_bar.php');


require_once('includes/components/home/sunproproducts-home.php');
require_once('includes/components/home/sunprohome-services.php');
require_once('includes/components/home/sunprohome-equipments.php');
require_once('includes/components/home/sunprohome-nfib.php');



//Used to display the logo
function themename_custom_logo_setup()
{
    $defaults = array(
        'height'      => 100,
        'width'       => 100,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array('site-title', 'site-description'),
    );
    // Logo Support
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'themename_custom_logo_setup');


//Menu Support
add_theme_support('menus');

add_theme_support('widgets');

add_theme_support('widgets-block-editor');

//Used For Featured Image in Post
add_theme_support('post-thumbnails');


//Register Menu
register_nav_menus(
    array(
        'header-menu' => __('Header Menu', 'theme'),
        'footer-menu' => __('Footer Menu', 'theme'),
    )
);

// Used to add Header and Footer acf
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'     => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'        => false
    ));

    acf_add_options_sub_page(array(
        'page_title'     => 'Theme Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'    => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'     => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'    => 'theme-general-settings',
    ));
}



function zi_content()
{
    global $post;
    return apply_filters('the_content', get_post_field('post_content', $post->id));
}


/* SVG Code
* Add this line in SVG Image
* <?xml version="1.0" encoding="utf-8"?>
*/
define('ALLOW_UNFILTERED_UPLOADS', true);
function my_custom_mime_types($mimes)
{
    // New allowed mime types.
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    // Optional. Remove a mime type.
    unset($mimes['exe']);
    return $mimes;
}
add_filter('upload_mimes', 'my_custom_mime_types');

/*add_filter('rest_api_init', 'rest_only_for_authorized_users', 99);
function rest_only_for_authorized_users($wp_rest_server)
{
    if (!is_user_logged_in()) {
        wp_die('sorry you are not allowed to access this data', 'Access Denied', 403);
    }
}
*/

add_action('after_setup_theme', 'woocommerce_support');
function woocommerce_support()
{
    add_theme_support('woocommerce');
}


function filter_projects()
{
    $catSlug = $_POST['category'];
    $orderbySlug = $_POST['order'];
    //echo $orderbySlug;

    header("Content-Type: text/html");
    $ajaxposts = new WP_Query([
        'suppress_filters' => true,
        'post_type' => 'product',
        'posts_per_page' => 3,
        'order' => $orderbySlug,
        'post_status'      => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => $catSlug, /*category name*/
                'operator' => 'IN',
            )
        ),

    ]);
    $response = '';
    // echo '<pre>';
    // print_r($ajaxposts->posts);
    // echo '</pre>';

    if ($ajaxposts->have_posts()) {
        $response = '<div class="product">';
        while ($ajaxposts->have_posts()) : $ajaxposts->the_post();
            $product_id = $ajaxposts->ID;
            // print_r($product_id);
            $product = wc_get_product($product_id);
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'single-post-thumbnail');
            $response .= '<div class="wrapper">
            <div class="product_image test">
                <img src=' . $image[0] . ' alt=' . get_the_title() . ' class="img-fluid"/> 
                <span class="product_tag">Cleaner</span>
            </div>
        
        <div class="content">
            <h3>' . get_the_title() . '</h3>
            <div class="stars">
                <div class="star_image"> 
                    $product = wc_get_product( $product_id );
                    $rating  = $product->get_average_rating();
                    $count   = $product->get_rating_count();
                    //print_r($rating);
                    echo wc_get_rating_html( $rating, $count );
                </div>
                <p class="rating">5.0</p>
            </div>
            <p class="product_content">' . get_the_excerpt() . '</p>
        </div>
    </div>';
        endwhile;
        $newresponse = '</div>';
        $response = $response . $newresponse;
?>
    <?php
    } else {
        $response .= 'empty';
    }
    echo $response;
    exit;
}
add_action('wp_ajax_filter_projects', 'filter_projects');
add_action('wp_ajax_nopriv_filter_projects', 'filter_projects');

add_action('wp_enqueue_scripts', 'theme_scripts_method');

function theme_scripts_method()
{
    $common_array = array('templateUrl' => get_stylesheet_directory_uri(), 'homeUrl' => get_bloginfo('url'), 'ajax_url' => admin_url('admin-ajax.php'));

    wp_enqueue_script('jquery');
    wp_enqueue_script('common-script');

    if (is_page(array('register', 'login', 'forgot-password', 'reset-password'))) {
        wp_enqueue_script('jqueryvalidate', get_stylesheet_directory_uri() . '/custom/validation/jquery.validate.js', array('jquery'), false, true);
    }
    if (is_page(array('register'))) {
        wp_enqueue_script('register', get_stylesheet_directory_uri() . '/custom/validation/register.js', array('jquery'), false, true);
        wp_localize_script('register', 'common_script', $common_array);
    }
    if (is_page(array('login'))) {
        wp_enqueue_script('member-login', get_stylesheet_directory_uri() . '/custom/validation/member-login.js', array('jquery'), false, true);
        wp_localize_script('member-login', 'common_script', $common_array);
    }
    if (is_page(array('forgot-password'))) {
        wp_enqueue_script('forgot-password', get_stylesheet_directory_uri() . '/custom/validation/forgot-password.js', array('jquery'), false, true);
        wp_localize_script('forgot-password', 'common_script', $common_array);
    }
    if (is_page(array('reset-password'))) {
        wp_enqueue_script('reset-password', get_stylesheet_directory_uri() . '/custom/validation/update-password.js', array('jquery'), false, true);
        wp_localize_script('reset-password', 'common_script', $common_array);
    }

    if (is_home() || is_front_page()) {
        wp_enqueue_script('getProductDetails', get_stylesheet_directory_uri() . '/custom/js/getProductDetails.js', array('jquery'), false, true);
        wp_localize_script('getProductDetails', 'common_script', $common_array);
    }

    if (function_exists('is_product') && is_product()) {
        wp_enqueue_script('add_to_cart_script', get_bloginfo('stylesheet_directory') . '/custom/js/ajax_add_to_cart.js', array('jquery'), false, true);
        wp_localize_script('add_to_cart_script', 'common_script', $common_array);
    }
}



function add_additional_class_on_a($classes, $item, $args)
{
    if (isset($args->add_a_class)) {
        $classes['class'] = $args->add_a_class;
    }
    return $classes;
}

add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);

function helpwp_custom_logo_output($html)
{

    $html = str_replace('custom-logo-link', 'navbar-brand', $html);
    $html = str_replace('custom-logo', 'img-fluid', $html);
    return $html;
}
add_filter('get_custom_logo', 'helpwp_custom_logo_output', 10);


add_action('wp_ajax_nopriv_memberlogin', 'memberLogin');
//add_action('wp_ajax_ajaxlogin', 'ajax_login');
function memberLogin()
{

    // Nonce is checked, get the POST data and sign user on
    $user_email     = esc_attr($_POST["username"]);
    $user_password  = esc_attr($_POST["password"]);
    //$user_remember  = esc_attr($_POST["remember"]);
    $redirect_to  = $_POST["redirect_to"];
    $checkDetails = wp_authenticate_username_password(null, $user_email, $user_password);
    //echo "<pre>"; print_r($checkDetails); echo "</pre>"; die('sdfs'); 
    if (is_wp_error($checkDetails)) {
        echo json_encode(array('loggedin' => false, 'message' => __('<span class="alert alert-danger">Invalid email or password.</span>')));
        exit;
    } else {

        $user = get_user_by('email', $user_email);

        $user_id = $checkDetails->ID;

        $info = array();
        $info['user_login'] = $user_email;
        $info['user_password'] = $user_password;
        //$info['remember'] = $user_remember;
        //$info['rememberme'] = true;

        $has_activated = get_user_meta($user_id, 'email_to_be_activated', true);
        $wp_capabilities = get_user_meta($user_id, 'wp_capabilities', true);

        // Get the user object.
        $getUserData = get_userdata($user_id);

        // Get all the user roles as an array.
        $user_roles = $checkDetails->roles;

        $get_capabilities = array_keys($wp_capabilities);

        $ncaps = count($get_capabilities);
        $role = $get_capabilities[$ncaps - 1];
        //die('here');

        /* if ($has_activated) {
            echo json_encode(array('loggedin' => false, 'message' => __('<span class="alert alert-danger">Please verify your email addrees by clicking on the link sent to your email.</span>')));
            exit;
        } else */
        
        if (in_array('customer', $user_roles, true)) {
            $user_signon = wp_signon($info, false);
            if (is_wp_error($user_signon)) {
                echo json_encode(array('loggedin' => false, 'message' => __('<span class="alert alert-danger">Invalid email or password.</span>')));
                exit;
            } else {
                echo json_encode(array('loggedin' => true, 'redirect_to' => $redirect_to, 'message' => __('<span class="alert alert-success">Login successful, redirecting...</span>')));
                exit;
            }
        } else {
            echo json_encode(array('loggedin' => false, 'message' => __('<span class="alert alert-danger">Invalid email or password.</span>')));
            exit;
        }
    }
    die();
}

add_action('wp_ajax_nopriv_passwordreset', 'ajax_reset_password');
function ajax_reset_password()
{
    global $wpdb;
    if ($_POST['tg_pwd_reset'] == "tg_pwd_reset") {
        if (!wp_verify_nonce($_POST['tg_pwd_nonce'], "tg_pwd_nonce")) {
            echo json_encode(array('pwdreset' => false, 'message' => __('<span class="alert alert-danger">No Tricks Please.</span>')));
            exit;
        }
        if (empty($_POST['enter_email_address'])) {
            echo json_encode(array('pwdreset' => false, 'message' => __('<span class="alert alert-danger">Please enter your email address.</span>')));
            exit;
        }
        $user_input = $wpdb->escape(trim($_POST['enter_email_address']));
        if (strpos($user_input, '@')) {
            $user_data = get_user_by('email', $user_input);
            if (empty($user_data) || $user_data->caps['administrator'] == 1) { //delete the condition $user_data->caps[administrator] == 1, if you want to allow password reset for admins also
                echo json_encode(array('pwdreset' => false, 'message' => __('<span class="alert alert-danger">Invalid email address.</span>')));
                exit;
            }
        } else {
            $user_data = get_user_by('login', $user_input);
            if (empty($user_data) || $user_data->caps['administrator'] == 1) { //delete the condition $user_data->caps[administrator] == 1, if you want to allow password reset for admins also
                echo json_encode(array('pwdreset' => false, 'message' => __('<span class="alert alert-danger">Invalid email address.</span>')));
                exit;
            }
        }

        $user_login = $user_data->user_login;
        $user_nicename = $user_data->display_name;
        $user_email = $user_data->user_email;
        $user_ID = $user_data->ID;

        $GETrole = $wpdb->prefix . 'capabilities';

        $wp_capabilities = get_user_meta($user_ID, $GETrole, true);
        $get_capabilities = array_keys($wp_capabilities);
        $ncaps = count($get_capabilities);
        $role = $get_capabilities[$ncaps - 1];

        /*if ($role == "pending") {
            echo json_encode(array('pwdreset' => false, 'message' => __('<span class="alert alert-danger">Invalid email address.</span>')));
            exit;
		}
		*/

        $key = $wpdb->get_var($wpdb->prepare("SELECT user_activation_key FROM $wpdb->users WHERE user_login = %s", $user_login));
        if (empty($key)) {
            //generate reset key
            $key = wp_generate_password(20, false);
            $wpdb->update($wpdb->users, array('user_activation_key' => $key), array('user_login' => $user_login));
        }

        //mailing reset details to the user
        $to = $user_email;
        $from = "Support Team <no-reply@sunprosupply.com>";
        $theme_url = get_bloginfo('stylesheet_directory');
        $site_url = get_bloginfo('url');
        $reset_pwd = add_query_arg(array('key' => $key, 'action' => 'reset_pwd', 'user' => $user_ID), get_permalink(947)); // reset password id
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
		<td style='padding-left:8px; background:#fff; color:#000; padding-top:20px; padding-bottom:20px; text-align:center;'><a href='javascript:void(0)'>Sun Pro</a></td>
		</tr>
		
  </table>";
        $message .= "<table width='100%' style='padding:0 10px;'>
									 <tr>
										  <td>
											<h3 style='margin-top:20px;'>" . __('Hi') . " " . $user_nicename . "</h3>
											 <p style='color:#000; font-size:12px; font-family:arial; margin-bottom:20px;'>" . __('Someone requested that the password be reset for the following account:') . "<br/><br/>
											 " . get_option('siteurl') . "
											 </p>
											 <p style='margin-bottom:20px;font-size:12px;'>" . sprintf(__('Email: %s'), $user_login) . "</p>										
											 <p style='font-size:12px;margin-bottom:20px;'>" . __('If this was a mistake, just ignore this email and nothing will happen.') . "</p>										 
											 <p style='font-size:12px;margin-bottom:20px;'>" . __('To reset your password, visit the following address:') . " </p>
											 <p style='font-size:12px;margin-bottom:40px;'><a href='" . $reset_pwd . "'>" . $reset_pwd . " </a></p>
											 <p style='font-size:12px;'>Thank You</p>
											  <p style='font-size:12px; font-weight:bold; color:#1876a5;'>The Support Team</p>
										  </td>

									  </tr>
								</table>";
        $message .= "<table style='width:100%; padding:20px 0; margin-top:20px; border-top:1px solid #ccc;'>
								<tr>
									<td style='font-size:12px; line-height:18px; padding:0 10px;'>
										This email was sent by <a style='color:#1876a5;' href='" . $site_url . "'> " . $site_url . ".</a>
									</td>
								</tr>
							</table>";
        $message .= "</td></tr></table></body></html>";


        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
        $headers .= "From: $from" . "\r\n";
        if ($message && wp_mail($to, 'Password Reset Request', $message, $headers)) {
            echo json_encode(array('pwdreset' => false, 'message' => __('<span class="alert alert-success">We have just sent you an email with Password reset instructions.</span>')));
            exit;
        } else {
            echo json_encode(array('pwdreset' => false, 'message' => __('<span class="alert alert-danger">Email failed to send for some unknown reason. Please try again later.</span>')));
            exit;
        }
    }
    die;
}


add_action('wp_ajax_nopriv_passwordupdate', 'ajax_update_password');
function ajax_update_password()
{

    global $wpdb;

    if ($_POST['tg_pwd_reset'] == "tg_pwd_reset") {
        if (!wp_verify_nonce($_POST['tg_pwd_nonce'], "tg_pwd_nonce")) {
            echo json_encode(array('pwdreset' => false, 'message' => __('<span class="alert alert-danger">No Tricks Please.</span>')));
            exit;
        }
        if (empty($_POST['enter_new_password'])) {
            echo json_encode(array('pwdreset' => false, 'message' => __('<span class="alert alert-danger">Please enter your new password.</span>')));
            exit;
        }



        $user_ID = $_POST['getUserId'];
        if (user_id_exists($user_ID)) {


            $new_password = $_POST['enter_new_password'];
            $user_info = get_userdata($user_ID);
            //echo "<pre>"; print_r($user_info); echo "</pre>"; die('here');
            //generate reset key
            $key = wp_generate_password(20, false);

            wp_set_password($new_password, $user_ID);

            $wpdb->update($wpdb->users, array('user_activation_key' => ''), array('ID' => $user_ID));

            //mailing reset details to the user
            //print_r($user_info); die('fff');
            $user_nicename = $user_info->display_name;
            $to = $user_info->user_email;
            $from = "Support Team <no-reply@sunprosupply.com>";
            $theme_url = get_bloginfo('stylesheet_directory');
            $site_url = get_bloginfo('url');

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
				<td style='padding-left:8px; background:#253d5f; color:#fff; padding-top:20px; padding-bottom:20px; text-align:center;'><a href='javascript:void(0)'>SunPro Supply</a></td>
				</tr>
				
		  </table>";
            $message .= "<table width='100%' style='padding:0 10px;'>
                            <tr>
                                     <td>
                                           <h3 style='margin-top:20px;'>" . __('Hi') . " " . $user_nicename . "</h3>
                                            <p style='color:#000; font-size:12px; font-family:arial; margin-bottom:20px;'>" . __('Your new password has been successfully updated.') . "
                                            </p>
                                            										
                                            <p style='font-size:12px;'>Thank You</p>
                                            <p style='font-size:12px; font-weight:bold; color:#1876a5;'>The Support Team</p>
                                     </td>

                             </tr>
                   </table>";
            $message .= "<table style='width:100%; padding:20px 0; margin-top:20px; border-top:1px solid #ccc;'>
										<tr>
											<td style='font-size:12px; line-height:18px; padding:0 10px;'>
												This email was sent by <a style='color:#1876a5;' href='" . $site_url . "'> " . $site_url . ".</a>
											</td>
										</tr>
									</table>";
            $message .= "</td></tr></table></body></html>";


            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
            $headers .= "From: $from" . "\r\n";
            if ($message && wp_mail($to, 'Password Reset Request', $message, $headers)) {
                echo json_encode(array('pwdreset' => false, 'message' => __('<span class="alert alert-success">Your password has been updated successfully.</span>')));
                exit;
            } else {
                echo json_encode(array('pwdreset' => false, 'message' => __('<span class="alert alert-danger">Failed to update your password for some unknown reason. Please try again later.</span>')));
                exit;
            }
        } else {
            echo json_encode(array('pwdreset' => false, 'message' => __('<span class="alert alert-danger">Invalid User.</span>')));
            exit;
        }
    }
    die;
}

function user_id_exists($user){

    global $wpdb;

    $count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $wpdb->users WHERE ID = %d", $user));

    if($count == 1){ return true; }else{ return false; }

}

$GLOBALS['wc_loop_variation_id'] = null;

function is_field_group_for_variation($field_group, $variation_data, $variation_post)
{
    return (preg_match('/Variation/i', $field_group['title']) == true);
}

// Render fields at the bottom of variations - does not account for field group order or placement.
add_action('woocommerce_product_after_variable_attributes', function ($loop, $variation_data, $variation) {
    global $abcdefgh_i; // Custom global variable to monitor index
    $abcdefgh_i = $loop;
    // Add filter to update field name
    add_filter('acf/prepare_field', 'acf_prepare_field_update_field_name');

    // Loop through all field groups
    $acf_field_groups = acf_get_field_groups();
    foreach ($acf_field_groups as $acf_field_group) {
        foreach ($acf_field_group['location'] as $group_locations) {
            foreach ($group_locations as $rule) {
                // See if field Group has at least one post_type = Variations rule - does not validate other rules
                if ($rule['param'] == 'post_type' && $rule['operator'] == '==' && $rule['value'] == 'product_variation') {
                    // Render field Group
                    acf_render_fields($variation->ID, acf_get_fields($acf_field_group));
                    break 2;
                }
            }
        }
    }

    // Remove filter
    remove_filter('acf/prepare_field', 'acf_prepare_field_update_field_name');
}, 10, 3);

// Filter function to update field names
function  acf_prepare_field_update_field_name($field)
{
    global $abcdefgh_i;
    $field['name'] = preg_replace('/^acf\[/', "acf[$abcdefgh_i][", $field['name']);
    return $field;
}

// Save variation data
add_action('woocommerce_save_product_variation', function ($variation_id, $i = -1) {
    // Update all fields for the current variation
    if (!empty($_POST['acf']) && is_array($_POST['acf']) && array_key_exists($i, $_POST['acf']) && is_array(($fields = $_POST['acf'][$i]))) {
        foreach ($fields as $key => $val) {
            update_field($key, $val, $variation_id);
        }
    }
}, 10, 2);

add_filter('acf/location/rule_values/post_type', 'acf_location_rule_values_Post');
function acf_location_rule_values_Post($choices)
{
    $choices['product_variation'] = 'Product Variation';
    //print_r($choices);
    return $choices;
}

add_action('acf/input/admin_footer', 'wp__acf_input_admin_footer');
function wp__acf_input_admin_footer()
{
    ?>
    <script type="text/javascript">
        (function($) {
            $(document).on('woocommerce_variations_loaded', function() {
                acf.do_action('append', $('#post'));
            })
        })(jQuery);
    </script>
<?php
}
/* Remove Product Category From URL */
add_filter('request', function ($vars) {
    global $wpdb;
    if (!empty($vars['pagename']) || !empty($vars['category_name']) || !empty($vars['name']) || !empty($vars['attachment'])) {
        $slug = !empty($vars['pagename']) ? $vars['pagename'] : (!empty($vars['name']) ? $vars['name'] : (!empty($vars['category_name']) ? $vars['category_name'] : $vars['attachment']));
        $exists = $wpdb->get_var($wpdb->prepare("SELECT t.term_id FROM $wpdb->terms t LEFT JOIN $wpdb->term_taxonomy tt ON tt.term_id = t.term_id WHERE tt.taxonomy = 'product_cat' AND t.slug = %s", array($slug)));
        if ($exists) {
            $old_vars = $vars;
            $vars = array('product_cat' => $slug);
            if (!empty($old_vars['paged']) || !empty($old_vars['page']))
                $vars['paged'] = !empty($old_vars['paged']) ? $old_vars['paged'] : $old_vars['page'];
            if (!empty($old_vars['orderby']))
                $vars['orderby'] = $old_vars['orderby'];
            if (!empty($old_vars['order']))
                $vars['order'] = $old_vars['order'];
        }
    }
    return $vars;
});

add_filter('term_link', 'term_link_filter', 10, 3);
function term_link_filter($url, $term, $taxonomy)
{
    $url = str_replace("/./", "/", $url);
    return $url;
}
/* Remove Product Category From URL */
/* Remove Product From URL */
/*
function getParentCatSlug()
{
    $categories = get_the_terms(get_the_ID(), 'product_cat');
    $parent_categories = array();
    foreach ($categories as $category) {
        if ($category->parent == 0) {
            $parent_categories[] = $category->term_id;
        }
    }
}

function wsp_remove_slug($post_link, $post, $leavename)
{
    if ('product' != $post->post_type || 'publish' != $post->post_status) {
        return $post_link;
    }

    $post_link = str_replace('/product/', '/equipment/', $post_link);
    //echo $post_link; die('here');
    return $post_link;
}
add_filter('post_type_link', 'wsp_remove_slug', 10, 3);
add_filter('post_link', 'wsp_remove_slug', 10, 3);


function change_slug_structure($query)
{
    if (!$query->is_main_query() || 2 != count($query->query) || !isset($query->query['page'])) {
        return;
    }
    if (!empty($query->query['name'])) {
        $query->set('post_type', array('post', 'product', 'page'));
    } elseif (!empty($query->query['pagename']) && false === strpos($query->query['pagename'], '/')) {
        $query->set('post_type', array('post', 'product', 'page'));
        // We also need to set the name query var since redirect_guess_404_permalink() relies on it.
        $query->set('name', $query->query['pagename']);
    }
}
add_action('pre_get_posts', 'change_slug_structure', 99);
*/
/* Remove Product From URL */


function wp_get_menu_array($current_menu)
{

    $array_menu = wp_get_nav_menu_items($current_menu);
    $menu = array();
    foreach ($array_menu as $m) {
        if (empty($m->menu_item_parent)) {
            $menu[$m->ID] = array();
            $menu[$m->ID]['ID']         =     $m->ID;
            $menu[$m->ID]['title']         =     $m->title;
            $menu[$m->ID]['url']         =     $m->url;
            $menu[$m->ID]['children']    =     array();
        }
    }
    $submenu = array();
    foreach ($array_menu as $m) {
        if ($m->menu_item_parent) {
            $submenu[$m->ID] = array();
            $submenu[$m->ID]['ID']         =     $m->ID;
            $submenu[$m->ID]['title']    =     $m->title;
            $submenu[$m->ID]['url']     =     $m->url;
            $menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
        }
    }
    /*$subsubmenu = array();
    foreach ($array_menu as $m) {

    }*/
    return $menu;
}

add_filter('template_include', 'custom_single_product_template_include', 50, 1);
function custom_single_product_template_include($template)
{
    if (is_singular('product') && (has_term('equipment', 'product_cat'))) {
        $template = get_stylesheet_directory() . '/woocommerce/single-product-equipment.php';
    }
    return $template;
}

add_action('wp_ajax_ql_woocommerce_ajax_add_to_cart', 'ql_woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_ql_woocommerce_ajax_add_to_cart', 'ql_woocommerce_ajax_add_to_cart');
function ql_woocommerce_ajax_add_to_cart()
{
    //echo "<pre>"; print_r($_POST); die;
    $product_id = apply_filters('ql_woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    //$quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
    $quantity = empty($_POST['quantity']) ? 1 : absint($_POST['quantity']);
    $variation_id = absint($_POST['variation_id']);
    $passed_validation = apply_filters('ql_woocommerce_add_to_cart_validation', true, $product_id, $quantity);
    $product_status = get_post_status($product_id);
    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {
        do_action('ql_woocommerce_ajax_added_to_cart', $product_id);
        if ('yes' === get_option('ql_woocommerce_cart_redirect_after_add')) {
            wc_add_to_cart_message(array($product_id => $quantity), true);
        }
        WC_AJAX::get_refreshed_fragments();
    } else {
        $data = array(
            'error' => true,
            'product_url' => apply_filters('ql_woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id)
        );
        echo wp_send_json($data);
    }
    wp_die();
}
/*
function custom_product_cat_template($template)
{
    //echo get_queried_object_id();
    $termDetails = get_term(get_queried_object_id());
    if ( $termDetails->parent > 0 && $termDetails->taxonomy == 'product_cat') {
        $template = get_stylesheet_directory() . '/taxonomy-product_cat-equipment.php';
    }
    return $template;
}
add_filter('wc_get_template_part', 'custom_product_cat_template');
*/


/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sunpro_sidebar_registration()
{
    // Arguments used in all register_sidebar() calls.
    $shared_args = array(
        'before_title'  => '<h2 class="widget-title subheading heading-size-3">',
        'after_title'   => '</h2>',
        'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
        'after_widget'  => '</div></div>',
    );

    register_sidebar(
        array_merge(
            $shared_args,
            array(
                'name'        => __('Size Filter', 'sunpro'),
                'id'          => 'size-filter',
                'description' => __('Widgets in this area will be displayed in the shop sidebar section.', 'sunpro'),
            )
        )
    );

    register_sidebar(
        array_merge(
            $shared_args,
            array(
                'name'        => __('Price Filter', 'sunpro'),
                'id'          => 'price-filter',
                'description' => __('Widgets in this area will be displayed in the shop sidebar section.', 'sunpro'),
            )
        )
    );
}

add_action('widgets_init', 'sunpro_sidebar_registration');



add_action('init', 'services_init');
/**
 * Register a Testimonials post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function services_init()
{
    $labels = array(
        'name'               => _x('Services', 'post type general name'),
        'singular_name'      => _x('Service', 'post type singular name'),
        'menu_name'          => _x('Services', 'admin menu'),
        'name_admin_bar'     => _x('Service', 'add new on admin bar'),
        'add_new'            => _x('Add New', 'Service'),
        'add_new_item'       => __('Add New Service'),
        'new_item'           => __('New Service'),
        'edit_item'          => __('Edit Service'),
        'view_item'          => __('View Service'),
        'all_items'          => __('All Services'),
        'search_items'       => __('Search Services'),
        'parent_item_colon'  => __('Parent Services:'),
        'not_found'          => __('No Services found.'),
        'not_found_in_trash' => __('No Services found in Trash.')
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __('Description.', 'your-plugin-textdomain'),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'service', 'with_front' => true),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'map_meta_cap'       => true,
        'hierarchical'       => true,
        'menu_position'      => null,
        'exclude_from_search' => false,
        'supports'           => array('title', 'editor', 'thumbnail'),
        // This is where we add taxonomies to our CPT
        //'taxonomies'          => array( 'category' ),
    );

    register_post_type('service', $args);
}



function get_product_category_by_id($category_id)
{
    $term = get_term_by('id', $category_id, 'product_cat', 'ARRAY_A');
    return $term['name'];
}


function add_login_check()
{
    if (is_user_logged_in() && is_page(array('login', 'register', 'forgot-password'))) {
        wp_redirect(home_url('/my-account'));
        exit;
    }

    if (!is_user_logged_in() && is_page(array('my-account'))) {
        wp_redirect(home_url('/login'));
        exit;
    }
}
add_action('wp', 'add_login_check');


remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);

add_filter('woocommerce_product_tabs', 'woo_remove_product_tabs', 98);

function woo_remove_product_tabs($tabs)
{

    unset($tabs['additional_information']);      // Remove the additional information tab
    unset($tabs['description']);      // Remove the additional information tab

    return $tabs;
}

/**
 * Exclude products from a particular category on the shop page
 */
function custom_pre_get_posts_query($q)
{

    $tax_query = (array) $q->get('tax_query');

    $tax_query[] = array(
        'taxonomy' => 'product_cat',
        'field' => 'slug',
        'terms' => array(EQUIPMENT_CATEGORY_SLUG), // Don't display products in the clothing category on the shop page.
        'operator' => 'NOT IN'
    );


    $q->set('tax_query', $tax_query);
}
add_action('woocommerce_product_query', 'custom_pre_get_posts_query');


add_action('wp_ajax_nopriv_getProductDetails', 'getProductDetails');
add_action('wp_ajax_getProductDetails', 'getProductDetails');
function getProductDetails()
{
    global $product;
    $product_id = absint($_POST['productId']);
    // Get $product object from product ID
    $product = wc_get_product($product_id);

    if ($product) {
        $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'single-post-thumbnail');
        if ($featured_image) {
            $productImage = $featured_image[0];
        } else {
            $productImage = esc_url(wc_placeholder_img_src('woocommerce_single'));
        }
        echo json_encode(array('description' => $product->get_description(), 'product_url' => get_permalink($product_id), 'name' => $product->get_name(), 'product_image' => $productImage, 'product_price' => $product->get_price_html(),  'message' => true));
        exit;
    } else {
        echo json_encode(array('message' => false, 'product_url' => get_permalink($product_id)));
        exit;
    }
    die;
}


add_filter('loop_shop_per_page', 'new_loop_shop_per_page', 20);

function new_loop_shop_per_page($cols)
{
    // $cols contains the current number of products per page based on the value stored on Options –> Reading
    // Return the number of products you wanna show per page.
    $cols = 20;
    return $cols;
}

// Cart page (and mini cart)
add_filter( 'woocommerce_cart_item_name', 'cart_item_product_description', 20, 3);
function cart_item_product_description( $item_name, $cart_item, $cart_item_key ) {
    if ( ! is_checkout() ) {
        if( $cart_item['variation_id'] > 0 ) {
            $description = $cart_item['data']->get_description(); // variation description
        } else {
            $description = $cart_item['data']->get_short_description(); // product short description (for others)
        }

        if ( ! empty($description) ) {
            return $item_name . '<br><div class="description">
                <strong>' . __( 'Description', 'woocommerce' ) . '</strong>: '. $description . '
            </div>';
        }
    }
    return $item_name;
}

// Checkout page
add_filter( 'woocommerce_checkout_cart_item_quantity', 'cart_item_checkout_product_description', 20, 3);
function cart_item_checkout_product_description( $item_quantity, $cart_item, $cart_item_key ) {
    if( $cart_item['variation_id'] > 0 ) {
        $description = $cart_item['data']->get_description(); // variation description
    } else {
        $description = $cart_item['data']->get_short_description(); // product short description (for others)
    }

    if ( ! empty($description) ) {
        return $item_quantity . '<br><div class="description">
            <strong>' . __( 'Description', 'woocommerce' ) . '</strong>: '. $description . '
        </div>';
    }

    return $item_quantity;
}

add_filter( 'wpseo_json_ld_output', '__return_false' );

