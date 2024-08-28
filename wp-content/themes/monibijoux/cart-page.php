<?php
/*
Template Name: Cart page
*/

defined( 'ABSPATH' ) || exit;

get_header();

?>

	<main class="main">
		<div class="container">

    <?php
      echo do_shortcode('[woocommerce_cart]');
		?>
		</div><!-- container -->
	</main><!-- main -->

<?php get_footer(); ?>
