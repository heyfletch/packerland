<article <?php post_class(); ?>>

  <header>
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail('large', array('class' => 'img-responsive')); ?>

	    <h2 class="entry-title"><?php the_title(); ?></h2>

	    <?php // get_template_part('templates/entry-meta'); ?>
    </a>
  </header>

  <div class="entry-summary">

    <?php the_excerpt(); ?>

  </div>

</article>
