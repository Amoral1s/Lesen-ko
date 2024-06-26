<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<div class="page-top  single-page single-stair">
  <div class="container breadcrumbs">
    <?php
      if (function_exists('yoast_breadcrumb')) {
          echo '<a class="main" href="' . esc_url(home_url()) . '">Главная</a> &gt; ';
          echo '<a class="cent" href="' . esc_url(home_url('/katalog-lestnits/')) . '">Каталог</a> &gt; ';
						$post = get_queried_object();
						$taxonomies = get_object_taxonomies($post->post_type);
						// Получаем объект термина для текущего поста
						$term = get_the_terms($post->ID, 'stairs_material')[0];
						// Получаем ссылку на текущую категорию таксономии "stairs_material"
						$term_link = get_term_link($term, 'stairs_material');
						
						echo '<a class="cent" href="' . esc_url($term_link) . '">' . $term->name . '</a> &gt';
						
          echo '<span class="breadcrumb_last pb">' . get_the_title() . '</span>';
      }
    ?>
  </div>
</div>

<section itemscope itemtype="https://schema.org/Product" itemprop="url" itemprop="itemListElement" class="stair-offer">
	<div class="container">
		<div class="stair-offer-wrap">
			<div class="left">
				<div class="big-images">
					<div class="swiper">
						<div class="swiper-wrapper mag-toggle">
							<?php 
								$feed_image_pc = get_field('gallery');
								if( $feed_image_pc ): 
							?>
								<?php foreach( $feed_image_pc as $image ): ?>
								<a href="<?php echo esc_url($image['url']); ?>" class="item swiper-slide">
									<?php if (!empty($image['alt'])) : ?>
										<img itemprop="image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
									<?php else : ?>
										<img itemprop="image" src="<?php echo esc_url($image['url']); ?>" alt="<?php the_title(); ?>" />
									<?php endif; ?>
								</a>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
					</div>
					<div class="dots swiper-parination" style="display: none"></div>
				</div>
				<div class="small-images">
					<div class="swiper">
						<div class="swiper-wrapper">
							<?php 
								$feed_image_pc = get_field('gallery');
								if( $feed_image_pc ): 
							?>
								<?php foreach( $feed_image_pc as $image ): ?>
								<div class="item swiper-slide">
									<?php if (!empty($image['alt'])) : ?>
										<img  itemprop="image" src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
									<?php else : ?>
										<img  itemprop="image" src="<?php echo esc_url($image['url']); ?>" alt="<?php the_title(); ?>" />
									<?php endif; ?>
								</div>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>

			</div>
			
			<div class="right">
				<h1 itemprop="name" class="page-title"><?php the_title(); ?></h1>
				<time>
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
				</time>
				<div class="content">
					<p><?php echo get_field('opisanie'); ?></p>
				</div>
				<div class="price-row">
					<div class="button buy-stair" data-link="<?php the_permalink(); ?>" data-title="<?php the_title(); ?>">
						Заказать расчет
          </div>
          <div class="price-wrapper <?php if (!get_field('price')) { echo 'empty'; } ?>">
            <div class="price">
              <?php if (get_field('price')) : 
                $new_price = str_replace('руб', '₽', get_field('price'));
              ?>
                <strong itemprop="price"><?php echo $new_price; ?></strong>
                <span itemprop="priceCurrency"><?php echo get_field('price_meta'); ?></span>
              <?php else : ?>
                <strong itemprop="price" class="empty">Стоимость по запросу</strong>
              <?php endif; ?>
            </div>
          </div>
				</div>
				<b class="meta-title">Основные характеристики</b>
				<div class="meta">
					<?php if (get_field('type_house')) : ?>
					<div class="meta-row">
						<p class="key">Тип помещения</p>
						<span class="line"></span>
						<strong class="value"><?php echo get_field('type_house'); ?></strong>
					</div>
					<?php endif; ?>
					<?php if (get_field('material')) : ?>
					<div class="meta-row">
						<p class="key">Материал</p>
						<span class="line"></span>
						<strong class="value"><?php echo get_field('material'); ?></strong>
					</div>
					<?php endif; ?>
					<?php if (get_field('type')) : ?>
					<div class="meta-row">
						<p class="key">Вид лестницы</p>
						<span class="line"></span>
						<strong class="value"><?php echo get_field('type'); ?></strong>
					</div>
					<?php endif; ?>
					<?php if (get_field('height')) : ?>
					<div class="meta-row">
						<p class="key">Высота от поло до потолка</p>
						<span class="line"></span>
						<strong class="value"><?php echo get_field('height'); ?></strong>
					</div>
					<?php endif; ?>
					<?php if (get_field('stup')) : ?>
					<div class="meta-row">
						<p class="key">Количество ступеней</p>
						<span class="line"></span>
						<strong class="value"><?php echo get_field('stup'); ?></strong>
					</div>
					<?php endif; ?>
					<?php if (get_field('barrier')) : ?>
					<div class="meta-row">
						<p class="key">Ограждения</p>
						<span class="line"></span>
						<strong class="value"><?php echo get_field('barrier'); ?></strong>
					</div>
					<?php endif; ?>
				</div>
				<div class="share">
					<script src="https://yastatic.net/share2/share.js"></script>
					<div class="share-toggle">
						<div class="icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path d="M15 13.0385H15.75V12.2885H15V13.0385ZM15 16H14.25C14.25 16.2975 14.4258 16.5668 14.6981 16.6866C14.9705 16.8063 15.2878 16.7538 15.507 16.5527L15 16ZM15 7.96154V8.71154H15.75V7.96154H15ZM15 5L15.5066 4.44692C15.2873 4.24607 14.97 4.19376 14.6979 4.31355C14.4257 4.43335 14.25 4.70263 14.25 5H15ZM21 10.4953L21.507 11.048C21.6619 10.9059 21.7501 10.7052 21.75 10.495C21.7499 10.2848 21.6616 10.0842 21.5066 9.94224L21 10.4953ZM10.9503 13.3049L10.7512 12.5818H10.7512L10.9503 13.3049ZM7 15.5769H6.25C6.25 15.8578 6.40697 16.1152 6.65673 16.2437C6.9065 16.3723 7.20716 16.3505 7.43579 16.1873L7 15.5769ZM10.4078 13.4771L10.6621 14.1826L10.6621 14.1826L10.4078 13.4771ZM10.2924 8.34802L10.0172 7.6503H10.0172L10.2924 8.34802ZM7.40597 11.0956L6.71826 10.7964L6.71826 10.7964L7.40597 11.0956ZM14.25 13.0385V16H15.75V13.0385H14.25ZM15.75 7.96154V5H14.25V7.96154H15.75ZM14.4934 5.55308L20.4934 11.0484L21.5066 9.94224L15.5066 4.44692L14.4934 5.55308ZM15.507 16.5527L21.507 11.048L20.493 9.94267L14.493 15.4473L15.507 16.5527ZM15 12.2885C12.9858 12.2885 11.8395 12.2822 10.7512 12.5818L11.1493 14.028C11.997 13.7947 12.9052 13.7885 15 13.7885V12.2885ZM7.43579 16.1873C9.11202 14.9906 9.83925 14.4792 10.6621 14.1826L10.1534 12.7715C9.09153 13.1543 8.17517 13.8164 6.56421 14.9665L7.43579 16.1873ZM10.7512 12.5818C10.5494 12.6374 10.35 12.7007 10.1534 12.7715L10.6621 14.1826C10.8222 14.1249 10.9847 14.0734 11.1493 14.028L10.7512 12.5818ZM15 7.21154C13.7673 7.21154 12.8069 7.21118 12.0332 7.26144C11.2534 7.31209 10.6104 7.41644 10.0172 7.6503L10.5675 9.04574C10.9545 8.89315 11.4227 8.80426 12.1305 8.75828C12.8443 8.71191 13.7477 8.71154 15 8.71154V7.21154ZM7.75 15.5769C7.75 14.3833 7.75045 13.5276 7.79883 12.8527C7.84667 12.1852 7.93862 11.7512 8.09369 11.3949L6.71826 10.7964C6.46735 11.373 6.35632 11.9969 6.30266 12.7454C6.24955 13.4865 6.25 14.4049 6.25 15.5769H7.75ZM10.0172 7.6503C8.53285 8.23559 7.34195 9.36304 6.71826 10.7964L8.09369 11.3949C8.5526 10.3402 9.43823 9.491 10.5675 9.04574L10.0172 7.6503Z" fill="#C01025"/>
								<path d="M12 3H3V21H21V15" stroke="#C01025" stroke-width="1.5" stroke-linejoin="round"/>
								</svg>
						</div>
						<p>Поделиться</p>
					</div>
					<div class="ya-share2 share-block" data-curtain data-shape="round" data-services="vkontakte,facebook,telegram,viber,whatsapp,skype"></div>
				</div>
			</div>
		</div>
	</div>
