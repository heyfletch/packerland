<?php 
  // get image id
  $post_thumbnail_id = get_post_thumbnail_id( $post_id );

  // get ACF custom fields for the image
  $image_credit_name = get_field('image_credit_name', $post_thumbnail_id);
  $image_credit_url = get_field('image_credit_url', $post_thumbnail_id);
?>

<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>

      <h1 class="entry-title"><?php the_title(); ?></h1>

      <div class="entry-meta text-muted">
        <?php get_template_part('templates/entry-meta'); ?>
      </div>

    <?php get_template_part( 'templates/social-share' ); ?>
    
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
           data-ad-format="auto">
      </ins>
      <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
      </script>      
    </div>

    <div class="text-muted">Packer.land is new! Please leave a comment!</div>

    <?php comments_template('/templates/comments.php'); ?>

  </article>
<?php endwhile; ?>