<?php
// <?php the_header_image_tag();

function theme_name_custom_header_setup() {
	add_theme_support( 'custom-header', array(
		// 'default-image'          => '',
		// 'default-text-color'     => '000000',
		'width'                  => 1600,
		'height'                 => 900,
		'flex-height'            => true,
		// 'wp-head-callback'       => 'theme_name_header_style'
	) );
}
add_action( 'after_setup_theme', 'theme_name_custom_header_setup' );

if ( ! function_exists( 'theme_name_header_style' ) ) {
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see theme_name_custom_header_setup().
	 */
	function theme_name_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}
		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
		?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}
}