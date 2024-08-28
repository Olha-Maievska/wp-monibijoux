<?php

add_action( 'init', function () {

  register_post_type( 'reviews-slider', array(
	'labels' => array( 
	  'name' => __( 'Reviews slider', 'woomonibijoux' ),
	  'singular_name' => __( 'Reviews slider', 'woomonibijoux' ),
	  'add_new' => __( 'Add new slide', 'woomonibijoux' ),
	  'add_new_item' => __( 'New slide', 'woomonibijoux' ),
	  'edit_item' => __( 'Edit', 'woomonibijoux' ),
	  'new_item' => __( 'New slide', 'woomonibijoux' ),
	  'view_item' => __( 'View', 'woomonibijoux' ),
	  'menu_name' => __( 'Reviews slider', 'woomonibijoux' ),
	  'all_items' => __( 'All slides', 'woomonibijoux' ),
	 ),
	'public' => true,
	'supports' => array( 'title', 'editor', 'thumbnail', ),
	'show_in_rest' => true,
	'menu_icon' => 'dashicons-format-gallery',
  ) );

} );

function custom_meta_box() {
	add_meta_box(
		'custom_meta_box',
		'Rating',
		'custom_meta_box_callback',
		'reviews-slider',
		'normal',
		'high'
	);
}
add_action('add_meta_boxes', 'custom_meta_box');

function custom_meta_box_callback($post) {
	$custom_number = get_post_meta($post->ID, '_custom_number', true);
	
	wp_nonce_field('custom_meta_box_nonce', 'custom_meta_box_nonce_field');

	echo '
		<style>
			.custom-meta-box-container {
				text-align: center;
			}
			.custom-meta-box-container label {
				display: block;
				font-size: 16px;
				margin-bottom: 10px;
			}
			.custom-meta-box-container input {
				font-size: 16px;
				padding: 5px;
				width: 60px;
				text-align: center;
			}
		</style>
	';
	
	echo '<div class="custom-meta-box-container">';
	echo '<label for="custom_number">Rating (1 to 5):</label>';
	echo '<input type="number" id="custom_number" name="custom_number" value="' . esc_attr($custom_number) . '" min="1" max="5" />';
	echo '</div>';
}

function save_custom_meta_box($post_id) {
	if (!isset($_POST['custom_meta_box_nonce_field']) || !wp_verify_nonce($_POST['custom_meta_box_nonce_field'], 'custom_meta_box_nonce')) {
		return;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	if (!current_user_can('edit_post', $post_id)) {
		return;
	}

	if (isset($_POST['custom_number'])) {
		update_post_meta($post_id, '_custom_number', intval($_POST['custom_number']));
	}
}
add_action('save_post', 'save_custom_meta_box');