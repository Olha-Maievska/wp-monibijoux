<?php  ?>

    <footer class="footer">
      <div class="container">
        <div class="footer-content">
          <div class="footer-logo">
            <img src="<?php echo get_template_directory_uri() ?>//assets/images/icons/footer-logo.svg" alt="footer logo" />
          </div>

          <?php if ( is_active_sidebar( 'photo-credit-widget' ) ) : ?>
            <?php dynamic_sidebar( 'photo-credit-widget' ); ?>
          <?php endif; ?>

          <?php if ( is_active_sidebar( 'graphic-design-widget' ) ) : ?>
            <?php dynamic_sidebar( 'graphic-design-widget' ); ?>
          <?php endif; ?>

          <ul class="footer-social">
            <?php if ( is_active_sidebar( 'footer-social-links-widget' ) ) : ?>
              <?php dynamic_sidebar( 'footer-social-links-widget' ); ?>
            <?php endif; ?>
          </ul><!-- footer-social -->
        </div><!-- footer-content -->
       </div><!-- container -->
     </footer><!-- footer -->

    <?php wp_footer(); ?>
  </body>
</html>
