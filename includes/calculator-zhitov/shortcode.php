<?php
/**
 * Created by PhpStorm.
 * User: denisivanin
 * Date: 2019-03-07
 * Time: 09:13
 */

add_shortcode('hiweb-calculator', function($data) {
    include_js(__DIR__ . '/calculator-zhitov.js', [ 'jquery-core' ]);
    include_css(__DIR__ . '/calculator-zhitov.css');
    $template = isset($data['template']) ? $data['template'] : '90deg';
    ob_start();
    $template_path = __DIR__ . '/templates/' . \hiweb\core\Strings::sanitize_id($template) . '.php';
    if (file_exists($template_path) && is_file($template_path)) {
        include $template_path;
        ?>
        <script>
            jQuery(document).ready(function ($) {

                $("form").submit(function () {
                    var param = $(this).serialize();
                    $("#image").attr("src", "http://www.zhitov.ru/" + $(this).attr('data-lestnica') + "/image.php?" + param);
                    $("#image1").attr("src", "http://www.zhitov.ru/" + $(this).attr('data-lestnica') + "/image1.php?" + param);
                    $("#image2").attr("src", "http://www.zhitov.ru/" + $(this).attr('data-lestnica') + "/image2.php?" + param);
                    $("#image_stup").attr("src", "http://www.zhitov.ru/" + $(this).attr('data-lestnica') + "/image_stup.php?" + param);
                    $("#image_1").attr("src", "http://www.zhitov.ru/" + $(this).attr('data-lestnica') + "/image_1.php?" + param);
                    return false;
                });

                let $images = $('.block_img img');
                if ($images.length > 0 && $.fancybox) {
                    $images.on('click', function () {
                        $.fancybox.open({
                            src: $(this).attr('src')
                        });
                    });
                }

            });
        </script>
        <?php
    } else {
        ?>
        <!--CALCULATOR TEMPLATE NOT EXISTS--><p>Шабон калькулятора [<b><?= $template ?></b>] не существует</p>
        <?php
    }
    return ob_get_clean();
});