<?php
/**
 Template Name: Акции
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

<section class="page-actions news-block">
  <div class="container">
    <h1 class="page-title"><?php the_title(); ?></h1>
      <div class="news-block-wrap">
        <?php
          $args = array(
            'post_type'      => 'post',
            'category_name' => 'aktsii',
            'posts_per_page' => -1
          );
          $query = new WP_Query( $args );

          if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
              $query->the_post();
        ?>
        <a href="<?php the_permalink(); ?>" class="item">
          <?php
            $news_image_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);

            if (empty($news_image_alt)) {
                $news_image_alt = get_the_title();
            }

            echo wp_get_attachment_image(get_post_thumbnail_id(), 'medium', false, array('alt' => $news_image_alt));
          ?>
          <b><?php the_title(); ?></b>
          <?php the_excerpt(); ?>
          <?php if (get_field('time_action')) : ?>
          <div class="time" data-value="<?php the_field('time_action'); ?>">
            <div class="time-item days">
              <div class="num"></div>
              <span>дней</span>
            </div>
            <div class="time-item hours">
              <div class="num"></div>
              <span>часов</span>
            </div>
            <div class="time-item min">
              <div class="num"></div>
              <span>минут</span>
            </div>
            <div class="time-item sec">
              <div class="num"></div>
              <span>секунд</span>
            </div>
          </div>
          <?php endif; ?>
        </a>
        <?php } }  wp_reset_postdata(); ?>
      </div>
    </div>
    
  </div>
</section>



<?php if (get_field('vklyuchit_bannery')) : ?>
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

<?php if (get_field('popular_title')) : ?>
<section class="popular">
  <div class="container">
    <h2 class="title title-sub"><?php the_field('popular_title'); ?></h2>
    <p class="subtitle"><?php the_field('popular_subtitle'); ?></p>
    <div class="popular-wrap">
      <?php if (have_rows('popular')) : while(have_rows('popular')) : the_row(); ?>
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

<?php if (get_field('cat_title')) : ?>
<section itemscope itemtype="https://schema.org/ItemList" class="cards">
  <div class="container">
    <h2 class="title title-sub"><?php the_field('cat_title'); ?></h2>
    <p class="subtitle"><?php the_field('cat_subtitle'); ?></p>
    <div class="cards-wrap">
      <?php
        $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1; // определяем текущую страницу блога
        $posts_ids = get_field('category_uniq_list');
        $args = array(
            'posts_per_page' => -1,
            'post_type' => 'stairs',
            'post__in'       => $posts_ids,
        );
        $query = new WP_Query( $args );
        while ( $query->have_posts() ) {
            $query->the_post();
            // Выводите информацию о каждой записи здесь
        $stair_gallery = get_field('gallery');
      ?>
      <a itemscope itemtype="https://schema.org/Product" itemprop="url" itemprop="itemListElement" href="<?php the_permalink(); ?>" class="item">
        <div class="item-gall">
          <div class="swiper">
            <div class="swiper-wrapper mag-toggle">
              <?php foreach( $stair_gallery as $image ): ?>
                <div href="<?php echo $image['url']; ?>" class="swiper-slide">
                  <img  itemprop="image" src="<?php echo $image['sizes']['large']; ?>" alt="<?php the_title(); ?>">
                </div>
              <?php endforeach; ?>
            </div>
            
          </div>
          <div class="swiper-pagination dots"></div>
        </div>
        <b itemprop="name"><?php the_title(); ?></b>
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
              <?php if (get_field('price')) : 
                $new_price = str_replace('руб', '₽', get_field('price'));
              ?>
                <strong itemprop="price"><?php echo $new_price; ?></strong>
                <span itemprop="priceCurrency"><?php the_field('price_meta'); ?></span>
              <?php else : ?>
                <strong class="empty">Стоимость по запросу</strong>
              <?php endif; ?>
            </div>
            <div class="time">
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
            </div>
          </div>
          <div class="button buy-stair" data-link="<?php the_permalink(); ?>" data-title="<?php the_title(); ?>">
            Заказать лестницу
          </div>
        </div>
      </a>
      <?php } ?>
      <?php  wp_reset_postdata(); ?>
    </div>
    <?php if( function_exists('wp_pagenavi') ) wp_pagenavi(); ?>
  </div>
</section>
<script> 
  	const navLinks = document.querySelectorAll('.wp-pagenavi a');
    if (navLinks.length > 0) {
      navLinks.forEach(elem => {
        elem.href = `${elem.href}#cards`;
      })
    }
</script>
<?php endif; ?>

<?php
get_footer();
