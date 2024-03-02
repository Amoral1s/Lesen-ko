<?php
	/**
	 * Created by PhpStorm.
	 * User: denisivanin
	 * Date: 2019-03-04
	 * Time: 08:42
	 */

	add_shortcode( 'hiweb-video-feedbacks', function( $data ){
		$cols = isset( $data['cols'] ) ? intval( $data['cols'] ) : 2;
		if( !isset( $data['ids'] ) ){
			$postsOrIds = null;//video_feedbacks::get_wp_query()->get_posts();
		} else {
			$postsOrIds = [];
			foreach( explode( ',', $data['ids'] ) as $id ){
				$postsOrIds[] = intval( trim( $id ) );
			}
			$postsOrIds = array_unique( $postsOrIds );
		}
		$float = '';
		if( isset( $data['float'] ) ) $float = $data['float'];
		ob_start();
		video_feedbacks::grid( $postsOrIds, $cols, $float );
		return ob_get_clean();
	} );