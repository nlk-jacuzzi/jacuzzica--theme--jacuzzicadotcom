<?php
/**
 * A class filled with functions that will never go away upon theme deactivation
 *
 * @package WordPress
 * @subpackage Saxum Boilerplate
 */
class Jacuzzi_MU_Functions {


  	/**
	 * Build our class and run those methods
	 */
	public function __construct() {

		add_action( 'after_setup_theme', array( $this, 'constants' ), 1 );
		add_action( 'wp_head', array( $this, 'dns_prefetch' ), 1 );
		add_action( 'wp_head', array( $this, 'header_scripts' ) );
		add_action( 'wp_head', array( $this, 'enqueue_scripts' ), 1 );

	}


	/**
	 * Defines the constant paths for use within the theme.
	 */
	public function constants() {

		/* Sets the path to the child theme directory. */
		$this->define_const( 'THEME_DIR', get_stylesheet_directory_uri() );
		$THEME_DIR = trailingslashit( THEME_DIR );

		/* Sets the path to the css directory. */
		$this->define_const( 'THEME_CSS', $THEME_DIR . 'dist/styles' );

		/* Sets the path to the images directory. */
		$this->define_const( 'THEME_IMG', $THEME_DIR . 'dist/images' );

		/* Sets the path to the included files directory. */
		$this->define_const( 'THEME_INC', $THEME_DIR . 'inc' );

		/* Sets the path to the javascript directory. */
		$this->define_const( 'THEME_JS', $THEME_DIR . 'dist/scripts' );

		/* Sets the path to the languages directory. */
		$this->define_const( 'THEME_LANG', $THEME_DIR . 'languages' );
	}


	/**
	 * Define a constant if it hasn't been already (this allows them to be overridden)
	 */
	public function define_const( $constant, $value ) {
		// (can be overridden via wp-config, etc)
		if ( ! defined( $constant ) )
			define( $constant, $value );
	}


	/**
	 * Enqueue scripts
	 */
	public function enqueue_scripts() {
		wp_enqueue_script('modernizr', '//cdnjs.cloudflare.com/ajax/libs/modernizr/2.7.1/modernizr.min.js', false, '2.7.1', false);
	}


	/**
	* Header Scripts
	*/
	public function header_scripts() { ?>

		<!-- fonts/typekit -->
		<!--
		<script type="text/javascript">
		  (function() {
		    var config = {
		      kitId: 'due7zey',
		      scriptTimeout: 3000
		    };
		    var h=document.getElementsByTagName("html")[0];h.className+=" wf-loading";var t=setTimeout(function(){h.className=h.className.replace(/(\s|^)wf-loading(\s|$)/g," ");h.className+=" wf-inactive"},config.scriptTimeout);var tk=document.createElement("script"),d=false;tk.src='//use.typekit.net/'+config.kitId+'.js';tk.type="text/javascript";tk.async="true";tk.onload=tk.onreadystatechange=function(){var a=this.readyState;if(d||a&&a!="complete"&&a!="loaded")return;d=true;clearTimeout(t);try{Typekit.load(config)}catch(b){}};var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(tk,s)
		  })();
		</script>
		-->
		<!-- end fonts/typekit -->

	<?php }


	/**
	 * DNS Prefetch
	 */
	public function dns_prefetch() { ?>

	<link rel="dns-prefetch" href="//api.google.com">
	<link rel="dns-prefetch" href="//fonts.googleapis.com">

	<?php }




} // class THEME_Functions

// Instantiate the class
$engage = new Jacuzzi_MU_Functions();