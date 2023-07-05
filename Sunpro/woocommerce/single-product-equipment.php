<?php

/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

get_header('shop');

global $product;


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
					<li class="breadcrumb-item">
						<a href="<?php _e(home_url('equipments')); ?>">
							Equipment
						</a>
					</li>

					<li class="breadcrumb-item active" aria-current="page">
						<?php _e(get_the_title()); ?>
					</li>
				</ol>
			</nav>
		</div>
	</div>
	<?php /*<div class="banner__slider__section">
		<div class="slider__larger position-relative">
			<div class="maxw--100">
				<div class="multiple-items">
					<div>
						<div class="slider__content">
							<div class="row align-items-center">
								<div class="col-md-8 pb-md-4">
									<p class="slider__content--text">
										We don’t sell equipment we can’t service.
									</p>
									<h1 class="slider__content--title mt-2">
										We stock all major maintenance parts.
									</h1>
									<a href="#" class="service--btn mt-4 mt-xl-5">
										View Our Products
										<span class="circle--shape">
											<svg width="10" height="16" viewBox="0 0 10 16" fill="none">
												<path d="M1 1L8 8L1 15" stroke="#09094D" stroke-width="2" stroke-linecap="round" />
											</svg>
										</span>
									</a>
								</div>
								<div class="col-md-4 align-self-end">
									<img src="<?php bloginfo('stylesheet_directory'); ?>/custom/image/equipment.png" class="shape__man" alt="equipment-slider">
								</div>
							</div>
						</div>
					</div>
					<div>
						<div class="slider__content">
							<div class="row align-items-center">
								<div class="col-md-8 pb-md-4">
									<p class="slider__content--text">
										We don’t sell equipment we can’t service.
									</p>
									<h1 class="slider__content--title mt-2">
										We stock all major maintenance parts 2.
									</h1>
									<a href="#" class="service--btn mt-4 mt-xl-5">
										View Our Products
										<span class="circle--shape">
											<svg width="10" height="16" viewBox="0 0 10 16" fill="none">
												<path d="M1 1L8 8L1 15" stroke="#09094D" stroke-width="2" stroke-linecap="round" />
											</svg>
										</span>
									</a>
								</div>
								<div class="col-md-4 align-self-end">
									<img src="<?php bloginfo('stylesheet_directory'); ?>/custom/image/equipment.png" class="shape__man" alt="equipment-slider">
								</div>
							</div>
						</div>
					</div>
					<div>
						<div class="slider__content">
							<div class="row align-items-center">
								<div class="col-md-8 pb-md-4">
									<p class="slider__content--text">
										We don’t sell equipment we can’t service.
									</p>
									<h1 class="slider__content--title mt-2">
										We stock all major maintenance parts 3.
									</h1>
									<a href="#" class="service--btn mt-4 mt-xl-5">
										View Our Products
										<span class="circle--shape">
											<svg width="10" height="16" viewBox="0 0 10 16" fill="none">
												<path d="M1 1L8 8L1 15" stroke="#09094D" stroke-width="2" stroke-linecap="round" />
											</svg>
										</span>
									</a>
								</div>
								<div class="col-md-4 align-self-end">
									<img src="<?php bloginfo('stylesheet_directory'); ?>/custom/image/equipment.png" class="shape__man" alt="equipment-slider">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<img src="<?php bloginfo('stylesheet_directory'); ?>/custom/image/shape.png" class="shape__logo" alt="shape">
	</div>*/ ?>
</section>

