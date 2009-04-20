=== List More Custom Field Names ===
Contributors: Scott Reilly
Donate link: http://coffee2code.com
Tags: custom fields, admin, edit post, edit page, meta, keys
Requires at least: 2.6
Tested up to: 2.7.1
Stable tag: trunk
Version: 1.0

Allows for more existing custom field names to be listed in the dropdown selection field when writing a post.

== Description ==

Allows for more existing custom field names to be listed in the dropdown selection field when writing a post.

By default, WordPress only allows 30 custom field names/keys to be listed in the dropdown selection 'Name' field when writing a post or page.  If you, or the plugins you use, make use of a lot of custom field key names, you may surpass the default limit resulting in some custom field keys not being listed.  This may force post authors to manually type in custom field key names if they aren't listed, which increases the chances for naming errors (typos, or not using the precise key name that is needed).  This may also cause some authors concern wondering where previously used custom field keys have gone since they aren't listed.

This plugin increases the limit to 200 custom field key names.  Due to the simplistic nature of the plugin and the overhead of doing so for a single setting, there is no settings page to customize this value.  You can edit the plugin file and change the $custom_field_names_limit variable value to whatever value you'd like.


== Installation ==

1. Unzip `list-more-custom-field-names-v1.0.zip` inside the `/wp-content/plugins/` directory for your site
1. Activate the plugin through the 'Plugins' admin menu in WordPress

