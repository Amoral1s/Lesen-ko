<?php get_header(); ?>

<section class="offer">
  <div class="container">
    <div class="left">
      <h1 class="page-title">
        <?php the_field('offer_title', 'options'); ?>
      </h1>
      <p class="subtitle">
        <?php the_field('offer_subtitle', 'options'); ?>
      </p>
     <div class="row">
      <a href="<?php the_permalink(1272); ?>" class="button">
        Бесплатный расчёт
      </a>
      <div class="button callback button-transparent">
        Связаться с нами
      </div>
      
     </div>
      <div class="offer-feat">
        <?php if (have_rows('of_feat', 'options')) : while(have_rows('of_feat', 'options')) : the_row(); ?>
        <div class="item">
          <div class="icon">
            <img src="<?php the_sub_field('ikonka'); ?>" alt="<?php the_sub_field('zagolovok'); ?>">
          </div>
          <p><?php the_sub_field('zagolovok'); ?></p>
        </div>
        <?php endwhile; endif; ?>
      </div>
    </div>
    <div class="right">
      <img class="pc" style="display: none" src="<?php the_field('offer_bg', 'options'); ?>" title="<?php the_field('offer_title', 'options'); ?>" alt="<?php the_field('offer_title', 'options'); ?>" />
      <img class="mob" src="<?php the_field('offer_bg_mob', 'options'); ?>" title="<?php the_field('offer_title', 'options'); ?>" alt="<?php the_field('offer_title', 'options'); ?>" />
    </div>
    
  </div>
</section>

<div class="container">
  <div class="offer-form">
    <div class="form">
      <b class="title">Получите бесплатный индивидуальный расчёт стоимости</b>
      <p class="subtitle">Разработка проекта и монтаж входят в стоимость</p>
      <?php echo do_shortcode('[contact-form-7 id="1d5ca37" title="Бесплатный расчет"]'); ?>
    </div>
  </div>
</div>

