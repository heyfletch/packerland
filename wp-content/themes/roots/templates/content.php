<?php 
  // get image id
  $post_thumbnail_id = get_post_thumbnail_id( $post_id );

  // get ACF custom fields for the image
  $image_credit_name = get_field('image_credit_name', $post_thumbnail_id);
  $image_credit_url = get_field('image_credit_url', $post_thumbnail_id);
?>

<article <?php post_class(); ?>>

  <header>
    <a href="<?php the_permalink(); ?>">
      <?php the_post_thumbnail('medium', array('class' => 'img-responsive')); ?>

	    <h2 class="entry-title"><?php the_title(); ?></h2>

    </a>

    <?php include('image-credits.php'); ?>

  </header>

  <div class="entry-summary">

    <?php the_excerpt(); ?>

    <?php get_template_part('templates/entry-meta' ); ?>

  </div>

</article>
