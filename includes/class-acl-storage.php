<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACL_Storage {

	const OPTION_KEY = 'acl_admin_change_log';
	const MAX_EVENTS = 500;

	/**
	 * Get all stored log events
	 */
	public static function get_events() {
		$events = get_option( self::OPTION_KEY, [] );
		return is_array( $events ) ? $events : [];
	}

	/**
	 * Add a new log entry
	 */
	public static function add_event( $event ) {
		$events = self::get_events();

		array_unshift( $events, $event );

		if ( count( $events ) > self::MAX_EVENTS ) {
			$events = array_slice( $events, 0, self::MAX_EVENTS );
		}

		update_option( self::OPTION_KEY, $events, false );
	}

	/**
	 * Delete all stored logs (used on uninstall)
	 */
	public static function delete_all() {
		delete_option( self::OPTION_KEY );
	}
}