<section class="case-slider">
  <div class="container">
    <h2 class="title title-sub"><?php the_field('slider_title', 'options'); ?></h2>
    <p class="subtitle"><?php the_field('slider_subtitle', 'options'); ?></p>
    <div class="case-slider-wrap">
      <div class="arr arr-prev">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5303 5.46967C15.8232 5.76256 15.8232 6.23744 15.5303 6.53033L10.0607 12L15.5303 17.4697C15.8232 17.7626 15.8232 18.2374 15.5303 18.5303C15.2374 18.8232 14.7626 18.8232 14.4697 18.5303L8.46967 12.5303C8.17678 12.2374 8.17678 11.7626 8.46967 11.4697L14.4697 5.46967C14.7626 5.17678 15.2374 5.17678 15.5303 5.46967Z" fill="#C01025"/>
        </svg>
      </div>
      <div class="swiper case-slider-wrap__main">
        <div class="swiper-wrapper">
          <?php
            $slider_posts_id = get_field('slider_main', 'options');
            $args = array(
              'post_type'      => 'stairs',
              'post__in'       => $slider_posts_id,
              'orderby'        => 'post__in',
              'posts_per_page' => -1
            );
            $query = new WP_Query( $args );

            if ( $query->have_posts() ) {
              while ( $query->have_posts() ) {
                $query->the_post();

            $stair_gallery = get_field('gallery');
          ?>
          <div class="swiper-slide item">
            <div class="left">
              <img src="<?php echo $stair_gallery[0]['url']; ?>" alt="<?php if ($stair_gallery[0]['alt']) { echo $stair_gallery[0]['alt']; } else { the_title(); } ?>">
            </div>
            <div class="right">
              <h3 class="right-title"><?php the_title(); ?></h3>
              <div class="meta">
                <?php if (get_field('type_house')) : ?>
                <div class="meta-row">
                  <p class="key">Тип помещения</p>
                  <strong class="value"><?php the_field('type_house'); ?></strong>
                </div>
                <?php endif; ?>
                <?php if (get_field('material')) : ?>
                <div class="meta-row">
                  <p class="key">Материал</p>
                  <strong class="value"><?php the_field('material'); ?></strong>
                </div>
                <?php endif; ?>
                <?php if (get_field('type')) : ?>
                <div class="meta-row">
                  <p class="key">Вид лестницы</p>
                  <strong class="value"><?php the_field('type'); ?></strong>
                </div>
                <?php endif; ?>
                <?php if (get_field('height')) : ?>
                <div class="meta-row">
                  <p class="key">Высота от поло до потолка</p>
                  <strong class="value"><?php the_field('height'); ?></strong>
                </div>
                <?php endif; ?>
                <?php if (get_field('stup')) : ?>
                <div class="meta-row">
                  <p class="key">Количество ступеней</p>
                  <strong class="value"><?php the_field('stup'); ?></strong>
                </div>
                <?php endif; ?>
                <?php if (get_field('barrier')) : ?>
                <div class="meta-row">
                  <p class="key">Ограждения</p>
                  <strong class="value"><?php the_field('barrier'); ?></strong>
                </div>
                <?php endif; ?>
              </div>
              <div class="bottom">
                <div class="price-wrapper <?php if (!get_field('price')) { echo 'empty'; } ?>">
                  <div class="price">
                    <?php if (get_field('price')) : ?>
                      <strong><?php the_field('price'); ?></strong>
                    <?php else : ?>
                      <strong class="empty">Стоимость по запросу</strong>
                    <?php endif; ?>
                  </div>
                  <time>
                    <div class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 5.25C12.4142 5.25 12.75 5.58579 12.75 6L12.75 11.25L18 11.25C18.4142 11.25 18.75 11.5858 18.75 12C18.75 12.4142 18.4142 12.75 18 12.75L12 12.75C11.5858 12.75 11.25 12.4142 11.25 12L11.25 6C11.25 5.58579 11.5858 5.25 12 5.25Z" fill="#C01025"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2.75C6.89137 2.75 2.75 6.89137 2.75 12C2.75 17.1086 6.89137 21.25 12 21.25C17.1086 21.25 21.25 17.1086 21.25 12C21.25 6.89137 17.1086 2.75 12 2.75ZM1.25 12C1.25 6.06294 6.06294 1.25 12 1.25C17.9371 1.25 22.75 6.06294 22.75 12C22.75 17.9371 17.9371 22.75 12 22.75C6.06294 22.75 1.25 17.9371 1.25 12Z" fill="#C01025"/>
                      </svg>
                    </div>
                    <?php if (get_field('srok_izgotovleniya')) : ?>
                      <p><?php the_field('srok_izgotovleniya'); ?></p>
                    <?php else : ?>
                      <p>от 20 дней</p>
                    <?php endif; ?>
                  </time>
                </div>
                <div class="button buy-stair" data-link="<?php the_permalink(); ?>" data-title="<?php the_title(); ?>">
                  Хочу такую лестницу
                </div>
              </div>
            </div>
          </div>
          <?php } }  wp_reset_postdata(); ?>
        </div>
      </div>
      <div class="arr arr-next">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M8.46967 18.5303C8.17678 18.2374 8.17678 17.7626 8.46967 17.4697L13.9393 12L8.46967 6.53033C8.17678 6.23744 8.17678 5.76256 8.46967 5.46967C8.76256 5.17678 9.23744 5.17678 9.53033 5.46967L15.5303 11.4697C15.8232 11.7626 15.8232 12.2374 15.5303 12.5303L9.53033 18.5303C9.23744 18.8232 8.76256 18.8232 8.46967 18.5303Z" fill="#C01025"/>
        </svg>
      </div>
      <div class="dots swiper-pagination" style="display: none"></div>
    </div>
    <div class="case-slider-wrap__thumbs swiper">
      <div class="swiper-wrapper">
        <?php
           $slider_posts_id = get_field('slider_main', 'options');
           $args = array(
             'post_type'      => 'stairs',
             'post__in'       => $slider_posts_id,
             'orderby'        => 'post__in',
             'posts_per_page' => -1
           );
          $query = new WP_Query( $args );

          if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
              $query->the_post();

          $stair_gallery = get_field('gallery');
        ?>
        <div class="swiper-slide item">
          <img src="<?php echo $stair_gallery[0]['url']; ?>" alt="<?php if ($stair_gallery[0]['alt']) { echo $stair_gallery[0]['alt']; } else { the_title(); } ?>">
          <b><?php the_title(); ?></b>
          <div class="price">
            <?php if (get_field('price')) : ?>
              <strong><?php the_field('price'); ?></strong>
            <?php else : ?>
              <strong class="empty">Стоимость по запросу</strong>
            <?php endif; ?>
          </div>
        </div>
        <?php } }  wp_reset_postdata(); ?>
      </div>
    </div>
  </div>
