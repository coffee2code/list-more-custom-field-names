=== List More Custom Field Names ===
Contributors: coffee2code
Donate link: http://coffee2code.com/donate
Tags: custom fields, admin, edit post, edit page, meta, keys, coffee2code
Requires at least: 2.6
Tested up to: 3.0.1
Stable tag: 1.2
Version: 1.2

Allows for more existing custom field names to be listed in the dropdown selection field when writing a post.


== Description ==

Allows for more existing custom field names to be listed in the dropdown selection field when writing a post.

By default, WordPress only allows 30 custom field names/keys to be listed in the dropdown selection 'Name' field when writing a post or page.  If you, or the plugins you use, make use of a lot of custom field key names, you may surpass the default limit resulting in some custom field keys not being listed.  This may force post authors to manually type in custom field key names if they aren't listed, which increases the chances for naming errors (typos, or not using the precise key name that is needed).  This may also cause some authors concern wondering where previously used custom field keys have gone since they aren't listed.

This plugin increases the limit to 200 custom field key names.  Due to the simplistic nature of the plugin and the overhead of doing so for a single setting, there is no settings page to customize this value.  You can change the value of the limit in either of two ways:

1. By editing your wp-config.php file and at the end adding a line such as:

`define('CUSTOM_FIELD_NAMES_LIMIT', 100);`

Where the value of 100 is the value you'd like to specify.

or

1. Somewhere, most likely in your active theme's functions.php file, hook the 'c2c_list_more_custom_field_names' filter and return the number you'd like:

`add_filter('c2c_list_more_custom_field_names', create_function('$limit', 'return 100;'));`

Where the value of 100 is the value you'd like to specify.


== Installation ==

1. Unzip `list-more-custom-field-names.zip` inside the `/wp-content/plugins/` directory for your site (or install via the built-in WordPress plugin installer)
1. Activate the plugin through the 'Plugins' admin menu in WordPress
1. (Optional) In wp-config.php, customize the number of custom fields you want shown. The default of 200 can be changed by adding a line like:
`define('CUSTOM_FIELD_NAMES_LIMIT', 100);`


== Frequently Asked Questions ==

= What is the default number of custom field names/keys that WordPress lists in the admin when writing/editing pages and posts? =

WordPress only lists up to 30.

= How many custom field names/keys does this plugin list in the admin when writing/editing pages and posts? =

By default, this plugin lists up to 200.  You can customize this value.

= How can I customize the default number of custom field name/keys listed in the admin when writing/editing pages and posts? =

There are two ways you can customize this value (in both examples, change 100 to the number you'd like to use):
1. In your wp-config.php file (in the root directory of your blog), add the following line of code (making sure it is within the opening `<?php` and close `?>` PHP tags):

`define('CUSTOM_FIELD_NAMES_LIMIT', 100);`

2. Somewhere, most likely in your active theme's functions.php file, hook the 'c2c_list_more_custom_field_names' filter and return the number you'd like:

`add_filter('c2c_list_more_custom_field_names', create_function('$limit', 'return 100;'));`


== Changelog ==

= 1.2 =
* Functionality now in new `c2c_list_more_custom_field_names()` rather than in an anonymous function
* Allow overriding of the default number of custom field names, via the 'c2c_list_more_custom_field_names' filter (default is 200)
* Note compatibility with WP 3.0+
* Remove docs from top of plugin file (all that and more are in readme.txt)
* Add Upgrade Notice section to readme.txt

= 1.1.1 =
* Add PHPDoc documentation
* Note compatibility with WP 2.9+
* Update copyright date

= 1.1 =
* Default limit provided by plugin now overridden via CUSTOM_FIELD_NAMES_LIMIT constant, if defined (and no longer via global variable defined in plugin)
* Added Changelog and FAQ to readme
* Noted compatibility through WordPress 2.8+

= 1.0 =
* Initial release


== Upgrade Notice ==

= 1.2 =
Minor update. Highlights: added filter to customize number of custom field names to list; moved functionality out of anonymous function and into dedicated function; verified WP 3.0 compatibility.