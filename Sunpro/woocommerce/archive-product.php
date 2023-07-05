<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');

$page_id = wc_get_page_id('shop');
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
						<?php woocommerce_page_title(); ?>
					</li>
				</ol>
			</nav>
		</div>
	</div>
	<?php if (is_shop()) : ?>
		<?php if (have_rows('page_banner_slider', $page_id)) : ?>
			<div class="banner__slider__section">
				<div class="slider__larger position-relative">
					<div class="maxw--100">
						<div class="multiple-items">
							<?php while (have_rows('page_banner_slider', $page_id)) : the_row();
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
	<?php endif; ?>
</section>

<section class="map__section">
	<div class="container">
		<div class="row pb-4">
			<div class="col-12">
				<?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
					<h2 class="slider__content--title text--bright text-center">
						<?php woocommerce_page_title(); ?>
					</h2>
				<?php endif; ?>
				<p class="subheading--text maxw--1000 mx-auto text-center mt-3">
					<?php
					/**
					 * Hook: woocommerce_archive_description.
					 *
					 * @hooked woocommerce_taxonomy_archive_description - 10
					 * @hooked woocommerce_product_archive_description - 10
					 */
					do_action('woocommerce_archive_description');
					?>
				</p>
			</div>
		</div>
		<div class="row mt-4">
			<?php
			if (woocommerce_product_loop()) { ?>
				<div class="col-md-5 col-xl-3">
					<button class="filter--btn">
						<i class="bi bi-funnel"></i>
						Filter
					</button>
					<div class="filter-bg">
						<h3 class="display3--heading">Product Filter</h3>
						<div class="filter-innerbg mt-4">
							<div class="accordion" id="accordionExample">
								<div class="accordion-item">
									<h2 class="accordion-header" id="headingOne">
										<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											Sort By Price
										</button>
									</h2>
									<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
										<div class="accordion-body">
											<?php echo woocommerce_catalog_ordering(); ?>

											<div class="mt-2">
												<?php //dynamic_sidebar('price-filter'); ?>
												<div id="slider-non-linear-step-value" class="slider--value"></div>
                                                <div id="slider-non-linear-step"></div>
											</div>
										</div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header" id="headingTwo">
										<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
											Category
										</button>
									</h2>
									<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
										<div class="accordion-body">
											<div class="radio--values">

												<?php echo do_shortcode('[show_categories_bar]'); ?>
											</div>
										</div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header" id="headingThree">
										<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
											Sort by Size
										</button>
									</h2>
									<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
										<div class="accordion-body">
											<div class="radio--values checkbox--values">
												<?php dynamic_sidebar('size-filter'); ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-7 col-xl-9">
					<div class="row">
						<div class="col-6">
							<p class="page--resulttext">
								<?php echo woocommerce_result_count(); ?>
							</p>
						</div>
						<div class="col-6">
							<ul class="nav nav-pills mb-3 justify-content-end tabs--gridlist" id="pills-tab" role="tablist">
								<li class="nav-item" role="presentation">
									<button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
										<svg width="20" height="20" viewBox="0 0 20 20" fill="none">
											<rect width="8" height="8" fill="#09094D" />
											<rect x="12" width="8" height="8" fill="#09094D" />
											<rect y="12" width="8" height="8" fill="#09094D" />
											<rect x="12" y="12" width="8" height="8" fill="#09094D" />
										</svg>
									</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
										<svg width="20" height="20" viewBox="0 0 20 20" fill="none">
											<rect width="4" height="4" fill="#09094D" />
											<rect y="16" width="4" height="4" fill="#09094D" />
											<rect x="6" width="14" height="4" fill="#09094D" />
											<rect y="8" width="4" height="4" fill="#09094D" />
											<rect x="6" y="8" width="14" height="4" fill="#09094D" />
											<rect x="6" y="16" width="14" height="4" fill="#09094D" />
										</svg>
									</button>
								</li>
							</ul>
						</div>
					</div>
					<div class="row mt-2">
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
								<div class="row products--page">

									<?php
									//woocommerce_product_loop_start();

									if (wc_get_loop_prop('total')) {
										while (have_posts()) {
											the_post();

											/**
											 * Hook: woocommerce_shop_loop.
											 */
											do_action('woocommerce_shop_loop');

											wc_get_template_part('content', 'product');
										}
									}

									//woocommerce_product_loop_end();
									?>

									<?php echo woocommerce_pagination(); ?>

								</div>
							</div>
							<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
								<div class="row--grid">
									<?php
									//woocommerce_product_loop_start();

									if (wc_get_loop_prop('total')) {
										while (have_posts()) {
											the_post();

											/**
											 * Hook: woocommerce_shop_loop.
											 */
											do_action('woocommerce_shop_loop');

											wc_get_template_part('content', 'product-list-view');
										}
									}

									//woocommerce_product_loop_end();
									?>
									<?php echo woocommerce_pagination(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } else {
				/**
				 * Hook: woocommerce_no_products_found.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action('woocommerce_no_products_found');
			} ?>
		</div>
	</div>
</section>

<?php

get_footer('shop');
