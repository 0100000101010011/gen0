<?php
/**
 *
 * @package gen0
 * @author  Seggido, LLC
 * @license GPL-2.0+
 * @link    seggido.com
 */

//* Do NOT include the opening php tag above
//* Customize search form input box text of Genesis child themes
add_filter( 'genesis_search_text', 'b3m_genesis_search_text' );
function b3m_genesis_search_text( $text ) {

    return esc_attr( 'what you searching for?' );

}
