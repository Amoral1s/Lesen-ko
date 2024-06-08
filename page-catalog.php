<?php
/**
 Template Name: Каталог лестниц
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
<main class="catalog-page">
  <div class="container">
    <h1 class="page-title"><?php the_title(); ?></h1>
    <div class="catalog-page-wrap">
      <?php if (have_rows('cat_constructor', 'options')) : while(have_rows('cat_constructor', 'options')) : the_row(); ?>
        <?php 
          $type = get_sub_field('set_type');
          if ($type == 'square') : 
        ?>
        <section itemscope itemtype="https://schema.org/ItemList" class="popular square">
          <?php if (get_sub_field('title')) : ?>
            <h2 class="title title-sub"><?php the_sub_field('title'); ?></h2>
          <?php endif; ?>
          <?php if (get_sub_field('subtitle')) : ?>
            <p class="subtitle"><?php the_sub_field('subtitle'); ?></p>
          <?php endif; ?>
          <div class="popular-wrap">
            <?php if (have_rows('square_cat')) : while(have_rows('square_cat')) : the_row(); ?>
            <a itemprop="url" itemprop="itemListElement" href="<?php the_sub_field('ssylka'); ?>" class="item" style="background-image: url(
                <?php  
                  $popular_image = get_sub_field('bg_izobrazhenie');
                  echo esc_url($popular_image['url'])
                ?>
              )">
              <b><?php the_sub_field('naimenovanie_lestniczy'); ?></b>
            </a>
            <?php endwhile; endif; ?>
          </div>
        </section>
        <?php elseif ($type == 'round') : ?>
        <section itemscope itemtype="https://schema.org/ItemList" class="item round">
          <?php if (get_sub_field('title')) : ?>
            <h2 class="title title-sub"><?php the_sub_field('title'); ?></h2>
          <?php endif; ?>
          <?php if (get_sub_field('subtitle')) : ?>
            <p class="subtitle"><?php the_sub_field('subtitle'); ?></p>
          <?php endif; ?>
          <div class="round-wrap">
            <?php if (have_rows('round_cat')) : while(have_rows('round_cat')) : the_row(); ?>
            <a itemprop="url" itemprop="itemListElement" href="<?php the_sub_field('ssylka'); ?>" class="round-wrap-item" >
              <?php
                $know_image = get_sub_field('bg_izobrazhenie'); // Получаем массив данных из поля ACF
                if ($know_image) {
                    if ($know_image['alt']) {
                      echo '<img  itemprop="image" src="' . esc_url($know_image['url']) . '" alt="' . esc_attr($know_image['alt']) . '">'; // Выводим изображение
                    } else {
                      echo '<img  itemprop="image" src="' . esc_url($know_image['url']) . '" alt="' . get_sub_field('naimenovanie_lestniczy') . '">'; // Выводим изображение
                    }
                }
              ?>
              <b><?php the_sub_field('naimenovanie_lestniczy'); ?></b>
            </a>
            <?php endwhile; endif; ?>
          </div>
        </section>
        <?php elseif ($type == 'text') : ?>
        <section itemscope itemtype="https://schema.org/ItemList" class="item text">
          <?php if (get_sub_field('title')) : ?>
            <h2 class="title <?php if (get_sub_field('subtitle')) { echo 'title-sub'; } ?>"><?php the_sub_field('title'); ?></h2>
          <?php endif; ?>
          <?php if (get_sub_field('subtitle')) : ?>
            <p class="subtitle"><?php the_sub_field('subtitle'); ?></p>
          <?php endif; ?>
          <div class="text-wrap">
            <?php if (have_rows('text_cat')) : while(have_rows('text_cat')) : the_row(); ?>
            <a itemprop="url" itemprop="itemListElement" href="<?php the_sub_field('ssylka'); ?>" class="text-wrap-item" >
              <?php the_sub_field('naimenovanie_lestniczy'); ?>
            </a>
            <?php endwhile; endif; ?>
          </div>
        </section>
        <?php endif; ?>
      <?php endwhile; endif; ?>
    </div>
  </div>
</main>

<?php if (get_field('true_banners', 'options')) : ?>
<section class="banner-slider container">
  <div class="banner-slider-wrap swiper">
    <div class="swiper-wrapper">
      <?php if (have_rows('actions', 'options')) : while(have_rows('actions', 'options')) : the_row(); ?>
      <div class="swiper-slide item">
        <div class="left">
          <?php
            $feed_image_pc = get_sub_field('izobrazhenie_bannera_png_razmer'); // Получаем массив данных из поля ACF
            $feed_image_mob = get_sub_field('izobrazhenie_bannera_png_razmer_mob'); // Получаем массив данных из поля ACF
            if ($feed_image_pc && $feed_image_mob) {
                if ($feed_image_pc['alt']) {
                  echo '<img  itemprop="image" class="pc" src="' . esc_url($feed_image_pc['url']) . '" alt="' . esc_attr($feed_image_pc['alt']) . '">'; // Выводим изображение
                } else {
                  echo '<img  itemprop="image" class="pc" src="' . esc_url($feed_image_pc['url']) . '" alt="' . get_sub_field('akcziya') . '">'; // Выводим изображение
                }
                if ($feed_image_mob['alt']) {
                  echo '<img  itemprop="image" class="mob" src="' . esc_url($feed_image_mob['url']) . '" alt="' . esc_attr($feed_image_mob['alt']) . '">'; // Выводим изображение
                } else {
                  echo '<img  itemprop="image" class="mob" src="' . esc_url($feed_image_mob['url']) . '" alt="' . get_sub_field('akcziya') . '">'; // Выводим изображение
                }
            }
          ?>
        </div>
        <div class="right">
          <b><?php the_sub_field('akcziya'); ?></b>
          <?php if (get_sub_field('link')) : ?>
            <a href="<?php the_sub_field('link'); ?>">
              <span>Подробнее</span>
              <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M8.46967 18.5303C8.17678 18.2374 8.17678 17.7626 8.46967 17.4697L13.9393 12L8.46967 6.53033C8.17678 6.23744 8.17678 5.76256 8.46967 5.46967C8.76256 5.17678 9.23744 5.17678 9.53033 5.46967L15.5303 11.4697C15.8232 11.7626 15.8232 12.2374 15.5303 12.5303L9.53033 18.5303C9.23744 18.8232 8.76256 18.8232 8.46967 18.5303Z" fill="white"/>
                </svg>
              </div>
            </a>
          <?php endif; ?>
        </div>
      </div>
      <?php endwhile; endif; ?>
    </div>
    <div class="dots swiper-pagination"></div>
  </div>
</section>
<?php endif; ?>

<?php if (get_field('true_features', 'options')) : ?>
<section class="features">
  <div class="container">
    <div class="features-wrap">
      <div class="left">
        <h2 class="title"><?php the_field('features_title', 'options'); ?></h2>
        <p><?php the_field('features_subtitle', 'options'); ?></p>
        <div class="button callback">
          Оставить заявку
        </div>
      </div>
      <div class="right">
        <?php if (have_rows('features', 'options')) : while(have_rows('features', 'options')) : the_row(); ?>
        <div class="item">
          <div class="icon">
            <img  itemprop="image" src="<?php the_sub_field('ikonka'); ?>" alt="icon">
          </div>
          <b><?php the_sub_field('zagolovok'); ?></b>
          <p><?php the_sub_field('opisanie'); ?></p>
        </div>
        <?php endwhile; endif; ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (get_field('true_numbers', 'options')) : ?>
<section class="professionals mb0 bg-dark">
  <div class="container">
    <div class="professionals-wrap">
      <div class="left">
        <h2 class="title title-sub"><?php the_field('profi_title', 'options'); ?></h2>
        <p class="subtitle"><?php the_field('profi_subtitle', 'options'); ?></p>
        <div class="row">
          <?php $profi_i = 1; if (have_rows('profi', 'options')) : while(have_rows('profi', 'options')) : the_row(); ?>
          <div class="item">
            <div class="num">0<?php echo $profi_i; ?></div>
            <b><?php the_sub_field('zagolovok'); ?></b>
            <p><?php the_sub_field('tekst'); ?></p>

          </div>
          <?php $profi_i++; endwhile; endif; ?>
        </div>
        <div class="button callback">
          Заявка
        </div>
      </div>
      <div class="right">
        <?php
          $profi_img = get_field('profi_img', 'options'); // Получаем массив данных из поля ACF
          if ($profi_img) {
              if ($profi_img['alt']) {
                echo '<img  itemprop="image" src="' . esc_url($profi_img['url']) . '" alt="' . esc_attr($profi_img['alt']) . '">'; // Выводим изображение
              } else {
                echo '<img  itemprop="image" src="' . esc_url($profi_img['url']) . '" alt="' . get_sub_field('imya') . '">'; // Выводим изображение
              }
          }
        ?>
        
      </div>
    </div>
  </div>
</section>
<?php endif; ?>


<?php
get_footer();
