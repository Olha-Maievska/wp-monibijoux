<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<header class="header">

		<?php if ( is_active_sidebar( 'header-top-widget' ) ) : ?>
			<?php dynamic_sidebar( 'header-top-widget' ); ?>
		<?php endif; ?>
		
		<div class="container">
			<div class="header-content">
				<?php
					$logo_img = '';
					if ($custom_logo_id = get_theme_mod('custom_logo')) {
							$logo_img = wp_get_attachment_image($custom_logo_id, 'full', false, array(
									'class'    => 'header-logo',
									'alt' => get_bloginfo('name'),
									'itemprop' => 'logo',
							));
					}
				?>
				<a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="header-logo">
						<?php echo $logo_img; ?>
				</a>

				<button class="burger-btn" id="burger-btn">
					<img src="<?php echo get_template_directory_uri() ?>//assets/images/icons/burger-menu.svg" alt="menu icon" />
				</button>

				<nav class="menu" id="menu">
					<?php 
						wp_nav_menu( array(
							'theme_location' => 'header-menu',
							'container' => false,
							'menu_class' => 'menu-list',
							'walker' => new Monibijoux_Header_Menu(),
						) );
					?>

					<div class="menu-info">
					<?php
						$page_url = home_url('/terms_conditions/');
						echo '<a class="menu-link" href="' . esc_url($page_url) . '">Terms & Conditions</a>';
					?>
					</div>

					<button class="close-btn" id="close-btn">
						<img src="<?php echo get_template_directory_uri() ?>//assets/images/icons/close.svg" alt="button close menu icon" />
					</button>
				</nav>

				<button class="search-btn" type="button" data-bs-toggle="modal" data-bs-target="#searchModal"
				>
					<img src="<?php echo get_template_directory_uri() ?>//assets/images/icons/search.svg" alt="button search icon" />
				</button>

				<a
					class="basket-btn"
					href="<?php echo wc_get_cart_url(); ?>"
				>
					<img
						class="basket-img"
						src="<?php echo get_template_directory_uri() ?>//assets/images/icons/basket.svg"
						alt="cart icon"
					/>
					<span class="basket-count">
						<?php 
							$cart_count = WC()->cart->get_cart_contents_count();
							if ( $cart_count > 0 ) {
									echo $cart_count;
							}
						?>
					</span>
				</a>

					<!-- search modal -->
					<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
						<div class="modal-dialog custom-modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="searchModal">Search for product</h5>	
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<?php aws_get_search_form( true ); ?>
							</div>
						</div>
						</div>
					</div><!-- search modal -->
				</div><!-- header-content -->
		 </div><!-- container -->
	</header>
