<?php
/**
 *
 * @package gen0
 * @author  Seggido, LLC
 * @license GPL-2.0+
 * @link    seggido.com
 */

/*WooCommerce removed these as options under WooCommerce > Settings > Products > Display, so you won't see this as an option, it'll just be automatically applied, refresh the page and click on your product image and you'll see the image displayed in the gallery option you chose*/
/*ref: https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0*/
/*ref: https://wordpress.org/support/topic/product-image-lightbox-not-working-in-version-3-0/*/
// add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
// add_theme_support( 'wc-product-gallery-slider' );