</section>

<section itemscope itemtype="https://schema.org/Product" itemprop="url" itemprop="itemListElement" class="stair-info">
	<div class="container">
		<div class="stair-info-wrapper">
			<div class="left">
				<div class="stair-info-top">
					<?php if (get_field('opisanie_full')) : ?>	
					<div class="item">
						Описание лестницы
					</div>
					<?php endif; ?>

					<?php if (get_field('vse_harakteristiki')) : ?>	
					<div class="item">
						Характеристики
					</div>
					<?php endif; ?>

					
					<div class="item">
						Доставка и оплата
					</div>
					

				</div>
				<div class="stair-info-bot">
					<?php if (get_field('opisanie_full')) : ?>	
					<div class="item">
						<div class="flex">
							<div itemprop="description" class="content">
								<?php echo get_field('opisanie_full'); ?>
							</div>
							<?php if (get_field('instruction_title', 'options')) : ?>	
							<div class="bann">
								<b><?php echo get_field('instruction_title', 'options'); ?></b>
								<p><?php echo get_field('instruction_subtitle', 'options'); ?></p>
								<a href="<?php echo get_field('instruction_file', 'options'); ?>" target="blank" download class="button button-transparent">
									<div class="icon">
										<svg xmlns="http://www.w3.org/2000/svg" width="19" height="17" viewBox="0 0 19 17" fill="none">
											<path d="M9.5 10.5L9.5 0.5M9.5 10.5L6.5 7.49979M9.5 10.5L12.5 7.49979" stroke="#C01025" stroke-width="1.5"/>
											<path d="M17.5 12.5L16.5 15.5H2.5L1.5 12.5" stroke="#C01025" stroke-width="1.5"/>
										</svg>
									</div>
									<span>Скачать инструкцию</span>
								</a>
							</div>
							<?php endif; ?>
						</div>
					</div>
					<?php endif; ?>
					<?php if (get_field('vse_harakteristiki')) : ?>	
					<div class="item meta">
						<?php if (have_rows('vse_harakteristiki')) : while(have_rows('vse_harakteristiki')) : the_row(); ?>
						<div class="meta-row">
							<b class="key"><?php the_sub_field('imya'); ?></b>
							<span class="line"></span>
							<?php if (get_sub_field('ssylka')) : ?>
								<a class="value" href="<?php the_sub_field('ssylka'); ?>"><?php the_sub_field('znachenie'); ?></a>
							<?php else : ?>
								<p class="value"><?php the_sub_field('znachenie'); ?></p>
							<?php endif; ?>
						</div>
						<?php endwhile; endif; ?>
					</div>
					<?php endif; ?>

					
					<div class="item">
						<div class="pay-terms">
							<p class="subtitle"><?php echo get_field('deliv_subtitle', 1274); ?></p>
							<div class="wrap">
								<?php if(have_rows('deliv', 1274)) : while(have_rows('deliv', 1274)) : the_row(); ?>
								<div class="wrap-item half">
									<b><?php the_sub_field('czifry'); ?></b>
									<p><?php the_sub_field('tekst'); ?></p>
								</div>
								<?php endwhile; endif; ?>
							</div>
							<div class="content">
								<?php echo get_field('deliv_content'); ?>
							</div>
							<h2 class="title title-sub"><?php echo get_field('pay_title', 1274); ?></h2>
							<p class="subtitle"><?php echo get_field('pay_subtitle', 1274); ?></p>
							<div class="wrap">
								<?php if(have_rows('pay_terms', 1274)) : while(have_rows('pay_terms', 1274)) : the_row(); ?>
								<div class="wrap-item">
									<img  itemprop="image" src="<?php the_sub_field('ikonka'); ?>" alt="<?php the_sub_field('nazvanie'); ?>">
									<p><?php the_sub_field('nazvanie'); ?></p>
								</div>
								<?php endwhile; endif; ?>
							</div>
							
						</div>
					</div>
					

				</div>
			</div>
			
		</div>
	</div>
