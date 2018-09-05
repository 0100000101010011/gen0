<?php
/**
 *
 * @package gen0
 * @author  Seggido, LLC
 * @license GPL-2.0+
 * @link    seggido.com
 */

function themeprefix_cpt_layout() {
//res: https://wordpress.stackexchange.com/questions/193907/how-to-check-if-a-plugin-woocommerce-is-active
    if ( class_exists( 'WooCommerce' ) ) {
        //res: https://wpbeaches.com/make-all-woocommerce-pages-full-width-in-genesis-including-product-pages/
        //this creates a bug, if the site doesn't have woocommerce installed, it won't load the elementor editor on pages
        //you'll have to refactor this code below to account for that, when there is no woocommerce installed
        //Full Width Pages on WooCommerce
      if( is_page ( array( 'cart', 'checkout' )) || is_shop() || 'product' == get_post_type() ) {
       return 'full-width-content';
   }
}

}
