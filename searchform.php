<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<input type="search" class="search-field" placeholder="サイト内検索" value="<?php echo get_search_query() ?>" name="s" title="検索フォーム" />
	</label>
	<button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
</form>