</section>

<?php if (get_field('feedback_title', 'options')) : ?>
<section class="feedback stair">
  <div class="container">
    <div class="title-block">
      <h2 class="title title-sub">Видеообзоры и отзывы об этой лестнице</h2>
      <p class="subtitle">Обратная связь помогает развиваться в нужном направлении. Мы прислушваемся к отзывам, ищем новые точки роста и корректируем рабочие процессы. Благодарим всех, кто выразил своё мнение, для нас это ценно!</p>
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
          <div itemscope itemtype="https://schema.org/Review"  itemprop="review" class="item video-data swiper-slide" data-src="<?php the_sub_field('ssylka_na_youtube_format_embed'); ?>">
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

<section itemscope itemtype="https://schema.org/ItemList" class="cards">
  <div class="container">
    <h2 class="title">Похожие товары</h2>
    <div class="cards-slider-wrapper">
			<div class="arr arr-prev">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5303 5.46967C15.8232 5.76256 15.8232 6.23744 15.5303 6.53033L10.0607 12L15.5303 17.4697C15.8232 17.7626 15.8232 18.2374 15.5303 18.5303C15.2374 18.8232 14.7626 18.8232 14.4697 18.5303L8.46967 12.5303C8.17678 12.2374 8.17678 11.7626 8.46967 11.4697L14.4697 5.46967C14.7626 5.17678 15.2374 5.17678 15.5303 5.46967Z" fill="#C01025"/>
        </svg>
      </div>
			<div class="swiper">
				<div class="cards-wrap swiper-wrapper">
				<?php
					$terms = get_the_terms( get_the_ID(), 'stairs_material' );
					$args = array(
						'post_type' => 'stairs',
						'posts_per_page' => 10,
						'tax_query' => array(
								array(
										'taxonomy' => 'stairs_material',
										'field' => 'slug',
										'terms' => wp_list_pluck( $terms, 'slug' ),
								),
						),
						'post__not_in' => array( get_the_ID() )
					);
					
					$query = new WP_Query( $args );
					
					while ( $query->have_posts() ) {
							$query->the_post();
							// Выводите информацию о каждой записи здесь
					$stair_gallery = get_field('gallery');
				?>
				<a itemscope itemtype="https://schema.org/Product" itemprop="url" itemprop="itemListElement" href="<?php the_permalink(); ?>" class="item swiper-slide">
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
  </div>
</section>



<?php endwhile; ?>
<!-- 
<main class="page">
	<div itemscope itemtype="http://schema.org/Article" class="single container">
		<b itemprop="name headline" class="title">
			<?php the_title() ?>
		</b>
		<meta itemprop="description" content="<?php the_excerpt(); ?>">
		<meta itemprop="author" content="<?php the_author(); ?>">
		<meta itemprop="datePublished" content="<?php the_time('c'); ?>">
		<meta itemprop="dateModified" content="<?php the_modified_date('c'); ?>">
		<meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?php echo get_permalink(); ?>" content=""/>
		<div itemprop="articleBody" class="single-content">
			<?php the_content() ?>
		</div>
	</div>
</main> -->

<?php get_footer();