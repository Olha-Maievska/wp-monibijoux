<?php
/*
Template Name: New in Page Template
*/
get_header();

the_content();

$args = array(
    'post_type' => 'product',
    'posts_per_page' => 1, 
    'tax_query' => array(
        array(
            'taxonomy' => 'product_tag',
            'field'    => 'slug',
            'terms'    => 'new',
        ),
    ),
);

$query = new WP_Query($args);
?>

  <main class="main">
    <section class="new-in-page">
      <div class="container">
        <h3 class="most-loved-title"> <?php _e('New in the store', 'woomonibijoux') ?> </h3>
        <?php
        if ($query->have_posts()) {
            echo do_shortcode('[products tag="new"]');
        } else {
            echo '<p>No new products found</p>';
        }
        wp_reset_postdata();
        ?>
      </div>
    </section>
  </main>

<?php get_footer(); ?>

