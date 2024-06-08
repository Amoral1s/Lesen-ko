<?php
@include('inc/main.php');
@include('inc/posts.php');
@include('inc/seo.php');
@include('inc/shortcodes.php');
//@include('inc/ajax_query.php');
//@include('inc/woocommerce.php');


function add_noindex_nofollow_to_pagination() {
  if (is_paged()) {
    echo '<meta name="robots" content="noindex, nofollow" />';
  }
}
add_action('wp_head', 'add_noindex_nofollow_to_pagination');

function add_canonical_link_to_pagination() {
  if (is_paged()) {
    global $paged;
    $page_number = ($paged > 1) ? $paged : 1;
    $canonical_url = get_pagenum_link($page_number);
    echo '<link rel="canonical" href="' . $canonical_url . '" />';
  }
}
add_action('wp_head', 'add_canonical_link_to_pagination');




