<?php
	/**
	 * Created by PhpStorm.
	 * User: denmedia
	 * Date: 11.10.2018
	 * Time: 13:01
	 */

	namespace theme;



	use hiweb\core\Paths\PathsFactory;
    use hiweb\core\Strings;


    class recaptcha{

		static $admin_menu_slug = 'hiweb-recaptcha';
		static $admin_menu_parent = 'options-general.php';
		static $options_object_recaptcha;


		static function init(){
			///Options reCaptcha
			require_once __DIR__ . '/options.php';
			///
		}


		/**
		 * @param bool $public
		 * @return string
		 */
		static function get_recaptcha_key( $public = true ){
			self::init();
			return get_option( $public ? 'hiweb-option-hiweb-recaptcha-public-key' : 'hiweb-option-hiweb-recaptcha-private-key' );
			//return get_field( ( $public ? 'public-key' : 'private-key' ), self::$admin_menu_slug );
		}


		/**
		 * @return bool
		 */
		static function is_enable(){
			return ( trim( self::get_recaptcha_key() ) != '' && get_option( 'hiweb-option-hiweb-recaptcha-enable' ) != '' );
			//return ( trim( self::get_recaptcha_key() ) != '' && get_field( 'enable', self::$admin_menu_slug ) );
		}


		/**
		 * @return float
		 */
		static function get_minimal_score(){
			return floatval( get_option( 'hiweb-option-hiweb-recaptcha-min-score' ) );
		}


		/**
		 * @param string $post_name
		 * @param bool   $return_boolean - true => возвращает тоько true или false после проверки
		 * @return array|bool|mixed|object
		 * @version 1.1
		 */
		static function get_recaptcha_verify( $post_name = 'recaptcha-token', $return_boolean = true ){
			if( self::is_enable() == '' ){

				return true;
			}
			$post_token_value = PathsFactory::request( $post_name );
			///
			$post_data = http_build_query( [
				'secret' => self::get_recaptcha_key( false ),
				'response' => $post_token_value,
				'remoteip' => $_SERVER['REMOTE_ADDR']
			] );
			$opts = [
				'http' => [
					'method' => 'POST',
					'header' => 'Content-type: application/x-www-form-urlencoded',
					'content' => $post_data
				]
			];
			$context = stream_context_create( $opts );
			$response = file_get_contents( 'https://www.google.com/recaptcha/api/siteverify', false, $context );
			$response_std = json_decode( $response );
			if( $return_boolean ){
				return $response_std->success ? ( floatval( $response_std->score ) >= self::get_minimal_score() ) : false;
			} else {
				return [
					json_decode( $response ),
					'secret' => self::get_recaptcha_key( false ),
					'response' => $post_token_value,
					'remoteip' => $_SERVER['REMOTE_ADDR']
				];
			}
		}


		static function the_input(){
			if( self::is_enable() ){
				include_js( 'https://www.google.com/recaptcha/api.js?render=' . self::get_recaptcha_key( true ) );
				$id_rand = Strings::rand();
				?>
				<input type="hidden" id="<?= $id_rand ?>" name="recaptcha-token" data-key="<?= self::get_recaptcha_key() ?>">
				<?php
			}
		}


		static function get_the_input(){
			ob_start();
			self::the_input();
			return ob_get_clean();
		}


		/**
		 * @return mixed
		 */
		static function get_error_message(){
			return get_field( 'text-error', self::$admin_menu_slug );
		}

	}