<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Jacuzzi
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>

<?php wp_head(); ?>

<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
	<link href="<?php echo THEME_CSS . '/ie/ie.css'?>" rel="stylesheet" type="text/css">
<![endif]-->

</head>

<body <?php body_class(); ?>>

	<?php custom_data_layer(); ?>
	
	<?php google_tag_manager(); ?>

<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<div class="wrap">
			<div class="site-branding">
				<a id="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo THEME_IMG . '/jacuzzi.png'?>" alt="Jacuzzi" /></a>
			</div>

			<nav class="main-navigation" role="navigation">
				<ul id="social">
				<?php
				$soc = array( 'pinterest', 'facebook', 'instagram', 'youtube', 'houzz', 'twitter' );
				$scount = count( $soc );
				$oot = '';
				while ( $scount-- ) {
					$f = $soc[$scount];
					$ln = get_field('nlk_'. $f .'_link');
					if( $ln ){
						$oot = '<li><a href="' . $ln . '" class="icon-'. $f .'" target="_blank"></a></li>' . $oot;
					}
				}
				echo $oot;
				?>

				</ul>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
