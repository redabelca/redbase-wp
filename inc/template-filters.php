<?php

/**
 * Change Read More Link
 */
// function custom_read_more_link() {
// 	return '<a href="' . get_permalink() . '">Read More</a>';
// }
// add_filter( 'the_content_more_link', 'custom_read_more_link' );
function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 99 );
/**
	* Change More Excerpt
*/
// function custom_more_excerpt( $more ) {
//  return '...';
// }
// add_filter( 'excerpt_more', 'custom_more_excerpt' );
function custom_post_thumbnail($imgTag){
	return str_replace('class="','class="img ',$imgTag);
}
add_filter( 'post_thumbnail_html', 'custom_post_thumbnail' );
function custom_avatar($img){
	return str_replace('class=\'','class=\'aboutBtm-img ',$img);
}
add_filter( 'get_avatar', 'custom_avatar' );
// function custom_script ($scr){
// 	return str_replace('<script','<script async',$scr);
// }
// add_filter( 'script_loader_tag', 'custom_script' );
/**
 * Disable Emoji Mess
 */
function disable_wp_emojicons() {
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
	add_filter( 'emoji_svg_url', '__return_false' );
}
function disable_emojicons_tinymce( $plugins ) {
	return is_array( $plugins ) ? array_diff( $plugins, array( 'wpemoji' ) ) : array();
}
add_action( 'init', 'disable_wp_emojicons' );
/**
 * Escape HTML in <code> or <pre><code> tags.
 */
 
function escapeHTML($arr) {
	if (version_compare(PHP_VERSION, '5.2.3') >= 0) {
		$output = htmlspecialchars($arr[2], ENT_NOQUOTES, get_bloginfo('charset'), false);
	}
	else {
		$specialChars = array(
			'&' => '&amp;',
			'<' => '&lt;',
			'>' => '&gt;'
		);
		// decode already converted data
		$data = htmlspecialchars_decode( $arr[2] );
		// escapse all data inside <pre>
		$output = strtr( $data, $specialChars );
	}
	if (! empty($output)) {
		return  $arr[1] . $output . $arr[3];
	}	else 	{
		return  $arr[1] . $arr[2] . $arr[3];
	}
}
function filterCode($data) { // Uncomment if you want to escape anything within a <pre> tag
	//$modifiedData = preg_replace_callback( '@(<pre.*>)(.*)(<\/pre>)@isU', 'escapeHTML', $data );
	$modifiedData = preg_replace_callback( '@(<code.*>)(.*)(<\/code>)@isU', 'escapeHTML', $data );
	$modifiedData = preg_replace_callback( '@(<tt.*>)(.*)(<\/tt>)@isU', 'escapeHTML', $modifiedData );
	return $modifiedData;
}
add_filter( 'content_save_pre', 'filterCode', 9 );
add_filter( 'excerpt_save_pre', 'filterCode', 9 );
function theme_name_remove_version() {
  return '';
}
add_filter('the_generator', 'theme_name_remove_version');
/**
 * Remove Query String from Static Resources 
 */
function remove_cssjs_ver( $src ) {
	if( strpos( $src, '?ver=' ) )
	$src = remove_query_arg( 'ver', $src );
	return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );
?>