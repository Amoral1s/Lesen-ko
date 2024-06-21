<?php get_header(); ?>
<?php
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name): get_userdata(intval($author));
?>
<?php while ( have_posts() ) : the_post(); ?>



<?php
	$actions = false;
	if (has_category('aktsii')) {
		$actions = true;
	}
?>

<div class="page-top  single-page single-stair">
  <div class="container breadcrumbs">
    <?php
      if (function_exists('yoast_breadcrumb')) {
					if ($actions == true) {
						echo '<a class="main" href="' . esc_url(home_url()) . '">Главная</a> &gt; ';
						echo '<a class="cent" href="' . esc_url(home_url('/aktsii/')) . '">Акции</a> &gt; ';
							
						echo '<span class="breadcrumb_last pb">' . get_the_title() . '</span>';
					} else {
						yoast_breadcrumb('<div class="breadcrumbs blog-bread">', '</div>');
					}
      }
    ?>
  </div>
</div>


<section itemid="<?php echo get_permalink(); ?>" itemscope itemtype="http://schema.org/BlogPosting" class="single only-single-page container">
		<meta itemprop="description" content="<?php the_excerpt(); ?>">
		<link itemprop="image" href="<?php echo get_template_directory_uri(); ?>/img/logo.svg">
		<meta itemprop="author" content="<?php the_author(); ?>">
		<meta itemprop="datePublished" content="<?php the_time('c'); ?>">
		<meta itemprop="dateModified" content="<?php the_modified_date('c'); ?>">
	
	<div class="single-top">
		<?php if (get_tags()) { ?>
		<div class="single-tags">
			<?php the_tags( '','',''); ?>
		</div>
		<?php } ?>
		<h1 itemprop="headline" class="page-title"><?php the_title(); ?></h1>
		<?php if (get_field('post_subtitle')) { ?>
		<p class="subtitle"><?php the_field('post_subtitle'); ?></p>
		<?php } ?>
		<div class="author">
			<!-- <a class="row" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
				<div class="avatar">
					<?php 
						$author_id = get_the_author_meta('user_email');
						echo get_avatar( $author_id, $size = 60, $default = '', $alt = '', $args = null ) 
					?>
					<img  itemprop="image" src="<?php echo get_template_directory_uri(); ?>/img/favicon/icon-192.png" alt="Avatar">
				</div>
				<div itemprop="author" class="name">
					<p><?php the_author_meta('display_name'); ?></p>
					<span>Автор статьи</span>
				</div>
			</a> -->
			<div class="row">
				<div class="avatar">
					<img  itemprop="image" src="<?php echo get_template_directory_uri(); ?>/img/favicon/icon-192.png" alt="Avatar">
				</div>
				<div itemprop="author" class="name">
					<p><?php the_author_meta('display_name'); ?></p>
					<span>Автор статьи</span>
				</div>
			</div>
			<!-- <?php the_author_posts_link() ?> -->
			<?php if ($actions == false) : ?>
			<div itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating" class="top-rat">
				
				<meta class="val-rat" itemprop="ratingValue" content="5">
				
				<div class="new-rating">
				</div>
				<div itemprop="ratingCount" class="votes">
				</div>
			</div>
			<div class="views">
				<div class="icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M18.8192 12.8143C16.0873 6.89523 7.91302 6.89523 5.18115 12.8143C5.00757 13.1904 4.56198 13.3546 4.18589 13.181C3.8098 13.0074 3.64563 12.5618 3.81921 12.1857C7.08734 5.10476 16.913 5.10476 20.1812 12.1857C20.3547 12.5618 20.1906 13.0074 19.8145 13.181C19.4384 13.3546 18.9928 13.1904 18.8192 12.8143Z" fill="#FF4848"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M12 12.75C12.6904 12.75 13.25 13.3096 13.25 14C13.25 14.6904 12.6904 15.25 12 15.25C11.3096 15.25 10.75 14.6904 10.75 14C10.75 13.3096 11.3096 12.75 12 12.75ZM14.75 14C14.75 12.4812 13.5188 11.25 12 11.25C10.4812 11.25 9.25 12.4812 9.25 14C9.25 15.5188 10.4812 16.75 12 16.75C13.5188 16.75 14.75 15.5188 14.75 14Z" fill="#FF4848"/>
					</svg>
				</div>
				<div class="value">
					<?php setPostViews(get_the_ID()); ?>
					<?php echo getPostViews(get_the_ID()); ?>
				</div>
			</div>
			<div class="read-time">
				<div class="icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M5.25 12C5.25 11.5858 5.58579 11.25 6 11.25L11.25 11.25L11.25 6C11.25 5.58579 11.5858 5.25 12 5.25C12.4142 5.25 12.75 5.58579 12.75 6L12.75 12C12.75 12.4142 12.4142 12.75 12 12.75L6 12.75C5.58579 12.75 5.25 12.4142 5.25 12Z" fill="#FF4848"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M2.75 12C2.75 17.1086 6.89137 21.25 12 21.25C17.1086 21.25 21.25 17.1086 21.25 12C21.25 6.89137 17.1086 2.75 12 2.75C6.89137 2.75 2.75 6.89137 2.75 12ZM12 22.75C6.06294 22.75 1.25 17.9371 1.25 12C1.25 6.06294 6.06294 1.25 12 1.25C17.9371 1.25 22.75 6.06294 22.75 12C22.75 17.9371 17.9371 22.75 12 22.75Z" fill="#FF4848"/>
					</svg>
				</div>
				<div class="value">
					~ <?php echo gp_read_time(); ?> мин.
				</div>
			</div>
			<?php endif; ?>
			<div class="share <?php if ($actions == true) { echo 'act-share'; } ?>">
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
		<div class="thumb">
			<img  itemprop="image" src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" >
		</div>
	</div>

	<div class="single-nav">
		<b>Содержание статьи</b>
		<div class="single-nav-wrap">

		</div>
	</div>

	<div class="content">
		<?php the_content(); ?>
	</div>
	<div  class="comments">
		<?php comments_template(); ?>
	</div>
