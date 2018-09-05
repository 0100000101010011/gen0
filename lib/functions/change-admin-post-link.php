<?php
/**
 *
 * @package gen0
 * @author  Seggido, LLC
 * @license GPL-2.0+
 * @link    seggido.com
 */

// change post link to display published posts only
    function wcs_change_admin_post_link() {
        global $submenu;
        $submenu['edit.php'][5][2] = 'edit.php?post_status=publish';
    }
    add_action( 'admin_menu', 'wcs_change_admin_post_link' );
