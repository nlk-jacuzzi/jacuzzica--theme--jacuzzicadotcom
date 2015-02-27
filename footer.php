<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Jacuzzi
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrap">
			<?php wp_nav_menu(array(
			'theme_location' => 'footer'
			))?>
			<div class="site-info">
				<p>Copyright © <?php echo Date('Y')?> Jacuzzi Inc., All rights reserved</p>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
