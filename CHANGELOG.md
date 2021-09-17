# Changelog

## _(in-progress)_
* Change: Note compatibility through WP 5.8+
* Change: Update usage instructions to use anonymous function instead of `create_function()` (as was done in filter example in v1.3.3)
* Unit tests:
    * Change: Restructure unit test directories
        * Change: Move `phpunit/` into `tests/`
        * Change: Move `phpunit/bin` into `tests/`

## 1.3.7 _(2021-04-10)_
* Change: Note compatibility through WP 5.7+
* Change: Update copyright date (2021)

## 1.3.6 _(2020-08-21)_
* New: Add TODO.md for newly added potential TODO item
* Change: Restructure unit test file structure
    * New: Create new subdirectory `phpunit/` to house all files related to unit testing
    * Change: Move `bin/` to `phpunit/bin/`
    * Change: Move `tests/bootstrap.php` to `phpunit/`
    * Change: Move `tests/` to `phpunit/tests/`
    * Change: Rename `phpunit.xml` to `phpunit.xml.dist` per best practices
* Change: Note compatibility through WP 5.5+
* Unit tests:
    * New: Add unit test to verify filter return value is cast as integer
    * Change: Remove unnecessary unregistering of hooks, and thusly delete `tearDown()`

## 1.3.5 _(2020-05-02)_
* Change: Use HTTPS for link to WP SVN repository in bin script for configuring unit tests
* Change: Note compatibility through WP 5.4+
* Change: Update links to coffee2code.com to be HTTPS

## 1.3.4 _(2019-11-23)_
* New: Add CHANGELOG.md and move all but most recent changelog entries into it
* New: Add unit test to verify plugin hooks the proper filter
* Change: Update unit test install script and bootstrap to use latest WP unit test repo
* Change: Note compatibility through WP 5.3+
* Change: Add link to plugin's page in Plugin Directory to README.md
* Change: Update copyright date (2020)
* Change: Split paragraph in README.md's "Support" section into two

## 1.3.3 _(2019-02-27)_
* NeW: Add documentation indicating that the plugin has no benefit for users using the block editor
* New: Add inline documentation for hook
* Change: Update filter example to use anonymous function instead of `create_function()`
* Change: Note compatibility through WP 5.1+
* Change: Update copyright date (2019)
* Change: Update License URI to be HTTPS

## 1.3.2 _(2018-04-26)_
* New: Add README.md
* Change: Unit tests: Minor whitespace tweaks to bootstrap
* Change: Add GitHub link to readme
* Change: Note compatibility through WP 4.9+
* Change: Update copyright date (2018)

## 1.3.1 _(2017-01-26)_
* Change: Default `WP_TESTS_DIR` to `/tmp/wordpress-tests-lib` rather than erroring out if not defined via environment variable.
* Change: Enable more error output for unit tests.
* Change: Note compatibility through WP 4.7+.
* Change: Minor readme.txt improvements.
* Change: Update copyright date (2017).
* Change: Add 'Text Domain' to plugin header.
* New: Add LICENSE file.

## 1.3 _(2015-12-11)_
* Change: Only utilize value of constant if it isn't falsey (0, false, empty string, etc).
* Change: Note compatibility through WP 4.4+.
* Change: Explicitly declare methods in unit tests as public or protected.
* Change: Update copyright date (2016).
* Add: Create empty index.php to prevent files from being listed if web server has enabled directory listings.

## 1.2.9 _(2015-08-15)_
* Update: Note compatibility through WP 4.3+
* Update: Minor plugin header tweaks (formatting)

## 1.2.8 _(2015-02-11)_
* Note compatibility through WP 4.1+
* Update copyright date (2015)

## 1.2.7 _(2014-08-25)_
* Minor plugin header reformatting
* Change documentation links to wp.org to be https
* Note compatibility through WP 4.0+
* Add plugin icon

## 1.2.6 _(2013-12-17)_
* Add unit tests
* Note compatibility through WP 3.8+
* Update copyright date (2014)
* Minor code and documentation reformatting
* Change donate link
* Add banner image

## 1.2.5
* Cast limit as absolute integer rather than just an integer to disallow negative limits
* Add check to prevent execution of code if file is directly accessed
* Note compatibility through WP 3.5+
* Update copyright date (2013)
* Minor code reformatting (spacing)

## 1.2.4
* Re-license as GPLv2 or later (from X11)
* Add 'License' and 'License URI' header tags to readme.txt and plugin file
* Remove ending PHP close tag
* Note compatibility through WP 3.4+
* Minor code reformatting (indentation)

## 1.2.3
* Note compatibility through WP 3.3+
* Minor code documentation reformatting in readme.txt

## 1.2.2
* Note compatibility through WP 3.2+
* Minor documentation reformatting in readme.txt
* Add plugin homepage and author links to description in readme.txt

## 1.2.1
* Note compatibility through WP 3.1+
* Update copyright date (2011)

## 1.2
* Functionality now in new `c2c_list_more_custom_field_names()` rather than in an anonymous function
* Allow overriding of the default number of custom field names, via the 'c2c_list_more_custom_field_names' filter (default is 200)
* Note compatibility with WP 3.0+
* Remove docs from top of plugin file (all that and more are in readme.txt)
* Add Upgrade Notice section to readme.txt

## 1.1.1
* Add PHPDoc documentation
* Note compatibility with WP 2.9+
* Update copyright date

## 1.1
* Default limit provided by plugin now overridden via CUSTOM_FIELD_NAMES_LIMIT constant, if defined (and no longer via global variable defined in plugin)
* Added Changelog and FAQ to readme
* Noted compatibility through WordPress 2.8+

## 1.0
* Initial release
