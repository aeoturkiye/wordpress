<?php

/**
 * Class Conditions
 *
 * Provides methods to check conditions for displaying item
 *
 * @package    WowPlugin
 * @subpackage Publish
 * @author     Dmytro Lobov <hey@wow-company.com>, Wow-Company
 * @copyright  2024 Dmytro Lobov
 * @license    GPL-2.0+
 */

namespace ModalWindowPro\Publish;

use ModalWindowPro\WOWP_Plugin;
use ModalWindowPro\WOWP_Public;

defined( 'ABSPATH' ) || exit;

class Conditions {

	public static function init( $result ): bool {
		$param = ! empty( $result->param ) ? maybe_unserialize( $result->param ) : [];

		$check = [
			'status'         => self::status( $result->status ),
			'mode'           => self::mode( $result->mode ),
			'remove_mobile'  => self::remove_mobile( $param ),
			'remove_desktop' => self::remove_desktop( $param ),
			'users'          => self::users( $param ),
			'browser'        => self::browser( $param ),
			'language'       => self::language( $param ),
			'schedule'       => self::schedule( $param ),
			'show_once'      => self::show_once( $result->id, $param ),
			'check_popup'    => self::check_popup( $result->id, $param ),
		];

		$check = apply_filters( WOWP_Plugin::PREFIX . '_conditions', $check );

		if ( in_array( false, $check, true ) ) {
			return false;
		}

		return true;

	}

	private static function status( $status ): bool {
		return empty( $status );
	}

	private static function mode( $mode ): bool {
		return empty( $mode ) || current_user_can( 'manage_options' );
	}

	private static function remove_mobile( $param ): bool {
		if ( empty( $param['remove_mobile'] ) ) {
			return true;
		}

		return ! wp_is_mobile();
	}

	private static function remove_desktop( $param ): bool {
		if ( empty( $param['remove_desktop'] ) ) {
			return true;
		}

		return wp_is_mobile();
	}

	private static function users( $param ): bool {
		$users = $param['users'] ?? '1';

		if ( absint( $users ) === 1 ) {
			return true;
		}
		if ( absint( $users ) === 3 ) {
			return ! is_user_logged_in();
		}
		if ( absint( $users ) !== 2 ) {
			return true;
		}

		$roles = array_filter( $param, [ __CLASS__, 'get_roles' ], ARRAY_FILTER_USE_BOTH );

		$current_user = wp_get_current_user();

		$i = 0;

		if ( ! empty( $current_user->roles ) ) {
			foreach ( $current_user->roles as $value ) {
				if ( array_key_exists( 'user_' . $value, $roles ) ) {
					$i ++;
				}
			}
		}

		return ! empty( $i );

	}

	private static function get_roles( $value, $key ) {
		return strpos( $key, 'user_' ) === 0 && ! empty( $value );
	}


	private static function browser( $param ): bool {
		$browser  = self::get_browser_name();
		$browsers = [ 'opera', 'edge', 'chrome', 'safari', 'firefox', 'ie', 'other' ];

		return in_array( $browser, $browsers ) && empty( $param[ 'browser_' . $browser ] );
	}

	private static function get_browser_name(): string {

		$user_agent = '';

		if ( isset( $_SERVER["HTTP_USER_AGENT"] ) ) {
			$user_agent = $_SERVER['HTTP_USER_AGENT'];
		}

		if ( strpos( $user_agent, 'Opera' ) || strpos( $user_agent, 'OPR/' ) ) {
			return 'opera';
		}

		if ( strpos( $user_agent, 'Edg' ) ) {
			return 'edge';
		}

		if ( strpos( $user_agent, 'Chrome' ) ) {
			return 'chrome';
		}

		if ( strpos( $user_agent, 'Safari' ) ) {
			return 'safari';
		}

		if ( strpos( $user_agent, 'Firefox' ) ) {
			return 'firefox';
		}

		if ( strpos( $user_agent, 'MSIE' ) || strpos( $user_agent, 'Trident/7' ) ) {
			return 'ie';
		}

		return 'other';
	}

	private static function language( $param ): bool {
		if ( empty( $param['language_on'] ) || empty( $param['language'] ) ) {
			return true;
		}

		$current_locale = get_locale();

		if ( $param['language'] === 'custom' ) {
			$locale = ! empty( $param['locale'] ) ? $param['locale'] : '';

			return $current_locale === $locale;
		}

		return $current_locale === $param['language'];

	}

	private static function schedule( $param ): bool {

		if ( empty( $param['weekday'] ) ) {
			return true;
		}

		if ( ! is_array( $param['weekday'] ) ) {
			return true;
		}

		$count = count( $param['weekday'] );

		for ( $i = 0; $i < $count; $i ++ ) {
			if ( self::check_day( $param, $i ) === true && self::check_time( $param, $i ) === true && self::check_date( $param, $i ) ) {
				return true;
			}
		}

		return false;

	}

	private static function check_day( $param, $i ): bool {

		if ( empty( $param['weekday'][ $i ] ) || $param['weekday'][ $i ] === 'none' ) {
			return true;
		}

		$currentDay = wp_date( 'N' );

		return $currentDay === $param['weekday'][ $i ];

	}

	private static function check_time( $param, $i ): bool {
		if ( empty( $param['time_start'][ $i ] ) && empty( $param['time_end'][ $i ] ) ) {
			return true;
		}

		$start   = (float) str_replace( ':', '.', $param['time_start'][ $i ] );
		$end     = (float) str_replace( ':', '.', $param['time_end'][ $i ] );
		$current = (float) current_time( 'H.i' );

		return $start <= $current && $current <= $end;
	}

	private static function check_date( $param, $i ): bool {

		if ( empty( $param['dates'][ $i ] ) || $param['dates'][ $i ] === 'disabled' ) {
			return true;
		}

		$current = wp_date( 'Y-m-d' );
		$start   = ! empty( $param['date_start'][ $i ] ) ? $param['date_start'][ $i ] : $current;
		$end     = ! empty( $param['date_end'][ $i ] ) ? $param['date_end'][ $i ] : $current;

		return $start <= $current && $current <= $end;

	}

	private static function show_once( $id, $param ): bool {
		if ( $param['use_cookies'] !== 'yes' ) {
			return true;
		}
		$name = 'wow-modal-id-' . $id;

		return ! isset( $_COOKIE[ $name ] );
	}

	private static function check_popup( $id, $param ): bool {
		if ( empty( $param['after_popup'] ) ) {
			return true;
		}

		return isset( $_COOKIE[ $param['popup'] ] );
	}

}