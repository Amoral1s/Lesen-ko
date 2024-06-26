<?php
/**
 Template Name: Галерея наших работ
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

<section itemscope itemtype="https://schema.org/ItemList" class="cards gall-page">
  <div class="container">
    <h1 class="page-title"><?php the_title(); ?></h1>
    <div class="news-cats news-cats-lis">
      <?php
        $args = array(
            'orderby'      => 'name',
            'order'        => 'ASC',
            'hide_empty'   => 1,
            'taxonomy'     => 'stairs_type',
            'exclude'      => 48
        );

        $categories = get_categories($args);

        if ($categories) {
            echo '<ul>';
            foreach ($categories as $category) {
                echo '<li>' . $category->name . '</li>';
            }
            echo '</ul>';
        }
      ?>
    </div>
    <div class="cards-wrap">
      <?php
        $args = array(
          'posts_per_page' => -1,
          'post_type' => 'stairs'
      );
      
      $stairs_query = new WP_Query($args);
      
      if ($stairs_query->have_posts()) {
          while ($stairs_query->have_posts()) {
              $stairs_query->the_post();
        $stair_gallery = get_field('gallery');
      ?>
      <a itemscope itemtype="https://schema.org/Product" itemprop="url" itemprop="itemListElement" href="<?php the_permalink(); ?>" class="item">
        <div class="item-terms" style="display: none">
          <?php 
            $taxonomy_terms = get_the_terms($post->ID, 'stairs_type');
            foreach ($taxonomy_terms as $term) {
                  echo $term->name . ',';
            }
          ?>
        </div>
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
            <strong class="value"><?php echo get_field('type_house'); ?></strong>
          </div>
          <?php endif; ?>
          <?php if (get_field('material')) : ?>
          <div class="meta-row">
            <p class="key">Материал</p>
            <strong class="value"><?php echo get_field('material'); ?></strong>
          </div>
          <?php endif; ?>
          <?php if (get_field('type')) : ?>
          <div class="meta-row">
            <p class="key">Вид лестницы</p>
            <strong class="value"><?php echo get_field('type'); ?></strong>
          </div>
          <?php endif; ?>
          <?php if (get_field('height')) : ?>
          <div class="meta-row">
            <p class="key">Высота от поло до потолка</p>
            <strong class="value"><?php echo get_field('height'); ?></strong>
          </div>
          <?php endif; ?>
          <?php if (get_field('stup')) : ?>
          <div class="meta-row">
            <p class="key">Количество ступеней</p>
            <strong class="value"><?php echo get_field('stup'); ?></strong>
          </div>
          <?php endif; ?>
          <?php if (get_field('barrier')) : ?>
          <div class="meta-row">
            <p class="key">Ограждения</p>
            <strong class="value"><?php echo get_field('barrier'); ?></strong>
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
                <span itemprop="priceCurrency"><?php echo get_field('price_meta'); ?></span>
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
                <p><?php echo get_field('srok_izgotovleniya'); ?></p>
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
      <?php }  wp_reset_postdata(); } ?>
      
    </div>
    <div class="show-more button">
      Показать больше
    </div>
  </div>
</section>


<?php
get_footer();
