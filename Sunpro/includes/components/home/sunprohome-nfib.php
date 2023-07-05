<?php
function program_sunprohomenfib()
{
    ob_start();
    $page = get_the_ID();
?>

    <section class="loginbg__wrapper min-h-auto py-4 py-md-5">
        <div class="container">
            <?php $member_of_the_nfib_heading_text = get_field('member_of_the_nfib_heading_text');
            if ($member_of_the_nfib_heading_text) : ?>
                <h2 class="slider__content--title text-center pt-md-4"><?php echo $member_of_the_nfib_heading_text; ?></h2>
            <?php endif; ?>
            <?php $member_of_the_nfib_subheading_text = get_field('member_of_the_nfib_subheading_text');
            if ($member_of_the_nfib_subheading_text) : ?>
                <p class="addressBox--text text-center mt-2 text-white maxw--500 mx-auto"><?php echo $member_of_the_nfib_subheading_text; ?></p>
            <?php endif; ?>

            <div class="row mb-4">
                <?php if (have_rows('member_of_the_nfib_repeater')) : ?>
                    <?php while (have_rows('member_of_the_nfib_repeater')) : the_row();
                        $image = get_sub_field('image');
                    ?>
                        <div class="col-sm-6 col-md-3 mt-4">
                            <div class="sunpro_memberbox">
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php
    return ob_get_clean();
}
add_shortcode('show_sunprohomenfib', 'program_sunprohomenfib');
?>