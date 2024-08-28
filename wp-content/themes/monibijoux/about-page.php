<?php
/*
Template Name: About us Page Template
*/
get_header();

$page_id = get_the_ID();

$page_content = apply_filters('the_content', get_post_field('post_content', $page_id));

$page_thumbnail = get_the_post_thumbnail_url($page_id, 'full');
?>

  <main class="main">
    <section class="about-page">
      <div class="container">
        <div class="about-page-content">
           <?php if ($page_thumbnail) : ?>
              <div class="about-page-img">
                <img src="<?php echo esc_url($page_thumbnail); ?>" alt="<?php echo esc_attr($page_title); ?>" />
            </div>
          <?php endif; ?>
          
          <div class="about-page-text">
            <?php echo $page_content; ?>
          </div>
          </div>
        </div>
    </section>
  </main>

<?php get_footer(); ?>