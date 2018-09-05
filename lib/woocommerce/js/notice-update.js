jQuery(document).on( 'click', '.theme-woocommerce-notice .notice-dismiss', function() {

	jQuery.ajax({
	    url: ajaxurl,
	    data: {
	        action: 'theme_dismiss_woocommerce_notice'
	    }
	});

});
