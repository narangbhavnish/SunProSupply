<footer class="footer--container">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/custom//image/footer--logo.svg" alt="footerlogo" class="img-fluid">
      </div>
      <div class="col-12 mt-4 footer--content">
        <div class="row justify-content-md-center">
          <?php $footerMenu = wp_get_menu_array('FooterMenu'); ?>
          <?php foreach ($footerMenu as $tkey => $menu) : ?>
            <div class="col-6 mb-3 mb-md-0 col-md-auto px-md-4">
              <a href="<?php _e($menu['url']); ?>">
                <?php _e($menu['title']); ?>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="col-12 text-center mt--32 linkdin--text">
        <svg class="v-align-middle me-1" width="20" height="20" viewBox="0 0 20 20" fill="none">
          <path d="M17.042 17.0421H14.0783V12.4009C14.0783 11.2941 14.0586 9.86991 12.5368 9.86991C10.9934 9.86991 10.7568 11.0753 10.7568 12.3211V17.0421H7.79411V7.49758H10.6395V8.80152H10.679C11.2595 7.81001 12.3377 7.21767 13.4859 7.26005C16.49 7.26005 17.043 9.23617 17.043 11.8056L17.042 17.0421ZM4.44998 6.19265C3.49986 6.19265 2.73011 5.42289 2.73011 4.47278C2.73011 3.52266 3.49986 2.75291 4.44998 2.75291C5.40009 2.75291 6.16984 3.52266 6.16984 4.47278C6.16984 5.42289 5.40009 6.19265 4.44998 6.19265ZM5.93133 17.0421H2.96468V7.49758H5.93133V17.0421ZM18.5194 0.00112022H1.47544C0.670207 -0.00775016 0.00985598 0.637817 0 1.44305V18.557C0.00985598 19.3632 0.670207 20.0088 1.47544 19.9999H18.5194C19.3266 20.0097 19.9899 19.3642 20.0007 18.557V1.44206C19.9889 0.63486 19.3256 -0.010707 18.5194 0.000134579" fill="#3C65F3" />
        </svg>
        <span class="v-align-middle">LinkedIn:</span>
        <?php $linkedin_link = get_field('linkedin_link', 'options');
        if ($linkedin_link) : ?>
          <a href="<?php echo $linkedin_link['url']; ?>" target="<?php echo $linkedin_link['target']; ?>">
            <?php echo $linkedin_link['title']; ?>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</footer>
