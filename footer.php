<footer id="footer" class="p-footer">
	<div class="c-container">
		<div class="c-row c-row--margin">
			<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
			<div class="c-row__col c-row_col--sm-1-1">
				<div class="p-footer__widget-area">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div><!-- p-footer__widget-area -->
			</div><!-- c-row__col -->
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
			<div class="c-row__col c-row_col--sm-1-1">
				<div class="p-footer__widget-area">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div><!-- p-footer__widget-area -->
			</div><!-- c-row__col -->
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
			<div class="c-row__col c-row_col--sm-1-1">
				<div class="p-footer__widget-area">
					<?php dynamic_sidebar( 'footer-3' ); ?>
				</div><!-- p-footer__widget-area -->
			</div><!-- c-row__col -->
			<?php endif; ?>
		</div><!-- _c-row -->
		<p class="p-footer__copyright">Copyright&copy; <?php bloginfo( 'name' ); ?> <?php echo date( 'Y' ); ?> All Rights Reserved.</p></p>
		<p class="p-footer__powerd-by">Template by <a href="//wordpress.org/themes/whoopee/">whoopee</a></p>
	</div><!-- c-container -->
	<?php wp_footer(); ?>
</footer>
</body>
</html>