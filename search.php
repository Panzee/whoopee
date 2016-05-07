<?php get_header(); ?>
archive
<div class="contents">
	<div class="container">
		<main class="left">
			<h2>「<?php echo esc_html( $s ); ?>」の検索結果 ：<?php echo $wp_query->found_posts; ?> 件 </h2>
			<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
					the_post();
			?>
				<article>
					<a href="<?php the_permalink(); ?>" style="display: block;">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail( 'thumbnail' ); ?>
						<?php else : ?>
							<img src="<?php echo get_template_directory_uri(); ?>/img/no-img.png" alt="no image" title="no image" width="150" height="150" />
						<?php endif; ?>
						<h2><?php the_title(); ?></h2>
						<time datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
						<?php the_excerpt(); //抜粋文 ?>
						<?php the_category( ', ' ); ?>
						<?php the_tags( '', ', ' ); ?>
					</a>
				</article>
			<?php
					endwhile;
				endif;
			?>
		<?php echo show_page_number(); ?>/<?php echo max_show_page_number(); ?>
		
			<?php $args = array(
		'end_size'           => 0,
		'mid_size'           => 1,
		'prev_next'          => false,
		'type'               => 'plain',
		);
	echo paginate_links( $args ); ?>
	<?php //posts_nav_link(); ?>
	<?php previous_posts_link(); ?>
	<?php next_posts_link(); ?>
		</main>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>