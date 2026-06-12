<?php

defined( 'ABSPATH' ) || exit;

class List_More_Custom_Field_Names_Test extends WP_UnitTestCase {

	protected $default_limit = 200;
	protected $minimum_limit = 30;

	//
	//
	// HELPER FUNCTIONS
	//
	//


	public function filter_c2c_list_more_custom_field_names( $count ) {
		return 99;
	}

	protected function get_postmeta_form_limit( $limit = 30 ) {
		return apply_filters( 'postmeta_form_limit', $limit );
	}


	//
	//
	// TESTS
	//
	//


	public function test_hooks_postmeta_form_limit() {
		$this->assertEquals( 10, has_filter( 'postmeta_form_limit', 'c2c_list_more_custom_field_names' ) );
	}

	public function test_default_filtering() {
		$this->assertEquals( $this->default_limit, $this->get_postmeta_form_limit() );
	}

	public function test_uses_provided_limit_if_greater_than_default_limit() {
		$this->assertEquals( 999, $this->get_postmeta_form_limit( 999 ) );
	}

	public function test_uses_provided_limit_if_greater_than_default_limit_and_is_int_string() {
		$this->assertEquals( 999, $this->get_postmeta_form_limit( '999' ) );
	}

	public function test_uses_filter_if_provided_limit_is_greater_than_filtered_limit_and_is_float_string() {
		add_filter( 'c2c_list_more_custom_field_names', function ( $limit ) { return 499; } );
		$this->assertEquals( 499, $this->get_postmeta_form_limit( '999.9' ) );
	}

	public function test_ignores_provided_limit_if_greater_than_default_limit_and_is_float_string() {
		$this->assertEquals( $this->default_limit, $this->get_postmeta_form_limit( '999.9' ) );
	}

	public function test_ignores_provided_limit_if_less_than_default_limit() {
		$this->assertEquals( $this->default_limit, $this->get_postmeta_form_limit( 10 ) );
	}

	public function test_ignores_provided_limit_if_not_an_integer() {
		$this->assertEquals( $this->default_limit, $this->get_postmeta_form_limit( '12 foo' ) );
	}

	public function test_ignores_provided_limit_if_negative() {
		$this->assertEquals( $this->default_limit, $this->get_postmeta_form_limit( -47 ) );
	}

	public function test_ignores_provided_limit_if_zero() {
		$this->assertEquals( $this->default_limit, $this->get_postmeta_form_limit( 0 ) );
	}

	public function test_ignores_provided_limit_if_float() {
		$this->assertEquals( $this->default_limit, $this->get_postmeta_form_limit( 55.4 ) );
	}

	public function test_c2c_list_more_custom_field_names_filter() {
		add_filter( 'c2c_list_more_custom_field_names', array( $this, 'filter_c2c_list_more_custom_field_names' ) );

		$this->assertEquals( 99, $this->get_postmeta_form_limit() );
	}

	public function test_uses_filter_if_filtered_limit_is_greater_than_default_limit_and_is_int_string() {
		add_filter( 'c2c_list_more_custom_field_names', function ( $limit ) { return '499'; } );
		$this->assertEquals( 499, $this->get_postmeta_form_limit() );
	}

	public function test_uses_default_limit_if_configured_limit_is_negative() {
		add_filter( 'c2c_list_more_custom_field_names', function ( $limit ) { return -47; } );

		$this->assertEquals( $this->default_limit, $this->get_postmeta_form_limit() );
	}

	public function test_users_default_limit_if_configured_limit_is_zero() {
		add_filter( 'c2c_list_more_custom_field_names', function ( $limit ) { return 0; } );

		$this->assertEquals( $this->default_limit, $this->get_postmeta_form_limit() );
	}

	public function test_uses_default_limit_if_configured_limit_is_float() {
		add_filter( 'c2c_list_more_custom_field_names', function ( $limit ) { return 55.4; } );

		$this->assertEquals( $this->default_limit, $this->get_postmeta_form_limit() );
	}

	public function test_uses_default_limit_if_configured_limit_is_not_an_integer() {
		add_filter( 'c2c_list_more_custom_field_names', function ( $limit ) { return '12 foo'; } );

		$this->assertEquals( $this->default_limit, $this->get_postmeta_form_limit() );
	}

	public function test_clamps_configured_limit_to_minimum_limit() {
		add_filter( 'c2c_list_more_custom_field_names', function ( $limit ) { return 10; } );

		$this->assertEquals( $this->minimum_limit, $this->get_postmeta_form_limit() );
	}

