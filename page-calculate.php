<?php
/**
 Template Name: Расчет лестницы
*/

get_header();
?>
<div class="page-top">
  <div class="container">
    <?php
      if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p class="breadcrumbs">', '</p>'); }
    ?>
  </div>
</div>

<section class="calc">
  <div class="container">
    <h1 class="page-title title-sub"><?php the_title(); ?></h1>
    <p class="subtitle">Пройдите опрос и получите бесплатный расчёт стоимости</p>
    <div class="calc-wrapper">
      <div class="images calc-item-wrap">
        <b class="title calc-item-title"><?php echo get_field('1_title', 'options'); ?></b>
        <div class="images-row">
          <?php $index = 1; if (have_rows('1_row', 'options')) : while(have_rows('1_row', 'options')) : the_row(); ?>
            <input value="<?php the_sub_field('znachenie'); ?>" style="display: none" type="radio" name="type" id="type_<?php echo $index; ?>" <?php if ($index == 1) { echo 'checked'; } ?>>
            <label class="item" for="type_<?php echo $index; $index++; ?>">
              <?php
                $image = get_sub_field('izobrazhenie'); // Получаем массив данных из поля ACF
                if ($image) {
                  if (!empty($image['alt'])) {
                    echo '<img  itemprop="image" src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '">'; // Выводим изображение
                  } else {
                    echo '<img  itemprop="image" src="' . esc_url($image['url']) . '" alt="' . get_sub_field('zagolovok') . '">'; // Выводим изображение
                  }
                }
              ?>
              <b><?php the_sub_field('zagolovok'); ?></b>
          </label>
          <?php endwhile; endif; ?>
        </div>
      </div>

      <div class="images calc-item-wrap">
        <b class="title calc-item-title"><?php echo get_field('2_title', 'options'); ?></b>
        <div class="images-row">
          <?php $index = 1; if (have_rows('2_row', 'options')) : while(have_rows('2_row', 'options')) : the_row(); ?>
            <input value="<?php the_sub_field('znachenie'); ?>" style="display: none" type="radio" name="material" id="material_<?php echo $index; ?>" <?php if ($index == 1) { echo 'checked'; } ?>>
            <label class="item" for="material_<?php echo $index; $index++; ?>">
              <?php
                $image = get_sub_field('izobrazhenie'); // Получаем массив данных из поля ACF
                if ($image) {
                  if (!empty($image['alt'])) {
                    echo '<img  itemprop="image" src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '">'; // Выводим изображение
                  } else {
                    echo '<img  itemprop="image" src="' . esc_url($image['url']) . '" alt="' . get_sub_field('zagolovok') . '">'; // Выводим изображение
                  }
                }
              ?>
              <b><?php the_sub_field('zagolovok'); ?></b>
            </label>
          <?php endwhile; endif; ?>
        </div>
      </div>

      <div class="textes calc-item-wrap">
        <b class="title calc-item-title"><?php echo get_field('3_title', 'options'); ?></b>
        <div class="textes-row">
          <?php $index = 1; if (have_rows('3_row', 'options')) : while(have_rows('3_row', 'options')) : the_row(); ?>
            <input value="<?php the_sub_field('znachenie'); ?>" style="display: none" type="radio" name="pokritie" id="pokritie_<?php echo $index; ?>" <?php if ($index == 1) { echo 'checked'; } ?>>
            <label class="item" for="pokritie_<?php echo $index; $index++; ?>">
              <b><?php the_sub_field('zagolovok'); ?></b>
            </label>
          <?php endwhile; endif; ?>
        </div>
      </div>

      <div class="images calc-item-wrap big">
        <b class="title calc-item-title"><?php echo get_field('4_title', 'options'); ?></b>
        <div class="images-row">
          <?php $index = 1; if (have_rows('4_row', 'options')) : while(have_rows('4_row', 'options')) : the_row(); ?>
            <input value="<?php the_sub_field('znachenie'); ?>" style="display: none" type="radio" name="podstup" id="podstup_<?php echo $index; ?>" <?php if ($index == 1) { echo 'checked'; } ?>>
            <label class="item" for="podstup_<?php echo $index; $index++; ?>">
              <?php
                $image = get_sub_field('izobrazhenie'); // Получаем массив данных из поля ACF
                if ($image) {
                  if (!empty($image['alt'])) {
                    echo '<img  itemprop="image" src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '">'; // Выводим изображение
                  } else {
                    echo '<img  itemprop="image" src="' . esc_url($image['url']) . '" alt="' . get_sub_field('zagolovok') . '">'; // Выводим изображение
                  }
                }
              ?>
              <b><?php the_sub_field('zagolovok'); ?></b>
            </label>
          <?php endwhile; endif; ?>
        </div>
      </div>

      <div class="ranges calc-item-wrap">
        <b class="title calc-item-title"><?php echo get_field('5_title', 'options'); ?></b>
        <div class="ranges-block">
          <?php $index = 1; if (have_rows('5_row', 'options')) : while(have_rows('5_row', 'options')) : the_row(); ?>
            <div class="item">
              <p><?php the_sub_field('zagolovok'); ?></p>
              <span class="view-val"><?php the_sub_field('znachenie_po_umolchaniyu'); ?></span>
              <input type="range" id="range_<?php echo $index; $index++; ?>"
                data-min="<?php the_sub_field('min_znachenie'); ?>"
                data-max="<?php the_sub_field('maks_znachenie'); ?>"
                data-step="<?php the_sub_field('shag'); ?>"
                data-default="<?php the_sub_field('znachenie_po_umolchaniyu'); ?>"
                data-price="[
                  <?php if (have_rows('shag_znachenie')) : while(have_rows('shag_znachenie')) : the_row(); ?>
                  [<?php the_sub_field('maks_znachenie'); ?>, <?php the_sub_field('stoimost'); ?>],
                  <?php endwhile; endif; ?>
                ]"
              >
            </div>
            
          <?php endwhile; endif; ?>
        </div>
      </div>
      
    </div>
    <div class="calc-form">
      <div class="left">
        <b><?php echo get_field('buy_title','options'); ?></b>
        <p><?php echo get_field('buy_subtitle','options'); ?></p>
      </div>
      <div class="right">
        <div class="meta">
          <strong><span class="summ">0</span> ₽</strong>
          <small><?php echo get_field('oboznachenie_czeny','options'); ?></small>
        </div>
        <div class="button calculate-call">
          Заказать лестницу
        </div>
      </div>
    </div>
  </div>
</section>




<?php
get_footer();
