<?php
/**
 * The template for displaying all pages
 */

get_header(); 


$addNewClass = '';
if(is_page(array('checkout'))){
    $addNewClass = "checkout-page-div";
}

?>

<?php //get_sidebar(); ?>
<div class="woo-content">
    <div class="woocommerce_check <?php _e($addNewClass); ?>">
        <div class="container">
            <?php
            while ( have_posts() ) :
                the_post();
                ?>

                <?php //the_title(); ?>

                <?php the_content(); ?>

            <?php
                // If comments are open or we have at least one comment, load up the comment template.
                // if ( comments_open() || get_comments_number() ) :
                // 	comments_template();
                // endif;

            endwhile; // End of the loop.
            ?>
        </div>
    </div>
</div>

<?php
get_footer();
