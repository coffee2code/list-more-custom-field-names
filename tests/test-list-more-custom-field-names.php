<?php

class List_More_Custom_Field_Names_Test extends WP_UnitTestCase {

	function tearDown() {
		parent::tearDown();
		remove_filter( 'c2c_list_more_custom_field_names', array( $this, 'filter_c2c_list_more_custom_field_names' ) );
	}


	/**
	 *
	 * HELPER FUNCTIONS
	 *
	 */


	function filter_c2c_list_more_custom_field_names( $count ) {
		return 99;
	}

	function get_postmeta_form_limit() {
		return apply_filters( 'postmeta_form_limit', 30 );
	}


	/**
	 *
	 * TESTS
	 *
	 */


	function test_default_filtering() {
		$this->assertEquals( 200, $this->get_postmeta_form_limit() );
	}

	function test_c2c_list_more_custom_field_names_filter() {
		add_filter( 'c2c_list_more_custom_field_names', array( $this, 'filter_c2c_list_more_custom_field_names' ) );

		$this->assertEquals( 99, $this->get_postmeta_form_limit() );
	}

	// Test this last since the constant can't be unset
	function test_constant_takes_precendence() {
		$limit = 175;
		define( 'CUSTOM_FIELD_NAMES_LIMIT', $limit );
		add_filter( 'c2c_list_more_custom_field_names', array( $this, 'filter_c2c_list_more_custom_field_names' ) );

		$this->assertEquals( $limit, $this->get_postmeta_form_limit() );
	}

}
