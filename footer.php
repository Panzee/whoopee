<footer id="footer" class="p-footer">
	<div class="_c-container">
		<div class="_c-row _c-row--margin _c-row--fill">
			<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
			<div class="_c-row__col _c-row_col--sm-1-1">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
			<div class="_c-row__col _c-row_col--sm-1-1">
				<?php dynamic_sidebar( 'footer-2' ); ?>
			</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
			<div class="_c-row__col _c-row_col--sm-1-1">
				<?php dynamic_sidebar( 'footer-3' ); ?>
			</div>
			<?php endif; ?>
		</div><!-- _c-row -->
		<p>テーマを提供してます<a href="#">ここから</a></p>
	</div><!-- _c-container -->
	<?php wp_footer(); ?>
</footer>
</body>
</html>