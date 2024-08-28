<?php
class Monibijoux_Intro_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'monibijoux_intro_widget',
			__( 'Monibijoux - intro section', 'woomonibijoux' ),
			array( 'description' => __( 'Monibijoux - intro section', 'woomonibijoux' ), )
		);

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_media_script' ) );

	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( ! empty( $instance['intro_image_url'] ) ) {
			$alt = ! empty( $instance['discover_image_alt'] ) ? $instance['intro_image_alt'] : '';
			echo '<img class="intro-bg" src="' . esc_url( $instance['intro_image_url'] ) . '" alt="' . esc_attr( $alt ) . '">';
		}
?>
		<div class="intro-content" style="background-color: <?php echo $instance['intro_background']; ?>; ">
			<div class="intro-wrapper">
				<img
					class="letter-b"
					src="<?php echo get_template_directory_uri() ?>//assets/images/icons/symbol.svg"
					alt="symbol B"
				/>
				<h1 class="intro-title">
					<?php echo $instance['intro_title'] ?>
				</h1>
				<a class="main-button" href="<?php echo esc_url('/shop/'); ?>">Shop now</a>
			</div>
		</div>
<?php
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$title = ! empty( $instance['intro_title'] ) ? $instance['intro_title'] : '';
		$alt = ! empty( $instance['intro_image_alt'] ) ? $instance['intro_image_alt'] : '';
		$src = ! empty( $instance['intro_image_url'] ) ? $instance['intro_image_url'] : '';
		$color = ! empty( $instance['intro_background'] ) ? $instance['intro_background'] : '';
?>

		<p>
			<label for="<?php echo $this->get_field_id( 'intro_image_url_id' ); ?>"><?php _e( 'Select image', 'woomonibijoux' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'intro_image_url_id' ); ?>" name="<?php echo $this->get_field_name( 'intro_image_url' ); ?>" type="text" value="<?php echo esc_url( $src ); ?>" />
			<button class="upload_intro_image_button button button-primary"><?php _e( 'Select Image', 'woomonibijoux' ); ?></button>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'intro_image_alt_id' ); ?>"><?php _e( 'Enter alt for image:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'intro_image_alt_id' ); ?>" name="<?php echo $this->get_field_name( 'intro_image_alt' ); ?>" type="text" value="<?php echo esc_attr( $alt ); ?>">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'intro_background_id' ); ?>">Select background color:</label> 
			<input class="clr" id="<?php echo $this->get_field_id( 'intro_background_id' ); ?>" name="<?php echo $this->get_field_name( 'intro_background' ); ?>" type="color" value="<?php echo esc_attr( $color ); ?>"
			style="cursor: pointer;"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'intro_title_id' ); ?>"><?php _e( 'Enter title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'intro_title_id' ); ?>" name="<?php echo $this->get_field_name( 'intro_title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
<?php 
		}

	public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

		public function enqueue_media_script() {
		wp_enqueue_media();
		wp_enqueue_script('media-upload-script', get_template_directory_uri() . '/assets/js/img-widget-scripts.js', array('jquery'), null, true);
	}

}

function monibijoux_register_intro_widget() {
	register_widget( 'Monibijoux_Intro_Widget' );
}
add_action( 'widgets_init', 'monibijoux_register_intro_widget' );