<?php

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);
remove_action( 'woocommerce_before_single_product', 'woocommerce_output_all_notices', 10);
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 ); 
remove_action( 'woocommerce_before_single_product_summary', ' woocommerce_show_product_sale_flash', 10 );
remove_action( 'woocommerce_single_product_summary', ' woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_after_single_product_summary', ' woocommerce_output_related_products', 20 );

// change title
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', function() {
    global $product;

    echo '<h4>
         <a class="custom-product-name" href="' . $product->get_permalink() . '">' . $product->get_title() . '</a>
        </h4>';
  
} );

// remove view cart button in product
add_action( 'wp_footer', function () {
    wc_enqueue_js( "
        $( document.body ).on('wc_cart_button_updated', function(){
            $('.added_to_cart.wc-forward').remove();
        });
    " );
} );


// show cart total Ajax
add_filter( 'woocommerce_add_to_cart_fragments', function ( $fragments ) {
    $cart_count = count( WC()->cart->get_cart() );

    if ( $cart_count > 0 ) {
        $fragments['span.basket-count'] = '<span class="basket-count">' . $cart_count . '</span>';
    } else {
        $fragments['span.basket-count'] = '<span class="basket-count"></span>';
    }

    return $fragments;
} );

// change single page product price and set SKU
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', function() {
    global $product;
?>
    <div class="d-flex justify-content-between align-items-center">
<?php
        echo '<p class="single-product-page-price">' . $product->get_price_html() . '</p>';
        if ( $product->get_sku() ) {
            echo '<p class="single-product-page-sku">SKU: <span>' . esc_html( $product->get_sku() ) . '</span></p>';
        } else {
            echo '<p class="single-product-page-sku">SKU: <span>not specified</span></p>';
        }
?>
    </div>
<?php
} );

// remove short description and set full description on single product page
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', function() {
    global $product;
    $full_description = $product->get_description();

    echo '<p class="single-product-page-description ">' . $full_description . '</p>';

} );

// chahge categories title on single product page
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', function() {
    global $product;

    if ( $product ) {
        $categories = wc_get_product_category_list( $product->get_id(), ', ', '<p style="font-weight: 600; margin-top: 15px">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' 
        <span class="posted_in" style="font-weight: 400;">', '</span></p>' );

        echo $categories;
    }
}, 41 );

// delete tabs on single product page
add_filter( 'woocommerce_product_tabs', function( $tabs ) {
    unset( $tabs['description'] );
    unset( $tabs['additional_information'] );
    unset( $tabs['reviews'] );

    return $tabs;
}, 98 );