<?php while (have_posts()) : ?>
	<?php the_post(); ?>

	<?php $standard_features = get_field("standard_features", get_the_ID()); ?>
	<?php $standard_accessories = get_field("standard_accessories", get_the_ID()); ?>
	<?php $available_options = get_field("available_options", get_the_ID()); ?>

	<?php

	$sunpro_services_heading_text = get_field('common_sunpro_services_heading_text', get_the_ID());
	$sunpro_services_short_description = get_field('common_sunpro_services_short_description', get_the_ID());
	$sunpro_services_button = get_field('common_sunpro_services_button', get_the_ID());
	$sunpro_services_image = get_field('common_sunpro_services_image', get_the_ID());
	$sunpro_services_image_text = get_field('common_sunpro_services_image_text', get_the_ID());
	?>
	<?php
	$product = wc_get_product();
	if ($product->is_type('variable')) :
		$variations = $product->get_available_variations();
	endif;

	$checkVariationIdExistInCart = array();
	if (sizeof(WC()->cart->get_cart()) > 0) {
		foreach (WC()->cart->get_cart() as $cart_item_key => $values) {
			$checkVariationIdExistInCart[] = absint($values['variation_id']);
		}
	}
	// echo "<pre>";
	// print_r(WC()->cart->get_cart());
	// print_r($checkVariationIdExistInCart);
	// echo "</pre>";
	?>

	<section class="map__section">
		<div class="container">
			<h2 class="slider__content--title before--none text--color text-center pb-2">
				<?php _e(get_the_title(get_the_ID())); ?>
			</h2>
			<?php if ($product->get_sku()) { ?><p class="model--no mt-3"><?php echo $product->get_sku(); ?></p><?php } ?>
			<div class="row mt-4 mt-md-5">
				<div class="col-md-4">
					<div class="listbox__wrapper product__descbox">
						<div class="listbox__wrapper__img">
							<div class="bg--pic"><img src="<?php bloginfo('stylesheet_directory'); ?>/custom/image/series.png" alt="series"></div>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<ul class="nav nav-tabs classic--tabs" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Standard Features</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Accessories</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Options</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="request-tab" data-bs-toggle="tab" data-bs-target="#request-tab-pane" type="button" role="tab" aria-controls="request-tab-pane" aria-selected="false">Request Additional Information</button>
						</li>
					</ul>
					<div class="tab-content classic--tabcontent" id="myTabContent">
						<div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
							<div class="tab--listitems">
								<?php _e($standard_features); ?>
							</div>
						</div>
						<div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
							<div class="tab--listitems">
								<?php _e($standard_accessories); ?>
							</div>
						</div>
						<div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
							<div class="tab--listitems">
								<?php _e($available_options); ?>
							</div>
						</div>
						<div class="tab-pane fade request_additional_info" id="request-tab-pane" role="tabpanel" aria-labelledby="request-tab" tabindex="0">
							<div class="tab--listitems">
								<?php $request_additional_info_form_shortcode = get_field('request_additional_info_form_shortcode', 'options');
								if ($request_additional_info_form_shortcode) : ?>
									<?php echo do_shortcode($request_additional_info_form_shortcode); ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php
	if ($product->is_type('variable')) :
		if ($variations) : ?>
			<section class="map__section">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-6">
							<h2 class="slider__content--title before--none text--color">
								Models
							</h2>
						</div>
						<?php /*<div class="col-6 text-end">
							<a href="#" class="service--btn small--btn" tabindex="0">
								Buy Now
								<span class="circle--shape">
									<svg width="10" height="16" viewBox="0 0 10 16" fill="none">
										<path d="M1 1L8 8L1 15" stroke="#09094D" stroke-width="2" stroke-linecap="round"></path>
									</svg>
								</span>
							</a>
						</div>*/ ?>
						<div class="col-12 mt-4 pt-md-3">
							<div class="table-responsive">
								<table class="table table--row">
									<thead>
										<tr>
											<th scope="col">Part#</th>
											<th scope="col">GPM</th>
											<th scope="col">PSI</th>
											<th scope="col">Model/Brand</th>
											<th scope="col">Pump</th>
											<th scope="col" class="text-center">Spec Sheet</th>
											<th scope="col" class="text-center">Quantity</th>
											<th scope="col">Price</th>
											<th scope="col" class="text-center">Add to Cart</th>
										</tr>
									</thead>
									<tbody>

										<?php foreach ($variations as $key => $variation) {
											$variation_spec_sheet = get_field('variation_spec_sheet', $variation['variation_id']);
										?>
											<tr>
												<?php //print_r($variation); 
												?>
												<td><?php _e(strtoupper($variation['attributes']['attribute_pa_part'])); ?></td>
												<td><?php _e(strtoupper($variation['attributes']['attribute_pa_gpm'])); ?></td>
												<td><?php _e(strtoupper($variation['attributes']['attribute_pa_psi'])); ?></td>
												<td><?php _e(strtoupper($variation['attributes']['attribute_pa_model-brand'])); ?></td>
												<td><?php _e(strtoupper($variation['attributes']['attribute_pa_pump'])); ?></td>
												<td class="text-center">
													<a target="_blank" href="<?php echo $variation_spec_sheet; ?>">
														<img src="<?php bloginfo('stylesheet_directory'); ?>/custom/image/pdf-pic.png" alt="pdf-pic">
													</a>
												</td>
												<td class="text-center">
													<div class="qtySelector text-center">
														<input data-variationid="<?php echo $variation['variation_id']; ?>" class="qtyValue" type="text" value="1" step="1" min="1" max="10" oninput="this.value = this.value.replace(/[^1-9.]/g, '').replace(/(\..*)\./g, '$1');" readonly />
													</div>
												</td>
												<td class="dark--primary td--bold">
													<?php _e(wc_price($variation['display_price'])); ?>
												</td>
												<td class="text-center add-to-cart-td-<?php echo $variation['variation_id']; ?>">
													<?php if (in_array(absint($variation['variation_id']), $checkVariationIdExistInCart)) { ?>
														<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal" role="button" class="cart_added added_to_cart" title="View Cart">View cart</a>

													<?php } else { ?>
														<form method="POST" name="add_to_cart" class="add_to_cart">
															<input type="hidden" name="variation_id" id="variation_id" value="<?php echo $variation['variation_id']; ?>" />
															<input type="hidden" name="product_id" id="product_id" value="<?php echo get_the_ID(); ?>" />
															<input type="hidden" name="quantity" id="quantity_<?php echo $variation['variation_id']; ?>" class="quantity_<?php echo $variation['variation_id']; ?>" value="1" />
															<button class="tag--link single__add_to_cart_button">
																<svg width="26" height="30" viewBox="0 0 26 30" fill="none">
																	<path d="M0.945312 30.0001C0.257812 29.7657 0 29.2891 0 28.5704C0.015625 21.8516 0.0078125 15.1329 0.0078125 8.41413C0.0078125 7.47663 0.445313 7.03132 1.38281 7.03132C2.49219 7.03132 3.60938 7.03132 4.74219 7.03132C5.07812 4.70319 6.16406 2.82819 8.07812 1.46882C9.5625 0.398505 11.2344 -0.0780575 13.0625 0.00787999C17 0.203193 20.1172 3.21882 20.5938 7.03132C20.6953 7.03132 20.8047 7.03132 20.9062 7.03132C21.9688 7.03132 23.0312 7.03132 24.1016 7.03132C24.8203 7.03132 25.3203 7.52351 25.3203 8.24226C25.3203 11.961 25.3203 15.6798 25.3203 19.4063C25.3203 20.1173 24.8047 20.6329 24.1328 20.6251C23.4766 20.6173 22.9766 20.1016 22.9766 19.4063C22.9766 16.1954 22.9766 12.9844 22.9766 9.76569C22.9766 9.64851 22.9766 9.53132 22.9766 9.39851C22.1953 9.39851 21.4297 9.39851 20.6328 9.39851C20.6328 9.50788 20.6328 9.60944 20.6328 9.71101C20.6328 10.7423 20.6328 11.7813 20.6328 12.8126C20.6328 13.5313 20.1406 14.0548 19.4688 14.0548C18.7891 14.0626 18.2891 13.5313 18.2891 12.8048C18.2891 11.6719 18.2891 10.5391 18.2891 9.39069C14.5391 9.39069 10.8047 9.39069 7.03906 9.39069C7.03906 9.50007 7.03906 9.60163 7.03906 9.71101C7.03906 10.7423 7.03906 11.7813 7.03906 12.8126C7.03906 13.5313 6.54688 14.0548 5.875 14.0548C5.19531 14.0626 4.69531 13.5313 4.69531 12.7969C4.69531 11.7735 4.69531 10.7501 4.69531 9.71882C4.69531 9.60944 4.69531 9.50788 4.69531 9.38288C3.91406 9.38288 3.14844 9.38288 2.36719 9.38288C2.36719 15.461 2.36719 21.5313 2.36719 27.6485C2.47656 27.6485 2.59375 27.6485 2.70312 27.6485C6.69531 27.6485 10.6875 27.6485 14.6875 27.6485C15.6094 27.6485 16.1953 28.4688 15.8516 29.2813C15.6875 29.6641 15.375 29.8594 15.0078 29.9923C10.3203 30.0001 5.63281 30.0001 0.945312 30.0001ZM18.1875 7.02351C17.8438 4.61726 15.5469 2.14069 12.2656 2.35944C9.69531 2.53132 7.05469 4.96882 7.17188 7.02351C10.8359 7.02351 14.5 7.02351 18.1875 7.02351Z" fill="#09094D" />
																	<path d="M21.5704 30.0001C20.8673 29.7657 20.5782 29.2657 20.6329 28.5391C20.6563 28.2579 20.6329 27.9766 20.6329 27.6563C20.2657 27.6563 19.922 27.6563 19.5704 27.6563C18.8126 27.6563 18.2813 27.1641 18.2891 26.4766C18.297 25.7969 18.8204 25.3204 19.5626 25.3126C19.9063 25.3126 20.2423 25.3126 20.6329 25.3126C20.6329 24.9063 20.6251 24.5079 20.6329 24.1172C20.6563 23.3047 21.4454 22.7657 22.2032 23.0391C22.6563 23.2032 22.961 23.6251 22.9688 24.1172C22.9766 24.5079 22.9688 24.8907 22.9688 25.3126C23.3516 25.3126 23.711 25.3126 24.0704 25.3126C24.7891 25.3204 25.3126 25.8047 25.3126 26.4766C25.3204 27.1563 24.797 27.6563 24.0626 27.6563C23.711 27.6563 23.3595 27.6563 22.9688 27.6563C22.9688 27.961 22.9532 28.2501 22.9688 28.5391C23.0157 29.2657 22.7266 29.7657 22.0313 30.0001C21.8829 30.0001 21.7266 30.0001 21.5704 30.0001Z" fill="#09094D" />
																</svg>
															</button>
														</form>
													<?php } ?>
												</td>
											</tr>
										<?php  } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>
	<?php endif; ?>

	<section class="map__section">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6">
					<?php if ($sunpro_services_heading_text) : ?>
						<h2 class="slider__content--title before--bar text--color position-relative pb-2">
							<?php echo $sunpro_services_heading_text; ?>
						</h2>
					<?php endif; ?>
					<?php if ($sunpro_services_short_description) : ?>
						<p class="subheading--text mt-3">
							<?php echo $sunpro_services_short_description; ?>
						</p>
					<?php endif; ?>
					<?php if (have_rows('common_sunpro_services_repeater')) : ?>
						<div class="sunpro--list">
							<ul>
								<?php while (have_rows('common_sunpro_services_repeater')) : the_row();
									$common_sunpro_services_text = get_sub_field('common_sunpro_services_text');
								?>
									<li><?php echo $common_sunpro_services_text; ?></li>
								<?php endwhile; ?>
							</ul>
						</div>
					<?php endif; ?>
					<?php if ($sunpro_services_button) : ?>
						<a href="<?php echo $sunpro_services_button['url']; ?>" class="service--btn mt-4">
							<?php echo $sunpro_services_button['title']; ?>
							<span class="circle--shape">
								<svg width="10" height="16" viewBox="0 0 10 16" fill="none">
									<path d="M1 1L8 8L1 15" stroke="#09094D" stroke-width="2" stroke-linecap="round" />
								</svg>
							</span>
						</a>
					<?php endif; ?>
				</div>
				<div class="col-md-5 mt-3 mt-md-0 offset-md-1">
					<div class="services-box">
						<?php if ($sunpro_services_image) : ?>
							<img src="<?php echo $sunpro_services_image['url']; ?>" alt="<?php echo $sunpro_services_image['alt']; ?>" class="img-fluid" />
						<?php endif; ?>
						<?php if ($sunpro_services_image_text) : ?>
							<div class="services-box--text">
								<?php _e($sunpro_services_image_text); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php endwhile; // end of the loop. 
?>



<?php
get_footer('shop');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
