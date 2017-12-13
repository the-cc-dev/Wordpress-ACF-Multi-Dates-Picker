<?php

/*
Plugin Name: Advanced Custom Fields Multidates Picker
Plugin URI: https://github.com/nan-guo/Wordpress-ACF-Multidates-Picker
Description: Advanced Custom Fields Multidates Picker
Version: 1.0.0
Author: Nan GUO (Prodigious)
Author URI: https://github.com/nan-guo
License: MIT
License URI: https://opensource.org/licenses/MIT
*/

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


// check if class already exists
if( !class_exists('pdg_acf_plugin_multidates_picker') ) :

class pdg_acf_plugin_multidates_picker {
	
	// vars
	var $settings;
	
	
	/*
	*  __construct
	*
	*  This function will setup the class functionality
	*
	*  @type	function
	*  @date	13/12/2017
	*  @since	1.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	function __construct() {
		
		// settings
		// - these will be passed into the field class.
		$this->settings = array(
			'version'	=> '1.0.0',
			'url'		=> plugin_dir_url( __FILE__ ),
			'path'		=> plugin_dir_path( __FILE__ )
		);
		
		
		// set text domain
		// https://codex.wordpress.org/Function_Reference/load_plugin_textdomain
		load_plugin_textdomain( 'acf-multidates-picker', false, plugin_basename( dirname( __FILE__ ) ) . '/lang' ); 
		
		
		// include field
		add_action('acf/include_field_types', 	array($this, 'include_field_types')); // v5
		add_action('acf/register_fields', 		array($this, 'include_field_types')); // v4
		
	}
	
	
	/*
	*  include_field_types
	*
	*  This function will include the field type class
	*
	*  @type	function
	*  @date	13/12/2017
	*  @since	1.0.0
	*
	*  @param	$version (int) major ACF version. Defaults to false
	*  @return	n/a
	*/
	
	function include_field_types( $version = false ) {
		
		// support empty $version
		if( !$version ) $version = 4;
		
		
		// include
		include_once('fields/class-pdg-acf-field-multidates-picker-v' . $version . '.php');
		
	}
	
}


// initialize
new pdg_acf_plugin_multidates_picker();


// class_exists check
endif;
	
?>