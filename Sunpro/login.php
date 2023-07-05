<?php
/* Template Name: Login */
get_header();
?>
<section class="loginbg__wrapper"></section>
<div class="custom__breadcrumb__topbar myaccount--breadcrumb">
    <div class="container">
        <nav class="custom__breadcrumb" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?php _e(home_url()); ?>">
                        <svg style="vertical-align: text-top;margin-right: 3px;    margin-top: 2px;" width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <path d="M17.3407 6.78979L11.652 1.09688C10.9479 0.394448 9.99425 0 9 0C8.00575 0 7.05207 0.394448 6.348 1.09688L0.659258 6.78979C0.449578 6.99825 0.283336 7.24628 0.170171 7.51951C0.0570054 7.79274 -0.000832799 8.08573 9.0596e-06 8.38149V15.7487C9.0596e-06 16.3457 0.237062 16.9184 0.659018 17.3406C1.08097 17.7628 1.65327 18 2.25001 18H15.75C16.3467 18 16.919 17.7628 17.341 17.3406C17.7629 16.9184 18 16.3457 18 15.7487V8.38149C18.0008 8.08573 17.943 7.79274 17.8298 7.51951C17.7167 7.24628 17.5504 6.99825 17.3407 6.78979V6.78979ZM11.25 16.4991H6.75V13.5468C6.75 12.9497 6.98705 12.3771 7.40901 11.9549C7.83097 11.5327 8.40326 11.2955 9 11.2955C9.59674 11.2955 10.169 11.5327 10.591 11.9549C11.0129 12.3771 11.25 12.9497 11.25 13.5468V16.4991ZM16.5 15.7487C16.5 15.9477 16.421 16.1386 16.2803 16.2793C16.1397 16.42 15.9489 16.4991 15.75 16.4991H12.75V13.5468C12.75 12.5517 12.3549 11.5973 11.6516 10.8936C10.9484 10.1899 9.99456 9.79459 9 9.79459C8.00544 9.79459 7.05161 10.1899 6.34835 10.8936C5.64509 11.5973 5.25 12.5517 5.25 13.5468V16.4991H2.25001C2.05109 16.4991 1.86033 16.42 1.71968 16.2793C1.57903 16.1386 1.50001 15.9477 1.50001 15.7487V8.38149C1.5007 8.1826 1.57965 7.992 1.71976 7.85092L7.4085 2.16026C7.83128 1.73921 8.4035 1.50283 9 1.50283C9.5965 1.50283 10.1687 1.73921 10.5915 2.16026L16.2802 7.85317C16.4198 7.99369 16.4987 8.18339 16.5 8.38149V15.7487Z" fill="#50507F" />
                        </svg>
                        Home
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php _e(get_the_title()); ?>
                </li>
            </ol>
        </nav>
    </div>
</div>
<div class="container mt-ng-250">
    <div class="login__wrapperBox">
        <div class="row">
            <div class="col-md-6">
                <div class="login_thumbcontent">
                    <h1 class="login_thumbcontent--text">
                        Login to your account
                    </h1>
                    <p class="signup--text">
                        Don’t have an account? <a href="<?php bloginfo('url'); ?>/register">Sign up</a>
                    </p>
                    <form method="POST" id="member_login" name="member_login">
                        <div class="form__auth__control">
                            <input type="email" id="user_login" name="log" value="<?php if (isset($_COOKIE['custom_user_login'])) echo $_COOKIE['custom_user_login']; ?>" autocomplete="off" class="form__auth--text js_form-input">
                            <label for="user_login" class="form__auth--label email-label">Email
                                <sub>*</sub>
                            </label>
                        </div>
                        <div class="form__auth__control">
                            <input type="Password" id="user_pass" name="pwd" value="<?php if (isset($_COOKIE['custom_user_password'])) echo $_COOKIE['custom_user_password']; ?>" autocomplete="off" class="form__auth--text js_form-input">
                            <label for="user_pass" class="form__auth--label password-label">Password
                                <sub>*</sub>
                            </label>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="remember_me" id="remember_me" value="1">
                                    <label class="form-check-label" for="remember_me">Remember me</label>
                                </div>
                            </div>
                            <div class="col-sm-6 mt-2 mt-sm-0 text-end">
                                <a href="<?php bloginfo('url'); ?>/forgot-password" class="forgot--link">
                                    Forgot password?
                                </a>
                            </div>
                            <div class="col-12 mt-4">
                                <input type="hidden" name="redirect_to" id="redirect_to" value="<?php echo isset($_REQUEST['redirect_to']) ? $_REQUEST['redirect_to'] : get_bloginfo('url') . '/my-account'; ?>" />
                                <button class="btn--submit" type="submit">
                                    Login
                                </button>
                            </div>
                            <div class="form__auth__control">
                                <div class="status" style="display:none;"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 mt-3 mt-md-0">
                <?php if (have_rows('page_banner_slider')) : ?>
                    <div class="login_slider_outer">
                        <div class="multiple-items">
                            <?php while (have_rows('page_banner_slider')) : the_row();
                                // vars
                                $subheading = get_sub_field('banner_sub_heading');
                                $heading = get_sub_field('banner_heading');
                                $description = get_sub_field('banner_description');
                                $banner_button_link = get_sub_field('banner_button_link');
                                $banner_image = get_sub_field('banner_image');
                                // echo "<pre>";
                                //print_r($banner_image);
                                // echo "</pre>";
                            ?>
                                <div>
                                    <div class="login_slider_content">
                                        <div class="login_slider_contentlayer"></div>
                                        <?php if ($banner_image) { ?>
                                            <div class="login_slider_contentimg">
                                                <img src="<?php _e($banner_image['url']); ?>" alt="<?php _e($banner_image['alt']); ?>">
                                            </div>
                                        <?php } ?>
                                        <div class="login_slider_contenttext">
                                            <?php if ($heading) { ?>
                                                <h4>
                                                    <?php _e($heading); ?>
                                                </h4>
                                            <?php } ?>
                                            <?php if ($description) { ?>
                                                <p>
                                                    <?php _e($description); ?>
                                                </p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>