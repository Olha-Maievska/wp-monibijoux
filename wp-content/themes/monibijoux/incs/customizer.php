<?php

add_action( 'customize_register', function ( WP_Customize_Manager $wp_customize ) {

	$wp_customize->add_section( 'monibijoux_theme_options', array(
		'title' => __( 'Theme options', 'woomonibijoux' ),
		'priority' => 10,
	) );

} );