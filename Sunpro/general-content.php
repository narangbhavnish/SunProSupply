<?php 
/* Template Name: General Content */

get_header();

$featured_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
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
                    
                    <li class="breadcrumb-item active" aria-current="page"><?php _e(get_the_title()); ?></li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<section class="map__section">
    <div class="container">
        <h2 class="slider__content--title before--none text--color text-center pb-2">
            <?php the_title(); ?>
        </h2>
        <div class="row mt-4 mt-md-5">

            <div class="col-md-12">
                <div class="tab--listitems detail--wrapper">
                    <?php
                    /* Start the Loop */
                    while (have_posts()) :
                        the_post();

                        the_content();

                    endwhile; // End of the loop.
                    ?>

                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>