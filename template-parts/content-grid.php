<h1 class="index-postGrid-h center">Blog Posts</h1>
<?php if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
      <div class="clm-4 clm-6-mdm">
        <article class="index-post index-postGrid">
          <a class="index-post-thumb" href=<?php the_permalink(); ?>>
            <?php if ( has_post_thumbnail() ) {
              the_post_thumbnail();
            }else{ ?>
              <img src="#" alt="Blank Image" class="img">
            <?php } ?>
          </a>
          <a class="index-post-readMoreBtn icon-right-open" href=<?php the_permalink(); ?>></a>
          <a href=<?php the_permalink(); ?>>
            <?php the_title('<h3 class="index-post-title">','</h3>'); ?>
          </a>
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
            <div class="index-post-excerpt">
              <?php the_excerpt(); ?>
            </div>
            <!-- <?php theme_name_entry_footer(); ?> -->
        </article>
      </div>
    <?php endwhile;
  else :
    get_template_part( 'template-parts/content', 'none' );
endif; ?>
