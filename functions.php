<?php

if ( ! function_exists( 'theme_name_setup' ) ) {
	function theme_name_setup() {
		load_theme_textdomain( 'theme_name', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 400, 400, true );
		add_image_size( 'theme_name-small-thumbnails', 55, 55, true );

		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-slider' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support( 'post-formats', array( 'aside', 'gallery','link','image','quote','status','video','audio','chat' ) );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 150,
			'flex-width'  => false,
			'flex-height' => false,
		) );
	}
}
add_action( 'after_setup_theme', 'theme_name_setup' );
function theme_name_menus(){
	register_nav_menus( array(
		'sideNav' => esc_html__( 'Side Navigation', 'theme_name' ),
		'secondMenu' => esc_html__( 'Second Menu', 'theme_name' )
	) );
}
add_action( 'init', 'theme_name_menus');
function theme_name_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'theme_name' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'theme_name' ),
		'before_title'  => '<h1 class="widgettitle">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'theme_name_widgets_init' );
function theme_name_scripts() {
	wp_enqueue_style( 'theme_name-style', get_stylesheet_uri() );
	wp_enqueue_style( 'theme_name-flaticon', get_template_directory_uri().'/fonts/flaticon/font/flaticon.css' );
	wp_enqueue_style( 'theme_name-fontello', get_template_directory_uri().'/fonts/fontello/css/fontello.css' );
	wp_enqueue_style( 'theme_name-fonts', '//fonts.googleapis.com/css?family=Noto+Sans:400,700|Dancing+Script:400|Roboto:400,500,700&text=ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890%20%21%28%29%3F',false,NULL );

	wp_enqueue_script( 'theme_name-main', get_template_directory_uri() . '/js/main.js',  array (), NULL, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );
function theme_name_rmvEmbed_scripts(){
	if(is_home()||is_404()||is_front_page()) {
		wp_dequeue_script( 'wp-embed' );
	}
}
 add_action( 'wp_footer', 'theme_name_rmvEmbed_scripts' );
/**
 * Disable xmlrpc.php
 */
add_filter( 'xmlrpc_enabled', '__return_false' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
/**
 * Optimize WooCommerce Scripts
 * Remove WooCommerce Generator tag, styles, and scripts from non WooCommerce pages.
 */
function child_manage_woocommerce_styles() {
	//remove generator meta tag
	remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );
	//first check that woo exists to prevent fatal errors
	if ( function_exists( 'is_woocommerce' ) ) {
		//dequeue scripts and styles
		if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() && !is_shop() && !is_product() ) {
			wp_dequeue_style('woocommerce-smallscreen');
			wp_dequeue_style('woocommerce-general');
			wp_dequeue_style('woocommerce-layout');
			wp_dequeue_style( 'woocommerce_frontend_styles' );
			wp_dequeue_style( 'woocommerce_fancybox_styles' );
			wp_dequeue_style( 'woocommerce_chosen_styles' );
			wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
			wp_dequeue_script( 'wc_price_slider' );
			wp_dequeue_script( 'wc-single-product' );
			wp_dequeue_script( 'wc-add-to-cart' );
			wp_dequeue_script( 'wc-cart-fragments' );
			wp_dequeue_script( 'wc-checkout' );
			wp_dequeue_script( 'wc-add-to-cart-variation' );
			wp_dequeue_script( 'wc-single-product' );
			wp_dequeue_script( 'wc-cart' );
			wp_dequeue_script( 'wc-chosen' );
			wp_dequeue_script( 'woocommerce' );
			wp_dequeue_script( 'prettyPhoto' );
			wp_dequeue_script( 'prettyPhoto-init' );
			wp_dequeue_script( 'jquery-blockui' );
			wp_dequeue_script( 'jquery-placeholder' );
			wp_dequeue_script( 'fancybox' );
			wp_dequeue_script( 'jqueryui' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'child_manage_woocommerce_styles', 99 );


// require get_template_directory() . '/inc/template-widgets.php';
require get_template_directory() . '/inc/template-filters.php';
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
/**
 * Functions which enhance the theme by hooking into WordPress.
 */
// require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';
/**
 * Load Jetpack compatibility file.
 */
// if ( defined( 'JETPACK__VERSION' ) ) {
// 	require get_template_directory() . '/inc/jetpack.php';
// }