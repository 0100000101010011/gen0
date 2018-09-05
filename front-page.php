<?php
/**
 *
 * This file adds the Homepage template to gen0.
 *
 * Template Name: Home Page
 *
 * @package gen0
 * @author  Seggido, LLC
 * @license GPL-2.0+
 * @link    seggido.com
 */

// Add full width body class to the head.
add_filter( 'body_class', 'theme_add_body_class' );
function theme_add_body_class( $classes ) {

    $classes[] = 'homepage';

    return $classes;

}

// Remove Skip Links.
remove_action ( 'genesis_before_header', 'genesis_skip_links', 5 );

// Dequeue Skip Links Script.
add_action( 'wp_enqueue_scripts', 'theme_dequeue_skip_links' );
function theme_dequeue_skip_links() {
    wp_dequeue_script( 'skip-links' );
}

// Force full width content layout.
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

// Remove home page title
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

// Remove breadcrumbs.
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

// Run the Genesis loop.
genesis();
