<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.wplauncher.com
 * @since      1.0.0
 *
 * @package    Virtual_Agent
 * @subpackage Virtual_Agent/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Virtual_Agent
 * @subpackage Virtual_Agent/includes
 * @author     Muhammad Adeel <adeel@bots4you.de>
 */
class Virtual_Agent_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'virtual-real-estate-agent',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
