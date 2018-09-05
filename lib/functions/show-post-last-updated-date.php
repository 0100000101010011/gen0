<?php
/**
 *
 * @package gen0
 * @author  Seggido, LLC
 * @license GPL-2.0+
 * @link    seggido.com
 */

//res: https://makeaweblog.com/showing-last-updated-date-for-posts-in-genesis/
add_filter( 'genesis_post_info', 'sp_post_info_filter' );
function sp_post_info_filter($post_info) {
    if ( !is_page() ) {
        $post_info = '<span>Last Updated on [post_modified_date]</span>';
        // $post_info = '<span>Last Updated on [post_modified_date]</span> <span>by [post_author_posts_link] [post_comments] [post_edit]</span>';
        return $post_info;
    }}
