<?php

function theme_name_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	// $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.header-nav-logo, .header-center.txt_center h1',
			'render_callback' => 'theme_name_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.header-center.txt_center h4',
			'render_callback' => 'theme_name_customize_partial_blogdescription',
		) );
	}

	$wp_customize->add_section( 'layout-variation' , array(
    'title'      => __( 'Layout Styles', '' ),
		'priority'   => 1,
		'active_callback' =>'is_home'
	) );
	$wp_customize->add_setting( 'layout-variation' , array(
    'default'   => 'grid-2-sdbr',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( 'layout-variation', array(
		'label'      => __( 'Layout Style', '' ),
		'section'    => 'layout-variation',
		'type' => 'radio',
		'choices' => array(
			'grid-sdbr'=>__('Grid ( 1 Column ) With Sidebar',''),
			'grid-2-sdbr'=>__('Grid ( 2 Column ) With Sidebar',''),
			'grid'=>__('Grid ( 3 Column )',''),
			'lst'=>__('List',''),
			'lst-sdbr'=>__('List With Column','')
		)
	) );
	
/*
	$wp_customize->add_section( 'theme_name_1' , array(
    'title'      => __( 'Visible Section Name', 'mytheme' ),
		// 'description' =>'',
		'priority'   => 5,
		// This optional argument can show or hide section based on currently viewed page
		// 'active_callback' =>'is_front_page'
	) );
	$wp_customize->add_setting( 'theme_name_1_settingID' , array(
    'default'   => 'this is setting default',
		'transport' => 'refresh',
		// sanitize_callback
		// Optional. A function name to call for sanitizing the input value for this setting. The function should be of the form of a standard filter function, where it accepts the input data and returns the sanitized data.
		// sanitize_js_callback
		// Optional. A function name to call for sanitizing the value for this setting for the purposes of outputting to javascript code. The function should be of the form of a standard filter function, where it accepts the input data and returns the sanitized data. This is only necessary if the data to be sent to the customizer window has a special form.
	) );
	$wp_customize->add_control( 'theme_name_1_settingID', array(
		
		// new WP_Customize_Cropped_Image_Control()
		// new WP_Customize_Media_Control()
		// new WP_Customize_Control()
		// Creates a control that allows users to enter plain text. This is also the parent class for the classes that follow.
		// new WP_Customize_Color_Control()
		// Creates a control that allows users to select a color from a color wheel.
		// new WP_Customize_Upload_Control()
		// Creates a control that allows users to upload media.
		// new WP_Customize_Image_Control()
		// Creates a control that allows users to select or upload an image.
		// new WP_Customize_Background_Image_Control()
		// Creates a control that allows users to select a new background image.
		// new WP_Customize_Header_Image_Control()
		// Creates a control that allows users to select a new header image.

		'label'      => __( 'H', '' ),
		// 'description' => __( '', '' ),
		'priority'   => 5,		
		'section'    => 'theme_name_1',
		'type' => 'radio',
		'choices'        => array(
				'yes'   => __( 'Yes' ),
				'no'  => __( 'LLa No ' )
		)
		// 'input_attrs' => array( 
		// 	'min' => 0, 
		// 	'max' => 10, 
		// 	'step'  => 2 
		// )
		// 'type'           => 'radio'or 'select',
		// 'choices'        => array(
		// 		'dark'   => __( 'Dark' ),
		// 		'light'  => __( 'Light' )
		// )
	) );
*/
}
add_action( 'customize_register', 'theme_name_customize_register' );

function theme_name_customize_partial_blogname() {
	bloginfo( 'name' );
}
function theme_name_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
function theme_name_layout_style(){
	get_template_part( 'template-parts/content', get_theme_mod( 'layout-variation') );
}

function theme_name_customize_preview_js() {
	wp_enqueue_script( 'theme_name-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'jquery','customize-preview' ), NULL, true );
}
add_action( 'customize_preview_init', 'theme_name_customize_preview_js' );