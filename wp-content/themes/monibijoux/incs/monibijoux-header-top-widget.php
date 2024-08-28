<?php
class Monibijoux_Header_Top_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'monibijoux_header_top_widget',
			__( 'Monibijoux - header top widget', 'woomonibijoux' ),
			array( 'description' => __( 'Monibijoux - header top widget', 'woomonibijoux' ), )
		);

	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		?>
		<div class="header-top" style="background-color: <?php echo $instance['header_top_background']; ?>; ">
			<div class="container">
				<p> 
					<?php echo $instance['header_top_text']; ?>
				</p>
			</div>
		</div>
		<?php
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$color = ! empty( $instance['header_top_background'] ) ? $instance['header_top_background'] : '';
		$text = ! empty( $instance['header_top_text'] ) ? $instance['header_top_text'] : '';
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'header_top_background_id' ); ?>">Select background color:</label> 
			<input class="clr" id="<?php echo $this->get_field_id( 'header_top_background_id' ); ?>" name="<?php echo $this->get_field_name( 'header_top_background' ); ?>" type="color" value="<?php echo esc_attr( $color ); ?>"
			style="cursor: pointer;"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'header_top_text_id' ); ?>">Enter text:</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'header_top_text_id' ); ?>" name="<?php echo $this->get_field_name( 'header_top_text' ); ?>" type="text" value="<?php echo esc_attr( $text ); ?>">
		</p>
		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['header_top_background'] = ( ! empty( $new_instance['header_top_background'] ) ) ? strip_tags( $new_instance['header_top_background'] ) : '';
		$instance['header_top_text'] = ( ! empty( $new_instance['header_top_text'] ) ) ? strip_tags( $new_instance['header_top_text'] ) : '';

		return $instance;
	}
}

function monibijoux_register_header_top_widget() {
	register_widget( 'Monibijoux_Header_Top_Widget' );
}
add_action( 'widgets_init', 'monibijoux_register_header_top_widget' );