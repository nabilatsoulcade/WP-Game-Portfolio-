<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://nabilsekirime.com
 * @since      1.0.0
 *
 * @package    Wp_Game_Portfolio
 * @subpackage Wp_Game_Portfolio/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wp_Game_Portfolio
 * @subpackage Wp_Game_Portfolio/includes
 * @author     Nabil Sekirime <sekirimenabil@gmail.com>
 */
class Wp_Game_Portfolio_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp-game-portfolio',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
