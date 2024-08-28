<?php
class Monibijoux_Discover_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'monibijoux_discover_widget',
			__( 'Monibijoux - discover widget', 'woomonibijoux' ),
			array( 'description' => __( 'Monibijoux - discover widget', 'woomonibijoux' ), )
		);

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_media_script' ) );
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( ! empty( $instance['discover_image_url'] ) ) {
			$alt = ! empty( $instance['discover_image_alt'] ) ? $instance['discover_image_alt'] : '';
			echo '<img class="discover-img" src="' . esc_url( $instance['discover_image_url'] ) . '" alt="' . esc_attr( $alt ) . '">';
		}
		?>
		<div class="discover-filter"></div>
		<div class="discover-content">
			<p class="wow animate__animated animate__fadeInLeft">
				<?php echo esc_html( $instance['discover_text'] ); ?>
			</p>
			<a class="main-button wow animate__animated animate__fadeInRight" href="<?php echo esc_url('/new-in/'); ?>">
				New in
			</a>
		</div>
		<?php
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$image_url = ! empty( $instance['discover_image_url'] ) ? $instance['discover_image_url'] : '';
		$image_alt = ! empty( $instance['discover_image_alt'] ) ? $instance['discover_image_alt'] : '';
		$text = ! empty( $instance['discover_text'] ) ? $instance['discover_text'] : '';

?>
		<p>
			<label for="<?php echo $this->get_field_id( 'discover_image_url_id' ); ?>"><?php _e( 'Image URL:', 'woomonibijoux' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'discover_image_url_id' ); ?>" name="<?php echo $this->get_field_name( 'discover_image_url' ); ?>" type="text" value="<?php echo esc_url( $image_url ); ?>" />
			<button class="upload_image_button button button-primary"><?php _e( 'Select Image', 'woomonibijoux' ); ?></button>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'discover_image_alt_id' ); ?>"><?php _e( 'Alt Text:', 'woomonibijoux' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'discover_image_alt_id' ); ?>" name="<?php echo $this->get_field_name( 'discover_image_alt' ); ?>" type="text" value="<?php echo esc_attr( $image_alt ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'discover_text_id' ); ?>">Enter text:</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'discover_text_id' ); ?>" name="<?php echo $this->get_field_name( 'discover_text' ); ?>" type="text" value="<?php echo esc_attr( $text ); ?>">
		</p>
<?php 
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['discover_image_url'] = ( ! empty( $new_instance['discover_image_url'] ) ) ? esc_url_raw( $new_instance['discover_image_url'] ) : '';
		$instance['discover_image_alt'] = ( ! empty( $new_instance['discover_image_alt'] ) ) ? strip_tags( $new_instance['discover_image_alt'] ) : '';
		$instance['discover_text'] = ( ! empty( $new_instance['discover_text'] ) ) ? strip_tags( $new_instance['discover_text'] ) : '';

		return $instance;
	}

	public function enqueue_media_script() {
		wp_enqueue_media();
		wp_enqueue_script('media-upload-script', get_template_directory_uri() . '/assets/js/img-widget-scripts.js', array('jquery'), null, true);
	}
}

function monibijoux_register_discover_widget() {
	register_widget( 'Monibijoux_Discover_Widget' );
}
add_action( 'widgets_init', 'monibijoux_register_discover_widget' );