<div class="yellowback">

	<div class="wrap container" role="document">
		<div class="content row">



			<main class="main featured" role="featured">
				<a href="<?php the_permalink(); ?>">
					<article>
						<header>
							<?php
								$loop = new WP_Query( array(
								'showposts' => 1,
								'post__in' => get_option('sticky_posts'),
								'ignore_sticky_posts' => 1 ) );
								while ( $loop->have_posts() ) : $loop->the_post(); 

								the_post_thumbnail('medium', array('class' => 'img-responsive'));

								// get image id
								$post_thumbnail_id = get_post_thumbnail_id( $post_id );

								// get ACF custom fields for the image
								$image_credit_name = get_field('image_credit_name', $post_thumbnail_id);
								$image_credit_url = get_field('image_credit_url', $post_thumbnail_id);

							?>
									
								<h2><?php the_title(); ?></h2>



								<?php endwhile; ?>
						</header>
					</article>
				</a>

				<?php include('image-credits.php'); ?>

			</main>




			<aside class="sidebar trending" role="trending">
				<div class="h1">Trending: </div>
				<h3>Packer News You Need to Know</h3>

				<?php
					$loop = new WP_Query( array(
					'showposts' => 5,
					'post__in' => get_option('sticky_posts'),
					'ignore_sticky_posts' => 1 ) );

					while ( $loop->have_posts() ) : $loop->the_post(); ?>

						<?php if ( $loop->current_post > 0) { ?>
				
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<?php } ?>

					<?php endwhile; ?>
			</aside>




		</div>
	</div>

</div>