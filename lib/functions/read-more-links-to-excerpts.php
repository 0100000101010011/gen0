<?php
/**
 *
 * @package gen0
 * @author  Seggido, LLC
 * @license GPL-2.0+
 * @link    seggido.com
 */

// Add Read More Link to Excerpts
// Res: http://wpatch.com/how-to-add-a-read-more-link-to-genesis-child-theme-excerpts/
add_filter('excerpt_more', 'get_read_more_link');
add_filter( 'the_content_more_link', 'get_read_more_link' );
function get_read_more_link() {
    return '<a href="' . get_permalink() . '" class="read-more">' .  __('Read More','gen0') . '</a>';
}
