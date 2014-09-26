<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>

  <?php
    // Output the featured image.
    if ( has_post_thumbnail() ) :
      if ( 'grid' == get_theme_mod( 'featured_content_layout' ) ) {
        the_post_thumbnail('large', array('class' => 'img-responsive'));
      } else {
        the_post_thumbnail('large', array('class' => 'img-responsive'));
      }
    endif;
  ?>

      <?php get_template_part( 'templates/social-share' ); ?>

      <h1 class="entry-title"><?php the_title(); ?></h1>

      <?php get_template_part('templates/entry-meta'); ?>

    </header>

    <div class="entry-content">
      <?php the_content(); ?>
    </div>

    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>

    <div class="post-bottom-ad">
      <ins class="adsbygoogle"
           style="display:block"
           data-ad-client="ca-pub-5674776962249237"
           data-ad-slot="2624700648"
           data-ad-format="auto"></ins>
    </div>

    <?php comments_template('/templates/comments.php'); ?>

  </article>
<?php endwhile; ?>
