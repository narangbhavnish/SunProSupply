<?php get_header();

$page = get_the_ID();

$sunpro_services_heading_text = get_field('common_sunpro_services_heading_text');
$sunpro_services_short_description = get_field('common_sunpro_services_short_description');
$sunpro_services_button = get_field('common_sunpro_services_button');
$sunpro_services_image = get_field('common_sunpro_services_image');
$sunpro_services_image_text = get_field('common_sunpro_services_image_text');

$services_section_heading = get_field('services_section_heading');
$services_industries_button = get_field('services_industries_button');
$services_commercial_section_text = get_field('services_commercial_section_text');
$services_commercial_section_short_description = get_field('services_commercial_section_short_description');


$service_area_heading = get_field('service_area_heading', get_the_ID());
$service_area_short_description = get_field('service_area_short_description', get_the_ID());
$service_area_address = get_field('service_area_address', get_the_ID());
$service_area_email = get_field('service_area_email', get_the_ID());
$service_area_contact = get_field('service_area_contact', get_the_ID());
$service_area_google_address_embed_code = get_field('service_area_google_address_embed_code', get_the_ID());

$services_all_commercial_repeater = get_field('services_all_commercial_repeater');
//echo "<pre>";
//print_r($services_all_commercial_repeater);

?>
<section class="banner__topbar__section mt--80">
    <div class="custom__breadcrumb__topbar">
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
    <?php if (have_rows('page_banner_slider')) : ?>
        <div class="banner__slider__section">
            <div class="slider__larger position-relative">
                <div class="maxw--100">
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
                                <div class="slider__content">
                                    <div class="row align-items-center">
                                        <div class="col-md-8 pb-md-4">
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
                                        <?php if ($banner_image) { ?>
                                            <div class="col-md-4 align-self-end">
                                                <img src="<?php _e($banner_image['url']); ?>" class="shape__man" alt="<?php _e($banner_image['alt']); ?>">
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            <!-- <img src="image/shape.png" class="shape__logo" alt="shape"> -->
        </div>
    <?php endif; ?>
</section>

<section class="map__section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5">
                <div class="services-box">
                    <?php
                    if ($sunpro_services_image) : ?>
                        <img src="<?php echo $sunpro_services_image['url']; ?>" alt="<?php echo $sunpro_services_image['alt']; ?>" class="img-fluid">
                    <?php endif; ?>
                    <?php
                    if ($sunpro_services_image_text) : ?>
                        <div class="services-box--text">
                            <?php echo $sunpro_services_image_text; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-6 offset-md-1 mt-3 mt-md-0">
                <?php
                if ($sunpro_services_heading_text) : ?>
                    <h2 class="slider__content--title before--bar text--color position-relative pb-2">
                        <?php echo $sunpro_services_heading_text; ?>
                    </h2>
                <?php endif; ?>
                <?php
                if ($sunpro_services_short_description) : ?>
                    <p class="subheading--text mt-3">
                        <?php echo $sunpro_services_short_description; ?>
                    </p>
                <?php endif; ?>
                <?php
                if ($sunpro_services_button) : ?>
                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#requestServiceModal" class="service--btn mt-4">
                        <?php echo $sunpro_services_button['title']; ?>
                        <span class="circle--shape">
                            <svg width="10" height="16" viewBox="0 0 10 16" fill="none">
                                <path d="M1 1L8 8L1 15" stroke="#09094D" stroke-width="2" stroke-linecap="round" />
                            </svg>
                        </span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="loginbg__wrapper py-4 py-md-5">
    <div class="container">
        <?php if ($services_section_heading) : ?><h2 class="slider__content--title text-center"><?php _e($services_section_heading); ?></h2><?php endif; ?>
        <div class="slick__automobile__box mx-auto mt-4">
            <div class="multiple-items">
                <?php


                $args = array(
                    'post_type' => 'service',
                    'posts_per_page' => -1,
                    'post_status'    => array('publish'),
                    'order'                  => 'DESC',
                    'orderby'                => 'date',

                );
                $loop = new WP_Query($args);
                if ($loop->have_posts()) {
                    while ($loop->have_posts()) : $loop->the_post();

                        $featured_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
                        $service_button_text = get_field('service_button_text', get_the_ID());
                        $service_icon = get_field('service_icon', get_the_ID());

                ?>
                        <div>
                            <div class="automobile__box">
                                <div class="row minh--320">
                                    <div class="col-md-6">
                                        <div class="p-4 pt-md-5 position-relative z1">
                                            <?php if ($service_icon) : ?>
                                                <img src="<?php _e($service_icon['url']); ?>" class="img-fluid" alt="<?php _e(get_the_title()); ?>">
                                            <?php endif; ?>
                                            <h1 class="login_thumbcontent--text after--none mt-2">
                                                <?php _e(get_the_title()); ?>
                                            </h1>
                                            <?php if ($service_button_text) : ?>
                                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#requestServiceModal" role="button" class="service--btn mt-4">
                                                    <?php _e($service_button_text); ?>
                                                    <span class="circle--shape">
                                                        <svg width="10" height="16" viewBox="0 0 10 16" fill="none">
                                                            <path d="M1 1L8 8L1 15" stroke="#09094D" stroke-width="2" stroke-linecap="round" />
                                                        </svg>
                                                    </span>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 overflow-hidden">
                                        <img src="<?php _e($featured_url); ?>" class="industry-servedpic" alt="<?php _e(get_the_title()); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php } ?>
            </div>
        </div>
        <div class="col-12 pt-5 text-center">
            <?php if ($services_industries_button) { ?>
                <a href="<?php _e($services_industries_button['url']); ?>" target="<?php _e($services_industries_button['target']); ?>" class="btn--submit">
                    <?php _e($services_industries_button['title']); ?>
                </a>
            <?php } ?>
        </div>
    </div>
</section>

<section class="map__section">
    <div class="container">
        <?php if ($services_commercial_section_text) : ?>
            <h3 class="login_thumbcontent--text after--none text-center">
                <?php _e($services_commercial_section_text); ?>
            </h3>
        <?php endif; ?>
        <?php if ($services_section_heading) : ?>
            <p class="text-center service-helptext mx-auto mt-2">
                <?php _e($services_commercial_section_short_description); ?>
            </p>
        <?php endif; ?>
        <div class="row mt-4 pt-2">
            <?php if ($services_all_commercial_repeater) : ?>
                <?php foreach ($services_all_commercial_repeater as $services_all_commercial) :
                    $services_all_commercial_repeater_image = ($services_all_commercial['services_all_commercial_repeater_image']);
                    $services_all_commercial_repeater_title = ($services_all_commercial['services_all_commercial_repeater_title']);
                ?>
                    <div class="col-sm-6 col-xl-4">
                        <div class="listbox__wrapper product__descbox">
                            <div class="listbox__wrapper__img">
                                <div class="bg--pic"><img src="<?php echo $services_all_commercial_repeater_image['url']; ?>" alt="<?php echo $services_all_commercial_repeater_image['alt']; ?>"></div>
                            </div>
                            <h4 class="listbox__wrapper--title">
                                <?php _e($services_all_commercial_repeater_title); ?>
                            </h4>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <div class="col-12 pt-4 text-center">
                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#requestServiceModal" role="button" class="btn--submit">
                    Request Service
                </a>
            </div>
        </div>
    </div>
</section>

<section class="mb-4">
    <div class="container">
        <div class="loginbg__wrapper pt-5 pb-0 pe-4 bdr--20">
            <div class="row">
                <div class="col-md-6">
                    <div class="mapBox">
                        <iframe src="<?php _e($service_area_google_address_embed_code); ?>" width="550" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="addressBox text-white">
                        <?php if ($service_area_heading) : ?>
                            <h2 class="addressBox--title text-white">
                                <?php _e($service_area_heading); ?>
                            </h2>
                        <?php endif; ?>
                        <?php if ($service_area_short_description) : ?>
                            <p class="addressBox--text text-white">
                                <?php _e($service_area_short_description); ?>
                            </p>
                        <?php endif; ?>

                        <ul>
                            <?php if ($service_area_address) : ?>
                                <li>
                                    <span>
                                        <svg width="25" height="30" viewBox="0 0 25 30" fill="none">
                                            <path d="M12.5 0C9.18591 0.0036395 6.0086 1.32177 3.66518 3.66518C1.32177 6.0086 0.0036395 9.18591 0 12.5C0 19.1025 10.5 28.1663 11.6925 29.1788L12.5 29.8612L13.3075 29.1788C14.5 28.1663 25 19.1025 25 12.5C24.9964 9.18591 23.6782 6.0086 21.3348 3.66518C18.9914 1.32177 15.8141 0.0036395 12.5 0V0ZM12.5 18.75C11.2639 18.75 10.0555 18.3834 9.02769 17.6967C7.99988 17.0099 7.1988 16.0338 6.72575 14.8918C6.25271 13.7497 6.12893 12.4931 6.37009 11.2807C6.61125 10.0683 7.2065 8.95466 8.08058 8.08058C8.95466 7.2065 10.0683 6.61125 11.2807 6.37009C12.4931 6.12893 13.7497 6.25271 14.8918 6.72575C16.0338 7.1988 17.0099 7.99988 17.6967 9.02769C18.3834 10.0555 18.75 11.2639 18.75 12.5C18.748 14.157 18.0889 15.7456 16.9172 16.9172C15.7456 18.0889 14.157 18.748 12.5 18.75Z" fill="#fff" />
                                            <path d="M12.5 16.25C14.5711 16.25 16.25 14.5711 16.25 12.5C16.25 10.4289 14.5711 8.75 12.5 8.75C10.4289 8.75 8.75 10.4289 8.75 12.5C8.75 14.5711 10.4289 16.25 12.5 16.25Z" fill="#fff" />
                                        </svg>
                                    </span>
                                    <strong> Located at: </strong>
                                    <br>
                                    <br>
                                    <div class="row">

                                        <div class="col-sm-12 mt-2 mt-sm-0 location--div">
                                            <?php _e($service_area_address); ?>
                                        </div>
                                    </div>
                                </li>
                            <?php endif; ?>
                            <?php if ($service_area_email) : ?>
                                <li>
                                    <span>
                                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none">
                                            <g clip-path="url(#clip0_1_165)">
                                                <path d="M1.53125 10.5838C1.66375 10.43 10.6 1.81127 10.6 1.81127C11.7779 0.655642 13.3631 0.00981151 15.0132 0.0133199C16.6633 0.0168283 18.2458 0.669393 19.4188 1.83002C19.4188 1.83002 28.3363 10.43 28.4675 10.58L17.6513 21.3975C16.9366 22.0787 15.9873 22.4587 15 22.4587C14.0127 22.4587 13.0634 22.0787 12.3487 21.3975L1.53125 10.5838ZM19.4188 23.17C18.2428 24.3344 16.6549 24.9876 15 24.9876C13.3451 24.9876 11.7572 24.3344 10.5813 23.17L0.28625 12.875C0.106562 13.4448 0.0101495 14.0376 0 14.635L0 23.75C0.00198482 25.407 0.661102 26.9956 1.83277 28.1672C3.00445 29.3389 4.59301 29.998 6.25 30H23.75C25.407 29.998 26.9956 29.3389 28.1672 28.1672C29.3389 26.9956 29.998 25.407 30 23.75V14.635C29.9899 14.0376 29.8934 13.4448 29.7137 12.875L19.4188 23.17Z" fill="#fff" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1_165">
                                                    <rect width="30" height="30" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </span>
                                    <a href="mailto:<?php _e($service_area_email); ?>"><?php _e($service_area_email); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if ($service_area_contact) : ?>
                                <li>
                                    <span>
                                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none">
                                            <g clip-path="url(#clip0_1_168)">
                                                <path d="M22.0165 16.06L29.8477 23.8913L25.884 27.855C25.1932 28.543 24.3726 29.0869 23.4698 29.4551C22.5671 29.8233 21.6002 30.0085 20.6252 30C11.5652 30 0.000243877 18.435 0.000243877 9.375C-0.00768526 8.39998 0.177809 7.43306 0.545993 6.53019C0.914178 5.62733 1.45774 4.80643 2.14524 4.115L6.10899 0.1525L13.9402 7.98375L8.78399 13.14C10.3169 16.7829 13.211 19.6836 16.8502 21.225L22.0165 16.06ZM27.5002 12.5H30.0002C29.9966 9.18591 28.6785 6.0086 26.3351 3.66518C23.9916 1.32177 20.8143 0.0036395 17.5002 0V2.5C20.1515 2.50298 22.6933 3.5575 24.568 5.43222C26.4427 7.30694 27.4973 9.84875 27.5002 12.5ZM22.5002 12.5H25.0002C24.9983 10.5115 24.2074 8.60499 22.8014 7.19889C21.3953 5.7928 19.4888 5.00199 17.5002 5V7.5C18.8263 7.5 20.0981 8.02678 21.0358 8.96447C21.9735 9.90215 22.5002 11.1739 22.5002 12.5Z" fill="#fff" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1_168">
                                                    <rect width="30" height="30" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </span>
                                    <a href="tel:<?php _e($service_area_contact); ?>"><?php _e($service_area_contact); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>