<?php
/**
 *
 * @package gen0
 * @author  Seggido, LLC
 * @license GPL-2.0+
 * @link    seggido.com
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

wc_print_notices();

/**
 * My Account navigation.
 * @since 2.6.0
 */
do_action( 'woocommerce_account_navigation' ); ?>

<div class="woocommerce-MyAccount-content">
    <?php
        /**
         * My Account content.
         * @since 2.6.0
         */
        do_action( 'woocommerce_account_content' );
    ?>
</div>
