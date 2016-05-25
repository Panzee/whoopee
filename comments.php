<?php
if (post_password_required()) {
	return;
}
?>

<?php if ( have_comments() ) :?>
	<section class="p-comments">
		<h1 id="comments"><?php echo get_comments_number(); ?>&nbsp;<?php _e( 'Comments', 'whoopee' ); ?></h1>
		<ol class="commentlist">
		<?php wp_list_comments( array(
				'avatar_size'	=> 48,
				'type'				=> 'comment',
				'short_ping'  => true,
			) ); ?>
		</ol>
		<?php if ( get_comment_pages_count() > 1 ) : ?>
			<div class="navigation">
				<div class="alignleft"><?php previous_comments_link( __( 'Next Comments', 'whoopee' ) ); ?></div>
				<div class="alignright"><?php next_comments_link( __( 'Previous Comments', 'whoopee' ) ); ?></div>
			</div>
		<?php endif; ?>
		<?php comment_form(); ?>
	</section><!-- p-comments -->
<?php endif; ?>