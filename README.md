=== Plugin Name ===
Contributors: chokladzingo
Donate link: http://dessibelle.se/
Tags: logged, in, login, log, redirect, users, visitors
Requires at least: 2.7
Tested up to: 3.5.1
Stable tag: 1.0.4

Allows you to close your site to non-logged in users, by redirecting them to the login page, displaying a message or a specific template file.

== Description ==

Allows you to close your site to non-logged in users, by redirecting them to the login page, displaying a message or a specific template file. The plugin can be configured to redirect visitors to login page, display a short message using your themes layout or display a fallback file located in your `stylesheet_directory`.

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the `logged-in` directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Changelog ==

= 1.0.4 =
* **Settings are now located under Settings / General on WordPress 3.5 or higher**, as the Privacy page has been removed.

= 1.0.3 =
* Fixed a bug that caused the redirect action to incorrectly redirect to the the admin section when WordPress is installed in a subdirectory, even when accessing the front page.
* Added the `logged_in_login_redirect_url` filter, allowing developers to override the URL mentioned above.

= 1.0.2 =
* Added setting to allow visitors to access XML-RPC

= 1.0.1 =
* Added setting to allow visitors to access feeds
* Fixed bug affecting IIS servers, causing redirection loops
* Added romaninan localization

= 1.0 =
* Added settings GUI
* Added localization support and Swedish localization

= 1.0b1 =
* Initial Release

== Filters ==

List of available filters and their expected return values.

* `logged_in_url_is_valid`: Let's you validate all URL's by returning true or false. Parameters indicating validity and URL.
* `logged_in_cb`: A custom callback to handle the case of users who are not logged in of your choice, instead of using one of the built in actions. You should return a function name or pointer.
* `logged_in_action`: An action to take when requested URL is not allowed (valid return values are: `fallback`, `message` and `login`).
* `logged_in_redirect_status`: HTTP redirect status code to use when redirecting to login page. Defaults to 302.
* `logged_in_fallback_filename`: A fallback file located in your `stylesheet_directory`, used by the `fallback` action.
* `logged_in_fallback_path`: A full path to the fallback file, used by the `fallback` action.
* `logged_in_message`: A message displayed by the `message` action.
* `logged_in_login_redirect_url`: The URL to goto after successful login.

== Credits ==
* Romanian localization by [Web Hosting Geeks](http://webhostinggeeks.com/)