</section>

<?php if (get_field('yt_title', 'options')) : ?>
<section class="banner-youtube container">
  <div class="wrap">
    <div class="left">
      <h2 class="left-title"><?php the_field('yt_title', 'options'); ?></h2>
      <p><?php the_field('yt_subtitle', 'options'); ?></p>
      <a class="button button-white" href="<?php the_field('yt_link', 'options'); ?>" target="blank" rel="nofollow">
        <div class="icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M22.3329 6.8158C22.0843 5.89257 21.3564 5.16464 20.4332 4.91608C18.7465 4.45447 11.9999 4.45447 11.9999 4.45447C11.9999 4.45447 5.25319 4.45447 3.56652 4.89833C2.66105 5.14689 1.91537 5.89257 1.66681 6.8158C1.22295 8.50247 1.22295 12.0001 1.22295 12.0001C1.22295 12.0001 1.22295 15.5154 1.66681 17.1844C1.91537 18.1076 2.6433 18.8355 3.56652 19.0841C5.27094 19.5457 11.9999 19.5457 11.9999 19.5457C11.9999 19.5457 18.7465 19.5457 20.4332 19.1018C21.3564 18.8533 22.0843 18.1253 22.3329 17.2021C22.7768 15.5154 22.7768 12.0178 22.7768 12.0178C22.7768 12.0178 22.7945 8.50247 22.3329 6.8158Z" fill="#FF0000"/>
            <path d="M9.85161 15.2314L15.462 12.0001L9.85161 8.7688V15.2314Z" fill="white"/>
          </svg>
        </div>
        <span>Смотреть</span>
      </a>
    </div>
    <div class="right">
      <img class="pc" src="<?php the_field('yt_img', 'options'); ?>" alt="<?php the_field('yt_title', 'options'); ?>">
      <img class="mob" style="display: none" src="<?php the_field('yt_img_mob', 'options'); ?>" alt="<?php the_field('yt_title', 'options'); ?>">
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (get_field('popular_title', 'options')) : ?>
<section class="popular">
  <div class="container">
    <h2 class="title title-sub"><?php the_field('popular_title', 'options'); ?></h2>
    <p class="subtitle"><?php the_field('popular_subtitle', 'options'); ?></p>
    <div class="popular-wrap">
      <?php if (have_rows('popular', 'options')) : while(have_rows('popular', 'options')) : the_row(); ?>
      <a href="<?php the_sub_field('ssylka'); ?>" class="item" style="background-image: url(
          <?php  
            $popular_image = get_sub_field('izobrazhenie');
            echo esc_url($popular_image['url'])
          ?>
        )">
        <b><?php the_sub_field('naimenovanie'); ?></b>
      </a>
      <?php endwhile; endif; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (get_field('know_title', 'options')) : ?>
<section class="know container">
  <div class="know-wrap">
    <div class="left">
      <h2 class="title title-sub"><?php the_field('know_title', 'options'); ?></h2>
      <p class="subtitle"><?php the_field('know_subtitle', 'options'); ?></p>
      <div class="button callback">
        Получить консультацию
      </div>
    </div>
    <div class="right">
      <?php if (have_rows('know', 'options')) : while(have_rows('know', 'options')) : the_row(); ?>
      <a href="<?php the_sub_field('ssylka'); ?>" class="item" >
        <?php
          $know_image = get_sub_field('izobrazhenie'); // Получаем массив данных из поля ACF
          if ($know_image) {
              if ($know_image['alt']) {
                echo '<img src="' . esc_url($know_image['url']) . '" alt="' . esc_attr($know_image['alt']) . '">'; // Выводим изображение
              } else {
                echo '<img src="' . esc_url($know_image['url']) . '" alt="' . get_sub_field('naimenovanie') . '">'; // Выводим изображение
              }
          }
        ?>
        <b><?php the_sub_field('naimenovanie'); ?></b>
      </a>
      <?php endwhile; endif; ?>
    </div>
    
    
  </div>
</section>
<?php endif; ?>

