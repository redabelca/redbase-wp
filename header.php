<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset=<?php bloginfo('charset'); ?>>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
	<?php wp_head(); ?>
</head>

<!-- <body <?php body_class(); ?>> -->
<body>
  <main>
    
		<div class="bg-black-screen"></div>
		
    <div class="sideNav">
      <div class="sideNav-title txt_center">
        <?php if (has_custom_logo()){
          the_custom_logo();
          } else{ ?>
          <h1><?php bloginfo('title'); ?></h1>
        <?php } ?>
        <span class="sideNav-close-btn txt_center">X</span>
      </div>
      <div class="sideNav-bar center"></div>

      <?php 
        wp_nav_menu( array(
          'menu_class' => 'sideNav-items',
          'container' => 'ul',
          'theme_location' => 'sideNav'
          ) );
      ?>
      <div class="sideNav-social">
        <a class="sideNav-social-icon icon-twitter" href="#"></a>
        <a class="sideNav-social-icon icon-facebook" href="#"></a>
        <a class="sideNav-social-icon icon-gplus" href="#"></a>
      </div>
		</div>

    <?php if (!is_single( )){ ?>
    <header class="bg-center" style="background-image:radial-gradient(circle at 50% 50%,hsla(221,50%,15%,.7),hsla(221,50%,15%,.8)), url(<?php header_image(); ?>);">
      <div class="header-nav">
        <?php if (has_custom_logo()){
          the_custom_logo();
          } else{ ?>
          <a class="header-nav-logo" href=<?php echo esc_url( home_url( '/' ) ) ?>> <?php bloginfo( 'title' ); ?> </a>
        <?php } ?>
        <div class="header-nav-humb" id="header-nav-humb">
          <span class="header-nav-humb-bar"></span>
          <span class="header-nav-humb-bar"></span>
          <span class="header-nav-humb-bar"></span>
        </div>
      </div>
      <div class="header-center txt_center">
        <h1><?php bloginfo( 'title' ); ?></h1>
        <h4><?php bloginfo( 'description' ); ?></h4>
      </div>
      <div class="header-btm">
        <div class="header-btm-cpright">
          <h6><?php bloginfo( 'title' );?> &copy; Copyright 2017.</h6>
        </div>
        <div class="header-btm-social">
          <a class="header-btm-social-icon icon-twitter" href="#"></a>
          <a class="header-btm-social-icon icon-gplus" href="#"></a>
          <a class="header-btm-social-icon icon-facebook" href="#"></a>
        </div>
      </div>
    </header>
    <?php } else { ?>
    <section class="post-header bg-center" style="background-image:radial-gradient(circle at 50% 50%,hsla(221,50%,10%,.7),hsla(221,50%,10%,.8)), url(<?php if (has_post_thumbnail()){ echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' )[0]; }else{ header_image(); } ?>);">
      <div class="header-nav">
        <?php if (has_custom_logo()){
          the_custom_logo();
          } else{ ?>
          <a class="header-nav-logo" href=<?php echo esc_url( home_url( '/' ) ) ?>> <?php bloginfo( 'title' ); ?> </a>
        <?php } ?>
        <div class="header-nav-humb" id="header-nav-humb">
          <span class="header-nav-humb-bar"></span>
          <span class="header-nav-humb-bar"></span>
          <span class="header-nav-humb-bar"></span>
        </div>
      </div>
      <?php the_title('<h1>','</h1>'); ?>
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
        </div>
      <?php } ?>
    </section>
    <?php } ?>
		
		<div class="top" id="top"></div>
		
    <nav class="menu2 header-nav">
      <div class="menu2-logo">
        <?php if (has_custom_logo()){
          the_custom_logo();
          } else{ ?>
          <a class="header-nav-logo" href=<?php echo esc_url( home_url( '/' ) ) ?>> <?php bloginfo( 'title' ); ?> </a>
        <?php } ?>
      </div>
      
      <?php 
        wp_nav_menu( array(
          'menu_class' => 'menu2-ul',
          'container' => 'ul',
          'theme_location' => 'secondMenu'
          ) );
      ?>
      <div class="header-nav-humb menu2-humb" id="menu2-humb">
        <span class="header-nav-humb-bar"></span>
        <span class="header-nav-humb-bar"></span>
        <span class="header-nav-humb-bar"></span>
      </div>
    </nav>