<div class="footer--bg mt-4">
  <div class="container">
    <div class="row align-items-center">
      <?php $copyright_text = get_field('copyright_text', 'options');
      if ($copyright_text) : ?>

        <div class="col-md-6">
          <p class="footer--bg--text"><?php echo $copyright_text; ?></p>
        </div>
      <?php endif; ?>
      <div class="col-md-6 mt-2 mt-md-0 text-md-end">
        <?php $privacy_policy = get_field('privacy_policy', 'options');
        if ($privacy_policy) : ?>

          <a href="<?php echo $privacy_policy['url']; ?>" target="<?php echo $privacy_policy['target']; ?>">
            <?php echo $privacy_policy['title']; ?>
          </a>
        <?php endif; ?>
        <span class="v-align-middle mx-2 text-white">|</span>
        <?php $terms_conditions = get_field('terms_&_conditions', 'options');
        if ($terms_conditions) : ?>

          <a href="<?php echo $terms_conditions['url']; ?>" target="<?php echo $terms_conditions['target']; ?>"><?php echo $terms_conditions['title']; ?></a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal cart_modal fade requestServiceModal" id="requestServiceModal" tabindex="-1" aria-labelledby="requestServiceLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="requestServiceLabel">Request a Service</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <svg width="34" height="34" viewBox="0 0 34 34" fill="none">
            <path d="M17 33.625C13.7119 33.625 10.4976 32.65 7.76365 30.8232C5.02968 28.9964 2.89882 26.3999 1.64051 23.3621C0.382203 20.3243 0.0529729 16.9816 0.694452 13.7566C1.33593 10.5317 2.91931 7.5694 5.24436 5.24436C7.5694 2.91931 10.5317 1.33593 13.7566 0.694452C16.9816 0.0529729 20.3243 0.382203 23.3621 1.64051C26.3999 2.89882 28.9964 5.02968 30.8232 7.76365C32.65 10.4976 33.625 13.7119 33.625 17C33.6203 21.4078 31.8672 25.6337 28.7504 28.7504C25.6337 31.8672 21.4078 33.6203 17 33.625ZM17 2.75001C14.1816 2.75001 11.4265 3.58575 9.08313 5.15157C6.73973 6.71737 4.91327 8.94292 3.83472 11.5468C2.75618 14.1506 2.47398 17.0158 3.02382 19.78C3.57366 22.5443 4.93084 25.0834 6.92374 27.0763C8.91663 29.0692 11.4557 30.4264 14.22 30.9762C16.9842 31.526 19.8494 31.2438 22.4532 30.1653C25.0571 29.0867 27.2826 27.2603 28.8484 24.9169C30.4143 22.5735 31.25 19.8184 31.25 17C31.2459 13.2219 29.7433 9.59976 27.0718 6.92825C24.4003 4.25674 20.7781 2.75409 17 2.75001Z" fill="#F33C3C" />
            <path d="M18.68 17.0001L22.5905 13.0896C22.8068 12.8657 22.9265 12.5657 22.9238 12.2543C22.9211 11.943 22.7962 11.6451 22.576 11.425C22.3558 11.2048 22.058 11.0799 21.7466 11.0772C21.4353 11.0745 21.1353 11.1942 20.9114 11.4105L17.0009 15.3209L13.0905 11.4105C12.8665 11.1942 12.5666 11.0745 12.2552 11.0772C11.9438 11.0799 11.646 11.2048 11.4258 11.425C11.2057 11.6451 11.0808 11.943 11.0781 12.2543C11.0754 12.5657 11.195 12.8657 11.4114 13.0896L15.3218 17.0001L11.4114 20.9105C11.2979 21.02 11.2075 21.1511 11.1452 21.296C11.083 21.4408 11.0502 21.5967 11.0489 21.7543C11.0475 21.912 11.0775 22.0684 11.1373 22.2143C11.197 22.3603 11.2851 22.4928 11.3966 22.6043C11.5081 22.7158 11.6407 22.804 11.7867 22.8637C11.9326 22.9234 12.089 22.9535 12.2466 22.9521C12.4043 22.9507 12.5601 22.918 12.705 22.8557C12.8499 22.7935 12.9809 22.703 13.0905 22.5896L17.0009 18.6792L20.9114 22.5896C21.1353 22.8059 21.4353 22.9256 21.7466 22.9229C22.058 22.9202 22.3558 22.7953 22.576 22.5752C22.7962 22.355 22.9211 22.0571 22.9238 21.7458C22.9265 21.4344 22.8068 21.1345 22.5905 20.9105L18.68 17.0001Z" fill="#F33C3C" />
          </svg>
        </button>
      </div>
      <div class="px-3">
        <div class="modal-body px-0">
          <div class="row">
            <div class="col-md-12">
              <?php $request_service_form_shortcode = get_field('request_service_form_shortcode', 'options');
              if ($request_service_form_shortcode) : ?>
                <?php echo do_shortcode($request_service_form_shortcode); ?>
              <?php endif; ?>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal cart_modal fade equipmentRequestModal" id="equipmentRequestModal" tabindex="-1" aria-labelledby="equipmentRequestModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="equipmentRequestModal">Equipment & Part Request</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <svg width="34" height="34" viewBox="0 0 34 34" fill="none">
            <path d="M17 33.625C13.7119 33.625 10.4976 32.65 7.76365 30.8232C5.02968 28.9964 2.89882 26.3999 1.64051 23.3621C0.382203 20.3243 0.0529729 16.9816 0.694452 13.7566C1.33593 10.5317 2.91931 7.5694 5.24436 5.24436C7.5694 2.91931 10.5317 1.33593 13.7566 0.694452C16.9816 0.0529729 20.3243 0.382203 23.3621 1.64051C26.3999 2.89882 28.9964 5.02968 30.8232 7.76365C32.65 10.4976 33.625 13.7119 33.625 17C33.6203 21.4078 31.8672 25.6337 28.7504 28.7504C25.6337 31.8672 21.4078 33.6203 17 33.625ZM17 2.75001C14.1816 2.75001 11.4265 3.58575 9.08313 5.15157C6.73973 6.71737 4.91327 8.94292 3.83472 11.5468C2.75618 14.1506 2.47398 17.0158 3.02382 19.78C3.57366 22.5443 4.93084 25.0834 6.92374 27.0763C8.91663 29.0692 11.4557 30.4264 14.22 30.9762C16.9842 31.526 19.8494 31.2438 22.4532 30.1653C25.0571 29.0867 27.2826 27.2603 28.8484 24.9169C30.4143 22.5735 31.25 19.8184 31.25 17C31.2459 13.2219 29.7433 9.59976 27.0718 6.92825C24.4003 4.25674 20.7781 2.75409 17 2.75001Z" fill="#F33C3C" />
            <path d="M18.68 17.0001L22.5905 13.0896C22.8068 12.8657 22.9265 12.5657 22.9238 12.2543C22.9211 11.943 22.7962 11.6451 22.576 11.425C22.3558 11.2048 22.058 11.0799 21.7466 11.0772C21.4353 11.0745 21.1353 11.1942 20.9114 11.4105L17.0009 15.3209L13.0905 11.4105C12.8665 11.1942 12.5666 11.0745 12.2552 11.0772C11.9438 11.0799 11.646 11.2048 11.4258 11.425C11.2057 11.6451 11.0808 11.943 11.0781 12.2543C11.0754 12.5657 11.195 12.8657 11.4114 13.0896L15.3218 17.0001L11.4114 20.9105C11.2979 21.02 11.2075 21.1511 11.1452 21.296C11.083 21.4408 11.0502 21.5967 11.0489 21.7543C11.0475 21.912 11.0775 22.0684 11.1373 22.2143C11.197 22.3603 11.2851 22.4928 11.3966 22.6043C11.5081 22.7158 11.6407 22.804 11.7867 22.8637C11.9326 22.9234 12.089 22.9535 12.2466 22.9521C12.4043 22.9507 12.5601 22.918 12.705 22.8557C12.8499 22.7935 12.9809 22.703 13.0905 22.5896L17.0009 18.6792L20.9114 22.5896C21.1353 22.8059 21.4353 22.9256 21.7466 22.9229C22.058 22.9202 22.3558 22.7953 22.576 22.5752C22.7962 22.355 22.9211 22.0571 22.9238 21.7458C22.9265 21.4344 22.8068 21.1345 22.5905 20.9105L18.68 17.0001Z" fill="#F33C3C" />
          </svg>
        </button>
      </div>
      <div class="px-3">
        <div class="modal-body px-0">
          <div class="row">
            <div class="col-md-12">
              <?php $equipment_and_part_request_form_shortcode = get_field('equipment_and_part_request_form_shortcode', 'options');
              if ($equipment_and_part_request_form_shortcode) : ?>
                <?php echo do_shortcode($equipment_and_part_request_form_shortcode); ?>
              <?php endif; ?>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal cart_modal fade showDescriptionModal" id="showDescriptionModal" tabindex="-1" aria-labelledby="showDescriptionModal" aria-hidden="true">
  <div class="modal-dialog maxw--800">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="product-title" class="modal-title"></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <svg width="34" height="34" viewBox="0 0 34 34" fill="none">
            <path d="M17 33.625C13.7119 33.625 10.4976 32.65 7.76365 30.8232C5.02968 28.9964 2.89882 26.3999 1.64051 23.3621C0.382203 20.3243 0.0529729 16.9816 0.694452 13.7566C1.33593 10.5317 2.91931 7.5694 5.24436 5.24436C7.5694 2.91931 10.5317 1.33593 13.7566 0.694452C16.9816 0.0529729 20.3243 0.382203 23.3621 1.64051C26.3999 2.89882 28.9964 5.02968 30.8232 7.76365C32.65 10.4976 33.625 13.7119 33.625 17C33.6203 21.4078 31.8672 25.6337 28.7504 28.7504C25.6337 31.8672 21.4078 33.6203 17 33.625ZM17 2.75001C14.1816 2.75001 11.4265 3.58575 9.08313 5.15157C6.73973 6.71737 4.91327 8.94292 3.83472 11.5468C2.75618 14.1506 2.47398 17.0158 3.02382 19.78C3.57366 22.5443 4.93084 25.0834 6.92374 27.0763C8.91663 29.0692 11.4557 30.4264 14.22 30.9762C16.9842 31.526 19.8494 31.2438 22.4532 30.1653C25.0571 29.0867 27.2826 27.2603 28.8484 24.9169C30.4143 22.5735 31.25 19.8184 31.25 17C31.2459 13.2219 29.7433 9.59976 27.0718 6.92825C24.4003 4.25674 20.7781 2.75409 17 2.75001Z" fill="#F33C3C" />
            <path d="M18.68 17.0001L22.5905 13.0896C22.8068 12.8657 22.9265 12.5657 22.9238 12.2543C22.9211 11.943 22.7962 11.6451 22.576 11.425C22.3558 11.2048 22.058 11.0799 21.7466 11.0772C21.4353 11.0745 21.1353 11.1942 20.9114 11.4105L17.0009 15.3209L13.0905 11.4105C12.8665 11.1942 12.5666 11.0745 12.2552 11.0772C11.9438 11.0799 11.646 11.2048 11.4258 11.425C11.2057 11.6451 11.0808 11.943 11.0781 12.2543C11.0754 12.5657 11.195 12.8657 11.4114 13.0896L15.3218 17.0001L11.4114 20.9105C11.2979 21.02 11.2075 21.1511 11.1452 21.296C11.083 21.4408 11.0502 21.5967 11.0489 21.7543C11.0475 21.912 11.0775 22.0684 11.1373 22.2143C11.197 22.3603 11.2851 22.4928 11.3966 22.6043C11.5081 22.7158 11.6407 22.804 11.7867 22.8637C11.9326 22.9234 12.089 22.9535 12.2466 22.9521C12.4043 22.9507 12.5601 22.918 12.705 22.8557C12.8499 22.7935 12.9809 22.703 13.0905 22.5896L17.0009 18.6792L20.9114 22.5896C21.1353 22.8059 21.4353 22.9256 21.7466 22.9229C22.058 22.9202 22.3558 22.7953 22.576 22.5752C22.7962 22.355 22.9211 22.0571 22.9238 21.7458C22.9265 21.4344 22.8068 21.1345 22.5905 20.9105L18.68 17.0001Z" fill="#F33C3C" />
          </svg>
        </button>
      </div>
      <div class="px-3">
        <div class="modal-body px-0">
        <div class="row--productgrid">
                <div>
                    <div class="product__descbox">
                        <div class="listbox__wrapper__img">
                            <div class="bg--pic"><img id="product-image" src="<?php echo bloginfo('url'); ?>/wp-content/uploads/woocommerce-placeholder-600x600.png" alt="brown-gold"></div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="row">
                        <div class="col-12">
                          <p id="product-description"></p>
                        </div>
                        
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-5"></div>
                        <div class="col-md-7 text-end">
                            <p id="product-price" class="calc--text fs-6 fw-semibold text--3C65F3">
                                
                            </p>
                        </div>
                    </div>
                </div>
              </div>
        </div>

        <div class="modal-footer px-0">
                  
                  <div class="col-12 mt-0 text-center mx-0">
                  <a href="#" id="view-product" class="btn--submit">View Product</a>
                  </div>
            </div>

      </div>
    </div>
  </div>
