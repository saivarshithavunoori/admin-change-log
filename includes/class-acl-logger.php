<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACL_Logger {

	/**
	 * Record an admin event
	 */
	public static function log( $message ) {

		if ( ! is_admin() ) {
			return;
		}

		$user = wp_get_current_user();

		$event = [
			'time'    => time(),
			'user_id' => $user->ID,
			'user'    => $user->display_name,
			'message' => sanitize_text_field( $message ),
		];

		ACL_Storage::add_event( $event );
	}
}
