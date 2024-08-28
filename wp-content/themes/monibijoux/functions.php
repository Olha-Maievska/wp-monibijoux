<?php 

add_action( 'after_setup_theme', function() {
  load_textdomain( 'woomonibijoux', get_template_directory() . '/languages' );

  add_theme_support( 'woocommerce' );
  add_theme_support( 'wc-product-gallery-lightbox' );
  add_theme_support( 'wc-product-gallery-slider' );

  add_theme_support( 'post-thumbnail' );
  add_theme_support( 'title-tag' );

  add_theme_support( 'custom-logo' );

  add_theme_support( 'widgets' );

  register_nav_menus(
    array(
      'header-menu' => __( 'Header menu', 'monibijoux' ),
    )
  );

} );

add_action( 'wp_enqueue_scripts', function() {
  wp_enqueue_style( 'woomonibijoux-google-fonts', 'https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap' );

  wp_enqueue_style( 'woomonibijoux-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' );

  wp_enqueue_style( 'woomonibijoux-animatecss', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css' );

  wp_enqueue_style( 'woomonibijoux-swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css' );

  wp_enqueue_style( 'woomonibijoux-style', get_template_directory_uri() . '/style.css', array( 'woocommerce-general' ), '1.0' );

  wp_enqueue_style( 'woomonibijoux-main', get_template_directory_uri() . '/assets/css/main.css', array( 'woocommerce-general' ), '1.0' );

  wp_enqueue_style( 'woomonibijoux-style-media', get_template_directory_uri() . '/assets/css/media.css', array( 'woocommerce-general' ), '1.0' );

  wp_enqueue_script( 'jquery' );

  wp_enqueue_script( 'woomonibijoux-wow', get_theme_file_uri() . '/assets/js/wow.min.js', array(), '', true );

  wp_enqueue_script( 'woomonibijoux-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', array( 'jquery' ), false, true );

  wp_enqueue_script('woomonibijoux-swiper-script', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '', true );

  wp_enqueue_script( 'woomonibijoux-subscribe', get_theme_file_uri() . '/assets/js/subscribe-form.js', array(), false, true );

  wp_enqueue_script( 'woomonibijoux-main', get_theme_file_uri() . '/assets/js/main.js', array(), false, true );

} );

// enqueue script to activate WOW.js
add_action( 'wp_enqueue_scripts', 'sk_wow_init_in_footer' );

function sk_wow_init_in_footer() {
    add_action( 'print_footer_scripts', 'wow_init' );
}

// add wow_init javaScript before </body>
function wow_init() { ?>
    <script type="text/javascript">
        new WOW().init();
    </script>
<?php }

// add custom class for centers the loader in woocommerce add-to-cart-button
function custom_loader_styles_script() {
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('body').on('click', '.ajax_add_to_cart', function() {
                $(this).addClass('loading-custom');
            });

            $('body').on('added_to_cart', function() {
                $('.ajax_add_to_cart').removeClass('loading-custom');
            });
        });
    </script>
    <?php
}
add_action('wp_footer', 'custom_loader_styles_script');

// register custom widgets
function woomonibijoux_register_widgets() {
    // header top widget
    register_sidebar( array(
        'name'          => __( 'Text in the header above', 'woomonibijoux' ),
        'id'            => 'header-top-widget',
        'description'   => __( 'Text in the header above', 'woomonibijoux' ),
        'before_widget' => null,
        'after_widget'  => null, 
    ) );

    // intro section widget
    register_sidebar( array(
        'name'          => __( 'Intro section', 'woomonibijoux' ),
        'id'            => 'intro-widget',
        'description'   => __( 'Intro section', 'woomonibijoux' ),
        'before_widget' => null,
        'after_widget'  => null,
    ) );

    // subscribe section widget
    register_sidebar( array(
        'name'          => __( 'Subscribe section', 'woomonibijoux' ),
        'id'            => 'subscribe-widget',
        'description'   => __( 'Subscribe section', 'woomonibijoux' ),
        'before_widget' => null,
        'after_widget'  => null, 
    ) );

    // discover section widget
    register_sidebar( array(
        'name'          => __( 'Discover section', 'woomonibijoux' ),
        'id'            => 'discover-widget',
        'description'   => __( 'Discover section', 'woomonibijoux' ),
        'before_widget' => null,
        'after_widget'  => null,
    ) );

    // footer info design widget
    register_sidebar( array(
        'name'          => __( 'Graphic design info in the footer', 'woomonibijoux' ),
        'id'            => 'graphic-design-widget',
        'description'   => __( 'Graphic design info in the footer', 'woomonibijoux' ),
        'before_widget' => null,
        'after_widget'  => null, 
    ) );

    // footer info photo widget
    register_sidebar( array(
        'name'          => __( 'Photo credit info in the footer', 'woomonibijoux' ),
        'id'            => 'photo-credit-widget',
        'description'   => __( 'Photo credit info in the footer', 'woomonibijoux' ),
        'before_widget' => null,
        'after_widget'  => null, 
    ) );

    // footer social links widget
    register_sidebar( array(
        'name'          => __( 'Social links in the footer', 'woomonibijoux' ),
        'id'            => 'footer-social-links-widget',
        'description'   => __( 'Social links in the footer', 'woomonibijoux' ),
        'before_widget' => null,
        'after_widget'  => null, 
    ) );
}
add_action( 'widgets_init', 'woomonibijoux_register_widgets' );

$links = [
    'woocommerce-hooks.php',
    'customizer.php',
    'cpt.php',
    'monibijoux-header-menu.php',
    'monibijoux-discover-widget.php',
    'monibijoux-intro-widget.php',
    'monibijoux-subscribe-widget.php',
    'monibijoux-header-top-widget.php',
    'monibijoux-footer-info-widget.php',
    'monibijoux-social-links-widget.php',
];

foreach( $links as $l) {
    require_once( __DIR__ . '/incs/' . $l );
};