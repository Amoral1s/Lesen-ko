<?php
	/**
	 * Created by PhpStorm.
	 * User: denisivanin
	 * Date: 2019-03-04
	 * Time: 09:40
	 */


	class video_feedbacks{

		private static $bootstrap_cols = [
			1 => 'col-md-12',
			2 => 'col-md-6',
			3 => 'col-md-6 col-lg-4',
			4 => 'col-md-6 col-lg-3',
			5 => 'col-md-6 col-lg-3',
			6 => 'col-sm-6 col-md-4 col-lg-2',
			7 => 'col-sm-6 col-md-4 col-lg-2',
			8 => 'col-sm-6 col-md-4 col-lg-2'
		];
		/** @var WP_Query */
		private static $wp_query;


		/**
		 * @return WP_Query
		 */
		static function get_wp_query(){
			if( !self::$wp_query instanceof WP_Query ){
				self::$wp_query = new WP_Query( [
					'post_type' => 'video-feedbacks',
					'posts_per_page' =>get_option( 'posts_per_page' ), //TODO-
					'paged' => get_query_var( 'paged' ) ?: 1
				] );
			}
			return self::$wp_query;
		}


		static function grid( $postsOrIds = null, $cols = 3, $float = '' ){
			include_css( __DIR__ . '/video-feedbacks.css' );
			///
			$custome_wp_query = false;
			if( !is_array( $postsOrIds ) ){
				$postsOrIds = self::get_wp_query()->get_posts();
				$custome_wp_query = true;
			}
			///filter posts
			if( is_array( $postsOrIds ) ){
				$filtered_postsOrIds = [];
				foreach( $postsOrIds as $index => $postOrId ){
					$wp_post = get_post( $postOrId );
					if( !$wp_post instanceof WP_Post || $wp_post->post_type != 'video-feedbacks' ){
						console_warn( 'В видеоотзывах не верный ID отзыва: ' . ( $wp_post instanceof WP_Post ? $wp_post->ID : $postOrId ) );
					} else {
						$filtered_postsOrIds[] = $postOrId;
					}
				}
				$postsOrIds = $filtered_postsOrIds;
			}
			///
			if( !is_array( $postsOrIds ) || count( $postsOrIds ) == 0 ){
				?>
				<div class="video-feedbacks-wrap-empty">нет ни одного видео-отзыва</div>
				<?php
			} else {
				///
				?>
				<div class="video-feedbacks-wrap <?= $float == '' ? '' : 'video-feedback-float-' . $float ?>">
					<div class="row">
						<?php foreach( $postsOrIds as $postOrId ){
							self::item( $postOrId, $cols );
						} ?>
						<?php
							///empty box
							$full_grid_count = ceil( count( $postsOrIds ) / $cols );
							for( $n = 0; $n < ( $full_grid_count * $cols ) - count( $postsOrIds ); $n ++ ){
								?>
								<div class="<?= self::$bootstrap_cols[ $cols ] ?>">
									<div class="item item-empty">
										<div class="video-wrap"></div>
										<div class="item-title"></div>
										<div class="description"></div>
									</div>
								</div>
								<?php
							}
						?>
					</div>
				</div>
				<?php
				///
			}
		}


		static function paginate( $wp_query = null ){
			if( !$wp_query instanceof WP_Query ) $wp_query = self::get_wp_query();
			?>
			<div class="pagination_wraper">
				<div class="pagination_container">
					<?php

						$big = 999999999; // уникальное число для замены

						$args = [
							'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
							'format' => '',
							'current' => max( 1, get_query_var( 'paged' ) ),
							'total' => $wp_query->max_num_pages,
							'prev_text' => '< Назад',
							'next_text' => 'Вперед >',
						];
						$result = paginate_links( $args );

						// удаляем добавку к пагинации для первой страницы
						$result = str_replace( '/page/1/', '', $result );

						echo $result;
					?>
				</div>
			</div>
			<?php
		}


		static function item( $postOrId, $cols = 3 ){
			$wp_post = get_post( $postOrId );
			if( !$wp_post instanceof WP_Post || $wp_post->post_type != 'video-feedbacks' ) return;
			?>
			<div class="<?= self::$bootstrap_cols[ $cols ] ?>">
				<div class="item">
					<div class="video-wrap"><?php self::youtube_iframe( _get_field( 'video-url', $wp_post ) ) ?></div>
					<div class="item-title"><?= get_the_title( $wp_post ) ?></div>
					<div class="description"><?= apply_filters( 'the_content', $wp_post->post_content ) ?></div>
				</div>
			</div>
			<?php
			return;
		}


		static function youtube_iframe( $youtube_url ){
			$video = get_remote_video( $youtube_url );
			?>
			<iframe width="500" height="375" src="https://www.youtube.com/embed/<?= $video->get_id() ?>?feature=oembed" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
			<?php
		}

	}