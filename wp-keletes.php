<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.keletes.com
 * @since             1.0.0
 * @package           Wp_Keletes
 *
 * @wordpress-plugin
 * Plugin Name:       Keletes Product Configurator
 * Plugin URI:        https://www.keletes.com/wp-keletes
 * Description:       Integrate your Keletes® product configurator in your Wordpress website, customizing all its options from an easy-to-use interface.
 * Version:           1.0.0
 * Author:            Keletes
 * Author URI:        https://www.keletes.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-keletes
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
define( 'WP_KELETES_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-keletes-activator.php
 */
function activate_wp_keletes() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-keletes-activator.php';
	Wp_Keletes_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-keletes-deactivator.php
 */
function deactivate_wp_keletes() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-keletes-deactivator.php';
	Wp_Keletes_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_keletes' );
register_deactivation_hook( __FILE__, 'deactivate_wp_keletes' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-keletes.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_keletes() {

	$plugin = new Wp_Keletes();
	$plugin->run();

}
run_wp_keletes();
