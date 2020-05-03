=== List More Custom Field Names ===
Contributors: coffee2code
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=6ARCFJ9TX3522
Tags: custom fields, admin, edit post, edit page, meta, keys, coffee2code
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Requires at least: 2.6
Tested up to: 5.4
Stable tag: 1.3.5

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

Note: This plugin has no effect for users who make use of the block editor (aka Gutenberg) introduced in WordPress v5.0 because that editor does not directly expose custom fields in the interface.

Links: [Plugin Homepage](https://coffee2code.com/wp-plugins/list-more-custom-field-names/) | [Plugin Directory Page](https://wordpress.org/plugins/list-more-custom-field-names/) | [GitHub](https://github.com/coffee2code/list-more-custom-field-names/) | [Author Homepage](https://coffee2code.com)


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

    `add_filter( 'c2c_list_more_custom_field_names', function ( $limit ) { return 100; } );`


= Why don't I see form fields for adding/editing custom fields for a post, as mentioned by documentation for this plugin? =

This plugin has no effect for users who make use of the block editor (aka Gutenberg) introduced in WordPress v5.0 because that editor does not directly expose custom fields in the interface. The plugin is still beneficial for users making use of the classic editor.

= Does this plugin include unit tests? =

Yes.


== Changelog ==

= 1.3.5 (2020-05-02) =
* Change: Use HTTPS for link to WP SVN repository in bin script for configuring unit tests
* Change: Note compatibility through WP 5.4+
* Change: Update links to coffee2code.com to be HTTPS

= 1.3.4 (2019-11-23) =
* New: Add CHANGELOG.md and move all but most recent changelog entries into it
* Change: Update unit test install script and bootstrap to use latest WP unit test repo
* Change: Note compatibility through WP 5.3+
* Change: Add link to plugin's page in Plugin Directory to README.md
* Change: Update copyright date (2020)
* Change: Split paragraph in README.md's "Support" section into two

= 1.3.3 (2019-02-27) =
* NeW: Add documentation indicating that the plugin has no benefit for users using the block editor
* New: Add inline documentation for hook
* Change: Update filter example to use anonymous function instead of `create_function()`
* Change: Note compatibility through WP 5.1+
* Change: Update copyright date (2019)
* Change: Update License URI to be HTTPS

_Full changelog is available in [CHANGELOG.md](https://github.com/coffee2code/list-more-custom-field-names/blob/master/CHANGELOG.md)._


== Upgrade Notice ==

= 1.3.5 =
Trivial update: Updated a few URLs to be HTTPS and noted compatibility through WP 5.4+.

= 1.3.4 =
Trivial update: modernized unit tests, created CHANGELOG.md to store historical changelog outside of readme.txt, noted compatibility through WP 5.3+, and updated copyright date (2020)

= 1.3.3 =
Trivial update: noted lack of benefit for users using block editor, noted compatibility through WP 5.1+. and updated copyright date (2019)

= 1.3.2 =
Trivial update: added README.md, noted compatibility through WP 4.9+. and updated copyright date (2018)

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
