<?php
/**
 *
 * @package gen0
 * @author  Seggido, LLC
 * @license GPL-2.0+
 * @link    seggido.com
 */

add_action( 'wp_enqueue_scripts', 'theme_css' );
/**
* Checks the settings for the link color, and accent color.
* If any of these value are set the appropriate CSS is output.
*
* @since 2.2.3
*/
function theme_css() {

    $handle  = defined( 'CHILD_THEME_NAME' ) && CHILD_THEME_NAME ? sanitize_title_with_dashes( CHILD_THEME_NAME ) : 'child-theme';

    $color_link = get_theme_mod( 'theme_link_color', theme_customizer_get_default_link_color() );
    $color_accent = get_theme_mod( 'theme_accent_color', theme_customizer_get_default_accent_color() );

    $css = '';

    $css .= ( theme_customizer_get_default_link_color() !== $color_link ) ? sprintf( '

        a,
        .entry-title a:focus,
        .entry-title a:hover,
        .genesis-nav-menu a:focus,
        .genesis-nav-menu a:hover,
        .genesis-nav-menu .current-menu-item > a,
        .genesis-nav-menu .sub-menu .current-menu-item > a:focus,
        .genesis-nav-menu .sub-menu .current-menu-item > a:hover,
        .menu-toggle:focus,
        .menu-toggle:hover,
        .sub-menu-toggle:focus,
        .sub-menu-toggle:hover {
            color: %s;
        }

        ', $color_link ) : '';

    $css .= ( theme_customizer_get_default_accent_color() !== $color_accent ) ? sprintf( '

        button:focus,
        button:hover,
        input[type="button"]:focus,
        input[type="button"]:hover,
        input[type="reset"]:focus,
        input[type="reset"]:hover,
        input[type="submit"]:focus,
        input[type="submit"]:hover,
        input[type="reset"]:focus,
        input[type="reset"]:hover,
        input[type="submit"]:focus,
        input[type="submit"]:hover,
        .archive-pagination li a:focus,
        .archive-pagination li a:hover,
        .archive-pagination .active a,
        .button:focus,
        .button:hover,
        .sidebar .enews-widget input[type="submit"] {
            background-color: %s;
            color: %s;
        }
        ', $color_accent, theme_color_contrast( $color_accent ) ) : '';

    if ( $css ) {
        wp_add_inline_style( $handle, $css );
    }

}
