<?php

function _zhitov_calculator_ajax() {
    $lestnica = (isset($_GET['data-lestnica']) && $_GET['data-lestnica'] != '') ? $_GET['data-lestnica'] : 'lestnica';
    $url = 'http://www.zhitov.ru/'.$lestnica.'/calculator.php';
    $params = $_GET;
    $params['new_tab'] = '1';
    $url = $url . "?" . http_build_query($params);
    $content = file_get_contents($url);
    echo $content;
    wp_die();
}

add_action('wp_ajax_zhitov_calculator', '_zhitov_calculator_ajax');
add_action('wp_ajax_nopriv_zhitov_calculator', '_zhitov_calculator_ajax');
