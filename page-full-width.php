<?php
/**
 * gen0.
 *
 * This file adds the Page - Full Width template to the gen0 theme.
 *
 * Template Name: Page - Full Width
 *
 * @package gen0
 * @author  Alvin Sanchez
 * @license GPL-2.0+
 * @link    http://www.throttlewp.com/
 */

// Add full width body class to the head.
add_filter( 'body_class', 'genesis_sample_add_body_class' );
function genesis_sample_add_body_class( $classes ) {

    $classes[] = 'page-full-width';

    return $classes;

}

// Remove Skip Links.
remove_action ( 'genesis_before_header', 'genesis_skip_links', 5 );

// Dequeue Skip Links Script.
add_action( 'wp_enqueue_scripts', 'genesis_sample_dequeue_skip_links' );
function genesis_sample_dequeue_skip_links() {
    wp_dequeue_script( 'skip-links' );
}

// Force full width content layout.
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

// Run the Genesis loop.
genesis();
