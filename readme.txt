=== Plugin Name ===
Contributors: chokladzingo
Donate link: http://dessibelle.se/
Tags: comments, spam
Requires at least: 2.7
Tested up to: 3.2.1
Stable tag: 0.1

Allows you to close your site to non-logged in users, by redirecting them to the login page, displaying a message or a specific template file.

== Description ==

Allows you to close your site to non-logged in users, by redirecting them to the login page, displaying a message or a specific template file. Currently settings are available only as filters, but some GUI options are planned for a future release.

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the `logged-in` directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Changelog ==

= 1.0b1 =
* Initial Release

== Filters ==

List of available filters and their expected return values.

* `logged_in_cb`: A custom callback of your choice, instead of one of the built in actions.
* `logged_in_action`: An action to take when requested URL is not allowed (valid return values are: `fallback`, `message` and `login`).
* `logged_in_redirect_status`: HTTP redirect status code to use when redirecting to login page.
* `logged_in_fallback_filename`: A fallback file located in your `stylesheet_directory`, used by the `fallback` action.
* `logged_in_fallback_path`: A full path to the fallback file, used by the `fallback` action.
* `logged_in_message`: A message displayed by the `message` action.