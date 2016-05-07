<?php get_header(); ?>
<div class="contents">
	<div class="container">
		<main class="main left">
			<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
					the_post();
			?>
				<article>
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
				</article>
			<?php
					endwhile;
				endif;
			?>
		</main>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>