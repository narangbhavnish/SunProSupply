<?php
function program_sunprohomeservices()
{
    ob_start();
    $page = get_the_ID();
?>


    <section class="loginbg__wrapper min-h-auto py-4 py-lg-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <?php $sunpro_services_heading_text = get_field('common_sunpro_services_heading_text');
                    if ($sunpro_services_heading_text) : ?>
                        <h2 class="slider__content--title before--bar text--white position-relative pb-2">
                            <?php echo $sunpro_services_heading_text; ?>
                        </h2>
                    <?php endif; ?>
                    <?php if (have_rows('common_sunpro_services_repeater')) : ?>
                        <div class="sunpro--list list--white">
                            <ul>
                                <?php while (have_rows('common_sunpro_services_repeater')) : the_row();
                                    $common_sunpro_services_text = get_sub_field('common_sunpro_services_text');
                                ?>
                                    <li><?php echo $common_sunpro_services_text; ?></li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php $sunpro_services_button = get_field('common_sunpro_services_button');
                    if ($sunpro_services_button) : ?>
                        <a href="<?php echo $sunpro_services_button['url']; ?>" target="<?php echo $sunpro_services_button['target']; ?>" class="service--btn mt-4">
                            <?php echo $sunpro_services_button['title']; ?>
                            <span class="circle--shape">
                                <svg width="10" height="16" viewBox="0 0 10 16" fill="none">
                                    <path d="M1 1L8 8L1 15" stroke="#09094D" stroke-width="2" stroke-linecap="round" />
                                </svg>
                            </span>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="col-md-6 mt-3 mt-md-0">
                    <div class="services-box">
                        <?php $sunpro_services_image = get_field('common_sunpro_services_image');
                        if ($sunpro_services_image) : ?>
                            <img src="<?php echo $sunpro_services_image['url']; ?>" alt="<?php echo $sunpro_services_image['alt']; ?>" class="img-fluid" />
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
    return ob_get_clean();
}
add_shortcode('show_sunprohomeservices', 'program_sunprohomeservices');
?>