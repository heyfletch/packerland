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

$follow_link_block = <<<FOLLOW
<li class="dropdown">
  <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Follow</span></a>
  <ul class="dropdown-menu" role="menu">
    <li class="twitter"><a href="https://twitter.com/packer_land"><span class="glyphicon glyphicon-star"></span> Twitter</a></li>
    <li class="facebook"><a href="https://www.facebook.com/packer.land.news"><span class="glyphicon glyphicon-star"></span> Facebook</a></li>
    <li class="google"><a href="https://plus.google.com/+PackerLandNews"><span class="glyphicon glyphicon-star"></span> Google+</a></li>
  </ul>
</li>
FOLLOW;


    if ($args->theme_location == 'primary_navigation') {
        $items .= $follow_link_block;
    }
    return $items;
}