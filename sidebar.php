<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package THEME_NAME
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<div class="clm-4 post-index_gridPadding">
  <aside class="sidebar sidebar-singlePost">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside>
</div>