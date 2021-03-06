<?php

/* STYLESHEET ACTIVATION */
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

function et_add_mobile_navigation_mod() {
  echo '<div id="et_mobile_nav_menu"><span class="mobile_menu_bar shiftnav-toggle" data-shiftnav-target="shiftnav-main"></span></div>';
}

function googleMap() {
	wp_register_script( 'google-maps-api', esc_url_raw( add_query_arg( array( 'v' => 3, 'key' => et_pb_get_google_api_key() ), is_ssl() ? 'https://maps.googleapis.com/maps/api/js' : 'https://maps.googleapis.com/maps/api/js' ) ), array(), ET_BUILDER_VERSION, true );
}

/* STYLES AND SCRIPTS */
function styles_scripts() {
	
	wp_register_script('fontawesome', 'https://use.fontawesome.com/6ccd600e51.js', array('jquery'), null, true);
	wp_enqueue_script('fontawesome');
	
	wp_enqueue_style( 'slick-style', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), null );
	wp_enqueue_style('slick-style');
	
	wp_enqueue_script( 'slick-script', get_stylesheet_directory_uri() . '/js/slick.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script('slick-script');
	
	wp_register_script('scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), null, true);
	wp_enqueue_script('scripts');
}
 
/*function override_divi() {
  remove_action('et_header_top','et_add_mobile_navigation');
  add_action('et_header_top', 'et_add_mobile_navigation_mod');
}
add_action('after_setup_theme','override_divi');*/

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

// FIX MEDIA LIBRARY UPLOAD
function wpb_image_editor_default_to_gd( $editors ) {
    $gd_editor = 'WP_Image_Editor_GD';
    $editors = array_diff( $editors, array( $gd_editor ) );
    array_unshift( $editors, $gd_editor );
    return $editors;
}
add_filter( 'wp_image_editors', 'wpb_image_editor_default_to_gd' );

// CUSTOM IMAGE CROP
add_image_size( 'profile', 300, 449, array( 'left', 'top' ) );
add_image_size( 'header', 1600, 400, array( 'center', 'center' ) );
add_image_size( 'header-tall', 1600, 640, array( 'center', 'center' ) );

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

// CASE STUDIES ARCHIVE - FOR ARCHIVE PAGE
function case_studyArchivePage() {
    ob_start();
    get_template_part('includes/case_studies_archive');
    return ob_get_clean();
}

// ENQUEUE STYLES AND SCRIPTS
add_action('init', 'styles_scripts');
// HERO SLIDER
add_shortcode('hero-slider', 'heroSlider');
// CASE STUDIES ARCHIVE - HALF COLUMN SPLIT
add_shortcode('case_studies_home', 'case_studyArchiveHome');
// CASE STUDIES ARCHIVE - FOR ARCHIVE PAGE
add_shortcode('case_studies_archive', 'case_studyArchivePage');
// REMOVE PROJECTS CPT
add_filter( 'et_project_posttype_args', 'mytheme_et_project_posttype_args', 10, 1 );
// DEFAULT CASE STUDIES FEATURED IMAGE
add_option( 'my_default_pic', get_stylesheet_directory_uri() . '/images/backgrounds/case-studies.jpg', '', 'yes' );
// GOOGLE MAP API
add_action( 'wp_enqueue_scripts', 'googleMap', 11 );