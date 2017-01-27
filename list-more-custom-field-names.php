<?php
/**
 * Plugin Name: List More Custom Field Names
 * Version:     1.3.1
 * Plugin URI:  http://coffee2code.com/wp-plugins/list-more-custom-field-names/
 * Author:      Scott Reilly
 * Author URI:  http://coffee2code.com/
 * Text Domain: list-more-custom-field-names
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Description: Allows for more existing custom field names to be listed in the dropdown selection field when writing a post.
 *
 * Compatible with WordPress 2.6 through 4.7+.
 *
 * =>> Read the accompanying readme.txt file for instructions and documentation.
 * =>> Also, visit the plugin's homepage for additional information and updates.
 * =>> Or visit: https://wordpress.org/plugins/list-more-custom-field-names/
 *
 * @package List_More_Custom_Field_Names
 * @author  Scott Reilly
 * @version 1.3.1
 */

/*
 * TODO:
 * - Change filter example to use anonymous function instead of create_function()
 */

/*
	Copyright (c) 2009-2017 by Scott Reilly (aka coffee2code)

	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

defined( 'ABSPATH' ) or die();

if ( ! function_exists( 'c2c_list_more_custom_field_names' ) ):

	/**
	 * Allows customization of the number of custom field names to list in the
	 * dropdown of custom field names when adding custom fields to a post.
	 *
	 * @param int  $limit The default number of custom field names to list.
	 * @return int The new number of custom field names to list.
	 */
	function c2c_list_more_custom_field_names( $limit ) {
		if ( defined( 'CUSTOM_FIELD_NAMES_LIMIT' ) && CUSTOM_FIELD_NAMES_LIMIT ) {
			$limit = CUSTOM_FIELD_NAMES_LIMIT;
		} else {
			$limit = apply_filters( 'c2c_list_more_custom_field_names', 200 );
		}

		return absint( $limit );
	}
	add_filter( 'postmeta_form_limit', 'c2c_list_more_custom_field_names' );

endif;
