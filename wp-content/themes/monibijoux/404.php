<?php get_header(); ?>

	<main class="main">

		<section class="error-404 not-found">
			<div class="container">
				<div class="text-center mt-5">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'monibijoux' ); ?></h1>

					<div class="d-flex align-items-center my-5 justify-content-center">
						<a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="simple-green-btn">Home</a>
						<a class="main-button" href="<?php echo esc_url('/shop/'); ?>" style="margin: 0 0 0 10px; width: 80px">Shop</a>
					</div>
				</div>
			</div><!-- container -->
		</section><!-- error-404 -->

	</main><!-- main -->

<?php get_footer(); ?>
