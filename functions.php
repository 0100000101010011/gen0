<?php
/**
 *
 * This file adds functions to gen0.
 *
 * @package gen0
 * @author  Seggido, LLC
 * @license GPL-2.0+
 * @link    seggido.com
 */

// Start the engine.
include_once( get_template_directory() . '/lib/init.php' );

// Setup Theme.
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );
wp_enqueue_script( 'quickCart', get_stylesheet_directory_uri() . "/js/quickCart.js", array( 'jquery' ), CHILD_THEME_VERSION, true );

wp_enqueue_script( 'adminBarOffset', get_stylesheet_directory_uri() . "/js/adminBarOffset.js", array( 'jquery' ), false, true );

wp_enqueue_script( 'headerSearch', get_stylesheet_directory_uri() . "/js/headerSearch.js", array( 'jquery' ), false, true );

wp_enqueue_script( 'afterHeaderMenu', get_stylesheet_directory_uri() . "/js/afterHeaderMenu.js", array( 'jquery' ), false, true );

//* Remove the author box on single posts XHTML Themes
remove_action( 'genesis_after_post', 'genesis_do_author_box_single' );
//* Remove the author box on single posts HTML5 Themes
remove_action( 'genesis_after_entry', 'genesis_do_author_box_single', 8 );

//* Remove style.css, added later after bootstrap loads
remove_action( 'genesis_meta', 'genesis_load_stylesheet' );

// Set Localization (do not remove).
add_action( 'after_setup_theme', 'theme_localization_setup' );
function theme_localization_setup(){
    load_child_theme_textdomain( 'gen0', get_stylesheet_directory() . '/languages' );
}

// Add the helper functions.
include_once( get_stylesheet_directory() . '/lib/helper-functions.php' );

// Add Image upload and Color select to WordPress Theme Customizer.
require_once( get_stylesheet_directory() . '/lib/customize.php' );

// Include Customizer CSS.
include_once( get_stylesheet_directory() . '/lib/output.php' );

// Add WooCommerce support.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php' );

// Add the required WooCommerce styles and Customizer CSS.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-output.php' );

// Add the Genesis Connect WooCommerce notice.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-notice.php' );

