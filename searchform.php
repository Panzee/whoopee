<form role="search" method="get" class="_c-form-control" action="<?php echo home_url( '/' ); ?>">
	<label>
		<input type="search" class="_c-form-control" placeholder="サイト内検索" value="<?php echo get_search_query() ?>" name="s" title="検索フォーム" />
	</label>
	<button type="submit" class="_c-form-control">検索</button>
</form>