<?php
/*
Template Name: Most loved Page Template
*/
  get_header();
?>

<?php the_content(); ?> 

  <main class="main">
    <section class="most-loved-page">
      <div class="container">
        <h3 class="custom-product-title"> <?php _e('Most loved', 'woomonibijoux') ?> </h3>
        <?php echo do_shortcode('[featured_products]') ?>
      </div>
    </section>
  </main>

<?php get_footer(); ?>

