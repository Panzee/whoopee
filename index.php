<?php get_header(); ?>
<div class="contents">
	<div class="container">
		<main class="main left">
			<?php
				$args = array( 'post_type' => 'news', 'post_per_page'=> 5);
				$query = new WP_Query( $args );
				if ( $query->have_posts() ) :
			?>
				<h2>お知らせ</h2>
				<ul>
			<?php
					while ( $query->have_posts() ) :
					$query->the_post();
			?>
				<li><article><time datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3></article></li>
			<?php
					endwhile;
					wp_reset_postdata();
			?>
					</ul>
			<?php
				endif;
			?>
			<?php
				$args = array( 'post_type' => 'page', 'name'=> 'top');
				$query = new WP_Query( $args );
				if ( $query->have_posts() ) :
					while ( $query->have_posts() ) :
					$query->the_post();
			?>
				<article>
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
				</article>
			<?php
					endwhile;
					wp_reset_postdata();
				endif;
			?>
		</main>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>