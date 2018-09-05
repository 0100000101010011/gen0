<?php
/**
 *
 * @package gen0
 * @author  Seggido, LLC
 * @license GPL-2.0+
 * @link    seggido.com
 */

    /*res: http://www.wpbeginner.com/wp-themes/adding-a-custom-dashboard-logo-in-wordpress-for-branding/*/
    /*custom dashboard logo - put this in mu-plugins*/
    function wpb_custom_logo() {
        echo '
        <style type="text/css">
#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
            background-image: url(http://throttlewp.dev/wp-content/uploads/2017/06/logo-favicon.png) !important;
            background-position: 0 0;
            color: rgba(0, 0, 0, 0);
            width: 25px;
            height: 25px;
            background-size: cover;
            filter: grayscale(100%);
        }
#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
        background-position: 0 0;
    }
    .custom-logo-link {
        margin: 0;
        width: 25px;
        height: 25px;
        display: block;
        text-align: center;
    }

    @media screen and (max-width: 782px) {
        .custom-logo-link {
            display: none;
        }
    }
</style>
';
}

//hook into the administrative header output
add_action('wp_before_admin_bar_render', 'wpb_custom_logo');
