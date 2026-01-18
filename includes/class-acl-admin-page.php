<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACL_Admin_Page {

	public static function register() {
		add_action( 'admin_menu', [ __CLASS__, 'add_menu' ] );
	}

	public static function add_menu() {
		add_submenu_page(
			'tools.php',
			__( 'Admin Change Log', 'admin-change-log' ),
			__( 'Admin Change Log', 'admin-change-log' ),
			'manage_options',
			'admin-change-log',
			[ __CLASS__, 'render_page' ]
		);
	}

	public static function render_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$events = ACL_Storage::get_events();
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'Admin Change Log', 'admin-change-log' ); ?></h1>

			<p>
				This page shows recent administrative changes such as plugin activation,
				deactivation, and theme switches.
			</p>

			<?php if ( empty( $events ) ) : ?>
				<p><em>No admin changes logged yet.</em></p>
			<?php else : ?>
				<table class="widefat fixed striped">
					<thead>
						<tr>
							<th>Date</th>
							<th>User</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ( $events as $event ) : ?>
							<tr>
								<td>
									<?php
									echo esc_html(
										date_i18n(
											get_option( 'date_format' ) . ' ' . get_option( 'time_format' ),
											$event['time']
										)
									);
									?>
								</td>
								<td><?php echo esc_html( $event['user'] ); ?></td>
								<td><?php echo esc_html( $event['message'] ); ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			<?php endif; ?>
		</div>
		<?php
	}
}