</div>


<?php /*<footer>
  <div class="google_review_section">
    <div class="google_review_button">
      <button onclick="openNav()" type="button" class="navbar-toggler">
        <?php
        $google_review_image = get_field('google_review_image', 'options');
        if ($google_review_image) :
        ?>
          <div class="left_side">
            <img src="<?php echo esc_url($google_review_image['url']); ?>" alt="<?php echo esc_attr($google_review_image['alt']); ?>" class="img-fluid beforeimage" />
          </div>
          <div class="right_side">
            <p><?php the_field('google_reviews_text', 'options'); ?></p>
            <div class="star_wrapper">
              <p class="star_list"><?php $json = file_get_contents('https://maps.googleapis.com/maps/api/place/details/json?placeid=ChIJCSioaRlhsYkRjEEXJPoj3os&key=AIzaSyBTUvAMImAUaQ-rCmfQSyQcXDw9zakxD2A');
                                    $obj = json_decode($json);
                                    $average_review_count = $obj->result->rating;
                                    echo $average_review_count; ?>
              </p>
              <span class="stars" data-rating="<?php echo $average_review_count; ?>" data-num-stars="5"></span>
            </div>
          </div>
        <?php endif; ?>
      </button>
    </div>
    <div class="googlereviews sidenav" id="mySidenav" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog-slideout modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" onclick="closeNav()" class="close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div class="top_header_section">
              <div class="left_side">
                <h3>Google Reviews</h3>
                <div class="rating_section">
                  <p><?php $json = file_get_contents('https://maps.googleapis.com/maps/api/place/details/json?placeid=ChIJCSioaRlhsYkRjEEXJPoj3os&key=AIzaSyBTUvAMImAUaQ-rCmfQSyQcXDw9zakxD2A');
                      $obj = json_decode($json);
                      $average_review_count = $obj->result->rating;
                      echo $average_review_count; ?></p>
                  <span class="stars" data-rating="<?php echo $average_review_count; ?>" data-num-stars="5"></span>
                </div>
              </div>
              <div class="right_side">
                <p>RECOMMENDED BY </p>
              </div>
            </div>
          </div>
          <div class="modal-body">
            <div class="rate_us_on_google">
              <p>Would you rate us on Google ?</a>
                <a href="https://www.google.com/search?q=pmgllcus&sxsrf=APq-WBtLZ0CjH4vusqIEsWRecyuZ8SXtWQ%3A1644486353921&ei=0d4EYo22N4iRseMP0eStoAQ&oq=pmg&gs_lcp=Cgdnd3Mtd2l6EAMYADIECCMQJzIKCAAQsQMQgwEQQzIKCAAQsQMQgwEQQzILCAAQgAQQsQMQgwEyCgguEMcBEK8BEEMyBwgAELEDEEMyBAgAEEMyCggAELEDEIMBEEMyCAgAEIAEELEDMg4IABCABBCxAxCDARDJAzoHCCMQsAMQJzoHCAAQRxCwAzoHCAAQsAMQQzoHCCMQ6gIQJzoFCAAQgAQ6BQguEIAEOg4ILhCABBCxAxDHARCjAjoLCC4QgAQQsQMQgwE6CgguEMcBEKMCEENKBAhBGABKBAhGGABQkAhYxg1gmxVoAnABeACAAfUBiAGLBJIBBTAuMi4xmAEAoAEBsAEKyAEKwAEB&sclient=gws-wiz#lrd=0x89b1611969a82809:0x8bde23fa2417418c,3,,,">Yes</a>
                <a hrf="#" class="hide_section">No</a>
            </div>
            <div id="google-reviews" data-aos="fade-up">
            </div>
            <div class="container">
              <a href="#" id="loadMore" class="orange_button">Load More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
      <div class="container">
        <div class="website_logo text-center">
          <?php echo get_custom_logo(); ?>
        </div>
        <div class="footer_menu text-center">
          <?php
          wp_nav_menu(
            array(
              'theme_location' => 'header-menu',
              'container' => 'ul',
              'menu_class' => 'navbar-nav'
            )
          );
          ?>
        </div>
        <div class="linked_url text-center">
          <a href=""><img src="http://localhost/sunpro/wp-content/uploads/2022/12/linkedin.svg" alt="Linkedin" class="img-fluid" />linkedin: SunPro Supply</a>
        </div>
      </div>
      <div class="secondary_footer">
        <div class="container">
          <div class="wrapper">
            <?php $copyright_text = get_field('copyright_text', 'options');
            if (copyright_text) : ?>
              <span><?php echo $copyright_text; ?></span>
            <?php endif; ?>
            <div>
              <?php $privacy_policy = get_field('privacy_policy', 'options');
              if ($privacy_policy) : ?>
                <a href="<?php echo $privacy_policy['url']; ?>" target="<?php echo $privacy_policy['target']; ?>"><?php echo $privacy_policy['title']; ?></a>
              <?php endif; ?>
              <?php $terms_conditions = get_field('terms_&_conditions', 'options');
              if ($terms_conditions) : ?>
                <a href="<?php echo $terms_conditions['url']; ?>" target="<?php echo $terms_conditions['target']; ?>"><?php echo $terms_conditions['title']; ?></a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
</footer>
*/ ?>


<!-- JavaScript Bundle with Popper -->
<script src="<?php bloginfo('stylesheet_directory'); ?>/custom/js/jquery-3.6.3.min.js" ></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/custom/js/bootstrap.bundle.min.js" ></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/custom/js/slick.min.js"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/custom/js/nouislider.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="<?php bloginfo('stylesheet_directory'); ?>/custom/js/select.min.js"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/custom/js/main.js"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/custom/js/getProductDetails.js"></script>

<?php wp_footer(); ?>

</body>

</html>