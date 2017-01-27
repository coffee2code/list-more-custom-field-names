=== List More Custom Field Names ===
Contributors: coffee2code
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=6ARCFJ9TX3522
Tags: custom fields, admin, edit post, edit page, meta, keys, coffee2code
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Requires at least: 2.6
Tested up to: 4.7
Stable tag: 1.3.1

Allows for more existing custom field names to be listed in the dropdown selection field when writing a post.


== Description ==

By default, WordPress only allows 30 custom field names/keys to be listed in the dropdown selection 'Name' field when writing a post or page. If you, or the plugins you use, make use of a lot of custom field key names, you may surpass the default limit resulting in some custom field keys not being listed. This may force post authors to manually type in custom field key names if they aren't listed, which increases the chances for naming errors (typos, or not using the precise key name that is needed). This may also cause some authors concern wondering where previously used custom field keys have gone since they aren't listed.

This plugin increases the limit to 200 custom field key names.

There is no settings page to customize the default value. If you'd like to list some number of custom field key names other than 200 (say, for example, 100), you can do so in either of two ways:

1. By editing your wp-config.php file and at the end adding a line such as:
    `define( 'CUSTOM_FIELD_NAMES_LIMIT', 100 );`
_-or-_
1. Somewhere -- ideally in a mu-plugin or site-specific plugin, or less ideally your active theme's functions.php file -- hook the 'c2c_list_more_custom_field_names' filter and return the number you'd like to use:
    `add_filter( 'c2c_list_more_custom_field_names', create_function( '$limit', 'return 100;' ) );`

Links: [Plugin Homepage](http://coffee2code.com/wp-plugins/list-more-custom-field-names/) | [Plugin Directory Page](https://wordpress.org/plugins/list-more-custom-field-names/) | [Author Homepage](http://coffee2code.com)


== Installation ==

1. Install via the built-in WordPress plugin installer. Or download and unzip `list-more-custom-field-names.zip` inside the plugins directory for your site (typically `wp-content/plugins/`)
2. Activate the plugin through the 'Plugins' admin menu in WordPress
3. (Optional) In wp-config.php, customize the number of custom fields you want shown. The default of 200 can be changed by adding a line like:
    `define( 'CUSTOM_FIELD_NAMES_LIMIT', 100 );`


== Frequently Asked Questions ==

= What is the default number of custom field names/keys that WordPress lists in the admin when writing/editing pages and posts? =

WordPress only lists up to 30.

= How many custom field names/keys does this plugin list in the admin when writing/editing pages and posts? =

By default, this plugin lists up to 200. You can customize this value.

= How can I customize the default number of custom field name/keys listed in the admin when writing/editing pages and posts? =

There are two ways you can customize this value (in both examples, change 100 to the number you'd like to use):

1. In your wp-config.php file (in the root directory of your blog), add the following line of code (making sure it is within the opening `<?php` and closing `?>` PHP tags):

    `define( 'CUSTOM_FIELD_NAMES_LIMIT', 100 );`

2. Somewhere -- ideally in a mu-plugin or site-specific plugin, or less ideally your active theme's functions.php file -- hook the 'c2c_list_more_custom_field_names' filter and return the number you'd like:

    `add_filter( 'c2c_list_more_custom_field_names', create_function( '$limit', 'return 100;' ) );`


= Does this plugin include unit tests? =

Yes.


== Changelog ==

= 1.3.1 (2017-01-26) =
* Change: Default `WP_TESTS_DIR` to `/tmp/wordpress-tests-lib` rather than erroring out if not defined via environment variable.
* Change: Enable more error output for unit tests.
* Change: Note compatibility through WP 4.7+.
* Change: Minor readme.txt improvements.
* Change: Update copyright date (2017).
* Change: Add 'Text Domain' to plugin header.
* New: Add LICENSE file.

= 1.3 (2015-12-11) =
* Change: Only utilize value of constant if it isn't falsey (0, false, empty string, etc).
* Change: Note compatibility through WP 4.4+.
* Change: Explicitly declare methods in unit tests as public or protected.
* Change: Update copyright date (2016).
* Add: Create empty index.php to prevent files from being listed if web server has enabled directory listings.

= 1.2.9 (2015-08-15) =
* Update: Note compatibility through WP 4.3+
* Update: Minor plugin header tweaks (formatting)

= 1.2.8 (2015-02-11) =
* Note compatibility through WP 4.1+
* Update copyright date (2015)

= 1.2.7 (2014-08-25) =
* Minor plugin header reformatting
* Change documentation links to wp.org to be https
* Note compatibility through WP 4.0+
* Add plugin icon

= 1.2.6 (2013-12-17) =
* Add unit tests
* Note compatibility through WP 3.8+
* Update copyright date (2014)
* Minor code and documentation reformatting
* Change donate link
* Add banner image

= 1.2.5 =
* Cast limit as absolute integer rather than just an integer to disallow negative limits
* Add check to prevent execution of code if file is directly accessed
* Note compatibility through WP 3.5+
* Update copyright date (2013)
* Minor code reformatting (spacing)

= 1.2.4 =
* Re-license as GPLv2 or later (from X11)
* Add 'License' and 'License URI' header tags to readme.txt and plugin file
* Remove ending PHP close tag
* Note compatibility through WP 3.4+
* Minor code reformatting (indentation)

= 1.2.3 =
* Note compatibility through WP 3.3+
* Minor code documentation reformatting in readme.txt

= 1.2.2 =
* Note compatibility through WP 3.2+
* Minor documentation reformatting in readme.txt
* Add plugin homepage and author links to description in readme.txt

= 1.2.1 =
* Note compatibility through WP 3.1+
* Update copyright date (2011)

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

= 1.3.1 =
Trivial update: tweaked readme, changed unit test bootstrap, noted compatibility through WP 4.7+, and updated copyright date

= 1.3 =
Minor update: only use non-false values for the constant; noted compatibility through WP 4.4+; updated copyright date

= 1.2.9 =
Trivial update: noted compatibility through WP 4.3+

= 1.2.8 =
Trivial update: noted compatibility through WP 4.1+ and updated copyright date

= 1.2.7 =
Trivial update: noted compatibility through WP 4.0+; added plugin icon.

= 1.2.6 =
Trivial update: added unit tests; noted compatibility through WP 3.8+

= 1.2.5 =
Trivial update: noted compatibility through WP 3.5+

= 1.2.4 =
Trivial update: noted compatibility through WP 3.4+; explicitly stated license

= 1.2.3 =
Trivial update: noted compatibility through WP 3.3+

= 1.2.2 =
Trivial update: noted compatibility through WP 3.2+

= 1.2.1 =
Trivial update: noted compatibility through WP 3.1+ and updated copyright date

= 1.2 =
Minor update. Highlights: added filter to customize number of custom field names to list; moved functionality out of anonymous function and into dedicated function; verified WP 3.0 compatibility.
