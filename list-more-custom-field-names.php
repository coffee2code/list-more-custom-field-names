<?php
/*
Plugin Name: List More Custom Field Names
Version: 1.1
Plugin URI: http://coffee2code.com/wp-plugins/list-more-custom-field-names
Author: Scott Reilly
Author URI: http://coffee2code.com
Description: Allows for more existing custom field names to be listed in the dropdown selection field when writing a post.

By default, WordPress only allows 30 custom field names/keys to be listed in the dropdown selection "Name" field when writing a post
or page.  If you, or the plugins you use, make use of a lot of custom field key names, you may surpass the default limit resulting in
some custom field keys not being listed.  This may force post authors to manually type in custom field key names if they aren't
listed, which increases the chances for naming errors (typos, or not using the precise key name that is needed).  This may also
cause some authors concern wondering where previously used custom field keys have gone since they aren't listed.

This plugin increases the limit to 200 custom field key names.  Due to the simplistic nature of the plugin and the overhead of doing so
for a single setting, there is no settings page to customize this value.  You can change the value of the limit by editing your
wp-config.php file and at the end adding a line such as:
	define('CUSTOM_FIELD_NAMES_LIMIT', 100);
Where the value of 100 is the value you'd like to specify.

Compatible with WordPress 2.6+, 2.7+, 2.8+.

=>> Read the accompanying readme.txt file for more information.  Also, visit the plugin's homepage
=>> for more information and the latest updates

Installation:

1. Download the file http://coffee2code.com/wp-plugins/list-more-custom-field-names.zip and unzip it into your 
/wp-content/plugins/ directory.
2. Activate the plugin through the 'Plugins' admin menu in WordPress
3. (Optional) In wp-config.php, customize the number of custom fields you want shown. The default of 200 can be changed by adding a line like:
define('CUSTOM_FIELD_NAMES_LIMIT', 100);

*/

/*
Copyright (c) 2009 by Scott Reilly (aka coffee2code)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation 
files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, 
modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the 
Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR
IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

add_filter('postmeta_form_limit', create_function( '$limit',
				'return defined(\'CUSTOM_FIELD_NAMES_LIMIT\') ? CUSTOM_FIELD_NAMES_LIMIT : 200;'));

?>