	public function test_clamps_configured_limit_at_minimum_limit_boundary() {
		add_filter( 'c2c_list_more_custom_field_names', function ( $limit ) { return 29; } );

		$this->assertEquals( $this->minimum_limit, $this->get_postmeta_form_limit() );
	}

	public function test_does_not_clamp_configured_limit_at_minimum_limit() {
		add_filter( 'c2c_list_more_custom_field_names', function ( $limit ) { return 30; } );

		$this->assertEquals( $this->minimum_limit, $this->get_postmeta_form_limit() );
	}

	public function test_c2c_list_more_custom_field_names_filter_second_argument() {
		add_filter( 'c2c_list_more_custom_field_names', function ( $limit, $old_limit ) { return $old_limit + 4; }, 10, 2 );

		$this->assertEquals( 34, $this->get_postmeta_form_limit() );
	}

	/**
	 * @runInSeparateProcess Due to usage of a constant.
	 * @preserveGlobalState disabled
	 */
	public function test_constant_takes_precedence_over_filter() {
		$limit = 98;
		define( 'CUSTOM_FIELD_NAMES_LIMIT', $limit );
		add_filter( 'c2c_list_more_custom_field_names', array( $this, 'filter_c2c_list_more_custom_field_names' ) );

		$this->assertEquals( $limit, $this->get_postmeta_form_limit() );
	}

	/**
	 * @runInSeparateProcess Due to usage of a constant.
	 * @preserveGlobalState disabled
	 */
	public function test_constant_accepts_stringy_integer() {
		$limit = '175';
		define( 'CUSTOM_FIELD_NAMES_LIMIT', $limit );

		$this->assertEquals( 175, $this->get_postmeta_form_limit() );
	}

	/**
	 * @runInSeparateProcess Due to usage of a constant.
	 * @preserveGlobalState disabled
	 */
	public function test_constant_with_falsey_value_is_ignored_and_default_limit_is_used() {
		define( 'CUSTOM_FIELD_NAMES_LIMIT', '' );

		$this->assertEquals( $this->default_limit, $this->get_postmeta_form_limit() );
	}

	/**
	 * @runInSeparateProcess Due to usage of a constant.
	 * @preserveGlobalState disabled
	 */
	public function test_constant_with_falsey_value_is_ignored_and_filtered_limit_is_used() {
		define( 'CUSTOM_FIELD_NAMES_LIMIT', '' );
		add_filter( 'c2c_list_more_custom_field_names', array( $this, 'filter_c2c_list_more_custom_field_names' ) );

		$this->assertEquals( 99, $this->get_postmeta_form_limit() );
	}

	/**
	 * @runInSeparateProcess Due to usage of a constant.
	 * @preserveGlobalState disabled
	 */
	public function test_constant_is_ignored_if_provided_limit_is_greater_than_default_limit() {
		define( 'CUSTOM_FIELD_NAMES_LIMIT', 999 );

		$this->assertEquals( 399, $this->get_postmeta_form_limit( 399 ) );
	}

	/**
	 * @runInSeparateProcess Due to usage of a constant.
	 * @preserveGlobalState disabled
	 */
	public function test_constant_is_used_if_provided_limit_is_invalid() {
		$limit = 999;
		define( 'CUSTOM_FIELD_NAMES_LIMIT', $limit );

		$this->assertEquals( $limit, $this->get_postmeta_form_limit( 100 ) );
		$this->assertEquals( $limit, $this->get_postmeta_form_limit( '100' ) );
		$this->assertEquals( $limit, $this->get_postmeta_form_limit( '100.0' ) );
		$this->assertEquals( $limit, $this->get_postmeta_form_limit( '100.9' ) );
		$this->assertEquals( $limit, $this->get_postmeta_form_limit( '100 foo' ) );
		$this->assertEquals( $limit, $this->get_postmeta_form_limit( -100 ) );
		$this->assertEquals( $limit, $this->get_postmeta_form_limit( 0 ) );
		$this->assertEquals( $limit, $this->get_postmeta_form_limit( 55.4 ) );
	}

	/**
	 * @runInSeparateProcess Due to usage of a constant.
	 * @preserveGlobalState disabled
	 */
	public function test_constant_is_clamped_to_minimum_limit() {
		define( 'CUSTOM_FIELD_NAMES_LIMIT', 10 );

		$this->assertEquals( $this->minimum_limit, $this->get_postmeta_form_limit() );
	}


}
