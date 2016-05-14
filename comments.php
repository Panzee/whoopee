<?php
if (post_password_required()) {
	return;
}
?>

<section class="p-single__comments">
<?php if ( have_comments() ) :?>
	<h1 id="comments"><?php echo get_comments_number() . ' 件のコメント'; ?></h1>
	<ol class="commentlist">
	<?php wp_list_comments( array(
			'avatar_size'	=> 48,
			'type'				=> 'comment',
		) ); ?>
	</ol>
<?php if ( get_comment_pages_count() > 1 ) : ?>
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link('&lt;&lt; 前のコメント'); ?></div>
		<div class="alignright"><?php next_comments_link('次のコメント &gt;&gt;'); ?></div>
	</div>
<?php endif; endif; ?>
<?php comment_form(); ?>
</section><!-- p-single__comments -->