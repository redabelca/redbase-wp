<?php get_header(); 
	$blogLayout=get_theme_mod( 'layout-variation');
?>

<div id="layout-variation" class="row <?php echo $blogLayout!='grid'?'posts-index':'index-postGrid-ctn center'; ?>">
	<?php theme_name_layout_style(); ?>
</div>

<?php ($blogLayout=='grid'||$blogLayout=='lst')&&the_posts_pagination(); ?>

<?php get_footer(); ?>