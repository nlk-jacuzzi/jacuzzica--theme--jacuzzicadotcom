<?php
/**
 * Jacuzzi functions and definitions
 *
 * @package Jacuzzi
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'jacuzzi_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function jacuzzi_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Jacuzzi, use a find and replace
	 * to change 'jacuzzi' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'jacuzzi', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'jacuzzi' ),
		'footer' => __( 'Footer Menu', 'jacuzzi' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'jacuzzi_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // jacuzzi_setup
add_action( 'after_setup_theme', 'jacuzzi_setup' );


function jacuzzi_touch_icons() {
	$img_url = get_stylesheet_directory_uri() .'/dist/images/apple-touch-icon';
	$img_end = '-precomposed.png';
	$sizes = array(57,76,120,152);
	$scount = count($sizes);
	while( $scount-- ) {
		$s = $sizes[$scount];
		$sx = '';
		if ( $scount ) {
			$sx = $s .'x'. $s;
		}
		echo "\n". '<link rel="apple-touch-icon-precomposed"'. ($sx == '' ? '' : ' sizes="'. $sx .'"') .' href="'. $img_url . ( $sx != '' ? '-'. $sx : '' ) . $img_end .'">';
	}
	echo  "\n";
}
add_action( 'wp_head', 'jacuzzi_touch_icons' );
/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function jacuzzi_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'jacuzzi' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'jacuzzi_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function jacuzzi_scripts() {
	wp_enqueue_style( 'jacuzzi-style', get_stylesheet_uri() );
	wp_enqueue_style( 'jacuzzi-custom', THEME_CSS . '/main.css');

	// wp_enqueue_script( 'jacuzzi-fasttap', THEME_JS . '/jquery.fasttap.js', array('jquery'), '1.0', 'false');
	wp_enqueue_script( 'jacuzzi-script', THEME_JS . '/main.js', array('jquery'), '1.1', 'true');
	//wp_enqueue_script( 'jacuzzi-custom-js', get_template_directory_uri() . '/js/jacuzzi.js', array('jquery'), '1.0', true);
	/*
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	*/
	// Omniture SiteCatalyst
	wp_enqueue_script( 'sitecatalyst', get_template_directory_uri() . '/js/s_code.js', array(), 'H.21', true );
}
add_action( 'wp_enqueue_scripts', 'jacuzzi_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

require get_template_directory() . '/inc/theme-constants.php';

define( 'ACF_LITE' , true );
require get_template_directory() . '/inc/advanced-custom-fields/acf.php';
require get_template_directory() . '/inc/acf-repeater/acf-repeater.php';
require get_template_directory() . '/inc/fields.php';



/**
 * GOOGLE TAG MANAGER SUPPORT / DATA LAYER SUPPORT
 *
 */

// Custom data layer
add_action('do_custom_data_layer', 'custom_data_layer_container');
if(!function_exists('custom_data_layer_container')) {
	function custom_data_layer_container() {
		global $post;

		$str = '<script>dataLayer = [{';
		$str .= '\'customerId\': \'' . get_current_user_id() . '\',';

		// add custom data layer vars here...

		$str .= '}];</script>';

		echo $str;
	}
}
if(!function_exists('custom_data_layer')) {
	function custom_data_layer() {
		do_action('do_custom_data_layer');
	}
}

// Google Tag Manager Main
add_action('do_google_tag_manager', 'google_tag_manager_container');
if(!function_exists('google_tag_manager_container')) {
	function google_tag_manager_container() {
		$str = <<<GTM
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-MFCH5P"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MFCH5P');</script>
<!-- End Google Tag Manager -->
GTM;
		echo $str;
	}
}
if(!function_exists('google_tag_manager')) {
	function google_tag_manager() {
		do_action('do_google_tag_manager');
	}
}
/** END GTM */




/**
 * Adds a box to the right column on the Post and Page edit screens.
 */
function sidebar_add_meta_box() {

	$screens = array( 'post', 'page' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			'show_sidebar_options_sectionid',
			__( 'Sidebar Options', 'sidebar_textdomain' ),
			'sidebar_meta_box_callback',
			$screen,
			'side'
		);
	}
}
add_action( 'add_meta_boxes', 'sidebar_add_meta_box' );

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function sidebar_meta_box_callback( $post ) {

	// Add an nonce field so we can check for it later.
	wp_nonce_field( 'sidebar_meta_box', 'sidebar_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$value = get_post_meta( $post->ID, '_sidebar_meta_value_key', true );

	$default = ' selected="selected" ';

	echo '<label for="sidebar_select_field">';
	_e( 'Show Sidebar', 'sidebar_textdomain' );
	echo '</label> ';
	echo '<select id="sidebar_select_field" name="sidebar_select_field"><option value="enabled" ' . ( $value == 'enabled' ? $default : '' ) . '>Enable Sidebar</option><option value="disabled" ' . ( $value == 'disabled' ? $default : '' ) . '>Disable Sidebar</option></select>';
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function sidebar_save_meta_box_data( $post_id ) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['sidebar_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['sidebar_meta_box_nonce'], 'sidebar_meta_box' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */
	
	// Make sure that it is set.
	if ( ! isset( $_POST['sidebar_select_field'] ) ) {
		return;
	}

	// Sanitize user input.
	$my_data = sanitize_text_field( $_POST['sidebar_select_field'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, '_sidebar_meta_value_key', $my_data );
}
add_action( 'save_post', 'sidebar_save_meta_box_data' );
