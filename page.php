<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Jacuzzi
 */

$show_sidebar = ( get_post_meta( get_the_ID(), '_sidebar_meta_value_key', true ) == 'enabled' ? true : false );


get_header(); ?>

	<div id="primary" class="content-area <?php echo ( $show_sidebar ? 'sidebar' : 'no-sidebar' ); ?>">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php 


if ( $show_sidebar )
	get_sidebar();

?>

<?php get_footer(); ?>
