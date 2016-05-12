<div class="p-pager">
	<div class="p-pager__previous"><?php previous_posts_link('前へ'); ?></div>
	<div class="p-pager__paginate _u-hidden-sm _u-hidden-md"><?php $args = array(
		'end_size'           => 0,
		'mid_size'           => 1,
		'prev_next'          => false,
		'type'               => 'plain',
	);
	echo paginate_links( $args ); ?></div>
	<div class="p-pager__next"><?php next_posts_link('次へ'); ?></div>
</div><!-- p-pager -->