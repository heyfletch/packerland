<ul class="rrssb-buttons clearfix">

  <li class="facebook">
    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(wp_get_shortlink()) ?>" class="popup">
      <?php svg_icon('facebook'); ?>
      <span class="text">share</span>
    </a>
  </li>

  <li class="twitter">
    <a href="http://twitter.com/home?status=<?php echo urlencode(get_the_title()) ?> <?php echo urlencode(wp_get_shortlink()) ?>" class="popup">
      <?php svg_icon('twitter'); ?>
      <span class="text">tweet</span>
    </a>
  </li>

  <li class="googleplus">
    <a href="https://plus.google.com/share?url=<?php echo urlencode(wp_get_shortlink()) ?>" class="popup">
      <?php svg_icon('google_plus'); ?>
      <span class="text">share</span>
    </a>
  </li>

</ul>