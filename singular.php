<?php get_header(); ?>
<?php while ( have_posts() ) { the_post(); ?>	
	<article class="single-post">
		<?php the_title('<h1 class="single-post-title">','</h1>'); ?>
		<?php if ( 'post' === get_post_type() ){ ?>
			<div class="index-post-meta">
				<div class="meta-ctn">
					<i class="index-post-icon icon-comment"></i>
					<span class="meta-txt"><?php comments_number(); ?></span>
				</div>
				<div class="meta-ctn">
					<i class="index-post-icon icon-calendar"></i>
					<span class="meta-txt"><?php theme_name_posted_on(); ?></span>
				</div>
				<div class="meta-ctn">
					<i class="index-post-icon icon-user"></i>
					<span class="meta-txt">by <?php theme_name_posted_by() ?></span>
				</div>
			</div>
		<?php } ?>
		<div class="single-post-img">
			<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			} ?>
		</div>
		<article class="single-post-content">
			<?php the_content(); ?>
		</article>
		<?php if (is_single()){ ?>
			<div class="aboutBtm">
				<?php echo get_avatar( get_the_author_meta('ID') ); ?>
				<div class="aboutBtm-txt">
					<h5><?php the_author( ); ?></h5>
					<hr>
					<p>Author</p>
					<p><?php echo get_the_author_meta( 'description' ); ?></p>
				</div>
			</div>
			<!-- <div class="comment-respond">
				<h3 class="comment-reply-title">Leave a Reply</h3>
				<form class="comment-form" action="#" method="post">
					<p class="comment-form-comment">
						<label for="comment">Comment</label>
						<textarea id="comment" name="comment" required="required"></textarea>
					</p>
					<p class="form-submit">
						<input class="submit" name="submit" type="submit" value="Post Comment">
					</p>
				</form>
			</div> -->
		<?php } ?>
	</article>
<?php } ?>

<?php 
if (is_single()){
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	} 
}
?>
<?php get_footer(); ?>