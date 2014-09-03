<div class="yellowback">

	<div class="wrap container" role="document">
		<div class="content row">

		<main class="main" role="featured">

			<?php
				$loop = new WP_Query( array(
				'showposts' => 1,
				'post__in' => get_option('sticky_posts'),
				'ignore_sticky_posts' => 1 ) );

			while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<?php the_post_thumbnail(); ?>
			
			<h2><?php the_title(); ?></h2>
			<?php endwhile; ?>

		</main>

		<aside class="sidebar" role="trending">

			<h2>Trending: Packer News You Need to Know</h2>

			<?php
				$loop = new WP_Query( array(
				'showposts' => 4,
				'post__in' => get_option('sticky_posts'),
				'ignore_sticky_posts' => 1 ) );

			while ( $loop->have_posts() ) : $loop->the_post(); ?>
			
			<h4><?php the_title(); ?></h4>
			<?php endwhile; ?>

		</aside>




		</div>
	</div>

</div>