<section class="calc quiz bg-dark">
  <div class="container">
    <h1 class="page-title title-sub">Узнайте стоимость вашей лестницы прямо сейчас </h1>
    <p class="subtitle">Пройдите опрос и получите бесплатный расчёт стоимости</p>
    <div class="quiz-line"></div>
    <div class="quiz-count-step">
      <div class="step-now">1</div>
      <span>/</span>
      <div class="step-all">5</div>
    </div>
    <div class="calc-wrapper">
      <div class="images quiz-step active calc-item-wrap">
        <b class="title calc-item-title"><?php the_field('1_title', 'options'); ?></b>
        <div class="images-row">
          <?php $index = 1; if (have_rows('1_row', 'options')) : while(have_rows('1_row', 'options')) : the_row(); ?>
            <input value="<?php the_sub_field('znachenie'); ?>" style="display: none" type="radio" name="type" id="type_<?php echo $index; ?>" <?php if ($index == 1) { echo 'checked'; } ?>>
            <label class="item" for="type_<?php echo $index; $index++; ?>">
              <?php
                $image = get_sub_field('izobrazhenie'); // Получаем массив данных из поля ACF
                if ($image) {
                  if (!empty($image['alt'])) {
                    echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '">'; // Выводим изображение
                  } else {
                    echo '<img src="' . esc_url($image['url']) . '" alt="' . get_sub_field('zagolovok') . '">'; // Выводим изображение
                  }
                }
              ?>
              <b><?php the_sub_field('zagolovok'); ?></b>
          </label>
          <?php endwhile; endif; ?>
        </div>
      </div>
      <div class="images quiz-step calc-item-wrap">
        <b class="title calc-item-title"><?php the_field('2_title', 'options'); ?></b>
        <div class="images-row">
          <?php $index = 1; if (have_rows('2_row', 'options')) : while(have_rows('2_row', 'options')) : the_row(); ?>
            <input value="<?php the_sub_field('znachenie'); ?>" style="display: none" type="radio" name="material" id="material_<?php echo $index; ?>" <?php if ($index == 1) { echo 'checked'; } ?>>
            <label class="item" for="material_<?php echo $index; $index++; ?>">
              <?php
                $image = get_sub_field('izobrazhenie'); // Получаем массив данных из поля ACF
                if ($image) {
                  if (!empty($image['alt'])) {
                    echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '">'; // Выводим изображение
                  } else {
                    echo '<img src="' . esc_url($image['url']) . '" alt="' . get_sub_field('zagolovok') . '">'; // Выводим изображение
                  }
                }
              ?>
              <b><?php the_sub_field('zagolovok'); ?></b>
            </label>
          <?php endwhile; endif; ?>
        </div>
      </div>
      <div class="textes quiz-step calc-item-wrap">
        <b class="title calc-item-title"><?php the_field('3_title', 'options'); ?></b>
        <div class="textes-row">
          <?php $index = 1; if (have_rows('3_row', 'options')) : while(have_rows('3_row', 'options')) : the_row(); ?>
            <input value="<?php the_sub_field('znachenie'); ?>" style="display: none" type="radio" name="pokritie" id="pokritie_<?php echo $index; ?>" <?php if ($index == 1) { echo 'checked'; } ?>>
            <label class="item" for="pokritie_<?php echo $index; $index++; ?>">
              <b><?php the_sub_field('zagolovok'); ?></b>
            </label>
          <?php endwhile; endif; ?>
        </div>
      </div>
      <div class="images quiz-step calc-item-wrap big">
        <b class="title calc-item-title"><?php the_field('4_title', 'options'); ?></b>
        <div class="images-row">
          <?php $index = 1; if (have_rows('4_row', 'options')) : while(have_rows('4_row', 'options')) : the_row(); ?>
            <input value="<?php the_sub_field('znachenie'); ?>" style="display: none" type="radio" name="podstup" id="podstup_<?php echo $index; ?>" <?php if ($index == 1) { echo 'checked'; } ?>>
            <label class="item" for="podstup_<?php echo $index; $index++; ?>">
              <?php
                $image = get_sub_field('izobrazhenie'); // Получаем массив данных из поля ACF
                if ($image) {
                  if (!empty($image['alt'])) {
                    echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '">'; // Выводим изображение
                  } else {
                    echo '<img src="' . esc_url($image['url']) . '" alt="' . get_sub_field('zagolovok') . '">'; // Выводим изображение
                  }
                }
              ?>
              <b><?php the_sub_field('zagolovok'); ?></b>
            </label>
          <?php endwhile; endif; ?>
        </div>
      </div>
      <div class="ranges quiz-step calc-item-wrap">
        <b class="title calc-item-title"><?php the_field('5_title', 'options'); ?></b>
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
      <div class="calc-form quiz-step">
        <div class="left">
          <b><?php the_field('buy_title','options'); ?></b>
          <p><?php the_field('buy_subtitle','options'); ?></p>
        </div>
        <div class="right">
          <div class="meta">
            <strong><span class="summ">0</span> ₽</strong>
            <small><?php the_field('oboznachenie_czeny','options'); ?></small>
          </div>
          <div class="button calculate-call">
            Заказать лестницу
          </div>
        </div>
      </div>
    </div>
    <div class="btns">
      <div class="button button-dark back">
        Назад
      </div>
      <div class="button next">
        Далее
      </div>
    </div>
  </div>
