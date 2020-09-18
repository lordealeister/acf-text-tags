<?php

/*
 * Plugin Name: Advanced Custom Fields: Text Tags Field
 * Plugin URI: https://github.com/lordealeister/acf-text-tags
 * Description: A Text Tags Add-on for the Advanced Custom Fields Plugin.
 * Version: 0.0.1
 * Author: Lorde Aleister
 * Author URI: https://github.com/lordealeister
 * Text Domain: acf-text-tags
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

// exit if accessed directly
if(!defined('ABSPATH'))
	exit;

// check if class already exists
if(!class_exists('ACFPluginTextTags')):
	class ACFPluginTextTags {
				
		/**
		 * __construct This function will setup the class functionality
		 *
		 * @return void
		 */
		function __construct() {
			// vars
			$this->settings = array(
				'version'	=> '0.0.1',
				'url'		=> plugin_dir_url(__FILE__),
				'path'		=> plugin_dir_path(__FILE__)
			);

			// include field
			add_action('acf/include_field_types', array($this, 'fieldTypes')); // v5
			add_action('plugins_loaded', array($this, 'loadPluginTextdomain'));
		}

		/**
		 * fieldTypes This function will include the field type class
		 *
		 * @param  int $version major ACF version. Defaults to false
		 * @return void
		 */
		function fieldTypes($version = false) {
			// include
			include_once('fields/AcfTextTagsField-v5.php');
		}
		
		/**
		 * loadPluginTextdomain This function load textdomain for localization
		 *
		 * @return void
		 */
		function loadPluginTextdomain() {
			load_plugin_textdomain('acf-text-tags', FALSE, basename(dirname(__FILE__ )) . '/languages/');
		}
		
	}

	// initialize
	new ACFPluginTextTags();

// class_exists check
endif;
