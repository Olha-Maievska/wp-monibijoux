<?php
class Monibijoux_Footer_Info_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'monibijoux_footer_info_widget',
			__( 'Monibijoux - footer info widget', 'woomonibijoux' ),
			array( 'description' => __( 'Monibijoux - footer info widget', 'woomonibijoux' ), )
		);

	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		?>
		
		<div class="footer-info">
			<p>
				<?php echo $instance['design-text']; ?>
			</p>
			<a
				class="footer-info-link"
				href="<?php echo $instance['design-link']; ?>"
				target="_blank">
					<?php echo $instance['design-name']; ?>
			</a>
		</div>

		<?php
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$text = ! empty( $instance['design-text'] ) ? $instance['design-text'] : '';
		$name = ! empty( $instance['design-name'] ) ? $instance['design-name'] : '';
		$link = ! empty( $instance['design-link'] ) ? $instance['design-link'] : '';
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'design-text_id' ); ?>">Enter text:</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'design-text_id' ); ?>" name="<?php echo $this->get_field_name( 'design-text' ); ?>" type="text" value="<?php echo esc_attr( $text ); ?>">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'design-name_id' ); ?>">Enter name:</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'design-name_id' ); ?>" name="<?php echo $this->get_field_name( 'design-name' ); ?>" type="text" value="<?php echo esc_attr( $name ); ?>">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'design-link_id' ); ?>">Enter link:</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'design-link_id' ); ?>" name="<?php echo $this->get_field_name( 'design-link' ); ?>" type="text" value="<?php echo esc_attr( $link  ); ?>">
		</p>
		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['design-text'] = ( ! empty( $new_instance['design-text'] ) ) ? strip_tags( $new_instance['design-text'] ) : '';
		$instance['design-name'] = ( ! empty( $new_instance['design-name'] ) ) ? strip_tags( $new_instance['design-name'] ) : '';
		$instance['design-link'] = ( ! empty( $new_instance['design-link'] ) ) ? strip_tags( $new_instance['design-link'] ) : '';

		return $instance;
	}
}

function monibijoux_register_footer_info_widget() {
	register_widget( 'Monibijoux_Footer_Info_Widget' );
}
add_action( 'widgets_init', 'monibijoux_register_footer_info_widget' );