</section>

<?php if (get_field('dop_title', 'options')) : ?>
<section class="popular">
  <div class="container">
    <h2 class="title title-sub"><?php the_field('dop_title', 'options'); ?></h2>
    <p class="subtitle"><?php the_field('dop_subtitle', 'options'); ?></p>
    <div class="popular-wrap">
      <?php if (have_rows('dop_cards', 'options')) : while(have_rows('dop_cards', 'options')) : the_row(); ?>
      <a href="<?php the_sub_field('ssylka'); ?>" class="item" style="background-image: url(
          <?php  
            $popular_image = get_sub_field('izobrazhenie');
            echo esc_url($popular_image['url'])
          ?>
        )">
        <b><?php the_sub_field('naimenovanie'); ?></b>
      </a>
      <?php endwhile; endif; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (get_field('features_title', 'options')) : ?>
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
            <img src="<?php the_sub_field('ikonka'); ?>" alt="icon">
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

<?php if (get_field('actions', 'options')) : ?>
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
                  echo '<img class="pc" src="' . esc_url($feed_image_pc['url']) . '" alt="' . esc_attr($feed_image_pc['alt']) . '">'; // Выводим изображение
                } else {
                  echo '<img class="pc" src="' . esc_url($feed_image_pc['url']) . '" alt="' . get_sub_field('akcziya') . '">'; // Выводим изображение
                }
                if ($feed_image_mob['alt']) {
                  echo '<img class="mob" src="' . esc_url($feed_image_mob['url']) . '" alt="' . esc_attr($feed_image_mob['alt']) . '">'; // Выводим изображение
                } else {
                  echo '<img class="mob" src="' . esc_url($feed_image_mob['url']) . '" alt="' . get_sub_field('akcziya') . '">'; // Выводим изображение
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


<?php if (get_field('feedback_title', 'options')) : ?>
<section class="feedback">
  <div class="container">
    <div class="title-block">
      <h2 class="title title-sub"><?php the_field('feedback_title', 'options'); ?></h2>
      <p class="subtitle"><?php the_field('feedback_subtitle', 'options'); ?></p>
      <a href="<?php the_permalink(1201); ?>" class="link">
        <span>Все отзывы</span>
        <div class="icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.46967 18.5303C8.17678 18.2374 8.17678 17.7626 8.46967 17.4697L13.9393 12L8.46967 6.53033C8.17678 6.23744 8.17678 5.76256 8.46967 5.46967C8.76256 5.17678 9.23744 5.17678 9.53033 5.46967L15.5303 11.4697C15.8232 11.7626 15.8232 12.2374 15.5303 12.5303L9.53033 18.5303C9.23744 18.8232 8.76256 18.8232 8.46967 18.5303Z" fill="#C01025"/>
          </svg>
        </div>
      </a>
    </div>
    <div class="feedback-wrap">
      <div class="arr arr-prev">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5303 5.46967C15.8232 5.76256 15.8232 6.23744 15.5303 6.53033L10.0607 12L15.5303 17.4697C15.8232 17.7626 15.8232 18.2374 15.5303 18.5303C15.2374 18.8232 14.7626 18.8232 14.4697 18.5303L8.46967 12.5303C8.17678 12.2374 8.17678 11.7626 8.46967 11.4697L14.4697 5.46967C14.7626 5.17678 15.2374 5.17678 15.5303 5.46967Z" fill="#C01025"/>
        </svg>
      </div>
      <div class="swiper">
        <div class="swiper-wrapper">
        <?php if (have_rows('otzyvy', 'options')) : while(have_rows('otzyvy', 'options')) : the_row(); ?>
          <div class="item video-data swiper-slide" data-src="<?php the_sub_field('ssylka_na_youtube_format_embed'); ?>">
            <div class="play icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="33" height="40" viewBox="0 0 33 40" fill="none">
                <path d="M33 20L2.02023e-06 0.947439L3.68586e-06 39.0526L33 20Z" fill="white"/>
              </svg>
            </div>
            <?php
              $feed_image = get_sub_field('prevyu_izobrazhenie'); // Получаем массив данных из поля ACF
              if ($feed_image) {
                  if ($feed_image['alt']) {
                    echo '<img src="' . esc_url($feed_image['url']) . '" alt="' . esc_attr($feed_image['alt']) . '">'; // Выводим изображение
                  } else {
                    echo '<img src="' . esc_url($feed_image['url']) . '" alt="' . get_sub_field('imya') . '">'; // Выводим изображение
                  }
              }
            ?>
            <div class="meta">
              <b><?php the_sub_field('imya'); ?></b>
              <p><?php the_sub_field('gorod'); ?></p>
            </div>
          </div>
          <?php endwhile; endif; ?>
        </div>
      </div>
      <div class="arr arr-next">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M8.46967 18.5303C8.17678 18.2374 8.17678 17.7626 8.46967 17.4697L13.9393 12L8.46967 6.53033C8.17678 6.23744 8.17678 5.76256 8.46967 5.46967C8.76256 5.17678 9.23744 5.17678 9.53033 5.46967L15.5303 11.4697C15.8232 11.7626 15.8232 12.2374 15.5303 12.5303L9.53033 18.5303C9.23744 18.8232 8.76256 18.8232 8.46967 18.5303Z" fill="#C01025"/>
        </svg>
      </div>
      <div class="dots swiper-pagination" style="display: none"></div>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="news-block">
  <div class="container">
    <div class="title-block">
      <h2 class="title">Наш полезный блог</h2>
      <a href="<?php the_permalink(24); ?>" class="link">
        <span>Все статьи</span>
        <div class="icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.46967 18.5303C8.17678 18.2374 8.17678 17.7626 8.46967 17.4697L13.9393 12L8.46967 6.53033C8.17678 6.23744 8.17678 5.76256 8.46967 5.46967C8.76256 5.17678 9.23744 5.17678 9.53033 5.46967L15.5303 11.4697C15.8232 11.7626 15.8232 12.2374 15.5303 12.5303L9.53033 18.5303C9.23744 18.8232 8.76256 18.8232 8.46967 18.5303Z" fill="#C01025"/>
          </svg>
        </div>
      </a>
    </div>
    <div class="swiper">
      <div class="news-block-wrap swiper-wrapper">
        <?php
          $args = array(
            'post_type'      => 'post',
            'category_name' => 'sovety',
            'posts_per_page' => 4
          );
          $query = new WP_Query( $args );

          if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
              $query->the_post();
        ?>
        <a href="<?php the_permalink(); ?>" class="item swiper-slide">
          <?php
            $news_image_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);

            if (empty($news_image_alt)) {
                $news_image_alt = get_the_title();
            }

            echo wp_get_attachment_image(get_post_thumbnail_id(), 'medium', false, array('alt' => $news_image_alt));
          ?>
          <b><?php the_title(); ?></b>
          <?php 
          if ( has_category() ) {
              $categories = get_the_category();
              echo '<p>' . $categories[0]->name . '</p>'; // Выводим название основной рубрики
          }
          ?>
        </a>
        <?php } }  wp_reset_postdata(); ?>
      </div>
    </div>
    
  </div>
