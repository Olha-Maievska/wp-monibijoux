<?php get_header(); ?>
 
  <main class="main">
    <section class="intro">

      <?php if ( is_active_sidebar( 'intro-widget' ) ) : ?>
        <?php dynamic_sidebar( 'intro-widget' ); ?>
      <?php endif; ?>
      
      <img
        class="intro-spot--pink"
        src="<?php echo get_template_directory_uri() ?>//assets/images/icons/symbol-pink.svg"
        alt="pink spot"
      />
      <img
        class="intro-spot--green"
        src="<?php echo get_template_directory_uri() ?>//assets/images/icons/symbol-green.svg"
        alt="green spot"
      />
    </section><!-- intro -->

    <section class="custom-product">
      <div class="container">
        <h3 class="custom-product-title"> <?php _e('Most loved', 'woomonibijoux') ?> </h3>
        <div class="text-center">
          <a class="custom-product-link pointer" href="' . esc_url(/most-loved/) . '">view all</a>
        </div>
          <?php echo do_shortcode('[featured_products limit="4"]') ?>
      </div><!-- container -->
    </section><!-- custom-product -->

    <section class="discover">
      <?php if ( is_active_sidebar( 'discover-widget' ) ) : ?>
          <?php dynamic_sidebar( 'discover-widget' ); ?>
        <?php endif; ?>
    </section><!-- discover -->

    <section class="subscribe">
      <div class="container">
        <div
          class="subscribe-content wow animate__animated animate__slideInUp"
        >
          <img
            class="letter-b"
            src="<?php echo get_template_directory_uri() ?>//assets/images/icons/symbol.svg"
            alt="logo letter B"
          />

          <?php if ( is_active_sidebar( 'subscribe-widget' ) ) : ?>
            <?php dynamic_sidebar( 'subscribe-widget' ); ?>
          <?php endif; ?>
          
        </div><!-- subscribe-content -->

        <img
          class="subscribe-spot--pink wow animate__animated animate__slideInLeft"
          src="<?php echo get_template_directory_uri() ?>//assets/images/icons/symbol-pink.svg"
          alt="pink spot"
          data-wow-delay=".4s"
        />

        <img
          class="subscribe-spot--purple wow animate__animated animate__slideInRight"
          src="<?php echo get_template_directory_uri() ?>//assets/images/icons/symbol-purple.svg"
          alt="green spot"
          data-wow-delay=".4s"
        />
      </div><!-- container -->
  </section><!-- subscribe -->

    <?php 
      global $post;
      $slider = get_posts( array(
        'post_type' => 'reviews-slider'
      ) );

      function wrap_content_in_div($content) {
          return '<div class="reviews-text">' . $content . '</div>';
      }
      add_filter('the_content', 'wrap_content_in_div');

    if ( $slider ) : ?>

    <section class="reviews">
      <div class="container">
        <h2 class="reviews-title">Reviews</h2>
        <div class="reviews-slider swiper mySwiper" #swiperRef="">
          <div class="reviews-track swiper-wrapper transition">

            <?php $i = 0; foreach ($slider as $post ) : setup_postdata( $post ); ?>
              <div class="reviews-item swiper-slide">
                <div class="reviews-photo" style="mask-image: url('<?php echo get_template_directory_uri() ?>//assets/images/icons/symbol-pink.svg'); -webkit-mask-image: url('<?php echo get_template_directory_uri() ?>//assets/images/icons/symbol-pink.svg');">
                <?php
                $thumbnail_url = get_the_post_thumbnail_url();
                if (!$thumbnail_url) {
                    $thumbnail_url = wc_placeholder_img_src();
                }
                ?>
                  <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title(); ?>" />
                </div>

                <div class="reviews-content">
                  <div class="reviews-rating">
                    <?php 
                      $custom_number = get_post_meta(get_the_ID(), '_custom_number', true);

                      if ($custom_number && $custom_number > 0) {
                        for ($i = 1; $i <= $custom_number; $i++) {
                          echo '<img src="' . get_template_directory_uri() . '/assets/images/icons/star.svg" alt="star icon" />';
                        }
                      }
                    ?>
                  </div>

                  <?php the_content( '' ); ?>

                  <div class="fw-semibold fs-5"><?php the_title(); ?></div>
                </div>
              </div>
            <?php $i ++; endforeach; ?>

          </div><!-- reviews-track -->

          <button
            class="arrow-prev swiper-button-prev pointer"
            id="prev-btn"
            type="button">
            <img
              src="<?php echo get_template_directory_uri() ?>//assets/images/icons/arrow-prev.svg"
              alt="green arrow previous"/>
          </button>

          <button
            class="arrow-next swiper-button-next pointer"
            id="next-btn"
            type="button">
            <img src="<?php echo get_template_directory_uri() ?>//assets/images/icons/arrow-next.svg" alt="green arrow next" />
          </button>

        </div><!-- reviews-slider -->
      </div><!-- container -->
    </section><!-- reviews -->

    <?php endif; ?>

   </main><!-- main -->

<?php get_footer(); ?>