</section>


<section class="news-block news-slider">
  <div class="container">
    <div class="title-block">
      <h2 class="title">Читайте также</h2>
    </div>
		<div class="slider-wrap">
			<div class="arr arr-prev">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M15.5303 5.46967C15.8232 5.76256 15.8232 6.23744 15.5303 6.53033L10.0607 12L15.5303 17.4697C15.8232 17.7626 15.8232 18.2374 15.5303 18.5303C15.2374 18.8232 14.7626 18.8232 14.4697 18.5303L8.46967 12.5303C8.17678 12.2374 8.17678 11.7626 8.46967 11.4697L14.4697 5.46967C14.7626 5.17678 15.2374 5.17678 15.5303 5.46967Z" fill="#C01025"/>
				</svg>
			</div>
			<div class="swiper">
				<div class="news-block-wrap swiper-wrapper">
					<?php
						$current_post_id = get_the_ID();
						// Получаем все записи
						$args_all = array(
							'post_type'      => 'post',
							'posts_per_page' => -1, // Получаем все записи
							'category__not_in' => array( 48 ),
							'orderby' => 'date',
							'order' => 'DESC'
						);
						$all_posts = new WP_Query( $args_all );
						// Ищем индекс текущей записи
						$current_index = -1;
						if ( $all_posts->have_posts() ) {
								$posts_array = $all_posts->posts;
								foreach ( $posts_array as $index => $post ) {
										if ( $post->ID == $current_post_id ) {
												$current_index = $index;
												break;
										}
								}
						}
						// Выводим 10 записей после текущей и если недостаточно, то добавляем записи до текущей
						if ( $current_index != -1 ) {
							$related_posts = array();
							// Добавляем записи после текущей
							for ( $i = $current_index + 1; $i < $current_index + 11 && $i < count( $posts_array ); $i++ ) {
								if ($posts_array[$i]->ID != $current_post_id) {
									$related_posts[] = $posts_array[$i];
								}
							}
							// Если недостаточно, добавляем записи до текущей в обратном порядке
							if ( count( $related_posts ) < 10 ) {
								for ( $i = $current_index - 1; $i >= 0 && count( $related_posts ) < 10; $i-- ) {
									if ($posts_array[$i]->ID != $current_post_id) {
										$related_posts[] = $posts_array[$i];
									}
								}
							}
							// Если записей все равно меньше 10, добавляем сколько есть
							if ( count( $related_posts ) < 10 ) {
								for ( $i = 0; $i < count( $posts_array ); $i++ ) {
									if ($posts_array[$i]->ID != $current_post_id && !in_array($posts_array[$i], $related_posts)) {
										$related_posts[] = $posts_array[$i];
									}
									if ( count( $related_posts ) >= 10 ) {
										break;
									}
								}
							}
							// Выводим записи
							if ( !empty( $related_posts ) ) {
								foreach ( $related_posts as $post ) {
										setup_postdata( $post );
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
									<?php
								}
								wp_reset_postdata();
							}
						}
					?>
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

<main class="page" style="display: none">
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
</main>
<script>
	const stars = document.querySelector('.wpd-rating-stars');
	if (stars) {
		const starsCount = stars.querySelectorAll('path.wpd-active');
		const starsRating = starsCount.length;
		console.log(starsRating);
		document.querySelector('.val-rat').content = starsRating;
	}
</script>
<?php get_footer();