<?php
/**
 * Clean up the_excerpt()
 */
function roots_excerpt_more($more) {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'roots') . '</a>';
}
add_filter('excerpt_more', 'roots_excerpt_more');

/**
 * Manage output of wp_title()
 */
function roots_wp_title($title) {
  if (is_feed()) {
    return $title;
  }

  $title .= get_bloginfo('name');

  return $title;
}
add_filter('wp_title', 'roots_wp_title', 10);

// Add stuff to the menu
add_filter( 'wp_nav_menu_items', 'your_custom_menu_item', 10, 2 );
function your_custom_menu_item ( $items, $args ) {

	ob_start();
	include get_template_directory() . '/templates/follow.php';
	$follow_link_block = ob_get_clean();

  if ($args->theme_location == 'primary_navigation') {
      $items .= $follow_link_block;
  }
  return $items;
}

// Custom function to return svg
function get_svg($my_svg) {

	ob_start();
	include get_template_directory() . '/assets/svg/' . $my_svg . '.svg';
	$my_item = ob_get_clean();

  echo $my_item;
}