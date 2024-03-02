<?php
/**
 Template Name: О компании
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

<section class="about-offer">
  <div class="container wrap">
    <div class="left">
      <h1 class="page-title"><?php the_title(); ?></h1>
      <p class="subtitle"><?php the_field('offer_subtitle'); ?></p>
      <div class="row">
        <a href="<?php the_permalink(1272); ?>" class="button">
          Бесплатный расчёт
        </a>
        <div class="button callback button-transparent">
          Связаться с нами
        </div>
     </div>
    </div>
    <div class="right">
      <?php
        $about_offer_img = get_field('offer_img'); 
        if ($about_offer_img) {
          if ($about_offer_img['alt']) {
            echo '<img src="' . esc_url($about_offer_img['url']) . '" alt="' . esc_attr($about_offer_img['alt']) . '">'; 
          } else {
            echo '<img src="' . esc_url($about_offer_img['url']) . '" alt="О компании">'; 
          }
        }
      ?>
    </div>
  </div>
</section>

<?php if (get_field('history_title')) : ?>
<section class="about-history">
  <div class="container">
    <h2 class="title"><?php the_field('history_title'); ?></h2>
    <div class="wrapper-scroll">
      <div class="wrap">
        <?php if (have_rows('history')) : while(have_rows('history')) : the_row(); ?>
        <div class="item">
          <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
              <circle cx="12" cy="12" r="11" fill="white" stroke="#C01025" stroke-width="2"/>
              <circle cx="12" cy="12" r="5" fill="#C01025"/>
            </svg>
          </div>
          <b><?php the_sub_field('god'); ?></b>
          <strong><?php the_sub_field('zagolovok'); ?></strong>
          <p><?php the_sub_field('tekst'); ?></p>
        </div>
        <?php endwhile; endif; ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (get_field('our_title')) : ?>
<section class="about-set">
  <div class="container">
    <div class="wrap">
      <div class="left">
        <h2 class="title title-sub"><?php the_field('our_title'); ?></h2>
        <p class="subtitle"><?php the_field('our_subtitle'); ?></p>
        <div class="gena">
          <div class="gena-name">
            <b><?php the_field('imya_gen_dira'); ?></b>
            <p>Генеральный директор</p>
          </div>
          <div class="gena-line">
            <svg xmlns="http://www.w3.org/2000/svg" width="76" height="104" viewBox="0 0 76 104" fill="none">
              <path d="M5.48623 64.3029C4.34337 61.2659 1.86174 55.987 1.07807 59.1676C0.0984759 63.1433 8.58826 75.8989 12.5066 67.1191C16.425 58.3393 23.1186 33.6565 21.486 35.81C19.8533 37.9635 14.4655 61.4868 16.9145 62.315C19.3635 63.1433 29.1594 39.9514 28.8329 37.4666C28.5064 34.9817 21.1594 62.1494 22.3023 60.6585C23.4451 59.1676 29.3227 33.6565 16.9145 45.9151C4.50637 58.1736 14.139 74.408 21.486 64.9655C28.8329 55.5231 33.0778 50.2221 31.2819 49.3938C29.4859 48.5656 22.4655 62.315 28.8329 59.1676C35.2002 56.0201 62.6288 23.5514 64.588 9.63628C66.5471 -4.27887 59.3635 1.02214 56.4247 8.808C53.4859 16.5939 31.2819 98.0968 22.3023 102.57C13.3227 107.042 23.4451 75.4019 28.8329 65.7938C34.2206 56.1858 34.0574 62.315 34.8737 62.9777C35.69 63.6403 42.2206 57.014 42.7104 55.0262C43.2002 53.0383 40.0982 54.1979 39.4451 56.3514C38.7921 58.5049 41.4043 61.3211 44.0165 57.6767C46.6288 54.0322 50.2206 49.0625 47.7716 50.7191C45.3227 52.3757 43.69 57.1797 47.7716 55.0262C51.8533 52.8726 71.7716 33.8221 74.3839 20.404C76.9961 6.98578 70.6288 14.2747 67.8533 20.9009C65.6329 26.2019 52.6696 60.8794 46.4655 77.5554" stroke="#003EDC"/>
            </svg>
          </div>
        </div>
      </div>
      <div class="right">
        <?php
          $gen_dir = get_field('foto_gen_dira'); 
          if ($gen_dir) {
            if ($gen_dir['alt']) {
              echo '<img src="' . esc_url($gen_dir['url']) . '" alt="' . esc_attr($gen_dir['alt']) . '">'; 
            } else {
              echo '<img src="' . esc_url($gen_dir['url']) . '" alt="О компании">'; 
            }
          }
        ?>
      </div>
    </div>
    <div class="feat">
      <?php if (have_rows('features')) : while(have_rows('features')) : the_row(); ?>
      <div class="item">
        <img src="<?php the_sub_field('ikonka'); ?>" alt="<?php the_sub_field('zagolovok'); ?>">
        <b><?php the_sub_field('zagolovok'); ?></b>
        <p><?php the_sub_field('tekst'); ?></p>
      </div>
      <?php endwhile; endif; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (get_field('pokazyvat_komandu')) : ?>
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

<?php if (get_field('pokazyvat_banner')) : ?>
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

<?php if (get_field('pro_title')) : ?>
<section class="production">
  <div class="container">
    <h2 class="title title-sub"><?php the_field('pro_title'); ?></h2>
    <p class="subtitle"><?php the_field('pro_subtitle'); ?></p>
  </div>
  <div class="production-wrap video-data" data-src="<?php the_field('pro_link'); ?>">
    <?php
      $prod_img = get_field('pro_img'); // Получаем массив данных из поля ACF
      if ($prod_img) {
          if ($prod_img['alt']) {
            echo '<img src="' . esc_url($prod_img['url']) . '" alt="' . esc_attr($prod_img['alt']) . '">'; // Выводим изображение
          } else {
            echo '<img src="' . esc_url($prod_img['url']) . '" alt="' . get_field('production_title','options') . '">'; // Выводим изображение
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

<?php if (get_field('seo_title')) : ?>
<section class="seo no-hidden">
  <div class="container">
    <h2 class="title"><?php the_field('seo_title'); ?></h2>
    <div class="content">
      <?php the_field('seo_text'); ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (get_field('sert_title')) : ?>
<section class="sert">
  <div class="container">
    <h2 class="title"><?php the_field('sert_title'); ?></h2>
    <div class="swiper">
      <div class="wrap mag-toggle swiper-wrapper">
        <?php 
          $images = get_field('sertifikaty');
          if( $images ): 
        ?>
          <?php foreach( $images as $image ): ?>
          <a class="swiper-slide" href="<?php echo esc_url($image['url']); ?>">
              <?php if (isset($image['alt'])) : ?>
              <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
              <?php else : ?>
              <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="Сертификат" />
              <?php endif; ?>
          </a>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="redform">
  <div class="container">
    <div class="redform-wrap">
      <b class="title title-sub">Задайте ваш вопрос</b>
      <b class="title title-sub-mobile" style="display: none">Получите бесплатный индивидуальный расчёт стоимости</b>
      <p class="subtitle">А мы постараемся ответить максимально быстро и подробно</p>
      <div class="form">
        <?php echo do_shortcode('[contact-form-7 id="51ee272" title="Задайте ваш вопрос"]'); ?>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
