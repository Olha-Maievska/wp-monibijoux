<?php
/*
Template Name: Checkout page
*/

defined( 'ABSPATH' ) || exit;

get_header();

?>
 
	<main class="main">
		<div class="container">
			<?php
      echo do_shortcode('[woocommerce_checkout]');
		?>
		</div><!-- container -->
	</main><!-- main -->

<?php get_footer(); ?>
