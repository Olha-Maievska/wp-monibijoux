<?php
class Monibijoux_Socials_Links_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'monibijoux_socials_links_widget',
			__( 'Monibijoux - social links', 'woomonibijoux' ),
			array( 'description' => __( 'Monibijoux - social links', 'woomonibijoux' ), )
		);

	}

	private $socials = [
		'fb' => [
			'Facebook',
			'<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0,0,256,256">
			<g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M41,4h-32c-2.76,0 -5,2.24 -5,5v32c0,2.76 2.24,5 5,5h32c2.76,0 5,-2.24 5,-5v-32c0,-2.76 -2.24,-5 -5,-5zM37,19h-2c-2.14,0 -3,0.5 -3,2v3h5l-1,5h-4v15h-5v-15h-4v-5h4v-3c0,-4 2,-7 6,-7c2.9,0 4,1 4,1z"></path></g></g>
			</svg>',
		],
		'insta' => [
			'Instagram',
			'<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0,0,256,256">
			<g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(8.53333,8.53333)"><path d="M9.99805,3c-3.859,0 -6.99805,3.14195 -6.99805,7.00195v10c0,3.859 3.14195,6.99805 7.00195,6.99805h10c3.859,0 6.99805,-3.14195 6.99805,-7.00195v-10c0,-3.859 -3.14195,-6.99805 -7.00195,-6.99805zM22,7c0.552,0 1,0.448 1,1c0,0.552 -0.448,1 -1,1c-0.552,0 -1,-0.448 -1,-1c0,-0.552 0.448,-1 1,-1zM15,9c3.309,0 6,2.691 6,6c0,3.309 -2.691,6 -6,6c-3.309,0 -6,-2.691 -6,-6c0,-3.309 2.691,-6 6,-6zM15,11c-2.20914,0 -4,1.79086 -4,4c0,2.20914 1.79086,4 4,4c2.20914,0 4,-1.79086 4,-4c0,-2.20914 -1.79086,-4 -4,-4z"></path></g></g>
			</svg>',
		],
		'tiktok' => [
			'Tiktok',
			'<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0,0,256,256">
			<g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M41,4h-32c-2.757,0 -5,2.243 -5,5v32c0,2.757 2.243,5 5,5h32c2.757,0 5,-2.243 5,-5v-32c0,-2.757 -2.243,-5 -5,-5zM37.006,22.323c-0.227,0.021 -0.457,0.035 -0.69,0.035c-2.623,0 -4.928,-1.349 -6.269,-3.388c0,5.349 0,11.435 0,11.537c0,4.709 -3.818,8.527 -8.527,8.527c-4.709,0 -8.527,-3.818 -8.527,-8.527c0,-4.709 3.818,-8.527 8.527,-8.527c0.178,0 0.352,0.016 0.527,0.027v4.202c-0.175,-0.021 -0.347,-0.053 -0.527,-0.053c-2.404,0 -4.352,1.948 -4.352,4.352c0,2.404 1.948,4.352 4.352,4.352c2.404,0 4.527,-1.894 4.527,-4.298c0,-0.095 0.042,-19.594 0.042,-19.594h4.016c0.378,3.591 3.277,6.425 6.901,6.685z"></path></g></g>
			</svg>',
		],
	];

	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		$slug = $instance['social-slug'];
		$link = $instance['social-link'];
		$svg = $this->socials[$slug][1];
?>
		<li class="footer-social-item">
			<a class="footer-social-link" href="<?php echo $link; ?>" target="_blank">
				<?php echo $svg; ?>
			</a>
		</li>
<?php
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'social-link-id' ); ?>">Social network link: </label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'social-link-id' ); ?>" name="<?php echo $this->get_field_name( 'social-link' ); ?>" type="text" value="<?php echo $instance['social-link']; ?>">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'social-slug-id' ); ?>">Select social network:</label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'social-slug-id' ); ?>" name="<?php echo $this->get_field_name( 'social-slug' ); ?>" >
				<?php foreach ( $this->socials as $slug => $social) : ?>
					<option 
						value="<?php echo $slug; ?>"
						<?php selected( $instance['social-slug'], $slug, true ); ?>
					>
						<?php echo $social[0]; ?>
					</option>
				<?php endforeach; ?>
			</select>
		</p>
		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}
}

function monibijoux_register_social_links_widget() {
	register_widget( 'Monibijoux_Socials_Links_Widget' );
}
add_action( 'widgets_init', 'monibijoux_register_social_links_widget' );