
<?php /*  Only needed if there are no posts */ ?>
<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>




<?php
  // exclude sticky posts from the homepage post stream
  $the_query = new WP_Query( array( 'post__not_in' => get_option( 'sticky_posts' ) ) );

  // WordPress Loop Here
  if ( $the_query->have_posts() ) : 
    while ( $the_query->have_posts() ) : $the_query->the_post();

      get_template_part('templates/content', get_post_format()); 

    endwhile; 
  endif; 
?>



<?php /*  Set the Pager / Paging settings */ ?>
<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
    <ul class="pager">
      <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
      <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
    </ul>
  </nav>
<?php endif; ?>