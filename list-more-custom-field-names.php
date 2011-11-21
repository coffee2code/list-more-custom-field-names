<?php
/**
 * @package List_More_Custom_Field_Names
 * @author Scott Reilly
 * @version 1.2.2
 */
/*
Plugin Name: List More Custom Field Names
Version: 1.2.2
Plugin URI: http://coffee2code.com/wp-plugins/list-more-custom-field-names/
Author: Scott Reilly
Author URI: http://coffee2code.com
Description: Allows for more existing custom field names to be listed in the dropdown selection field when writing a post.

Compatible with WordPress 2.6+, 2.7+, 2.8+, 2.9+, 3.0+, 3.1+, 3.2+.

=>> Read the accompanying readme.txt file for instructions and documentation.
=>> Also, visit the plugin's homepage for additional information and updates.
=>> Or visit: http://wordpress.org/extend/plugins/list-more-custom-field-names/

TODO:
	* While there is some arguable merit about this plugin providing its own filter which is effectively a
	passthrough to WP's own filter, the docs should advocate using the WP filter instead of this plugin's
	filter.

*/

/*
Copyright (c) 2009-2011 by Scott Reilly (aka coffee2code)

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

if ( ! function_exists( 'c2c_list_more_custom_field_names' ) ):
/**
 * Allows customization of the number of custom field names to list in the
 * dropdown of custom field names when adding custom fields to a post.
 *
 * @param int $limit The default number of custom field names to list.
 * @return int The new number of custom field names to list
 */
function c2c_list_more_custom_field_names( $limit ) {
	if ( defined( 'CUSTOM_FIELD_NAMES_LIMIT' ) )
		$limit = CUSTOM_FIELD_NAMES_LIMIT;
	else
		$limit = apply_filters( 'c2c_list_more_custom_field_names', 200 );
	return (int) $limit;
}
add_filter( 'postmeta_form_limit', 'c2c_list_more_custom_field_names' );
endif;
?>