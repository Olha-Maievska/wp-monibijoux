<?php
class Monibijoux_Subscribe_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'monibijoux_subscribes_widget',
			__( 'Monibijoux - subscribe widget', 'woomonibijoux' ),
			array( 'description' => __( 'Monibijoux - subscribe widget', 'woomonibijoux' ), )
		);

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_media_script' ) );

	}

		public function widget( $args, $instance ) {
			echo $args['before_widget'];

?>

			<h4 class="subscribe-title"><?php echo $instance['subscribe_title'] ?></h4>

			<div class="tnp tnp-subscription">
				<form
						class="subscribe-form"
						id="newsletter_form"
						method="post"
				>
						<input type="hidden" name="nlang" value="" />
						<input
								class="subscribe-input"
								type="email"
								name="ne"
								value=""
								placeholder="email"
								required
						/>
						<button class="main-button tnp-field tnp-field-button" id="subscribe_button" type="submit">
								Subscribe
						</button>
				</form>
				<div id="newsletter_message" class="subscribe-message"></div>
			</div>

			<p class="subscribe-text">
					<?php echo $instance['subscribe_text'] ?>
			</p>

<?php
			echo $args['after_widget'];
		}

		public function form( $instance ) {
			$title = ! empty( $instance['subscribe_title'] ) ? $instance['subscribe_title'] : '';
			$text = ! empty( $instance['subscribe_text'] ) ? $instance['subscribe_text'] : '';

?>
			<p>
				<label for="<?php echo $this->get_field_id( 'subscribe_title_id' ); ?>">Enter title:</label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'subscribe_title_id' ); ?>" name="<?php echo $this->get_field_name( 'subscribe_title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'subscribe_text_id' ); ?>">Enter text:</label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'subscribe_text_id' ); ?>" name="<?php echo $this->get_field_name( 'subscribe_text' ); ?>" type="text" value="<?php echo esc_attr( $text ); ?>">
			</p>

<?php 
		}

		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['subscribe_title'] = ( ! empty( $new_instance['subscribe_title'] ) ) ? strip_tags( $new_instance['subscribe_title'] ) : '';
			$instance['subscribe_text'] = ( ! empty( $new_instance['subscribe_text'] ) ) ? strip_tags( $new_instance['subscribe_text'] ) : '';

			return $instance;
		}

		public function enqueue_media_script() {
			wp_enqueue_media();
			wp_enqueue_script('media-upload-script', get_template_directory_uri() . '/assets/js/img-widget-scripts.js', array('jquery'), null, true);
		}

}

function monibijoux_register_subscribe_widget() {
	register_widget( 'Monibijoux_Subscribe_Widget' );
}
add_action( 'widgets_init', 'monibijoux_register_subscribe_widget' );