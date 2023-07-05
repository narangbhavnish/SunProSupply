<!DOCTYPE html>
<html lang="en">

<head>
    <title>
    <?php wp_title(''); ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link href="<?php bloginfo('stylesheet_directory'); ?>/custom/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/custom/css/slick.css" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/custom/css/nouislider.min.css" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/custom/css/select.min.css">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/custom/css/style.css">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/custom/css/developer.css">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/custom/css/developer2.css">

    <?php 
    /* Schema Code */
    global $post; 
    
    if(is_home() || is_front_page()){ ?>
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "<?php echo get_bloginfo( 'name' ); ?>",
            "url": "<?php echo get_bloginfo( 'url' ); ?>",
            "logo": "",
            "sameAs": [
                "https://www.linkedin.com/company/sun-professional-supply/about/"
            ]
        }
        </script>   
        
        <script type="application/ld+json">
            {
                "@context": "https://schema.org/",
                "@type": "BreadcrumbList",
                "itemListElement": [{
                    "@type": "ListItem",
                    "position": 1,
                    "name": "Home",
                    "item": "<?php echo home_url(); ?>"
                }]
            }
        </script>
    <?php } ?>


    <?php 
    /* For Shop Page */
    if(is_shop()){
        $shopId = get_option( 'woocommerce_shop_page_id' );
        ?>
        <script type="application/ld+json">
            {
                "@context": "https://schema.org/",
                "@type": "WebSite",
                "name": "<?php echo get_bloginfo( 'name' ); ?>",
                "url": "<?php echo get_permalink( $shopId ); ?>",
                "potentialAction": {
                    "@type": "SearchAction",
                    "target": "<?php echo get_bloginfo( 'url' ); ?>/?s={search_term_string}",
                    "query-input": "required name=search_term_string"
                }
            }
        </script>
        <script type="application/ld+json">
            {
                "@context": "https://schema.org/",
                "@type": "BreadcrumbList",
                "itemListElement": [{
                    "@type": "ListItem",
                    "position": 1,
                    "name": "Home",
                    "item": "<?php echo home_url(); ?>"
                }, {
                    "@type": "ListItem",
                    "position": 2,
                    "name": "<?php echo get_the_title($shopId); ?>",
                    "item": "<?php echo get_permalink($shopId); ?>"
                }]
            }
        </script>
    <?php }
    /* For Shop Page */
    ?>


    <?php if(!is_shop()){ ?>
        <script type="application/ld+json">
            {
                "@context": "https://schema.org/",
                "@type": "WebSite",
                "name": "<?php echo get_bloginfo( 'name' ); ?>",
                "url": "<?php echo get_permalink( get_the_ID() ); ?>",
                "potentialAction": {
                    "@type": "SearchAction",
                    "target": "<?php echo get_bloginfo( 'url' ); ?>/?s={search_term_string}",
                    "query-input": "required name=search_term_string"
                }
            }
        </script>
    <?php } ?>
    
    <?php if ( is_single() && 'service' == get_post_type() ) {  ?>
        <script type="application/ld+json">
            {
                "@context": "https://schema.org/",
                "@type": "BreadcrumbList",
                "itemListElement": [{
                    "@type": "ListItem",
                    "position": 1,
                    "name": "Home",
                    "item": "<?php echo get_bloginfo('url'); ?>"
                }, {
                    "@type": "ListItem",
                    "position": 2,
                    "name": "Services",
                    "item": "<?php echo get_bloginfo('url'); ?>/services"
                }, {
                    "@type": "ListItem",
                    "position": 3,
                    "name": "<?php echo get_the_title(get_the_ID()); ?>",
                    "item": "<?php echo get_permalink(get_the_ID()); ?>"
                }]
            }
        </script>
    <?php } ?>
    
    <?php 
    /* For Inner Pages */
    $post_id = get_the_ID();
    if (is_page($post_id) && !is_404() && !is_single() && !is_front_page() && !$post->post_parent) {
    ?>
        <script type="application/ld+json">
            {
                "@context": "https://schema.org/",
                "@type": "BreadcrumbList",
                "itemListElement": [{
                    "@type": "ListItem",
                    "position": 1,
                    "name": "Home",
                    "item": "<?php echo home_url(); ?>"
                }, {
                    "@type": "ListItem",
                    "position": 2,
                    "name": "<?php echo the_title(); ?>",
                    "item": "<?php $current_url = get_permalink(get_the_ID());
                                if (is_category()) $current_url = get_category_link(get_query_var('cat'));
                                echo $current_url; ?>"
                }]
            }
        </script>
    <?php } ?>


    <?php 
    /* For Inner Pages */
    $post_id = get_the_ID();
    if (is_page($post_id) && $post->post_parent) {
    ?>
        <script type="application/ld+json">
            {
                "@context": "https://schema.org/",
                "@type": "BreadcrumbList",
                "itemListElement": [{
                    "@type": "ListItem",
                    "position": 1,
                    "name": "Home",
                    "item": "<?php echo home_url(); ?>"
                }, {
                    "@type": "ListItem",
                    "position": 2,
                    "name": "Equipment",
                    "item": "<?php echo get_bloginfo('url'); ?>/equipments"
                }, {
                    "@type": "ListItem",
                    "position": 3,
                    "name": "<?php echo the_title(); ?>",
                    "item": "<?php $current_url = get_permalink(get_the_ID()); echo $current_url; ?>"
                }]
            }
        </script>
    <?php } ?>

    <?php if (is_product()) {
        $product_id = get_the_ID();
        $product = wc_get_product($product_id);
        //echo "<pre>"; print_r($product); echo "</pre>";
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'single-post-thumbnail');
        ?>
        <?php if ($image) { 
            $image_path = $image[0];
         } else { 
            $image_path = esc_url(wc_placeholder_img_src('woocommerce_single'));
          } 
        ?>
        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "Product",
                "url": "<?php echo get_permalink($product->get_id()); ?>",
                "name": "<?php _e(get_the_title($product->get_id())); ?> - <?php echo get_bloginfo( 'name' ); ?>",
                "productID": "<?php echo $product->get_id(); ?>",
                "sku": "<?php echo $product->get_sku(); ?>",
                "offers": {
                    "@type": "Offer",
                    "availability": "https://schema.org/InStock",
                    "url": "<?php echo get_permalink($product->get_id()); ?>",
                    "price": "<?php echo strip_tags(html_entity_decode($product->get_price_html())); ?>",
                    "priceCurrency": "<?php echo get_woocommerce_currency(); ?>"
                },
                "image": "<?php echo $image_path; ?>",
                
                "itemCondition": "https://schema.org/NewCondition",
                "brand": {
                    "@type": "Brand",
                    "name": "<?php echo get_bloginfo( 'name' ); ?>"
                },
                "description": "<?php echo strip_tags($product->get_description()); ?>"
            }
        </script>
    <?php }
    /* Schema Code */
    ?>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <nav class="navbar navbar-expand-lg cs--nav">
        <div class="container">
            <?php echo get_custom_logo(); ?>
            <?php if (!is_user_logged_in()) { ?>
                <a href="<?php _e(home_url('/login')); ?>" class="service--btn ms-auto order-lg-2">
                    <span class="circle--shape">
                        <svg width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.25 22.0002H15.4167V17.3774C15.4159 16.6587 15.1301 15.9697 14.622 15.4615C14.1138 14.9534 13.4248 14.6676 12.7061 14.6668H5.29392C4.57525 14.6676 3.88622 14.9534 3.37805 15.4615C2.86987 15.9697 2.58406 16.6587 2.58333 17.3774V22.0002H0.75V17.3774C0.751456 16.1727 1.23066 15.0178 2.08249 14.166C2.93432 13.3142 4.08924 12.835 5.29392 12.8335H12.7061C13.9108 12.835 15.0657 13.3142 15.9175 14.166C16.7693 15.0178 17.2485 16.1727 17.25 17.3774V22.0002Z" fill="#3C65F3" />
                            <path d="M9 11C7.91221 11 6.84884 10.6774 5.94437 10.0731C5.0399 9.46874 4.33495 8.60976 3.91867 7.60476C3.50238 6.59977 3.39346 5.4939 3.60568 4.42701C3.8179 3.36011 4.34173 2.3801 5.11092 1.61092C5.8801 0.841726 6.86011 0.317902 7.92701 0.105683C8.9939 -0.106535 10.0998 0.00238307 11.1048 0.418665C12.1098 0.834947 12.9687 1.5399 13.5731 2.44437C14.1774 3.34884 14.5 4.41221 14.5 5.5C14.4985 6.95825 13.9186 8.35635 12.8875 9.38748C11.8563 10.4186 10.4582 10.9985 9 11ZM9 1.83334C8.2748 1.83334 7.56589 2.04838 6.96291 2.45128C6.35993 2.85418 5.88997 3.42683 5.61244 4.09683C5.33492 4.76683 5.26231 5.50407 5.40379 6.21533C5.54527 6.9266 5.89448 7.57994 6.40728 8.09273C6.92007 8.60552 7.57341 8.95474 8.28467 9.09622C8.99594 9.23769 9.73318 9.16508 10.4032 8.88756C11.0732 8.61004 11.6458 8.14007 12.0487 7.53709C12.4516 6.93411 12.6667 6.2252 12.6667 5.5C12.6667 4.52754 12.2804 3.59491 11.5927 2.90728C10.9051 2.21964 9.97246 1.83334 9 1.83334Z" fill="#3C65F3" />
                        </svg>
                    </span>
                    Login
                </a>
            <?php } else {
                global $current_user;
                wp_get_current_user();
            ?>
                <a href="<?php _e(home_url('/my-account')); ?>" class="service--btn ms-auto order-lg-2">
                    <span class="circle--shape">
                        <svg width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.25 22.0002H15.4167V17.3774C15.4159 16.6587 15.1301 15.9697 14.622 15.4615C14.1138 14.9534 13.4248 14.6676 12.7061 14.6668H5.29392C4.57525 14.6676 3.88622 14.9534 3.37805 15.4615C2.86987 15.9697 2.58406 16.6587 2.58333 17.3774V22.0002H0.75V17.3774C0.751456 16.1727 1.23066 15.0178 2.08249 14.166C2.93432 13.3142 4.08924 12.835 5.29392 12.8335H12.7061C13.9108 12.835 15.0657 13.3142 15.9175 14.166C16.7693 15.0178 17.2485 16.1727 17.25 17.3774V22.0002Z" fill="#3C65F3" />
                            <path d="M9 11C7.91221 11 6.84884 10.6774 5.94437 10.0731C5.0399 9.46874 4.33495 8.60976 3.91867 7.60476C3.50238 6.59977 3.39346 5.4939 3.60568 4.42701C3.8179 3.36011 4.34173 2.3801 5.11092 1.61092C5.8801 0.841726 6.86011 0.317902 7.92701 0.105683C8.9939 -0.106535 10.0998 0.00238307 11.1048 0.418665C12.1098 0.834947 12.9687 1.5399 13.5731 2.44437C14.1774 3.34884 14.5 4.41221 14.5 5.5C14.4985 6.95825 13.9186 8.35635 12.8875 9.38748C11.8563 10.4186 10.4582 10.9985 9 11ZM9 1.83334C8.2748 1.83334 7.56589 2.04838 6.96291 2.45128C6.35993 2.85418 5.88997 3.42683 5.61244 4.09683C5.33492 4.76683 5.26231 5.50407 5.40379 6.21533C5.54527 6.9266 5.89448 7.57994 6.40728 8.09273C6.92007 8.60552 7.57341 8.95474 8.28467 9.09622C8.99594 9.23769 9.73318 9.16508 10.4032 8.88756C11.0732 8.61004 11.6458 8.14007 12.0487 7.53709C12.4516 6.93411 12.6667 6.2252 12.6667 5.5C12.6667 4.52754 12.2804 3.59491 11.5927 2.90728C10.9051 2.21964 9.97246 1.83334 9 1.83334Z" fill="#3C65F3" />
                        </svg>
                    </span>
                    <?php _e($current_user->display_name); ?>
                </a>
            <?php } ?>
            <!-- <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal" role="button" class="cart--btn ms-auto order-lg-1">

            </a> -->
            <div class="xoo-wsc-cart-trigger cart--btn order-lg-1">
                <img src="<?php bloginfo('stylesheet_directory');
                            ?>/custom/image/cart-shopping-solid.svg" class="img-fluid" />
            </div>

            <button class="navbar-toggler ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'header-menu',
                            'container' => 'ul',
                            'menu_class' => 'navbar-nav ms-auto',
                            'add_a_class' => 'nav-link',

                        )
                    );
                    ?>

                </ul>

                <ul class="navbar-nav mx-auto me-lg-2">
                    <?php if (!is_user_logged_in()) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php _e(home_url('/register')); ?>">Sign Up</a>
                        </li>
                    <?php } ?>
                </ul>

            </div>
        </div>
    </nav>

    <?php if (is_home() || is_front_page()) : ?>

        <?php if (have_rows('page_banner_slider')) : ?>

            <section class="banner__topbar__section mt--80">
                <div class="banner__slider__section">
                    <div class="slider__larger position-relative pe-md-0">
                        <div class="maxw--100">
                            <div class="multiple-items">
                                <?php while (have_rows('page_banner_slider')) : the_row();
                                    // vars
                                    $subheading = get_sub_field('banner_sub_heading');
                                    $heading = get_sub_field('banner_heading');
                                    $description = get_sub_field('banner_description');
                                    $banner_button_link = get_sub_field('banner_button_link');
                                    $image = get_sub_field('banner_image');
                                    // echo "<pre>";
                                    // print_r($image);
                                    // echo "</pre>";
                                ?>
                                    <div>
                                        <div class="slider__content">
                                            <div class="row align-items-center">
                                                <div class="col-md-7 pb-md-4">
                                                    <?php if ($subheading) { ?>
                                                        <p class="slider__content--text">
                                                            <?php _e($subheading); ?>
                                                        </p>
                                                    <?php } ?>
                                                    <?php if ($heading) { ?>
                                                        <h1 class="slider__content--title mt-2">
                                                            <?php _e($heading); ?>
                                                        </h1>
                                                    <?php } ?>
                                                    <?php if ($description) { ?>
                                                        <p class="slider__content--text mt-2">
                                                            <?php _e($description); ?>
                                                        </p>
                                                    <?php } ?>
                                                    <?php if ($banner_button_link) { ?>
                                                        <a href="<?php _e($banner_button_link['url']); ?>" class="service--btn mt-4 mt-xl-5">
                                                            <?php _e($banner_button_link['title']); ?>
                                                            <span class="circle--shape">
                                                                <svg width="10" height="16" viewBox="0 0 10 16" fill="none">
                                                                    <path d="M1 1L8 8L1 15" stroke="#09094D" stroke-width="2" stroke-linecap="round" />
                                                                </svg>
                                                            </span>
                                                        </a>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-md-5 align-self-end">
                                                    <img src="<?php _e($image['url']) ?>" class="shape__man" alt="<?php _e($image['alt']) ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                    <!-- <img src="<?php //bloginfo('stylesheet_directory'); 
                                    ?>/custom/image/shape.png" class="shape__logo" alt="shape"> -->
                </div>
            </section>

        <?php endif; ?>
    <?php endif; ?>



    <?php
    /*
    <?php
    if (is_404()) {
    ?>
        <div class="container">
            <div class="page_not_found">
                <h1>404</h1>
                <p>Page not found</p>
                <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/images/404/notfoundimage.png" />
                <p class="custom_text">sorry, we couldn’t found the page you are looking for</p>
                <a class="orange_button" href="<?php echo home_url(); ?>">GO TO HOME</a>
            </div>
        </div>
    <?php
    }
    ?>
    
    <?php
    if (is_single()) {
    ?>
        <div class="inner-banner1 page-<?php the_ID() ?>" style='background:linear-gradient(to right, #1144A7, #78A5CC)'>
            <div class="container">
                <div class="content">
                    <p class="white_heading">
                        <?php echo the_field('blog_detail_banner_white_heading', 'option'); ?>
                    </p>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    */
    ?>