<?php 
//новая длина размера цитаты start
function wph_excerpt_length($length) {
	return 10; 
}
add_filter('excerpt_length', 'wph_excerpt_length');


add_filter('excerpt_more', function($more) {
	return '...';
});

add_filter( 'get_the_archive_title', 'artabr_remove_name_cat' );
function artabr_remove_name_cat( $title ){
  if ( is_category() ) {
    $title = single_cat_title( '', false );
  } elseif ( is_tag() ) {
    $title = single_tag_title( '', false );
  }
  return $title;
}


/* Выводим кол-во просмотров поста */
function getPostViews($postID){
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if($count == '') {
      delete_post_meta($postID, $count_key);
      add_post_meta($postID, $count_key, '0');
      return "0";
  }
  return $count;
}
function setPostViews($postID) {
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if($count==''){
      $count = 0;
      delete_post_meta($postID, $count_key);
      add_post_meta($postID, $count_key, '0');
  }else{
      $count++;
      update_post_meta($postID, $count_key, $count);
  }
}

// подключаем расчет чтения
if ( ! function_exists( 'gp_read_time' ) ) {
  function gp_read_time() {
  $text = get_the_content( '' );
  $words = str_word_count( strip_tags( $text ), 0, 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' );
  if ( !empty( $words ) ) {
  $time_in_minutes = ceil( $words / 200 );
  return $time_in_minutes;
  }
  return false;
  }
  }

function remove_taxonomy_archive_title( $title ) {
  if ( is_tax() ) {
      $tax = get_queried_object();
      $tax_label = $tax->labels->singular_name;
      $title = str_replace( " Архивы $tax_label", '', $title );
  }
  return $title;
}
add_filter( 'get_the_archive_title', 'remove_taxonomy_archive_title' );