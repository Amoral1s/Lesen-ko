<?php 


function service_list() {
  ob_start();
  get_template_part('shortcodes/serv-list');
  return ob_get_clean();
}
add_shortcode('service_list', 'service_list');

function gallery() {
  ob_start();
  get_template_part('shortcodes/gallery');
  return ob_get_clean();
}
add_shortcode('gallery_post', 'gallery');

function table() {
  ob_start();
  get_template_part('shortcodes/table');
  return ob_get_clean();
}
add_shortcode('table', 'table');

function video() {
  ob_start();
  get_template_part('shortcodes/features');
  return ob_get_clean();
}
add_shortcode('video', 'video');

function features() {
  ob_start();
  get_template_part('shortcodes/features');
  return ob_get_clean();
}
add_shortcode('features', 'features');
function calc() {
  ob_start();
  get_template_part('shortcodes/calc');
  return ob_get_clean();
}
add_shortcode('calc', 'calc');