</section>

<?php if (get_field('profi_title', 'options')) : ?>
<section class="professionals bg-dark">
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
                echo '<img src="' . esc_url($profi_img['url']) . '" alt="' . esc_attr($profi_img['alt']) . '">'; // Выводим изображение
              } else {
                echo '<img src="' . esc_url($profi_img['url']) . '" alt="' . get_sub_field('imya') . '">'; // Выводим изображение
              }
          }
        ?>
        
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (get_field('team_title', 'options')) : ?>
<section class="team">
  <div class="container">
    <h2 class="title title-sub"><?php the_field('team_title', 'options'); ?></h2>
    <p class="subtitle"><?php the_field('team_subtitle', 'options'); ?></p>
    <div class="team-wrap">
      <div class="arr arr-prev">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5303 5.46967C15.8232 5.76256 15.8232 6.23744 15.5303 6.53033L10.0607 12L15.5303 17.4697C15.8232 17.7626 15.8232 18.2374 15.5303 18.5303C15.2374 18.8232 14.7626 18.8232 14.4697 18.5303L8.46967 12.5303C8.17678 12.2374 8.17678 11.7626 8.46967 11.4697L14.4697 5.46967C14.7626 5.17678 15.2374 5.17678 15.5303 5.46967Z" fill="#C01025"/>
        </svg>
      </div>
      <div class="swiper">
        <div class="swiper-wrapper">
          <?php if (have_rows('team', 'options')) : while(have_rows('team', 'options')) : the_row(); ?>
          <div class="swiper-slide item">
            <?php
              $team_img = get_sub_field('team_img'); // Получаем массив данных из поля ACF
              if ($team_img) {
                  if ($team_img['alt']) {
                    echo '<img src="' . esc_url($team_img['url']) . '" alt="' . esc_attr($team_img['alt']) . '">'; // Выводим изображение
                  } else {
                    echo '<img src="' . esc_url($team_img['url']) . '" alt="' . get_sub_field('name') . '">'; // Выводим изображение
                  }
              }
            ?>
            <b><?php the_sub_field('name'); ?></b>
            <p><?php the_sub_field('place'); ?></p>
            <?php if (get_sub_field('email')) : ?>
            <a target="blank" href="mailto:<?php the_sub_field('email'); ?>" class="email">
              <?php the_sub_field('email'); ?>
            </a>
            <?php endif; ?>
          </div>
          <?php endwhile; endif; ?>
        </div>
      </div>
      <div class="arr arr-next">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M8.46967 18.5303C8.17678 18.2374 8.17678 17.7626 8.46967 17.4697L13.9393 12L8.46967 6.53033C8.17678 6.23744 8.17678 5.76256 8.46967 5.46967C8.76256 5.17678 9.23744 5.17678 9.53033 5.46967L15.5303 11.4697C15.8232 11.7626 15.8232 12.2374 15.5303 12.5303L9.53033 18.5303C9.23744 18.8232 8.76256 18.8232 8.46967 18.5303Z" fill="#C01025"/>
        </svg>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (get_field('production_title', 'options')) : ?>
