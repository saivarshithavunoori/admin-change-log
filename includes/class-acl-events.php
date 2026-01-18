<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACL_Events {

	/**
	 * Register all admin event hooks
	 */
	public static function register() {

		// Plugin changes
		add_action( 'activated_plugin', [ __CLASS__, 'plugin_activated' ] );
		add_action( 'deactivated_plugin', [ __CLASS__, 'plugin_deactivated' ] );

		// Theme change
		add_action( 'switch_theme', [ __CLASS__, 'theme_switched' ], 10, 2 );

		// Additional CSS (Customizer)
		add_action( 'save_post_custom_css', [ __CLASS__, 'custom_css_updated' ], 10, 2 );

		// User role changes
		add_action( 'set_user_role', [ __CLASS__, 'user_role_changed' ], 10, 3 );

		// Updates (core, plugins, themes)
		add_action( 'upgrader_process_complete', [ __CLASS__, 'updates_completed' ], 10, 2 );
	}

	/* -------------------------
	 * Plugin events
	 * ------------------------- */

	public static function plugin_activated( $plugin ) {
		ACL_Logger::log(
			sprintf(
				'Plugin "%s" was activated',
				basename( $plugin )
			)
		);
	}

	public static function plugin_deactivated( $plugin ) {
		ACL_Logger::log(
			sprintf(
				'Plugin "%s" was deactivated',
				basename( $plugin )
			)
		);
	}

	/* -------------------------
	 * Theme events
	 * ------------------------- */

	public static function theme_switched( $new_name, $new_theme ) {
		ACL_Logger::log(
			sprintf(
				'Theme switched to "%s"',
				$new_theme->get( 'Name' )
			)
		);
	}

	/* -------------------------
	 * Customizer CSS
	 * ------------------------- */

	public static function custom_css_updated( $post_id, $post ) {

		if ( wp_is_post_revision( $post_id ) || wp_is_post_autosave( $post_id ) ) {
			return;
		}

		ACL_Logger::log(
			'Additional CSS was updated via the Customizer'
		);
	}

	/* -------------------------
	 * User role changes
	 * ------------------------- */

	public static function user_role_changed( $user_id, $new_role, $old_roles ) {

		$user = get_userdata( $user_id );

		if ( ! $user ) {
			return;
		}

		ACL_Logger::log(
			sprintf(
				'User "%s" role changed to "%s"',
				$user->display_name,
				$new_role
			)
		);
	}

	/* -------------------------
	 * Updates (core/plugins/themes)
	 * ------------------------- */

	public static function updates_completed( $upgrader, $options ) {

		if ( empty( $options['type'] ) || empty( $options['action'] ) ) {
			return;
		}

		if ( $options['action'] !== 'update' ) {
			return;
		}

		switch ( $options['type'] ) {

			case 'core':
				ACL_Logger::log( 'WordPress core was updated' );
				break;

			case 'plugin':
				ACL_Logger::log( 'One or more plugins were updated' );
				break;

			case 'theme':
				ACL_Logger::log( 'One or more themes were updated' );
				break;
		}
	}
}
