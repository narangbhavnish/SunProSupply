<?php
function program_categories_bar()
{
  ob_start();
  $page = get_the_ID();
?>
    <?php

    $taxonomy     = 'product_cat';
    $orderby      = 'name';
    $show_count   = 0;      // 1 for yes, 0 for no
    $pad_counts   = 0;      // 1 for yes, 0 for no
    $hierarchical = 1;      // 1 for yes, 0 for no  
    $title        = '';
    $empty        = 0;
    $exclude      = array(EQUIPMENT_CATEGORY_ID); // exclude equipment category id

    $args = array(
      'taxonomy'     => $taxonomy,
      'orderby'      => $orderby,
      'show_count'   => $show_count,
      'pad_counts'   => $pad_counts,
      'hierarchical' => $hierarchical,
      'title_li'     => $title,
      'exclude'     => $exclude,
      'hide_empty'   => $empty
    );

    $all_categories = get_categories($args);
    // echo "<pre>";
    //  print_r($all_categories);
    //  echo "</pre>";

    $shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
     ?>

    <div class="form-check">
      <input class="form-check-input" data-url="<?php _e($shop_page_url); ?>" name="sort_by_category" <?php if (is_shop()) { echo 'checked="checked"'; } ?> type="radio" value="" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        All
      </label>
    </div>


    <?php
    foreach ($all_categories as $cat) {
      if ($cat->category_parent == 0) {
        $category_id = $cat->term_id;
        echo '<div class="form-check">';
    ?>

        <input class="form-check-input" name="sort_by_category" data-url="<?php echo get_term_link($cat->slug, 'product_cat') ?>" type="radio" <?php if (is_product_category($cat->slug)) { echo 'checked="checked"'; } ?> value="<?php echo $cat->term_id; ?>" id="termid_<?php echo $cat->term_id; ?>">
        <label class=" form-check-label" for="flexCheckDefault">
        <?php echo $cat->name; ?>
        </label>
        

    <?php echo '</div>';
      }
    }
    ?>
<?php
  return ob_get_clean();
}
add_shortcode('show_categories_bar', 'program_categories_bar');



function category_has_children($term_id = 0, $taxonomy = 'category')
{
  $children = get_categories(array(
    'child_of'      => $term_id,
    'taxonomy'      => $taxonomy,
    'hide_empty'    => false,
    'fields'        => 'ids',
  ));
  return ($children);
}
?>