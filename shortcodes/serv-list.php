<?php if (get_field('serv_title')) : ?>

<section class="cards">
  <h2 class="title title-sub"><?php the_field('serv_title'); ?></h2>
  <p class="subtitle"><?php the_field('serv_subtitle'); ?></p>
  <div class="cards-slider-wrapper">
    <div class="arr arr-prev">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5303 5.46967C15.8232 5.76256 15.8232 6.23744 15.5303 6.53033L10.0607 12L15.5303 17.4697C15.8232 17.7626 15.8232 18.2374 15.5303 18.5303C15.2374 18.8232 14.7626 18.8232 14.4697 18.5303L8.46967 12.5303C8.17678 12.2374 8.17678 11.7626 8.46967 11.4697L14.4697 5.46967C14.7626 5.17678 15.2374 5.17678 15.5303 5.46967Z" fill="#C01025"/>
      </svg>
    </div>
    <div class="swiper">
      <div class="cards-wrap swiper-wrapper">
      <?php
        $slider_posts_id = get_field('serv_ids');
        $args = array(
          'post_type'      => 'stairs',
          'post__in'       => $slider_posts_id,
          'orderby'        => 'post__in',
          'posts_per_page' => -1
        );
        
        $query = new WP_Query( $args );
        
        while ( $query->have_posts() ) {
            $query->the_post();
            // Выводите информацию о каждой записи здесь
        $stair_gallery = get_field('gallery');
      ?>
      <a href="<?php the_permalink(); ?>" class="item swiper-slide">
        <div class="item-gall">
          <div class="swiper">
            <div class="swiper-wrapper mag-toggle-cards">
              <?php foreach( $stair_gallery as $image ): ?>
                <div href="<?php echo $image['url']; ?>" class="swiper-slide">
                  <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php if (isset($image['alt'])) { echo $image['alt']; } else { echo 'Лестница'; } ?>">
                </div>
              <?php endforeach; ?>
            </div>
            
          </div>
          <div class="swiper-pagination dots"></div>
        </div>
        <b><?php the_title(); ?></b>
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
                <strong><?php echo $new_price; ?></strong>
                <span><?php the_field('price_meta'); ?></span>
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
            Заказать лестницу
          </div>
        </div>
      </a>
      <?php } ?>
      <?php  wp_reset_postdata(); ?>
      </div>
    </div>
    <div class="arr arr-next">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.46967 18.5303C8.17678 18.2374 8.17678 17.7626 8.46967 17.4697L13.9393 12L8.46967 6.53033C8.17678 6.23744 8.17678 5.76256 8.46967 5.46967C8.76256 5.17678 9.23744 5.17678 9.53033 5.46967L15.5303 11.4697C15.8232 11.7626 15.8232 12.2374 15.5303 12.5303L9.53033 18.5303C9.23744 18.8232 8.76256 18.8232 8.46967 18.5303Z" fill="#C01025"/>
      </svg>
    </div>
  </div>
</section>
<?php endif; ?>