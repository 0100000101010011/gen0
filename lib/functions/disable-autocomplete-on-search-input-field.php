<?php
/**
 *
 * @package gen0
 * @author  Seggido, LLC
 * @license GPL-2.0+
 * @link    seggido.com
 */

/*could put in mu plugins*/
/*disable autocomplete on the search input field*/
//res: http://www.technoedu.com/forums/topic/wordpress-solved-customizing-wordpress-search-form-template-genesis/
add_filter( 'genesis_search_form', 'my_search_form_filter', 5 );
function my_search_form_filter($form) {

    $document = new DOMDocument();
    $document->loadHTML($form);
    $xpath = new DOMXPath($document);
    $input = $xpath->query('//input[@name="s"]');
    if ($input->length > 0) {
        $input->item(0)->setAttribute('autocomplete', 'off');
    }

    # remove <!DOCTYPE
    $document->removeChild($document->doctype);
    # remove <html><body></body></html>
    $document->replaceChild($document->firstChild->firstChild->firstChild, $document->firstChild);
    $form_html = $document->saveHTML();

    return $form_html;
}
