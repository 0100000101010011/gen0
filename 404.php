<?php
/**
 *
 * @package gen0
 * @author  Seggido, LLC
 * @license GPL-2.0+
 * @link    seggido.com
 */

// Remove default loop.
remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action( 'genesis_loop', 'genesis_404' );
/**
 * This function outputs a 404 "Not Found" error message.
 *
 * @since 1.6
 */
function genesis_404() {

	genesis_markup( array(
		'open' => '<article class="entry">',
		'context' => 'entry-404',
		) );

	printf( '<h1 class="entry-title">%s</h1>', apply_filters( 'genesis_404_entry_title', __( '404\'d', 'genesis' ) ) );
	echo '<div class="entry-content">';

	if ( genesis_html5() ) :

		echo apply_filters( 'genesis_404_entry_content', '<p>' . sprintf( __( 'What you\'re looking for isn\'t turning up. The page you are looking for may no longer exist, may have been moved or there could be a typo.', 'genesis' ), trailingslashit( home_url() ) ) . '</p>' );

	else :
		?>

	<p><?php printf( __( 'The page you are looking for no longer exists. Perhaps you can return back to the site\'s <a href="%s">homepage</a> and see if you can find what you are looking for. Or, you can try finding it with the information below.', 'genesis' ), trailingslashit( home_url() ) ); ?></p>



	<?php
	endif;

	echo '</div>';

	genesis_markup( array(
		'close' => '</article>',
		'context' => 'entry-404',
		) );

}

genesis();
