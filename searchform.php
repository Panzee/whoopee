<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
	<label>
		<input type="search" class="c-form-control" placeholder="<?php _e( 'Site Search', 'whoopee' ); ?>" value="<?php echo get_search_query() ?>" name="s" />
	</label>
	<button type="submit" class="c-form-control"><?php _e( 'Search', 'whoopee' ); ?></button>
</form>