<?php

defined( 'ABSPATH' ) or die();

class List_More_Custom_Field_Names_Test extends WP_UnitTestCase {

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
		$this->assertEquals( 200, $this->get_postmeta_form_limit() );
	}

	public function test_c2c_list_more_custom_field_names_filter() {
		add_filter( 'c2c_list_more_custom_field_names', array( $this, 'filter_c2c_list_more_custom_field_names' ) );

		$this->assertEquals( 99, $this->get_postmeta_form_limit() );
	}

	public function test_converts_to_int() {
		add_filter( 'c2c_list_more_custom_field_names', function ( $limit ) { return 55.4; } );

		$this->assertEquals( 55, $this->get_postmeta_form_limit() );
	}

	public function test_converts_to_positive_int() {
		add_filter( 'c2c_list_more_custom_field_names', function ( $limit ) { return -47; } );

		$this->assertEquals( 47, $this->get_postmeta_form_limit() );
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