// Child theme (do not remove).
define( 'CHILD_THEME_NAME', 'gen0' );
define( 'CHILD_THEME_URL', 'https://seggido.com/' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

// Enqueue Scripts and Styles.
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts_styles' );
function theme_enqueue_scripts_styles() {

    wp_enqueue_style( 'dashicons' );

    $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
    wp_enqueue_script( 'theme-responsive-menu', get_stylesheet_directory_uri() . "/js/responsive-menus{$suffix}.js", array( 'jquery' ), CHILD_THEME_VERSION, true );
    wp_enqueue_script( 'gen0 javascript file', get_stylesheet_directory_uri() . "/js/gen0.js", array( 'jquery' ), CHILD_THEME_VERSION, true );
    wp_localize_script(
        'theme-responsive-menu',
        'genesis_responsive_menu',
        theme_responsive_menu_settings()
        );

    // load bootstrap
    wp_enqueue_style( 'bootstrap-4-css', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css', '4.0.0-beta', true);

    wp_enqueue_script('bootstrap-4-popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js', array('jquery'), '1.11.0', true);

    wp_enqueue_script('bootstrap-4-js', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js', array('jquery'), '4.0.0-beta', true);

    wp_enqueue_style( 'style', get_stylesheet_uri(), true, filemtime( get_stylesheet_directory() . '/style.css' ), 'all' );

}

// Remove Additional CSS editor from customizer
add_action( 'customize_register', 'prefix_remove_css_section', 15 );
/**
 * Remove the additional CSS section, introduced in 4.7, from the Customizer.
 * @param $wp_customize WP_Customize_Manager
 */
function prefix_remove_css_section( $wp_customize ) {
    $wp_customize->remove_section( 'custom_css' );
}

// Define our responsive menu settings.
function theme_responsive_menu_settings() {

    $settings = array(
        'mainMenu'          => __( 'Menu', 'theme' ),
        'menuIconClass'     => 'dashicons-before dashicons-menu',
        'subMenu'           => __( 'Submenu', 'theme' ),
        'subMenuIconsClass' => 'dashicons-before dashicons-arrow-down-alt2',
        'menuClasses'       => array(
            'combine' => array(
                '.nav-primary',
                '.nav-header',
                ),
            'others'  => array(),
            ),
        );

    return $settings;

}

// Add HTML5 markup structure.
add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

// Add Accessibility support.
add_theme_support( 'genesis-accessibility', array( '404-page', 'drop-down-menu', 'headings', 'rems', 'search-form', 'skip-links' ) );

// Add viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

// Add support for custom header.
add_theme_support( 'custom-header', array(
    'width'           => 600,
    'height'          => 160,
    'header-selector' => '.site-title a',
    'header-text'     => false,
    'flex-height'     => true,
    ) );

// Add support for custom background.
add_theme_support( 'custom-background' );

// Add support for after entry widget.
add_theme_support( 'genesis-after-entry-widget-area' );

// Add support for 3-column footer widgets.
add_theme_support( 'genesis-footer-widgets', 3 );

// Add Image Sizes.
add_image_size( 'featured-image', 720, 400, TRUE );

// Rename primary and secondary navigation menus.
add_theme_support( 'genesis-menus', array( 'primary' => __( 'After Header Menu', 'theme' ), 'secondary' => __( 'Footer Menu', 'theme' ) ) );

// Reposition the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 5 );

// Reduce the secondary navigation menu to one level depth.
add_filter( 'wp_nav_menu_args', 'theme_secondary_menu_args' );
function theme_secondary_menu_args( $args ) {

    if ( 'secondary' != $args['theme_location'] ) {
        return $args;
    }

    $args['depth'] = 1;

    return $args;

}

// Modify size of the Gravatar in the author box.
add_filter( 'genesis_author_box_gravatar_size', 'theme_author_box_gravatar' );
function theme_author_box_gravatar( $size ) {
    return 90;
}

// Modify size of the Gravatar in the entry comments.
add_filter( 'genesis_comment_list_args', 'theme_comments_gravatar' );
function theme_comments_gravatar( $args ) {

    $args['avatar_size'] = 60;

    return $args;

}

// Customize Breadcrumbs
add_filter( 'genesis_breadcrumb_args', 'sp_breadcrumb_args' );
function sp_breadcrumb_args( $args ) {
    $args['home'] = 'Home';
    $args['sep'] = ' / ';
    $args['list_sep'] = ', '; // Genesis 1.5 and later
    $args['prefix'] = '<div class="breadcrumb">';
    $args['suffix'] = '</div>';
    $args['heirarchial_attachments'] = true; // Genesis 1.5 and later
    $args['heirarchial_categories'] = true; // Genesis 1.5 and later
    $args['display'] = true;
    $args['labels']['prefix'] = '';
    $args['labels']['author'] = '';
    $args['labels']['category'] = ''; // Genesis 1.6 and later
    $args['labels']['tag'] = '';
    $args['labels']['date'] = '';
    $args['labels']['search'] = 'Search results for ';
    $args['labels']['tax'] = '';
    $args['labels']['post_type'] = '';
    $args['labels']['404'] = 'Not found, Error 404: '; // Genesis 1.5 and later
    return $args;
}

include_once( get_stylesheet_directory() . '/lib/functions/read-more-links-to-excerpts.php' );

include_once( get_stylesheet_directory() . '/lib/functions/customize-search-form-input-text.php' );

include_once( get_stylesheet_directory() . '/lib/functions/disable-autocomplete-on-search-input-field.php' );

include_once( get_stylesheet_directory() . '/lib/functions/add-search-form-button-icon.php' );

include_once( get_stylesheet_directory() . '/lib/functions/show-post-last-updated-date.php' );

include_once( get_stylesheet_directory() . '/lib/functions/change-admin-page-link.php' );

include_once( get_stylesheet_directory() . '/lib/functions/change-admin-post-link.php' );

include_once( get_stylesheet_directory() . '/lib/functions/woocommerce-full-width.php' );

include_once( get_stylesheet_directory() . '/lib/functions/remove-title-and-description-on-archive-pages.php' );

include_once( get_stylesheet_directory() . '/lib/functions/add-featured-image-to-posts.php' );

include_once( get_stylesheet_directory() . '/lib/functions/woocommerce-add-image-gallery-support.php' );

// show admin bar only for admins and editors
//res:
//https://premium.wpmudev.org/blog/remove-the-wordpress-admin-toolbar/
//https://digwp.com/2011/04/admin-bar-tricks/#disable-for-non-admins
//https://digwp.com/2011/04/admin-bar-tricks/#disable-for-users
//https://digwp.com/2011/04/admin-bar-tricks/
if (!current_user_can('edit_posts')) {
    add_filter('show_admin_bar', '__return_false');
}
