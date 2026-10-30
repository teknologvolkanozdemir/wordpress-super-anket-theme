<?php
/**
 * The footer template.
 *
 * @package Super_Anket
 */
?>
<footer class="site-footer">
	<div class="footer-inner">
		<p><?php
		printf(
			/* translators: %1$s: year, %2$s: site name. */
			esc_html__( '© %1$s %2$s. Tüm hakları saklıdır.', 'super-anket' ),
			esc_html( wp_date( 'Y' ) ),
			esc_html( get_bloginfo( 'name' ) )
		);
		?></p>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
