<?php
	/**
	 * Created by PhpStorm.
	 * User: denisivanin
	 * Date: 2019-03-03
	 * Time: 20:57
	 */

add_action('wp', function($canonical){
	// Disable for 'search' page
	if ( is_paged() ) {
		add_filter( 'wpseo_canonical', function(){
			return preg_replace('/(\/page\/[\d]+\/?)/im','/', get_url()->get());
		},  10, 1 );
	}
	return $canonical;
});