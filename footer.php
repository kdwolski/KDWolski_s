<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package KDWolski
 * @since KDWolski 1.0
 */
?>

	</div><!-- #main -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'KDWolski_credits' ); ?>
			<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'KDWolski' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'KDWolski' ), 'WordPress' ); ?></a>
			,
			<?php printf( __( 'Theme: %1$s by %2$s.', 'KDWolski' ), 'KDWolski', '<a href="https://github.com/kdwolski/KDWolski_s" rel="designer">Kevin D. Wolski</a>' ); ?>
			<p>Hacked together using the <a href="https://github.com/Automattic/_s">_s theme by Automattic</a>.</p>
		</div><!-- .site-info -->
	</footer><!-- .site-footer .site-footer -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>