<?php get_header(); ?>

	<main class="main">
		<div class="container">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile;
		?>
		
		</div><!-- container -->
	</main><!-- main -->

<?php get_footer(); ?>
