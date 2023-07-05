<?php
function program_sunproproducthome()
{
    ob_start();
    $page = get_the_ID();
?>

    <section class="map__section product__features">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <?php $sunpro_products_heading_text = get_field('sunpro_products_heading_text');
                    if ($sunpro_products_heading_text) : ?>
                        <h3 class="login_thumbcontent--text">
                            <?php echo $sunpro_products_heading_text; ?>
                        </h3>
                    <?php endif; ?>
                </div>
                <div class="col-md-5 mt-3 mt-md-0">
                    <?php /*<select class="selectpicker cs--select">
                        <option data-content="<span class='badge badge-success'><img src='image/dropdown01.svg'><b>cleaners and chemicals</b></span>">
                            cleaners and chemicals
                        </option>
                        <option data-content="<span class='badge badge-success'><img src='image/dropdown01.svg'><b>cleaners and chemicals 2</b></span>">
                            cleaners and chemicals 2
                        </option>
                    </select>*/ ?>
                </div>
                <?php $sunpro_products_subheading_text = get_field('sunpro_products_subheading_text');
                if ($sunpro_products_subheading_text) : ?>
                    <div class="col-12 mt-3">
                        <p class="subheading--text mt-3">
                            <?php _e($sunpro_products_subheading_text); ?>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
            <div class="row mt-4 pt-2">

                <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 3,
                    'orderby'        => 'rand',
                    'tax_query'            => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field'    => 'slug', // Or 'name' or 'term_id'
                            'terms'    => array('equipment'),
                            'operator' => 'NOT IN', // Excluded
                        )
                    )
                );
                $loop = new WP_Query($args);
                if ($loop->have_posts()) {
                    while ($loop->have_posts()) : $loop->the_post();
                        $product_id = get_the_ID();
                        $product = wc_get_product($product_id);
                        //echo "<pre>"; print_r($product); echo "</pre>"; 
                        $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'single-post-thumbnail');
                        $rating_count = $product->get_rating_count();
                        $review_count = $product->get_review_count();
                        $average      = $product->get_average_rating();

                        $product_terms = get_the_terms($product->get_id(), 'product_cat');
                        //echo "<pre>"; print_r($terms); echo "</pre>";

                ?>

                        <div class="col-sm-6 col-md-4">

                            <div class="listbox__wrapper product__descbox position-relative">
                                <a class="link-detail showDescriptionModal" data-id="<?php _e($product_id); ?>" href="javascript:void(0)"></a>
                                <div class="listbox__wrapper__img">
                                    <div class="bg--pic">
                                        <?php if ($featured_image) { ?>
                                            <img src="<?php echo $featured_image[0]; ?>" data-id="<?php echo $product_id; ?>" alt="<?php _e(get_the_title()); ?>">
                                        <?php } else { ?>
                                            <img src="<?php echo esc_url(wc_placeholder_img_src('woocommerce_single')); ?>" data-id="<?php echo $product_id; ?>" alt="<?php _e(get_the_title()); ?>">
                                        <?php } ?>
                                    </div>
                                    <?php if ($product_terms) { ?>
                                        <div class="cleaner--box">
                                            <?php //echo wc_get_product_category_list($product->get_id(), ', ', '<span class="cleaner--boxtag">', '</span>'); 
                                            ?>
                                            <span class="cleaner--boxtag"><?php echo $product_terms[0]->name; ?></span>
                                        </div>
                                    <?php } ?>
                                    <h4 class="listbox__wrapper--title text-start">
                                        <?php _e(get_the_title()); ?>
                                    </h4>
                                    <?php /*if ($rating_count && wc_review_ratings_enabled()) { ?>

                                        <p class="listbox__wrapper--title text-start">
                                            <?php echo wc_get_rating_html($average, $rating_count); // WPCS: XSS ok. 
                                            ?>
                                        </p>
                                    <?php }*/ ?>
                                    <?php if ($product->description) { ?>
                                        <p class="subheading--text text-start mt-3">
                                            <?php _e(wp_trim_words($product->description, 8, '...')); ?>
                                        </p>
                                    <?php } ?>
                                    <p class="calc--text text-start fs-5 fw-normal mt-3">
                                        <?php echo $product->get_price_html(); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                <?php endwhile;
                } else {
                    echo __('No products found');
                }
                wp_reset_postdata();
                ?>

                <?php $sunpro_products_button = get_field('sunpro_products_button');
                if ($sunpro_products_button) :
                    //echo "<pre>"; print_r($sunpro_products_button); echo "</pre>"; 
                ?>
                    <div class="col-12 pt-4 text-center">
                        <a href="<?php _e($sunpro_products_button['url']) ?>" class="btn--submit">
                            <?php _e($sunpro_products_button['title']) ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php /*<div class="sunpro_products">
        <div class="flex">
            <?php $sunpro_products_heading_text = get_field('sunpro_products_heading_text');
            if ($sunpro_products_heading_text) : ?>
                <h2><?php echo $sunpro_products_heading_text; ?></h2>
            <?php endif; ?>
            <div class="select">
                <div class="selectBtn" data-type="" shortby="">Cleaners and Chemicals</div>
                <div class="selectDropdown">
                    <?php
                    $categories = get_terms(['taxonomy' => 'product_cat']);
                    // echo '<pre>';
                    //print_r($categories);
                    //echo '</pre>';
                    foreach ($categories as $key => $category) {
                    ?>
                        <div class="option" value="<?php echo $category->name; ?>" data-type="<?php echo $category->name; ?>" shortby="">
                            <?php
                            $category_thumbnail = get_woocommerce_term_meta($category->term_id, 'thumbnail_id', true);
                            $image = wp_get_attachment_url($category_thumbnail);
                            echo '<img src="' . $image . '" alt="' . $category_name . '">';
                            ?><?php echo $category->name; ?></div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php $sunpro_products_subheading_text = get_field('sunpro_products_subheading_text');
        if ($sunpro_products_subheading_text) : ?>
            <p><?php echo $sunpro_products_subheading_text; ?></p>
        <?php endif; ?>
        <div class="product_grid_list_three">
            <?php
            $all_products = get_posts(array(
                'post_type' => 'product',
                'numberposts' => 3,
                'post_status' => 'publish',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'slug',
                        'terms' => 'cleaners-and-chemicals', 
                        'operator' => 'IN',
                    )
                ),
            ));
            $product_tags = get_terms('product_tag', 'tax_query');
            //print_r($product_tags);
            ?>
            <div class="product">
                <?php
                foreach ($all_products as $key => $single_product) {
                ?>
                    <div class="wrapper">
                        <div class="product_image">
                            <?php
                            $product_id = $single_product->ID;
                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'single-post-thumbnail'); ?>
                            <img src="<?php echo $image[0]; ?>" data-id="<?php echo $single_product->ID; ?>" class="img-fluid" alt="<?php echo $single_product->post_name; ?>">
                            <span class="product_tag">Cleaner</span>
                        </div>
                        <div class="content">
                            <h3><?php echo $single_product->post_title; ?></h3>
                            <div class="stars">
                                <div class="star_image">
                                    <?php
                                    $product = wc_get_product($product_id);
                                    $rating  = $product->get_average_rating();
                                    $count   = $product->get_rating_count();
                                    print_r($rating);
                                    echo wc_get_rating_html($rating, $count);
                                    ?>
                                </div>
                                <p class="rating">5.0</p>
                            </div>
                            <p class="product_content"><?php echo $single_product->post_content; ?></p>
                            <div class="price">
                                <?php $_product = wc_get_product($single_product->ID); ?>
                                <p class="slashed_price">$<?php
                                                            // $_product->get_regular_price();
                                                            print_r($_product->get_sale_price());
                                                            // $_product->get_price();
                                                            ?></p>
                                <p class="total_price">$<?php print_r($_product->get_regular_price()); ?></p>
                            </div>
                        </div>
                    </div>
                <?php
                    
                }
                ?>
            </div>
        </div>
        <a class="blue_button" href=""><span>View All Products</span><span class="icon">></span></a>
    </div>
    */ ?>
<?php
    return ob_get_clean();
}
add_shortcode('show_sunproproducthome', 'program_sunproproducthome');
?>