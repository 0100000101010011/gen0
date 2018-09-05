<?php
/**
 *
 * @package gen0
 * @author  Seggido, LLC
 * @license GPL-2.0+
 * @link    seggido.com
 */

//by default genesis theme does not add featured images into posts, so you have to add the action here to see the featured image for posts
//you can find the accompanying css for this in style.css, ctrl+f '.content article a.entry-image-link img'
add_action( 'genesis_entry_header', 'single_post_featured_image', 15 );

function single_post_featured_image() {

    if ( ! is_singular( 'post' ) )
        return;

    $img = genesis_get_image( array( 'format' => 'html', 'size' => genesis_get_option( 'image_size' ), 'attr' => array( 'class' => 'post-image' ) ) );
    printf( '<a class="entry-image-link" href="%s" title="%s">%s</a>', get_permalink(), the_title_attribute( 'echo=0' ), $img );

}
