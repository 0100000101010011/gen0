<?php
/**
 *
 * @package gen0
 * @author  Seggido, LLC
 * @license GPL-2.0+
 * @link    seggido.com
 */

//res: https://wordpress.stackexchange.com/questions/91299/how-to-display-by-default-only-published-posts-pages-in-the-admin-area
// change page link to display published pages only
    function wcs_change_admin_page_link() {
        global $submenu;
        $submenu['edit.php?post_type=page'][5][2] = 'edit.php?post_type=page&post_status=publish';
    }
    add_action( 'admin_menu', 'wcs_change_admin_page_link' );
