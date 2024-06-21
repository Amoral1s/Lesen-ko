<?php
/**
 Template Name: Отзывы
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

<section class="page-feed">
  <div class="container">
    <h1 class="page-title"><?php the_title(); ?></h1>
    <div class="content"><?php the_content(); ?></div>
    <?php if (get_field('video_tap', 'options') == false) : ?>
    <div class="feedback">
        <div class="feedback-wrap">
          <?php if (have_rows('otzyvy', 'options')) : while(have_rows('otzyvy', 'options')) : the_row(); ?>
          <div itemprop="review" itemscope itemtype="https://schema.org/Review" class="item video-data" data-src="<?php the_sub_field('ssylka_na_youtube_format_embed'); ?>">
            <div class="play icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="33" height="40" viewBox="0 0 33 40" fill="none">
                <path d="M33 20L2.02023e-06 0.947439L3.68586e-06 39.0526L33 20Z" fill="white"/>
              </svg>
            </div>
            <?php
              $feed_image = get_sub_field('prevyu_izobrazhenie'); // Получаем массив данных из поля ACF
              if ($feed_image) {
                  if ($feed_image['alt']) {
                    echo '<img  itemprop="image" src="' . esc_url($feed_image['url']) . '" alt="' . esc_attr($feed_image['alt']) . '">'; // Выводим изображение
                  } else {
                    echo '<img  itemprop="image" src="' . esc_url($feed_image['url']) . '" alt="' . get_sub_field('imya') . '">'; // Выводим изображение
                  }
              }
            ?>
            <div class="meta">
              <div itemprop="reviewRating" style="display: none">5</div>
              <b itemprop="author"><?php the_sub_field('imya'); ?></b>
              <p><?php the_sub_field('gorod'); ?></p>
            </div>
          </div>
        <?php endwhile; endif; ?>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>

<?php if (get_field('text_tap', 'options') == false) : ?>
<section class="text-feed">
  <div class="container">
    <h2 class="title"><?php the_field('textfeed_title', 'options'); ?></h2>
    <div class="wrap">
      <?php if (have_rows('textfeed', 'options')) : while(have_rows('textfeed', 'options')) : the_row(); ?>
      <div  itemprop="review" itemscope itemtype="https://schema.org/Review" class="item">
        <div class="meta">
          <div class="avatar">
            <?php if (get_sub_field('avatar')) : ?>
            <img  itemprop="image" src="<?php the_sub_field('avatar'); ?>" alt="<?php the_sub_field('imya'); ?>">
            <?php else : ?>
            <img  itemprop="image" class="user" src="<?php echo get_template_directory_uri(); ?>/img/icons/user.svg" alt="<?php the_sub_field('imya'); ?>">
            <?php endif; ?>
          </div>
          <div class="name">
            <b itemprop="author"><?php the_sub_field('imya'); ?></b>
            <span itemprop="datePublished"><?php the_sub_field('date'); ?></span>
            <div class="rating">
              <?php 
                $stars = get_sub_field('oczenka');
                echo '<div itemprop="reviewRating" style="display: none">'.$stars.'</div>';
                for ($i = 0; $i < 5; $i++ ) { 
                  if ($i < $stars) {
              ?>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                <path d="M9.18906 2.55754C9.4869 1.91181 10.4046 1.91181 10.7025 2.55754L12.6097 6.69235C12.7311 6.95552 12.9805 7.13672 13.2683 7.17084L17.7901 7.70698C18.4962 7.7907 18.7798 8.66352 18.2578 9.14633L14.9147 12.2379C14.7019 12.4347 14.6066 12.7279 14.6631 13.0121L15.5505 17.4783C15.6891 18.1758 14.9467 18.7152 14.3261 18.3679L10.3528 16.1438C10.0999 16.0022 9.79163 16.0022 9.53874 16.1438L5.5654 18.3679C4.94489 18.7152 4.20242 18.1758 4.34101 17.4783L5.22843 13.0121C5.28491 12.7279 5.18965 12.4347 4.97687 12.2379L1.63379 9.14633C1.11171 8.66352 1.3953 7.7907 2.10146 7.70698L6.62326 7.17084C6.91106 7.13672 7.16047 6.95552 7.28185 6.69235L9.18906 2.55754Z" fill="#FFAC2F"/>
              </svg>
              <?php } else { ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                  <path d="M9.18906 2.55754C9.4869 1.91181 10.4046 1.91181 10.7025 2.55754L12.6097 6.69235C12.7311 6.95552 12.9805 7.13672 13.2683 7.17084L17.7901 7.70698C18.4962 7.7907 18.7798 8.66352 18.2578 9.14633L14.9147 12.2379C14.7019 12.4347 14.6066 12.7279 14.6631 13.0121L15.5505 17.4783C15.6891 18.1758 14.9467 18.7152 14.3261 18.3679L10.3528 16.1438C10.0999 16.0022 9.79163 16.0022 9.53874 16.1438L5.5654 18.3679C4.94489 18.7152 4.20242 18.1758 4.34101 17.4783L5.22843 13.0121C5.28491 12.7279 5.18965 12.4347 4.97687 12.2379L1.63379 9.14633C1.11171 8.66352 1.3953 7.7907 2.10146 7.70698L6.62326 7.17084C6.91106 7.13672 7.16047 6.95552 7.28185 6.69235L9.18906 2.55754Z" fill="#e0dddd"/>
                </svg>
              <?php } } ?>
            </div>
          </div>
        </div>
        <p itemprop="reviewBody" class="text">
          <?php the_sub_field('otzyv'); ?>
        </p>
      </div>
      <?php endwhile; endif; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="feed-form">
  <div class="container">
    <h2 class="title">Написать отзыв</h2>
    <div class="form">
      <?php echo do_shortcode('[contact-form-7 id="2f506a9" title="Новый отзыв"]'); ?>
    </div>
  </div>
</section>

<?php
get_footer();
