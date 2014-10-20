<?php
   /*
   Plugin Name: Packerland Custom Functionality
   Plugin URI: http://www.merchantguru.com
   Description: This is where we'll put custom functionality tied to Packer.land and not the theme
   Version: 0.1
   Author: Joe Fletcher
   Author URI: http://www.merchantguru.com
   License: GPL2
   */


// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}


//// Edit Infographic Embedder plugin
// Edit "link to our infographic" line
function infographics_custom_image_code() {
    return '<p>Feel free to <a href="' . get_post_meta( get_the_ID(), 'infographic_embedder_post_class', true ) . '" target="_blank">link to this infographic</a> or embed on your site:</p>';
}
add_filter ( 'infographic_embedder_download_html', 'infographics_custom_image_code' );

// Edit the embed code text and code
function infographics_custom_embed_code() {
    return '<img src="' . get_post_meta( get_the_ID(), 'infographic_embedder_post_class', true ) . '" alt="' . get_the_title() . ' - An Infographic from ' . get_bloginfo('name') . '" width="100%" class="packerland_infographic" /><p class="packerland_tagline"><a href="' . get_permalink() . '" target="_blank">A Packers Infographic by ' . get_bloginfo('name') . '</a></p>';
}
add_filter ( 'infographic_embedder_image_code', 'infographics_custom_embed_code' );

// Edit the header label
function infographics_custom_labeling() {
    return '<button type="button" class="btn btn-warning" data-toggle="collapse" data-target="#embedcode">
  Grab Embed Code</button>';
}
add_filter ( 'infographic_embedder_embed_html', 'infographics_custom_labeling' );

// Edit the embed code block
function infographics_custom_embed_block() {
   $embedval = htmlentities(
      apply_filters(
         'infographic_embedder_image_code',
         '<img src="' . $infourl . '" alt="' . get_the_title() . ' - An Infographic from ' . get_bloginfo('name') . '" width="100%" class="infographic_embedder" /><p class="infographic_attr">Embedded from <a href="' . get_permalink() . '" target="_blank">' . get_bloginfo('name') . '</a></p>'
      )
   );

    return '<pre id="embedcode" class="collapse">' . $embedval . '</pre><div id="embed_width_hidden_div" style="display: none"><textarea id="embed_width_hidden">' . $embedval . '</textarea></div>';
}
add_filter ( 'infographic_embedder_embed_block', 'infographics_custom_embed_block' );