<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://nabilsekirime.com
 * @since             1.0.0
 * @package           Wp_Game_Portfolio
 *
 * @wordpress-plugin
 * Plugin Name:       WP Game Portfolio
 * Plugin URI:        https://github.com/nabilatsoulcade/WP-Game-Portfolio-
 * Description:       A Wordpress plugin for saving the game projects you worked on.
 * Version:           1.0.0
 * Author:            Nabil Sekirime
 * Author URI:        https://nabilsekirime.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-game-portfolio
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WP_GAME_PORTFOLIO_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-game-portfolio-activator.php
 */
function activate_wp_game_portfolio() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-game-portfolio-activator.php';
	Wp_Game_Portfolio_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-game-portfolio-deactivator.php
 */
function deactivate_wp_game_portfolio() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-game-portfolio-deactivator.php';
	Wp_Game_Portfolio_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_game_portfolio' );
register_deactivation_hook( __FILE__, 'deactivate_wp_game_portfolio' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-game-portfolio.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_game_portfolio() {

	$plugin = new Wp_Game_Portfolio();
	$plugin->run();

}
run_wp_game_portfolio();
