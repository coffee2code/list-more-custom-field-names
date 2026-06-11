<?php

defined( 'ABSPATH' ) or exit;

class List_More_Custom_Field_Names_Test extends WP_UnitTestCase {

	protected $default_limit = 200;
	//
	//
	// HELPER FUNCTIONS
	//
	//


	public function filter_c2c_list_more_custom_field_names( $count ) {
		return 99;
	}

	protected function get_postmeta_form_limit() {
		return apply_filters( 'postmeta_form_limit', 30 );
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

	public function test_c2c_list_more_custom_field_names_filter() {
		add_filter( 'c2c_list_more_custom_field_names', array( $this, 'filter_c2c_list_more_custom_field_names' ) );

		$this->assertEquals( 99, $this->get_postmeta_form_limit() );
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

	public function test_c2c_list_more_custom_field_names_filter_second_argument() {
		add_filter( 'c2c_list_more_custom_field_names', function ( $limit, $old_limit ) { return $old_limit + 4; }, 10, 2 );

		$this->assertEquals( 34, $this->get_postmeta_form_limit() );
	}

	// Test this last since the constant can't be unset
	public function test_constant_takes_precendence() {
		$limit = 175;
		define( 'CUSTOM_FIELD_NAMES_LIMIT', $limit );
		add_filter( 'c2c_list_more_custom_field_names', array( $this, 'filter_c2c_list_more_custom_field_names' ) );

		$this->assertEquals( $limit, $this->get_postmeta_form_limit() );
	}

}