<section class="production">
  <div class="container">
    <h2 class="title title-sub"><?php the_field('production_title', 'options'); ?></h2>
    <p class="subtitle"><?php the_field('production_subtitle', 'options'); ?></p>
  </div>
  <div class="production-wrap video-data" data-src="<?php the_field('production_link', 'options'); ?>">
    <?php
      $team_img = get_field('production_img','options'); // Получаем массив данных из поля ACF
      if ($team_img) {
          if ($team_img['alt']) {
            echo '<img src="' . esc_url($team_img['url']) . '" alt="' . esc_attr($team_img['alt']) . '">'; // Выводим изображение
          } else {
            echo '<img src="' . esc_url($team_img['url']) . '" alt="' . get_field('production_title','options') . '">'; // Выводим изображение
          }
      }
    ?>
    <div class="icon">
      <svg xmlns="http://www.w3.org/2000/svg" width="42" height="50" viewBox="0 0 42 50" fill="none">
        <path d="M42 25L-2.28386e-06 49.2487L-1.63974e-07 0.751288L42 25Z" fill="white"/>
      </svg>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (get_field('seo_title', 'options')) : ?>
<section class="seo">
  <div class="container">
    <h2 class="title"><?php the_field('seo_title', 'options'); ?></h2>
    <div class="content">
      <?php the_field('seo_text', 'options'); ?>
    </div>
  </div>
</section>
<?php endif; ?>


<?php get_footer(); ?>
