<?php
/*
Plugin Name: WP Migrate DB on WP Engine
Plugin URI:
Description: Compatibility fixes for WP Migrate DB Pro on WP Engine
Author: Delicious Brains Inc.
Version: 0.0.1
Author URI: http://deliciousbrains.com
*/

/**
* When the "Use SSL for WP-admin and WP-login" option is checked in the
* WP Engine settings, the WP Engine must-use plugin buffers the output and
* does a find & replace for URLs. When we return PHP serialized data, it
* replaces http:// with https:// and corrupts the serialization.
* So here, we disable this filtering for our requests.
*/
function wpmdb_maybe_disable_wp_engine_filtering() {
    // Detect if the must-use WP Engine plugin is running
    if ( ! defined( 'WPE_PLUGIN_BASE' ) ) {
        return;
    }

    // Make sure this is a WP Migrate DB Ajax request
    if ( ! class_exists( 'WPMDB_Utils' ) || ! WPMDB_Utils::is_ajax() ) {
        return;
    }

    // Turn off WP Engine's output filtering
    if ( ! defined( 'WPE_NO_HTML_FILTER' ) ) {
        define( 'WPE_NO_HTML_FILTER', true );
    }
}

add_action( 'plugins_loaded', 'wpmdb_maybe_disable_wp_engine_filtering' );
