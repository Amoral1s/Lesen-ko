<?php
	/**
	 * Created by PhpStorm.
	 * User: denisivanin
	 * Date: 2019-03-08
	 * Time: 10:21
	 */

	add_action( 'init', function(){
		global $allowedtags;
		$allowedtags['noindex'] = [];
	} );

	add_filter( 'tiny_mce_before_init', function( $opts ){
		$opts["extended_valid_elements"] = 'noindex[]';
		$opts["custom_elements"] = 'noindex';
		return $opts;
	} );