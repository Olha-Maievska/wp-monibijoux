<?php
/*
Template Name: Terms and Conditions
*/

get_header();

$page_id = get_the_ID();

$page_content = apply_filters('the_content', get_post_field('post_content', $page_id));

?>

  <main class="main">
    <section class="terms-page">
      <div class="container">
        <?php echo $page_content; ?>
      </div>
    </section>
  </main>

<?php get_footer(); ?>
