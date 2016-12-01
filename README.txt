=== Plugin Name ===
Contributors: (this should be a list of wordpress.org userid's)
Donate link: http://www.prioritylane.com
Tags: rest, wpcf, custom fields
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin exposes post custom fields via the WP REST API.

== Description ==


It adds a 'wpcf' field to the API response, which contains an array of all custom fields associated with the post.  The 'wpcf-' prefix is removed from the field names, and any arrays with 1 element are converted to a string to make templating easier.


== Installation ==

1. Upload `wp-rest-api-wpcf.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress


== Changelog ==

= 0.0.1 =
Initial version.

