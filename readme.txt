=== Admin Change Log ===
Contributors: saivarshith
Tags: admin, logging, audit, tools, support
Requires at least: 5.8
Tested up to: 6.9
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A lightweight admin-only plugin that logs important WordPress administrative changes in a simple, readable timeline.

== Description ==

Admin Change Log is a small, focused WordPress plugin designed to help site owners, agencies, and support teams understand *what changed* in the WordPress admin and *when*.

It records high-impact administrative actions and displays them as a clear, human-readable timeline inside the WordPress dashboard.

The plugin is intentionally minimal. It logs events, not content, avoids noisy data, and does not modify WordPress behavior.

== What this plugin logs ==

- Plugin activation and deactivation
- Theme switches
- WordPress core updates
- Plugin updates
- Theme updates
- User role changes
- Customizer “Additional CSS” updates

== What this plugin does NOT log ==

- Post or page content changes
- Page builder edits (Elementor, etc.)
- Login activity
- IP addresses or personal data
- Settings values or configuration content
- Front-end activity

== Design principles ==

- Admin-only, read-only interface
- Stores a rolling history of the last 500 events
- No JavaScript, no AJAX, no background jobs
- No third-party dependencies
- Clean uninstall with full data removal

== Installation ==

1. Upload the `admin-change-log` folder to `/wp-content/plugins/`
2. Activate the plugin through the Plugins menu
3. Visit **Tools → Admin Change Log** to view the timeline

== Frequently Asked Questions ==

= Does this plugin affect site performance? =
No. The plugin stores a small, bounded set of log entries and runs only in the admin area.

= Does it store sensitive data? =
No. Only event descriptions, timestamps, and user display names are stored.

= Can I delete or export the logs? =
Currently, logs are managed automatically using a rolling limit. Manual deletion and export are intentionally not included to keep the plugin simple and safe.

= Is this suitable for client websites? =
Yes. The plugin is designed specifically for agency and support workflows.

== Screenshots ==

1. Admin Change Log timeline under the Tools menu
2. Example log entries showing administrative changes

== Changelog ==

= 1.0.0 =
- Initial stable release
- Log plugin, theme, and core updates
- Log user role changes
- Log Customizer Additional CSS updates
- Read-only admin timeline
- Clean uninstall support

== Upgrade Notice ==

= 1.0.0 =
Initial stable release.
