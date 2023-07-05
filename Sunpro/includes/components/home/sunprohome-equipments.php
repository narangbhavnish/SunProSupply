<?php
function program_sunprohomeequipments()
{
    ob_start();
    $page = get_the_ID();
?>
    <section class="map__section product__features">
        <div class="container">
            <?php $equipment_sales_heading_text = get_field('equipment_sales_heading_text');
            if ($equipment_sales_heading_text) : ?>
                <h2 class="slider__content--title before--none text--color text-center">
                    <?php echo $equipment_sales_heading_text; ?>
                </h2>
            <?php endif; ?>
            <?php $equipment_sales_subheading_text = get_field('equipment_sales_subheading_text');
            if ($equipment_sales_subheading_text) : ?>
                <p class="subheading--text text-center mt-2">
                    <?php echo $equipment_sales_subheading_text; ?>
                </p>
            <?php endif; ?>
            <div class="row mt-4 pt-2">
                <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 3,
                    'tax_query'            => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field'    => 'slug', // Or 'name' or 'term_id'
                            'terms'    => array('equipment'),
                            'operator' => 'IN', // Excluded
                        )
                    )
                );
                $loop = new WP_Query($args);
                if ($loop->have_posts()) {
                    while ($loop->have_posts()) : $loop->the_post();
                        $product_id = get_the_ID();
                        $product = wc_get_product($product_id);
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'single-post-thumbnail');
                        $rating_count = $product->get_rating_count();
                        $review_count = $product->get_review_count();
                        $average      = $product->get_average_rating();
                ?>
                        <div class="col-sm-6 col-md-4">
                            <div class="listbox__wrapper product__descbox position-relative">
                            <a class="link-detail" href="<?php echo get_permalink(get_the_ID()); ?>"></a>
                                <div class="listbox__wrapper__img">
                                    <div class="bg--pic"><img src="<?php echo $image[0]; ?>" data-id="<?php echo $product_id; ?>" alt="<?php _e(get_the_title()); ?>"></div>
                                    <h4 class="listbox__wrapper--title text-start">
                                        <?php _e(get_the_title()); ?>
                                    </h4>
                                    <p class="listbox__wrapper--title text-start">
                                        <?php echo wc_get_rating_html($average, $rating_count); // WPCS: XSS ok. 
                                        ?>
                                    </p>
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
                <?php $equipment_sales_button = get_field('equipment_sales_button');
                if ($equipment_sales_button) :
                    //echo "<pre>"; print_r($sunpro_products_button); echo "</pre>"; 
                ?>
                <div class="col-12 pt-4 text-center">
                    <a href="<?php _e($equipment_sales_button['url']) ?>" data-bs-toggle="modal" data-bs-target="#exampleModal" role="button" class="btn--submit">
                    <?php _e($equipment_sales_button['title']) ?>
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php /*
    <div class="container">
        <div class="equipment_sales">
            <h2 class="text-center">Equipment Sales</h2>
            <p class="subheading text-center">SunPro is an authorized retail & repair center for most major, commercial brands.</p>
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
                            'terms' => 'equipment', 
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
            <?php $equipment_sales_button = get_field('equipment_sales_button');
            if ($equipment_sales_button) : ?>
                <a class="blue_button" href="<?php echo $equipment_sales_button['url']; ?>" target="<?php echo $equipment_sales_button['target']; ?>"><span><?php echo $equipment_sales_button['title']; ?></span><span class="icon">></span></a>
            <?php endif; ?>
        </div>
    </div>
    */ ?>
<?php
    return ob_get_clean();
}
add_shortcode('show_sunprohomeequipments', 'program_sunprohomeequipments');
?>