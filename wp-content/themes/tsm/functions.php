<?php

/* STYLESHEET ACTIVATION */
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

function et_add_mobile_navigation_mod() {
  echo '<div id="et_mobile_nav_menu"><span class="mobile_menu_bar shiftnav-toggle" data-shiftnav-target="shiftnav-main"></span></div>';
}

/* STYLES AND SCRIPTS */
function styles_scripts() {
	
	wp_register_script('fontawesome', 'https://use.fontawesome.com/6ccd600e51.js', array('jquery'), null, true);
	wp_enqueue_script('fontawesome');
	
	wp_enqueue_style( 'slick-style', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), null );
	wp_enqueue_style('slick-style');
	
	wp_enqueue_script( 'slick-script', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script('slick-script');
	
	wp_register_script('scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), null, true);
	wp_enqueue_script('scripts');
}
 
function override_divi() {
  remove_action('et_header_top','et_add_mobile_navigation');
  add_action('et_header_top', 'et_add_mobile_navigation_mod');
}
add_action('after_setup_theme','override_divi');

// REMOVE PROJECTS CPT
function mytheme_et_project_posttype_args( $args ) {
	return array_merge( $args, array(
		'public'              => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => false,
		'show_in_nav_menus'   => false,
		'show_ui'             => false
	));
}

// CUSTOM IMAGE CROP
add_image_size( 'profile', 300, 449, array( 'left', 'top' ) );

add_filter( 'image_size_names_choose', 'wpshout_custom_sizes' );
function wpshout_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'profile' => __( 'Team Member Image' ),
    ) );
}

// HERO SLIDER
function heroSlider() {
    ob_start();
    get_template_part('includes/hero_slider');
    return ob_get_clean();
}

// CASE STUDIES ARCHIVE - HALF COLUMN SPLIT
function case_studyArchiveHome() {
    ob_start();
    get_template_part('includes/home-case_studies-loop');
    return ob_get_clean();
}

// ENQUEUE STYLES AND SCRIPTS
add_action('init', 'styles_scripts');
// HERO SLIDER
add_shortcode('hero-slider', 'heroSlider');
// CASE STUDIES ARCHIVE - HALF COLUMN SPLIT
add_shortcode('case_studies_home', 'case_studyArchiveHome');
// REMOVE PROJECTS CPT
add_filter( 'et_project_posttype_args', 'mytheme_et_project_posttype_args', 10, 1 );
// DEFAULT CASE STUDIES FEATURED IMAGE
add_option( 'my_default_pic', get_stylesheet_directory_uri() . '/images/backgrounds/case-studies.jpg', '', 'yes' );